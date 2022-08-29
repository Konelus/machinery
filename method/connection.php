<?php

    class connection
    {

        public $mysqli;

        function __construct()
        {
            $connection = parse_ini_file($_SERVER['DOCUMENT_ROOT']."/sys/connection.ini");
            $mysqli = $this->mysqli = new mysqli("{$connection['hostname']}","{$connection['username']}","{$connection['password']}","{$connection['database']}");
            $mysqli->set_charset("utf8");
        }

        function select($value, $table, $where = '1', $groupBy = '', $having = '', $order = '', $limit = '',  $report = '0')
        {
            if ($groupBy != '') { $groupBy = 'GROUP BY '.$groupBy; }
            if ($having != '') { $having = 'HAVING  '.$having; }
            if ($order != '') { $order = 'ORDER BY '.$order; }
            if ($limit != '') { $limit = 'LIMIT '.$limit; }

            if ($where == '') { $where = '1'; }

            $result = $this->mysqli->query("SELECT {$value} FROM {$table} WHERE {$where} {$groupBy} {$having} {$order} {$limit};");
            if ($report == 1) { echo "<div class = 'debug-select'>SELECT {$value} FROM {$table} WHERE {$where} {$groupBy} {$having} {$order} {$limit};</div>"; }
            return $result;
        }

        function insert($table, $fields, $values, $report = '0')
        {
            $result = $this->mysqli->query("INSERT INTO {$table}({$fields}) VALUES({$values});");
            if ($report == 1) { echo "<div class = 'debug-insert'>INSERT INTO {$table}({$fields}) VALUES({$values});</div>"; }
            return $result;
        }

        function update($table, $fields, $values, $where = '1', $report = '0')
        {
            $newFields = explode(", ","{$fields}");
            $newValues = explode(", ","{$values}");

            foreach ($newFields as $key => $value)
            {
                if ($update == '') { $update .= $value.' = '."'{$newValues[$key]}'";  }
                else { $update .= ', '.$value.' = '."'{$newValues[$key]}'";  }
            }

            $update = str_ireplace(",/",",","{$update}");


            $result = $this->mysqli->query("UPDATE {$table} SET {$update} WHERE {$where};");
            if ($report == 1) { echo "<div class = 'debug-insert'>UPDATE {$table} SET {$update} WHERE {$where};</div>"; }
            return $result;
        }

        function del($table, $where = '', $report = '')
        {
            $result = $this->mysqli->query("DELETE FROM {$table} WHERE {$where};");

            if ($report == 1) { echo "<div class = 'debug-insert'>DELETE FROM {$table} WHERE {$where};</div>"; }
            return $result;
        }

    }
?>