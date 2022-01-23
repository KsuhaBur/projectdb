<?php

function query_db($query_string, $filename) {
    $db = new PDO('sqlite:'.$filename);
    $query = $db->query($query_string);
    if (!$query) {
        echo "<table id=\"table\" class=\"table table-striped\">";
        echo $db->errorInfo();
        echo "</table>";
    } else {
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($rows) {
            echo "<table id=\"table\" class=\"table table-striped\">";
            echo "<tr>";
            foreach ($rows[0] as $key=>$value) {
                echo "<td>";
                print_r($key);
                echo "</td>";
            }
            echo "</tr>";
            foreach ($rows as $item) {
                echo "<tr>";
                foreach ($item as $value) {
                    echo "<td>";
                    print_r($value);
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
}

function get_table($filename) {
    $db = new PDO('sqlite:'.$filename);
    $get_table = $db->query("SELECT name FROM sqlite_master WHERE type='table'");
    $array_table = $get_table->fetchAll(PDO::FETCH_ASSOC);
    $string = '';
    foreach ($array_table as $tables) {
        foreach ($tables as $table) {
            $string .= '<p>'.$table.'</p>';
        }
    }
    return $string;
}

?>