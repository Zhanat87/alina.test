$(document).ready(function() {
    newComment();
});
function newComment()
{
    $('.newCommentB').bind('click', function() {
        var $form = $('#comment-form');
        $('#comment-form div').removeClass('has-error');
        $('#comment-form .help-block').html('');
        $('.reCaptchaErrorDiv').addClass('hide');
        $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            contentType: 'application/json; charset=utf-8',
            data: $form.serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.status == 'ok') {
                    var html = '<p>' + response.email+ '</p><p>' +
                        response.text+ '</p>';
                    $('.comments').append(html);
                    if ($('.g-recaptcha').length) {
                        grecaptcha.reset();
                    }
                } else {
                    if (response.modelErrors) {
                        for (var i in response.modelErrors) {
                            var $element = $('#' + i);
                            $element.parent().addClass('has-error');
                            for (var k in response.modelErrors[i]) {
                                $element.next().append(response.modelErrors[i][k]);
                            }
                        }
                    }
                    if (response.reCaptchaError) {
                        $('.reCaptchaErrorDiv').removeClass('hide');
                    }
                }
            }
        });
        return false;
    });
}