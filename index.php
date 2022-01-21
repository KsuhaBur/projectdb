<?php
include 'function.php';
include 'database_array.php';
include "list-history.php";

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
                echo "<button type='submit' class=\"dropdown-btn\" value=$database onclick='get_file()'>";
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
                <?php
                    foreach ($array_history as $item) {
                        echo "<li>";
                        print $item;
                        echo "</li>";
                    }
                ?>
            </ul>

        </div>
    </aside>
    <main class="Main">
        <form id="formx" class="codeZone" method="post">
            <div class="codeZone__block">
                <button class="Button" type="submit">
                    Run
                </button>
            </div>
            <textarea id="input_code" name="input_code" class="inputCode" ><?php print $_POST['input_code']; ?></textarea>
        </form>
        <section class="tableZone">
            <table>
                <?php
                    if ($_POST['input_code']) {
                        query_db($_POST['input_code'], $file);
                    }
                ?>
            </table>
        </section>
    </main>

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
        // dropdown[0].classList.add("active");
        // var dropdownContent = dropdown[0].nextElementSibling;
        //     dropdownContent.style.display = "block";

        for (i = 0; i < dropdown.length; i++) {
            dropdown.valueOf()
            dropdown[i].addEventListener("click", function() {
                for (var j = 0; j < dropdown.length; j++) {
                    dropdown[j].classList.remove("active");
                    var dropdownContent = dropdown[j].nextElementSibling;
                    dropdownContent.style.display = "none";
                }
                this.classList.add("active");
                var dropdownContent = this.nextElementSibling;
                dropdownContent.style.display = "block";
            });
        }

        function get_file() {
            var value = this.value;
            $.get('http://projectdb/index.php', {value:value}, function (data) {
                // alert(data);
            });
        }
    </script>

</body>
</html>