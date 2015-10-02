$(document).ready(function() {
    onOffSwitch();
});
function onOffSwitch()
{
    $('.onoffswitch-label').live('click', function() {
        var v = $(this).prev('input').val() == 1 ? 0 : 1;
        $(this).prev('input').val(v);
        $('input[type=hidden][name$="[status]"]').val(v);
    });
}