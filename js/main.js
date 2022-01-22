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

