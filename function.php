<?php

include "database_array.php";

function query_db($query_string, $filename) {
    $return = '';
    if (!$query_string and $filename) {
        $return .= "<div id='message' class='message'>Query cannot be empty</div>";
        return $return;
//        exit();
    }
    try {
        $db = new PDO('sqlite:'.$filename);
        $query = $db->query($query_string);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($rows) {
            $return .= "<table id=\"table\" class=\"table table-striped\"> <tr>";
//            echo "<table id=\"table\" class=\"table table-striped\">";
//            echo "<tr>";
            foreach ($rows[0] as $key=>$value) {
                $return .= "<td>".$key."</td>";
//                echo "<td>";
//                print_r($key);
//                echo "</td>";
            }
            $return .= "</tr>";
//            echo "</tr>";
            foreach ($rows as $item) {
                $return .= "<tr>";
//                echo "<tr>";
                foreach ($item as $value) {
                    $return .= "<td>".$value."</td>";
//                    echo "<td>";
//                    print_r($value);
//                    echo "</td>";
                }
                $return .= "</tr>";
//                echo "</tr>";
            }
            $return .= "</table>";
//            echo "</table>";
            return $return;
        } else {
            $return .= "<div id='message' class='message'>Запрос выполнен успешно</div>";
//            echo "<div id='message' class='message'>";
//            echo "Запрос выполнен успешно";
//            echo "</div>";
            return $return;
        }
    } catch (PDOException $e) {
        $return .= "<div id='message' class='message'>".$e->getMessage()."</div>";
//        echo "<div id='message' class='message'>";
//        echo $e->getMessage();
//        echo "</div>";
        return $return;
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

//function draw_sidenav($database) {
//    $string = '';
////    foreach ($database_array as $database) {
////        echo "<button id='dropdown-btn' type='button' class=\"dropdown-btn\" value=$database >";
////        echo $database;
////        echo "<i class=\"fa fa-caret-down\"></i>";
////        echo "</button>";
////        echo "<div class=\"dropdown-container\">";
////        echo get_table('temp/'.$database);
////        echo "</div>";
//
////        $string .= "<button id='dropdown-btn' type='button' class=\"dropdown-btn\" value=";
////        $string .= $database."> <i class=\"fa fa-caret-down\"></i>".
//         $string .= $database."</button> <div id='".$database."' class=\"dropdown-container\">".
//            get_table('temp/'.$database)."</div>";
////    }
//    return $string;
//}
?>