function cancelBtn()
{
    $('.cancelBtn').live('click', function() {
        if ($('.cancelBtnM').hasClass('change')) {
            $('.cancelBtnM').modal();
        } else {
            cancelRedirect();
        }
    });
    $('a').live('click', function() {
        if ($('.cancelBtnM').hasClass('change')) {
            var href = $(this).attr('href');
            if (href && href.substr(0, 1) == '/' &&
                !$(this).attr('data-page') &&
                !$(this).attr('data-sort') &&
                !$(this).hasClass('logoutA')) {
                $('.cancelBtnM').modal().attr('url', href);
                return false;
            }
        }
    });
    $('.cancelBtnM .btn-primary').live('click', function() {
        cancelRedirect();
    });
    $('.cancelBtnM .btn-danger').live('click', function() {
        $('.cancelBtnM').removeAttr('url');
    });
}
function formChange()
{
    $('form input, form select').live('change', function() {
        $('.cancelBtnM').addClass('change');
    });
}
function cancelRedirect()
{
    window.location.href = $('.cancelBtnM').attr('url') ?
        $('.cancelBtnM').attr('url') : $('.cancelBtn').attr('url');
}
jQuery(document).ready(function () {
    cancelBtn();
    formChange();
});