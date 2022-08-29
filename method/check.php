<?php

class check
{
    private $crud;
    private $cars;
    private $searchedCar;
    private $allCars;

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

    function car_info()
    {
        $mysqli = $this->crud->select("malfunction_results.section as section, malfunction_sections.name as section_name, malfunction_sections.description as section_description, avg(result_logs.grade) as avg","cars, malfunction_sections, user_cars, result_logs, malfunction_results","malfunction_results.section = malfunction_sections.id AND cars.brand = '{$_POST['brand']}' AND cars.model = '{$_POST['model']}' AND cars.id = user_cars.car AND user_cars.id = result_logs.user_car AND result_logs.grade > 1 AND malfunction_results.id = result_logs.result","malfunction_results.section","","result_logs.result ASC","","");
        if ($mysqli != '')
        {
            while ($arr = mysqli_fetch_array($mysqli))
            {
                $this->searchedCar[$arr['section_name']] = $arr['avg'];
                //$this->searchedCar[$arr['section_name']]['description'] = $arr['section_description'];
            }
        }

        $mysqli = $this->crud->select("malfunction_results.section as section, malfunction_sections.name as section_name, avg(result_logs.grade) as avg","result_logs, malfunction_sections, malfunction_results","malfunction_results.section = malfunction_sections.id AND result_logs.grade > 1 AND malfunction_results.id = result_logs.result","malfunction_results.section","","","","");
        if ($mysqli != '')
        {
            while ($arr = mysqli_fetch_array($mysqli))
            {
                $this->allCars[$arr['section_name']] = $arr['avg'];
            }
        }

        $grade = 0;
        if ($this->searchedCar != '')
        {
            foreach ($this->searchedCar as $key => $value)
            {
                if ($value >= $this->allCars[$key]) { $result[$key] = 1; $grade += $result[$key]; }
                else { $result[$key] = 0; }
            }


            $grade = 100 - ($grade *= 20);
        }


        return array($result, $grade);
    }
}