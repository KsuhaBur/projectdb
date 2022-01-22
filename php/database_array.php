<?php

$database_array = ['sqlite.db', 'films.db'];
array_map('unlink', glob('temp/*'));

?>