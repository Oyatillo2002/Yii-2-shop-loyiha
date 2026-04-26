$('#create-button').on('click', function (event) {
    event.preventDefault();
    var url = $(this).attr('href');
    $('#myModal').modal('show'); 
    send(url)
});

function send(_url, formData = null) {
    $.ajax({
        url: _url,
        type: "POST",
        dataType: "json",
        data: formData,
        success: function (data) {
            if (data.status == false) {
                $('#myModal').modal('show').find('#modalContent').html(data.content);
                $('#save-button').on('click', function (e) {
                    e.preventDefault();
                    var form = $('#prl-form').serialize();
                    send(_url, form)
                    return false;
                });
                return false;
            } else {
                $.pjax.reload({ container: "#prl-pjax" })
                $('#myModal').modal('hide');
            }
        }
    });
}
$('body').on('click', '.update-button', function (event) {
    event.preventDefault();
    var id = $(this).data('id');
    var url = '/post/update?id=' + id;  // href o'rniga data-id dan foydalanamiz
    $('#myModal').modal('show'); 
    send(url, null, 'GET');  // GET so'rovi yuboramiz
});