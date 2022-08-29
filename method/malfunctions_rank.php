<?php

abstract class malfunctions_rank_abstract
{
    abstract public function malfunctions();
}

class malfunctions_rank
{
    private $crud;

    function __construct()
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/connection.php");
        $this->crud = new connection();
    }

    public function malfunctions()
    {
        $mysqli = $this->crud->select("result_logs.result, result_logs.grade, malfunction_results.section AS section",
            "result_logs RIGHT JOIN malfunction_results ON (malfunction_results.id=result_logs.result)","result_logs.grade > 1","","","result_logs.result ASC, result_logs.grade ASC", "");

        if ($mysqli != '')
        {
            while ($arr = mysqli_fetch_array($mysqli))
            {
                $result[$arr['section']][$arr['result']]['count']++;
                $result[$arr['section']][$arr['result']][$arr['grade']]++;
            }
        }

        if ($result != '')
        {
            $mysqli = $this->crud->select("*","malfunction_sections");
            if ($mysqli != '')
            {
                while ($arr = mysqli_fetch_array($mysqli))
                {
                    $sections[$arr['id']]['name'] = $arr['name'];
                    $sections[$arr['id']]['description'] = $arr['description'];
                }
            }



            foreach ($result as $key => $value)
            {
                foreach ($value as $key2 => $value2)
                {
                    $count = 0;
                    foreach ($value2 as $key3 => $value3)
                    {
                        //pre($value2[$key3]);
                        if ($count == 0) { $result[$key][$key2]['moda'] = "{$key3}"; }
                        elseif (($value3 > $value2[$key3 - 1]) && (is_numeric($key3)) && (is_numeric($key3 - 1)))
                        { $result[$key][$key2]['moda'] = "{$key3}"; }
                        elseif (($value3 == $value2[$key3 - 1]) && (is_numeric($key3)) && (is_numeric($key3 - 1)))
                        { $result[$key][$key2]['moda'] = ($key3 + ($key3 - 1)) / 2; }
                        $count++;
                    }
                }
            }

            //pre($result);

            foreach ($result as $key => $value)
            {
                foreach ($value as $key2 => $value2)
                {
                    $result[$key][$key2] = $value2['count'] * $value2['moda'];
                    arsort($result[$key]);
                    $result[$key] = array_slice($result[$key], 0, 3, true);
                }
            }

            foreach ($result as $key => $value)
            {
                $result[$key]['section']['name'] = $sections[$key]['name'];
                $result[$key]['section']['description'] = $sections[$key]['description'];

                foreach ($value as $key2 => $value2)
                {
                    if ($query[$key] == '') { $query[$key] = "id = {$key2}"; }
                    else { $query[$key] .= " OR id = {$key2}"; }
                }
                if ($query[$key] != '')
                {
                    $mysqli = $this->crud->select("id, name, description, recommendation","malfunction_results","{$query[$key]}");
                    if ($mysqli != '')
                    {
                        while ($arr = mysqli_fetch_array($mysqli))
                        {
                            unset($result[$key][$arr['id']]);

                            $result[$key][$arr['id']]['name'] = $arr['name'];
                            $result[$key][$arr['id']]['recommendation'] = $arr['recommendation'];
                            $result[$key][$arr['id']]['description'] = $arr['description'];
                        }
                    }
                }
            }

        }
        return $result;

    }
}