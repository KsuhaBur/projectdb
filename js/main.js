function click_btn() {
    var query = $("#input_code").val();

    $.ajax({
        url: 'input.php',
        type: 'POST',
        cache: false,
        data: { 'query': query },
        dataType: 'html',
        success: function (data) {
            $("#table").remove();
            $("#table_zone").append(data);
        }
    });
}