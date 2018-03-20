import alertify from 'alertifyjs';


$('#date-time-picker').datetimepicker({
    format: 'YYYY-MM-DD HH:mm:ss'
});


$(document).ready(function () {
    $('.status-update-button').click(function () {
        var type = $(this).data('type');
        var id = $(this).data('id');
        var $this = $(this);

        var url = server._admin_url;
        var token = server._token;
        var requestObject = {
            type: type,
            id: id,
            _token: token
        };

        $.post(url + '/news/update/status', requestObject).then(function (response) {
            if (response.status === true) {
                switch (type) {
                    case 'enable':
                        $this.hide();
                        $this.closest('td.status-action-bar').find('button.disable-status').show();
                        break;
                    case 'disable':
                        $this.hide();
                        $this.closest('td.status-action-bar').find('button.enable-status').show();
                        break;
                }

                alertify.success(response.message);
            }
        });

    });
});