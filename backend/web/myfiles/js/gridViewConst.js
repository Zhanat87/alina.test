$(document).ready(function() {
    gridViewConst();
    calculateTableWidth($('.grid-view > table'));
    $(document).on('pjax:success', function(xhr, textStatus) {
        $('.grid-view > table').each(function() {
            calculateTableWidth($(this));
        });
    });
});
function gridViewConst()
{
    $('div.grid-view th a[data-sort]').each(function() {
        if (!$(this).find('span').length) {
            $(this).wrapInner('<span></span>');
        }
    });
}
function parseStyleAttr(obj, paramName)
{
    var res = 0;
    if (obj.attr('style')) {
        var styleParams = obj.attr('style').split(':');
        for (var i = 0; i < styleParams.length; i++) {
            if(styleParams[0] == paramName){
                res = styleParams[1];
                break;
            }
        }
    }
    return res;
}
function calculateTableWidth(obj)
{
    var tblWidth = 0;
    obj.find('colgroup > col').each(function() {
        tblWidth += parseInt(parseStyleAttr($(this), 'width'));
    });
    if (tblWidth > obj.width()) {
        obj.attr('style', 'width: ' + tblWidth + 'px');
    }
}