$('#date-time-picker').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss'
});


$(document).ready(function () {
    $('.status-update-button').click(function () {
        var type = $(this).data('type');
        var id = $(this).data('id');

        var url = server._admin_url;
        var token = server._token;

        var requestObject = {
            type: type,
            id: id,
            _token: token
        };

        $.post(url + '/news/update/status', requestObject).then(function (response) {
            console.log(response);
        });

    });
});