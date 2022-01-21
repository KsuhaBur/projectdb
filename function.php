<?php

include 'php/database_array.php';

$array_history = array();


//$file = $_GET['value'];
$file = $database_array[0];

function query_db($query_string, $filename) {
    $db = new PDO('sqlite:'.$filename);
    $query = $db->query($query_string);
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    echo "<table id=\"table\">";
    foreach ($rows as $item) {
        echo "<tr>";
        foreach ($item as $value) {
            echo "<pre>";
            echo "<td>";
            print_r($value);
            echo "</td>";
            echo "</pre>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function get_table($filename) {
    $db = new PDO('sqlite:'.$filename);
    $get_table = $db->query("SELECT name FROM sqlite_master WHERE type='table'");
    $array_table = $get_table->fetchAll(PDO::FETCH_ASSOC);
    foreach ($array_table as $tables) {
        foreach ($tables as $table) {
            echo "<a>";
            print_r($table);
            echo "</a>";
        }
    }
}

?>