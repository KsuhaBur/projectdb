<?php
include 'function.php';
include 'database_array.php';
array_map('unlink', glob('temp/*'));
copy('db/sqlite.db', 'temp/sqlite.db');
copy('db/films.db', 'temp/films.db');
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
    <title>Online IDE</title>
</head>

<body>
    <aside class="Aside">
        <header class="Aside__header">
            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Open file
            </button>
            <form action="save_file.php" method="get">
                <input onclick="downloadFile()" name="save" id="save" type="submit" class="btn btn-primary" value="Save file">
            </form>
        </header>
        <div id="sidenav" class="sidenav">
            <?php
//            echo draw_sidenav($database_array);
            foreach ($database_array as $database) {
                echo "<button id='dropdown-btn' type='button' class=\"dropdown-btn\" value=$database >";
                echo $database;
                echo "<i class=\"fa fa-caret-down\"></i>";
                echo "</button>";
                echo "<div id='".$database."' class=\"dropdown-container\">";
                echo get_table('temp/'.$database);
                echo "</div>";
            }
            ?>
        </div>
    </aside>
    <aside class="History">
        <div class="History__header">
            <div class="History__title">История запросов</div>
        </div>
        <ul class="History__list" id="history_list">

        </ul>
    </aside>
    <main class="Main">
        <form id="formx" class="codeZone" method="post">
            <div class="codeZone__header">
                <button class="btn btn-primary" type="button" id="btn_run" onclick="click_btn()">
                    Run
                </button>
                <div class="Select__database" id="database_selected"></div>
            </div>
            <textarea id="input_code" name="input_code" class="inputCode" placeholder="Введите sql-запрос"></textarea>
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

    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>