<?php

include "database_array.php";

function query_db($query_string, $filename) {
    if (!$query_string and $filename) {
        echo "<div id='message' class='message'>Query cannot be empty</div>";
        exit();
    }
    try {
        $db = new PDO('sqlite:'.$filename);
        $query = $db->query($query_string);
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
        } else {
            echo "<div id='message' class='message'>";
            echo "Запрос выполнен успешно";
            echo "</div>";
        }
    } catch (PDOException $e) {
        echo "<div id='message' class='message'>";
        echo $e->getMessage();
        echo "</div>";
    }
}

function get_table($filename) {
    try {
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
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function draw_sidenav($database_array) {
    $string = '';
    foreach ($database_array as $database) {
//        echo "<button id='dropdown-btn' type='button' class=\"dropdown-btn\" value=$database >";
//        echo $database;
//        echo "<i class=\"fa fa-caret-down\"></i>";
//        echo "</button>";
//        echo "<div class=\"dropdown-container\">";
//        echo get_table('temp/'.$database);
//        echo "</div>";
        $string .= "<button id='dropdown-btn' type='button' class=\"dropdown-btn\" value=";
        $string .= $database."> <i class=\"fa fa-caret-down\"></i>".
            $database."</button> <div class=\"dropdown-container\">".
            get_table('temp/'.$database)."</div>";
    }
    return $string;
}
?>