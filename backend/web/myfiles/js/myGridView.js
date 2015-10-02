$(document).ready(function() {
    setRowCount();
    setPaginationStyles();
});
function setRowCount()
{
    $('.rowCounter select').live('change', function() {
        var grid = $('#' + $('.rowCounter:visible').attr('grid')).parent().attr('id');
        var url = setGetParameter('pageSize', $(this).select2('val'));
        $.pjax.reload('#' + grid,
            {
                push: true,
                replace: false,
                timeout: 5000,
                scrollTo: false,
                url: url
            }
        );
    });
}
function setGetParameter(paramName, paramValue)
{
    var url = window.location.href;
    if (url.indexOf(paramName + "=") >= 0) {
        var prefix = url.substring(0, url.indexOf(paramName));
        var suffix = url.substring(url.indexOf(paramName));
        suffix = suffix.substring(suffix.indexOf("=") + 1);
        suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
        url = prefix + paramName + "=" + paramValue + suffix;
    } else {
        if (url.indexOf("?") < 0)
            url += "?" + paramName + "=" + paramValue;
        else
            url += "&" + paramName + "=" + paramValue;
    }
    return url;
}
function setPaginationStyles()
{
    $('ul.pagination').addClass('pull-right');
}