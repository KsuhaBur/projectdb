function click_btn() {
    var query = $("#input_code").val();
    document.getElementById('database_selected').innerHTML;
    var database = $("#database_selected").text();

    $.ajax({
        url: 'input.php',
        type: 'POST',
        cache: false,
        data: { 'query': query, 'database': database },
        dataType: 'html',
        success: function (data) {
            $("#table").remove();
            $("#table_zone").append(data);
        }
    });
}

// перенести в другой файл
function dropdownStyle() {
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

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
}

dropdownStyle();


//
function addFile() {
    $("#btn_close").trigger("click");
}

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

function downloadFile() {
    var filename = $("#database_selected").text();
    $("#save").val(filename);

    $.ajax({
        url: 'save_file.php',
        type: "GET",
        data: {'file': filename},
        success: function (data) {
            $("#save").val("Save file");
        }
    });
}
