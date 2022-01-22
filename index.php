<?php
include 'function.php';
include 'php/database_array.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://yandex.st/jquery/1.5.0/jquery.min.js" type="text/javascript"></script>
    <title>Title</title>
</head>

<body>
    <aside class="Aside">
        <header class="Aside__header">
            <button class="Button" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Open file
            </button>
            <button class="Button" type="button">
                Save file
            </button>
        </header>
        <div id="sidenav" class="sidenav">
            <?php foreach ($database_array as $database) {
                echo "<button id='dropdown-btn' type='button' class=\"dropdown-btn\" value=$database >";
                echo $database;
                echo "<i class=\"fa fa-caret-down\"></i>";
                echo "</button>";
                echo "<div class=\"dropdown-container\">";
                echo get_table($database);
                echo "</div>";
            }
            ?>

        </div>
    </aside>
    <aside class="Errors">
        <div class="listErrors">
            <ul>
            </ul>

        </div>
    </aside>
    <main class="Main">
        <form id="formx" class="codeZone" method="post">
            <div class="codeZone__header">
                <button class="Button" type="button" id="btn_run" onclick="click_btn()">
                    Run
                </button>
                <div class="Select__database" id="database_selected">

                </div>
            </div>
            <textarea id="input_code" name="input_code" class="inputCode" ></textarea>
        </form>
        <section class="tableZone" id="table_zone">
            <table id="table" class="table table-striped">
            </table>
        </section>
    </main>

    <iframe id="myframe" name="myframe" style="display: none"></iframe>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Open DB</h5>
                    <button id="btn_close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="add_file.php" method="post" enctype="multipart/form-data" target="myframe">
                    <div class="modal-body">
                        <input id="add_file" type="file" name="filename" accept=".db">
                    </div>
                    <div class="modal-footer">
                        <input onclick="addFile()" id="btn_add" type="submit" class="btn btn-primary" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addInSidenav(data) {
            eval ('var file = ' + data);
            var filename = file.filename;
            var file_tales = file.pathname;
            var sidenav = document.getElementById("sidenav");
            var string = "<button id='dropdown-btn' type='button' class='dropdown-btn' value=" + filename + ">" +
                filename + "<i class='fa fa-caret-down'></i>" + "</button>" +
                "<div class='dropdown-container'>" +
                file_tales
                + "</div>";
            sidenav.innerHTML += string;
            dropdownStyle();
        }
    </script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>