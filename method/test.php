<?php

abstract class test_abstract
{
    abstract public function data();
    abstract public function result();

}

class test extends test_abstract
{
    private $crud;
    public $sections;
    public $signs;
    private $resultsID;
    private $results;

    public $cars;

    function __construct()
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/connection.php");
        $this->crud = new connection();
    }

    public function data()
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

        $mysqli = $this->crud->select("*","malfunction_sections");
        if ($mysqli != '')
        {
            while ($arr = mysqli_fetch_array($mysqli))
            { $this->sections[$arr['id']] = $arr['name']; }
        }

        $mysqli = $this->crud->select("*","malfunction_signs");
        if ($mysqli != '')
        {
            while ($arr = mysqli_fetch_array($mysqli))
            {
                $this->resultsID[$arr['id']]['sign'] = $arr['sign'];
                $this->resultsID[$arr['id']]['result'] = $arr['result'];
                $this->signs[$arr['section']][$arr['id']] = $arr['sign'];
            }
        }

        foreach ($this->signs as $key => $value)
        { $this->signs[$key] = array_unique($this->signs[$key]); }

        $mysqli = $this->crud->select("*","malfunction_results");
        if ($mysqli != '')
        {
            while ($arr = mysqli_fetch_array($mysqli))
            {
                $this->results[$arr['id']]['name'] = $arr['name'];
                $this->results[$arr['id']]['description'] = $arr['description'];
                $this->results[$arr['id']]['recommendation'] = $arr['recommendation'];
                $this->results[$arr['id']]['section'] = $arr['section'];
            }
        }
    }

    public function result()
    {
        $count = 0;
        foreach ($_POST as $key => $value)
        {
            if (stripos("{$key}","cb") !== false)
            {
                list(, $sections[], $signs[$count]) = explode("-","{$key}");
                $count++;
            }
        }

        if ($signs)
        {
            $mysqli = $this->crud->select("id","cars", "brand = '{$_POST['brand']}' AND model = '{$_POST['model']}'");
            if ($mysqli != '')
            {
                while ($row = mysqli_fetch_row($mysqli))
                { $carID = implode($row); }
            }

            if ($carID)
            {
                $checked = false;

                if ($_COOKIE['user'] == '') { $user = 0; }
                else { $user = $_COOKIE['user']; }

                $mysqli = $this->crud->select("id, car","user_cars", "user = {$user}");
                if ($mysqli != '')
                {
                    while ($row = mysqli_fetch_array($mysqli))
                    { $userCarID[$row['id']] = $row['car']; }
                }


                if ($userCarID)
                {
                    foreach ($userCarID as $key => $value)
                    {
                        if ($value == $carID)
                        { $currentUserCar = $key;  break; }
                    }
                }

                if ($_POST['date']) { list($year ,,) = explode("-","{$_POST['date']}"); }
                else { $year = '0000'; }

                if (!$currentUserCar)
                {
                    $this->crud->insert("user_cars","user, car, year, registered","$user, $carID, '{$year}', 0");
                    $currentUserCar = $this->crud->mysqli->insert_id;
                }
            }


            foreach ($signs as $key => $value)
            {
                $signValues[] = $this->resultsID[$value]['sign'];
                $this->crud->insert("sign_logs","user_car, sign","$currentUserCar, $value");
            }


            foreach ($this->resultsID as $key => $value)
            {
                foreach ($signValues as $key2 => $value2)
                {
                    if ($value['sign'] == $value2)
                    { $resultKeys[] = $value['result']; }
                }
            }

            $resultCount = array_count_values($resultKeys);
            arsort($resultCount);

            //pre($resultCount);exit;


            foreach ($resultCount as $key => $value)
            {
                $this->crud->insert("result_logs","user_car, result, grade, best","$currentUserCar, $key, $value, 0");

                if ($result[$this->results[$key]['section']]['section'] == '')
                { $result[$this->results[$key]['section']]['section'] = $this->sections[$this->results[$key]['section']]; }

                if ($value != 1)
                {
                    $result[$this->results[$key]['section']][$value][$key]['quantity'] = $value;
                    $result[$this->results[$key]['section']][$value][$key]['name'] = $this->results[$key]['name'];
                    $result[$this->results[$key]['section']][$value][$key]['description'] = $this->results[$key]['description'];
                    $result[$this->results[$key]['section']][$value][$key]['recommendation'] = $this->results[$key]['recommendation'];
                }
            }



            foreach ($result as $key => $value)
            {
                foreach ($value as $key2 => $value2)
                {
                    if ($key2 != 'section') { $endResult[$key][] = $value2; }
                    else { $endResult[$key]['section'] = $value2; }
                }
            }
        }

        return $endResult;
    }

}