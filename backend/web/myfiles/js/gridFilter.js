$(document).ready(function() {
    gridFilterOpen();
    gridFilterSave();
    applyGridFilter();
    deleteGridFilter();
});
function gridFilterOpen()
{
    $('.gridFilterOpen').live('click', function() {
        $(this).popover();
    });
    $('.gridFilterOpen').on('shown.bs.popover', function () {
        $(this).next('div.popover').css({'top' : '-50px'}).
            find('div.popover-content').html($('.gridFilterContent').html()).
            find('.gridFilterValue').val(window.location.href);
    });
}
function gridFilterSave()
{
    $('div.popover-content .gridFilterSave').live('click', function() {
        var $gridFilterPopover = $('.gridFilterOpen').next('div.popover');
        var $gridFilterName = $gridFilterPopover.find('.gridFilterName');
        if (!trim($gridFilterName.val())) {
            $gridFilterName.addClass('errorInput');
        } else {
            $gridFilterName.removeClass('errorInput');
            var dataJson = {
                _csrf : $gridFilterPopover.find('input[name="_csrf"]').val(),
                value : $gridFilterPopover.find('.gridFilterValue').val(),
                entity : $gridFilterPopover.find('.gridFilterEntity').val(),
                name : $gridFilterPopover.find('.gridFilterName').val(),
                action : 'add'
            };
            $.ajax({
                type: 'POST',
                url: $gridFilterPopover.find('form').attr('action'),
                contentType: 'application/json; charset=utf-8',
                dataType: 'json',
                data: JSON.stringify(dataJson),
                success: function(response) {
                    if (response.status == 'ok') {
                        $('.gridFiltersDiv').append('<div class="filterDiv"><button class="btn btn-default applyGridFilter" ' +
                            'data-toggle="tooltip" title="Применить фильтр" filter="' + response.value + '">' +
                            response.name + '</button><a href="#" class="deleteGridFilter" data-toggle="tooltip" ' +
                            'title="Удалить фильтр" value="' + response.value + '" name="' + response.name + '" ' +
                            'entity="' + $('.gridFilterDiv').attr('entity') + '">' +
                            '<span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i>' +
                            '<i class="fa fa-times fa-stack-1x fa-inverse"></i></span></a></div>');
                        $('.gridFilterOpen').popover('hide');
                    } else {
                        $gridFilterName.addClass('errorInput').after('<p class="error">' + response.error + '</p>');
                    }
                }
            });
        }
        return false;
    });
}
function applyGridFilter()
{
    $('.applyGridFilter').live('click', function() {
        $.pjax.reload('#' + $('.gridFilterDiv').attr('grid'),
            {
                push: true,
                replace: false,
                timeout: 5000,
                scrollTo: false,
                url: $(this).attr('filter')
            }
        );
    });
}
function deleteGridFilter()
{
    $('.deleteGridFilter').live('click', function() {
        var $this = $(this);
        var dataJson = {
            _csrf : $('.gridFilterForm input[name="_csrf"]').val(),
            value : $this.attr('value'),
            entity : $this.attr('entity'),
            name : $this.attr('name'),
            action : 'delete'
        };
        $.ajax({
            type: 'POST',
            url: $('.gridFiltersDiv').attr('url'),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            data: JSON.stringify(dataJson),
            success: function(response) {
                if (response.status == 'ok') {
                    $this.parent().remove();
                } else {
                    console.log(response.msg);
                }
                $('.gridFilterOpen').popover('hide');
            }
        });
        return false;
    });
}