$(document).ready(function() {
    sendResultMailModalOpen();
    sendResultMailModalClose();
    sendResultMailModalSave();
});
function sendResultMailModalOpen()
{
    $('.sendResultMailModalOpen').live('click', function() {
        $('#sendResultMailModalResultId').val($(this).attr('id'));
        $('#sendResultMailModal .alertDiv').addClass('hide');
        $('#sendResultMailModal .formDiv').removeClass('hide');
        return false;
    });
}
function sendResultMailModalClose()
{
    $('.sendResultMailModalClose').live('click', function() {
        $('#sendResultMailModal .md-close').click();
        return false;
    });
}
function sendResultMailModalSave()
{
    $('.sendResultMailModalSave').live('click', function() {
        var email = trim($('#sendResultMailModalEmail').val());
        if (email.length == 0) {
            $('#sendResultMailModalEmail').addClass('errorInput');
            $('#sendResultMailModal .invalidEmail').addClass('hide');
            $('#sendResultMailModal .emptyEmail').removeClass('hide');
            return false;
        } else if (!validateEmail(email)) {
            $('#sendResultMailModalEmail').addClass('errorInput');
            $('#sendResultMailModal .emptyEmail').addClass('hide');
            $('#sendResultMailModal .invalidEmail').removeClass('hide');
            return false;
        }
        $('#sendResultMailModalEmail').removeClass('errorInput');
        $('#sendResultMailModal .emptyEmail, #sendResultMailModal .invalidEmail').addClass('hide');
        var data = {
            'email' : email,
            'text' : $('#sendResultMailModalText').text(),
            'subject' : $('#sendResultMailModalSubject').val(),
            'userId' : $('#sendResultMailModalUserId').val(),
            'resultId' : $('#sendResultMailModalResultId').val()
        };
        $.ajax({
            type: 'POST',
            url: $('#sendResultMailModalForm').attr('action'),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            data: JSON.stringify(data),
            success: function(response) {
                if (response.status == 'ok') {
                    $('#sendResultMailModal .formDiv').addClass('hide');
                    $('#sendResultMailModal .alertDiv').removeClass('hide');
                    setTimeout(function() {
                        $('#sendResultMailModal .md-close').click();
                    }, 3000);
                } else {
                    console.log(response.msg);
                }
            }
        });
    });
}
function validateEmail(email)
{
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(email)) {
        return true;
    } else {
        return false;
    }
}