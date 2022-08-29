<?php

class users
{
    private $CRUD;

    function __construct()
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/connection.php");
        $this->CRUD = new connection();
    }

    function users()
    {
        $mysqli = $this->CRUD->select("*","users","id = '{$_COOKIE['user']}'");
        if ($mysqli != '')
        {
            while ($array = mysqli_fetch_array($mysqli))
            { $result = $array; }

            if ($result != '')
            {
                foreach ($result as $key => $value)
                {
                    if (is_numeric($key))
                    { unset ($result[$key]); }
                }
            }
        }
        return $result;
    }
}