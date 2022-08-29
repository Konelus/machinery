<?php

    function pre($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }


    if ($_COOKIE['user'])
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/users.php");
        $USERS = new users();
        $user = $USERS->users();
    }


    if (((!$_COOKIE['user']) && ($_POST['login'])) || ((!$_COOKIE['user']) && ($_POST['reg'])) || (($_COOKIE['user']) && (isset($_POST['logout']))))
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/entrance.php");
        $ENTER = new entrance();

        if ((!$_COOKIE['user']) && ($_POST['login']))
        { $errorLog = $ENTER->login(); }

        if (((!$_COOKIE['user']) && ($_POST['reg'])))
        { $errorReg = $ENTER->registration(); }

        if (isset($_POST['logout']))
        {  $ENTER->logout(); }
    }


    if (($_GET['page'] == 'test') || ($_GET['page'] == ''))
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/test.php");
        $TEST = new test();

        $TEST->data();
        $sections = $TEST->sections;
        $signs = $TEST->signs;
        $cars = $TEST->cars;

        if ($_POST['send_test_result']) { $result = $TEST->result(); }
    }
    elseif ($_GET['page'] == 'malfunctions_rank')
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/malfunctions_rank.php");
        $RANK = new malfunctions_rank();

        $malfunctions = $RANK->malfunctions();
    }

    if (($_GET['page'] == 'malfunctions') && ($user['status'] == '1'))
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/malfunctions.php");
        $INFO = new malfunctions();

        list($systemData, $sectionList) = $INFO->getInfo($_POST['section-select']);

        if (isset($_POST['data-update'])) { $INFO->updateInfo(); }
        elseif (isset($_POST['data-add'])) { $INFO->addInfo(); }
        elseif (isset($_POST['data-del'])) { $INFO->delInfo(); }
    }

    if ($_GET['page'] == 'profile')
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/profile.php");
        $PROFILE = new profile();

        $cars = $PROFILE->cars_info();
        $userCars = $PROFILE->user_cars_info();
        if ($_POST['car_add']) { $PROFILE->car_add(); }
        elseif ($_POST['car_del']) { $PROFILE->car_del(); }
    }

    if ($_GET['page'] == 'check')
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/check.php");
        $CHECK = new CHECK();

        $cars = $CHECK->cars_info();

        if ($_POST['car_check']) { list($carInfo, $grade) = $CHECK->car_info(); }
    }



    //pre(get_defined_vars());

?>