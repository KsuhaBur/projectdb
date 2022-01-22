<?php

include "function.php";

function FileUpload($file) {
    echo '<script type="text/javascript" >
    window.parent.addInSidenav ("'.$file.'");
    </script>
    ';
}

if (isset($_FILES)) {
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        $new_file_name = $_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'], 'temp/'.$new_file_name);
        $file_path = 'temp/'.$new_file_name;

        $string_table = get_table($file_path);

        FileUpload("{'filename':'".$new_file_name."','pathname':'".$string_table."'}");
        echo 'ok';
    } else {
        echo 'error';
    }
}

?>
