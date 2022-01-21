function click_btn() {
    var query = $("#input_code").val();
    var database = document.getElementById('database_selected').innerHTML;

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