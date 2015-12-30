$(document).ready(function() {
    mdClose();
    mdCreate();
    mdUpdate();
    mdFormSend();
});
function mdClose()
{
    $('.mdClose').live('click', function() {
        $(this).parents().find('.md-modal .md-close').click();
    });
}
function mdCreate()
{
    $('.mdCreateB').live('click', function() {
        $('#actionModal h4.modal-title').text($(this).attr('title'));
        mdGetFormByUrl($(this).attr('url'));
    });
}
function mdUpdate()
{
    $('.mdUpdateB').live('click', function() {
        $('#actionModal h4.modal-title').text($(this).attr('modalTitle'));
        mdGetFormByUrl($(this).attr('url'));
        return false;
    });
}
function mdGetFormByUrl(url)
{
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'html',
        success: function(data) {
            $('.mdCreateDiv').html(data);
        }
    });
}
function mdFormSend()
{
    $('.mdFormSendB').live('click', function() {
        var $this = $(this);
        var form = $('.mdCreateDiv form');
        if (form.find('.has-error').length) {
            return false;
        }
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: new FormData(document.getElementById(form.attr('id'))), // form.serialize()
            contentType: false,
            cache: false,
            processData:false,
            success: function(response) {
                if (response.status == 'ok') {
                    $this.next().click();
                    reloadPjaxGrid('w0');
                } else {
                    for (var i in response) {
                        if (form.find('input[id="' + i + '"]').length) {
                            var formElement = form.find('input[id="' + i + '"]');
                        } else if (form.find('select[id="' + i + '"]').length) {
                            var formElement = form.find('select[id="' + i + '"]');
                        } else if (form.find('textarea[id="' + i + '"]').length) {
                            var formElement = form.find('textarea[id="' + i + '"]');
                        }
                        formElement.parent().addClass('has-error').find('.help-block').text(response[i]);
                    }
                }
            }
        });
        return false;
    });
}