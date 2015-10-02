$(document).ready(function() {
    userPassword();
    userApplication();
});
function userPassword()
{
    // password strength meter
    $('#user-password').pwstrength({
        label: '.pwdstrength-label'
    });
}
function userApplication()
{
    $('select#user-application').live('change', function() {
        if ($(this).select2('val') == 1) {
            $('.subdivisionDiv').removeClass('hide');
            $('.resultDepartmentDiv, .resultAccessDiv').addClass('hide');
        } else {
            $('.subdivisionDiv').addClass('hide');
            $('.resultDepartmentDiv, .resultAccessDiv').removeClass('hide');
        }
    });
}