$(document).ready(function() {
    contractor();
    sendInWork();
});
function contractor()
{
    $('.contractorType').live('change', function() {
        if ($(this).val() == 1) {
            $('.contractorOrganization').removeClass('hide');
            $('.contractorDepartment, .contractorPersonal').addClass('hide');
        } else if ($(this).val() == 2) {
            $('.contractorDepartment').removeClass('hide');
            $('.contractorOrganization, .contractorPersonal').addClass('hide');
        } else if ($(this).val() == 3) {
            $('.contractorPersonal').removeClass('hide');
            $('.contractorOrganization, .contractorDepartment').addClass('hide');
        }
    });
}
function sendInWork()
{
    $('.sendInWorkType').live('change', function() {
        if ($(this).val() == 1) {
            $('.sendInWorkSubdivision').removeClass('hide');
            $('.sendInWorkUser').addClass('hide');
        } else if ($(this).val() == 2) {
            $('.sendInWorkUser').removeClass('hide');
            $('.sendInWorkSubdivision').addClass('hide');
        }
    });
}