<?php

include 'function.php';

echo query_db($_POST['query'], $_POST['database']);

?>