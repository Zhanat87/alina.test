$(document).ready(function() {
    sendInWork();
    sendInWorkType();
    sendInWorkSave();
});
function sendInWork()
{
    $('.sendInWorkB').live('click', function() {
        $('#sendInWorkModal h4.modal-title').text($(this).attr('modalTitle'));
        $('#orderId').val($(this).attr('id'));
    });
}
function sendInWorkType()
{
    $('#send_in_work_type').live('change', function() {
        switch ($(this).val()) {
            case '' :
                $('.usersDiv, .subdivisionsDiv').addClass('hide');
                break;
            case '1' :
                $('.usersDiv').addClass('hide');
                $('.subdivisionsDiv').removeClass('hide');
                break;
            case '2' :
                $('.subdivisionsDiv').addClass('hide');
                $('.usersDiv').removeClass('hide');
                break;
        }
        console.log($(this).val());
    });
}
function sendInWorkSave()
{
    $('.sendInWorkSaveB').live('click', function() {
        var $this = $(this);
        var form = $('#sendInWorkForm');
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function(response) {
                if (response.status == 'ok') {
                    reloadPjaxGrid('w0');
                } else {
                    console.log(response.msg);
                }
                $this.next().click();
            }
        });
        return false;
    });
}