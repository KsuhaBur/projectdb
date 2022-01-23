<?php

include 'php/database_array.php';
include 'function.php';

if (!in_array($_POST['database'], $database_array)) {
    $filename = './temp/'.$_POST['database'];
} else {
    $filename = $_POST['database'];
}

echo query_db($_POST['query'], $filename);

?>