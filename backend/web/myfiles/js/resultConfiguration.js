$(document).ready(function() {
    switchParser();
});
function switchParser()
{
    $('.switchParser').live('click', function() {
        var action = $(this).hasClass('btn-success') ? 'start' : 'stop';
        $.ajax({
            type: 'POST',
            url: $('.parserDiv').attr('url'),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            data: JSON.stringify({'action' : action}),
            success: function(response) {
                if (response.status == 'ok') {
                    if (action == 'start') {
                        $('.parserWork, .parserStartAlertSuccess').removeClass('hide');
                        $('.parserNotWork').addClass('hide');
                        setTimeout(function() {
                            $('.parserStartAlertSuccess').addClass('hide');
                        }, 3000);
                    } else {
                        $('.parserNotWork, .parserStopAlertSuccess').removeClass('hide');
                        $('.parserWork').addClass('hide');
                        setTimeout(function() {
                            $('.parserStopAlertSuccess').addClass('hide');
                        }, 3000);
                    }
                } else {
                    if (action == 'start') {
                        $('.parserStartAlertError').addClass('hide');
                        setTimeout(function() {
                            $('.parserStartAlertError').addClass('hide');
                        }, 3000);
                    } else {
                        $('.parserStopAlertError').addClass('hide');
                        setTimeout(function() {
                            $('.parserStopAlertError').addClass('hide');
                        }, 3000);
                    }
                }
            }
        });
    });
}