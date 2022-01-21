<?php

include 'function.php';

echo query_db($_POST['query'], 'sqlite.db');

?>