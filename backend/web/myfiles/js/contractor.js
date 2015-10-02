$(document).ready(function() {
    actionsA();
    menuAndBreadCrumbs();
    stepsA();
});
function actionsA()
{
    $('.contractorDiv .btn-prev').live('click', function() {
        $('.contractorDiv .prevA').click();
    });
    $('.contractorDiv .btn-next').live('click', function() {
        $('.contractorDiv .nextA').click();
    });
}
function menuAndBreadCrumbs()
{
    $(document).on('pjax:start', function(xhr, textStatus) {
        var url = window.location.pathname;
        $('.headerMenu li').removeClass('active');
        $('.headerMenu li a').each(function() {
            if ($(this).attr('href') == url) {
                $(this).parent('li').addClass('active');
            }
        });
        $('#sidebar-nav li').removeClass('active');
        $('#sidebar-nav li a').each(function() {
            if ($(this).attr('href') == url) {
                $(this).parent('li').addClass('active');
            }
        });
        if (strpos(url, '/personal/') === 0) {
            $('ol.breadcrumb li span:last').text('персонал');
        } else if (strpos(url, '/department/') === 0) {
            $('ol.breadcrumb li span:last').text('отделения');
        } else if (strpos(url, '/organization/') === 0) {
            $('ol.breadcrumb li span:last').text('организации');
        }
    });
}
function stepsA()
{
    $('.steps li').live('click', function() {
        $('.stepsA:eq(' + $(this).index() + ')').click();
    });
}