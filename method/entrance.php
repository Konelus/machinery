<?php

class entrance
{
    private $crud;
    private $page;

    function __construct()
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/connection.php");
        $this->crud = new connection();
        if (($_GET['page']) && ($_GET['page'] != 'profile')) { $this->page = "?page={$_GET['page']}"; }
    }

    function login()
    {
        $error = 0;
        $mysqli = $this->crud->select("id","users","login = '{$_POST['name']}' AND password = '{$_POST['password']}'");
        if ($mysqli != '')
        {
            while ($row = mysqli_fetch_row($mysqli))
            { $result = implode($row); }
            if ($result != '')
            {
                setcookie("user","{$result}");
                header ("Location: /{$this->page}");
            }
            else { $error = 1; }
        }
        return $error;
    }

    function registration()
    {
        $error = 0;
        if (!$_COOKIE['user'])
        {
            $mysqli = $this->crud->select("id","users","email = '{$_POST['email']}' OR login = '{$_POST['name']}'");
            if ($mysqli != '')
            {
                while ($row = mysqli_fetch_row($mysqli))
                { $result = implode($row); }
            }
        }

        if ($result == '')
        {
            $this->crud->insert("users","login, password, email","'{$_POST['name']}', '{$_POST['password']}', '{$_POST['email']}'","");
            $id = $this->crud->mysqli->insert_id;
            setcookie("user","{$id}");
            header("Location: /{$this->page}");
        }
        else { $error = 1; }
        return $error;
    }

    function logout()
    {
        setcookie("user", "", time()-3600);
        header("Location: /{$this->page}");
    }

}