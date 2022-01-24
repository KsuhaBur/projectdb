<?php

include 'database_array.php';
include 'function.php';

$filename = 'temp/'.$_POST['database'];
$query = htmlspecialchars($_POST['query']);

echo query_db($query, $filename);

?>