<?php

class malfunctions
{
    private $CRUD;
    private $section;

    function __construct()
    {
        require_once ($_SERVER['DOCUMENT_ROOT']."/method/connection.php");
        $this->CRUD = new connection();
    }

    function getInfo($section = '')
    {
        $result = array();
        if ($_GET['page-type'] == 'malfunctions')
        { $mysqli = $this->CRUD->select("malfunction_results.id, malfunction_results.name, malfunction_results.section as section_id, malfunction_sections.name as section, malfunction_results.description, malfunction_results.recommendation", "malfunction_results, malfunction_sections", "malfunction_sections.id = malfunction_results.section", "", "", "", "", ""); }
        elseif ($_GET['page-type'] == 'signs')
        { $mysqli = $this->CRUD->select("malfunction_signs.id, malfunction_signs.sign as name, malfunction_signs.section as section_id, malfunction_sections.name as section, malfunction_signs.description, malfunction_signs.result as result_id, malfunction_results.name as result", "malfunction_signs, malfunction_results, malfunction_sections", " malfunction_sections.id = malfunction_signs.section AND malfunction_signs.result = malfunction_results.id", "", "", "", "", ""); }
        if ($mysqli != '')
        {
            $count = 0;
            while ($array = mysqli_fetch_array($mysqli))
            {
                $this->section[$array['section_id']] = $array['section'];

                if (($section == '') || (!is_numeric($section)) || ($section == $array['section_id']))
                {

                    $result[$count]['name'] = $array['name'];
                    $result[$count]['section'] = $array['section'];
                    $result[$count]['description'] = $array['description'];
                    if ($_GET['page-type'] == 'malfunctions') { $result[$count]['recommendation'] = $array['recommendation']; }
                    elseif ($_GET['page-type'] == 'signs')
                    {
                        $result[$count]['result']['id'] = $array['result_id'];
                        $result[$count]['result']['name'] = $array['result'];
                    }
                    $result[$count]['id'] = $array['id'];
                    $count++;
                }
            }
            asort($this->section);
        }
        return array($result, $this->section);
    }

    function updateInfo()
    {
        foreach ($_POST as $key => $value)
        {
            if (stripos("{$value}",",") !== false)
            { $_POST[$key] = str_ireplace(",",",/","{$value}"); }
        }
        if ($_GET['page-type'] == 'malfunctions')
        { $this->CRUD->update("malfunction_results","name, section, description, recommendation","{$_POST['name']}, {$_POST['section']}, {$_POST['description']}, {$_POST['recommendation']}","id = '{$_POST['hid']}'",""); }
        elseif ($_GET['page-type'] == 'signs')
        { $this->CRUD->update("malfunction_signs","sign, section, description, result","{$_POST['name']}, {$_POST['section']}, {$_POST['description']}, {$_POST['result']}","id = '{$_POST['hid']}'",""); }


        header ("Location: /?page={$_GET['page']}&page-type={$_GET['page-type']}");
    }

    function addInfo()
    {
        if ($_GET['page-type'] == 'malfunctions') { $this->CRUD->insert("malfunction_results","name, section, description, recommendation","'{$_POST['name']}', '{$_POST['section']}', '{$_POST['description']}', '{$_POST['recommendation']}'",""); }
        elseif ($_GET['page-type'] == 'signs') { $this->CRUD->insert("malfunction_signs","sign, section, description, result","'{$_POST['name']}', '{$_POST['section']}', '{$_POST['description']}', '{$_POST['result']}'",""); }

        header ("Location: /?page={$_GET['page']}&page-type={$_GET['page-type']}");
    }

    function delInfo()
    {
        if ($_GET['page-type'] == 'malfunctions') { $table = 'malfunction_results'; }
        elseif ($_GET['page-type'] == 'signs') { $table = 'malfunction_signs'; }
        $this->CRUD->del("{$table}","id = '{$_POST['hid']}'","");
        header ("Location: /?page={$_GET['page']}&page-type={$_GET['page-type']}");
    }
}