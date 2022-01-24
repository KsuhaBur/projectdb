<?php

include 'database_array.php';
include 'function.php';

function updateTable($table) {
    echo '<script type="text/javascript">
    window.parent.updateSidenav ("'.$table.'")
    </script>';
}

$filename = $_POST['database'];
$query = htmlspecialchars($_POST['query']);


echo query_db($query, 'temp/'.$filename);
$data = "{'filename': '".$filename."', 'pathname':'".get_table('temp/'.$filename)."'}";

updateTable($data);

?>