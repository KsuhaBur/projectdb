<?php

function query_db($query_string, $filename) {
    $return = '';
    if (!$query_string and $filename) {
        $return .= "<div id='message' class='message'>Query cannot be empty</div>";
        return $return;
    }
    if ($query_string[0] == '-' and $query_string == '-' ) {
        exit();
    }
    try {
        $db = new PDO('sqlite:'.$filename);
        $query = $db->query($query_string);
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($rows) {
            $return .= "<table id=\"table\" class=\"table table-striped\"> <tr>";
            foreach ($rows[0] as $key=>$value) {
                $return .= "<td>".$key."</td>";
            }
            $return .= "</tr>";
            foreach ($rows as $item) {
                $return .= "<tr>";
                foreach ($item as $value) {
                    $return .= "<td>".$value."</td>";
                }
                $return .= "</tr>";
            }
            $return .= "</table>";
            return $return;
        } else {
            $return .= "<div id='message' class='message'>Запрос выполнен успешно</div>";
            return $return;
        }
    } catch (PDOException $e) {
        $return .= "<div id='message' class='message'>".$e->getMessage()."</div>";
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
?>