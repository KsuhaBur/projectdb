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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://yandex.st/jquery/1.5.0/jquery.min.js" type="text/javascript"></script>
    <title>Title</title>
</head>

<body>
    <aside class="Aside">
        <header class="Aside__header">
            <button class="Button" type="submit">
                Open file
            </button>
            <button class="Button" type="submit">
                Save file
            </button>
        </header>
        <div class="sidenav">
            <?php foreach ($database_array as $database) {
                echo "<button type='button' class=\"dropdown-btn\" value=$database >";
                echo $database;
                echo "<i class=\"fa fa-caret-down\"></i>";
                echo "</button>";
                echo "<div class=\"dropdown-container\">";
                get_table($database);
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
            <div class="codeZone__block">
                <button class="Button" type="button" id="btn_run" onclick="click_btn()">
                    Run
                </button>
                <div class="Select__database" id="database_selected">

                </div>
            </div>
            <textarea id="input_code" name="input_code" class="inputCode" ></textarea>
        </form>
        <section class="tableZone" id="table_zone">
            <table id="table">
            </table>
        </section>
    </main>

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
        // dropdown[0].classList.add("active");
        // dropdown[0].nextElementSibling.style.display = "block";

        for (i = 0; i < dropdown.length; i++) {
            dropdown.valueOf()
            dropdown[i].addEventListener("click", function() {
                for (var j = 0; j < dropdown.length; j++) {
                    dropdown[j].classList.remove("active");
                    dropdown[j].nextElementSibling.style.display = "none";
                }
                this.classList.add("active");
                this.nextElementSibling.style.display = "block";

                var filename = this.value;
                $("#database_selected").text(filename);
            });


        }
    </script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>