<?php

class profile
{
    private $crud;
    private $cars;
    private $userCars;

    function __construct()
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/connection.php");
        $this->crud = new connection();
    }

    function cars_info()
    {
        $mysqli = $this->crud->select("*","cars");
        if ($mysqli != '')
        {
            while ($arr = mysqli_fetch_array($mysqli))
            {
                $this->cars['brand'][$arr['id']] = $arr['brand'];
                $this->cars['model'][$arr['id']] = $arr['model'];
            }
        }

        $this->cars['brand'] = array_unique($this->cars['brand']);
        $this->cars['model'] = array_unique($this->cars['model']);

        return $this->cars;
    }

    function user_cars_info()
    {
        $mysqli = $this->crud->select("user_cars.id, user_cars.car, user_cars.year as year, user_cars.registered, cars.brand as brand, cars.model as model","user_cars, cars", "user_cars.user = {$_COOKIE['user']} AND user_cars.car = cars.id","","","","","");
        if ($mysqli != '')
        {
            $sqlQuery = '';
            while ($row = mysqli_fetch_array($mysqli))
            {

                    $this->userCars[$row['id']]['brand'] = $row['brand'];
                    $this->userCars[$row['id']]['model'] = $row['model'];
                    $this->userCars[$row['id']]['year'] = $row['year'];
                    $this->userCars[$row['id']]['registered'] = $row['registered'];

                if ($row['registered'] == 1)
                {
                    if ($sqlQuery == '') { $sqlQuery = "user_car = '{$row['id']}'"; }
                    else { $sqlQuery .= " OR user_car = '{$row['id']}'"; }
                }
            }
        }

        $mysqli = $this->crud->select("count(id) as count, user_car","result_logs","({$sqlQuery}) AND GRADE != 1","user_car","","","","");
        if ($mysqli != '')
        {
            while ($arr = mysqli_fetch_array($mysqli))
            {
                $this->userCars[$arr['user_car']]['quantity'] = $arr['count'];
                for ($count = 1; $count <= 5; $count++)
                {
                    $this->userCars[$arr['user_car']]['section'][$count] = 0;
                }
            }
        }

        $mysqli = $this->crud->select("result_logs.user_car as user_car, malfunction_results.section as section, count(malfunction_results.id) as count","result_logs, malfunction_results","({$sqlQuery}) AND GRADE != 1 AND result_logs.result = malfunction_results.id","result_logs.user_car, malfunction_results.section","","","","");
        if ($mysqli != '')
        {
            while ($arr = mysqli_fetch_array($mysqli))
            {
                $this->userCars[$arr['user_car']]['section'][$arr['section']] = $arr['count'];
            }
        }

        return $this->userCars;
    }

    function car_add()
    {
        if ($_POST['date'] != '')
        {
            list($_POST['year'],,) = explode("-","{$_POST['date']}");
        }
        else { $_POST['year'] = '0000'; }

        if ($this->userCars != '')
        {
            foreach ($this->userCars as $key => $value)
            {
                if (($value['brand'] == $_POST['brand']) && ($value['model'] == $_POST['model']) && ($value['year'] == $_POST['year']))
                {
                    if ($value['registered'] == 0) { $checkResult = ''; $this->crud->update("user_cars","registered","1","id = '{$key}'",""); }
                    else { $checkResult = ''; $checkResult = 'error'; }
                    break;
                }
                else { $checkResult = 'insert'; }
            }
        }
        else { $checkResult = 'insert'; }


        if ($checkResult == 'insert')
        {
            $mysqli = $this->crud->select("id","cars", "brand = '{$_POST['brand']}' AND model = '{$_POST['model']}'","","","","","");
            if ($mysqli != '')
            {
                while ($row = mysqli_fetch_row($mysqli))
                { $carID = $row[0]; }
            }
            $this->crud->insert("user_cars","user, car, year, registered","{$_COOKIE['user']}, {$carID}, {$_POST['year']}, 1","");
        }

        header ("Location: /?page={$_GET['page']}");
    }

    function car_del()
    {
        $this->crud->update("user_cars","registered","0","id = '{$_POST['car_hid']}'","");
        header ("Location: /?page={$_GET['page']}");
    }
}