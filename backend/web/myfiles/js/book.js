$(document).ready(function() {
    lightBoxImage();
    removeImage();
});
function lightBoxImage()
{
    $('.lightBoxImage').each(function() {
        $(this).attr('data-lightbox', 'image' + $(this).parent().parent().attr('data-key'));
    });
}
function removeImage()
{
    $('.removeImage').live('click', function() {
        var $this = $(this);
        $.ajax({
            url: $this.attr('url'),
            type: 'PUT',
            data: {id: $this.attr('id'), _csrf : $('meta[name="csrf-token"]').attr('content')},
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function(response) {
                if (response.status == 'ok') {
                    $this.parent().remove();
                    reloadPjaxGrid('w0');
                } else {
                    console.error(response.msg);
                }
            }
        });
        return false;
    });
}