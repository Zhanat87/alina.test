jQuery.fn.live = function (types, data, fn) {
    jQuery(this.context).on(types,this.selector,data,fn);
    return this;
};
jQuery(document).ready(function () {
    initSelect2();
    checkboxSingle();
    checkboxMultiple();
    tbDatePicker();
    tbDateRangePicker();
    appAjaxStart();
    appAjaxStop();
    headerMenu();
    tooltipPopover();
    deleteFromGrid();
    tbDateTimePicker();
    tbDateTimePicker2();
    reloadPjax();
    modalBackdrop();
    appAjaxError();
    formHasErrors();
    allowClearP();
    statusSelect();
});
function appAjaxStart()
{
    $(document).ajaxStart(function() {
        var width = $(document).width();
        var height = $(document).height();
        $('.modal-loading-bg').css({'display':'block', 'opacity':0.2,
            'width':width + 'px', 'height':height + 'px'});
        $('.modal-loading').css({'display':'block', 'opacity':1});
    });
}
function appAjaxStop()
{
    $(document).ajaxStop(function() {
        $('.modal-loading-bg, .modal-loading').css({'display':'none'});
        initSelect2();
        checkboxSingle();
        checkboxMultiple();
        tbDatePicker();
        tbDateRangePicker();
        deleteFromGrid();
        tooltipPopover();
        tbDateTimePicker();
        modalBackdrop();
        rowCounter();
        formHasErrors();
        allowClearP();
        gridViewConst();
    });
}
function appAjaxError()
{
    // jquery pjax aborted catch
    $(document).ajaxError(function(event, xhr) {
        if (xhr.status === 0 && xhr.statusText === 'abort') {
//            console.log('abort');
            console.log(xhr);
            console.log(event);
        }
//        console.log('appAjaxError');
    });
}
function checkboxSingle()
{
    $('input[name="checkboxSingle[]"]').live('click', function() {
        var v = $(this).prop('checked');
        $('input[name="checkboxSingle[]"]').prop('checked', false);
        $(this).parents('.grid-view').find('tr').removeClass('checkboxSingleTr');
        $(this).prop('checked', v);
        if (v) {
            $(this).parent().parent().addClass('checkboxSingleTr');
        }
    });
}
function checkboxMultiple()
{
    $('input[name="checkboxMultiple[]"]').live('click', function() {
        var v = $(this).prop('checked');
        if (v) {
            $(this).parent().parent().addClass('checkboxSingleTr');
        } else {
            $(this).parent().parent().removeClass('checkboxSingleTr');
        }
    });
}
function tbDatePicker()
{
    var format = 'DD/MM/YYYY';
    var dateMask = '39/19/2999';
    
    $('.dateFilter input, .tbDatePicker').mask(dateMask).datetimepicker({
        language: 'ru',
        pickTime: false,
        useCurrent: false,
        format: format
    }).attr('placeholder', 'дд/мм/гггг');
}
function tbDateTimePicker()
{
    var format = 'DD/MM/YYYY (HH:mm)';
    var timeMask = '39/19/2999 (29:59)';
    
    $('.tbDateTimePicker').mask(timeMask).datetimepicker({
        language: 'ru',
        pickTime: true,
        useMinutes: true,
        minuteStepping: 1,
        pick12HourFormat: false,
        useCurrent: true,
        format: format
    }).attr('placeholder', 'дд/мм/гггг (чч:мм)');

    $('.tbDateTimePicker, .dateFilter input, .tbDatePicker').live('keydown', function() {
        return false;
    });
    $('.clearSpan').live('click', function() {
        $(this).prev().val('');
    });
}
function tbDateTimePicker2()
{
    $('.tbDateTimePicker, .tbDatePicker, .dateFilter input, .phones').wrap('<div class="tbDateTimePickerDiv"></div>').after(
        '<span class="clearSpan">&times;</span>');
}
function tbDateRangePicker()
{
    var format = 'DD/MM/YYYY';
    var dateMask = '39/19/2999 - 39/19/2999';

    $('.dateRangeFilter input').mask(dateMask).daterangepicker({
        language: 'ru',
        format: format,
        locale: {
            applyLabel: 'Ok',
            cancelLabel: 'Отмена',
            fromLabel: 'От',
            toLabel: 'До',
            weekLabel: 'W',
            customRangeLabel: 'Custom Range',
            daysOfWeek: moment()._lang._weekdaysMin.slice(),
            monthNames: moment()._lang._monthsShort.slice(),
            firstDay: 0
        },
        cancelClass: 'btn-danger'
    }).attr('placeholder', 'дд/мм/гггг-дд/мм/гггг');

    $('.range_inputs .applyBtn').live('click', function() {
        $('.dateRangeFilter input').change();
    });
}
function initSelect2()
{
    if ($('select.select2').length) {
        $('select.select2').select2(
            {
                allowClear: true
            }
        );
    }
}
function allowClearP()
{
    if ($('.allowClearP').length) {
        $('.allowClearP').find('div:eq(0)').addClass('select2-allowclear');
    }
}
function headerMenu()
{
    $('.headerMenu li.dropdown > ul > li.active').parent('ul').parent('li').addClass('active');
}
function tooltipPopover()
{
    $('.grid-view a').each(function() {
        $(this).attr('data-toggle', 'tooltip');
    });
    $("[data-toggle='tooltip']").tooltip();
    $("[data-toggle='popover']").popover();
}
function onlyDigits(input)
{
    $(input).val($(input).val().replace(/[^\d,]/g, ''));
}
// onkeyup="notMore(this)"
function notMore(input)
{
	onlyDigits(input);
	var val = parseInt($(input).val());
	var max = parseInt($(input).attr('max'));
	if (val > max) {
		$(input).val(max);
	}
}
function disabledForm(form, url)
{
    $('#' + form + ' input, #' + form + ' select').prop('disabled', true);
    $('#' + form + ' input, #' + form + ' select').attr('readonly', 'readonly');
    $('#' + form + ' select').select2('readonly', true);
    $('#' + form + ' .form-group:last').html('<a class="btn btn-info" href="' + url + '">Вернуться</a>');
    $('#' + form + ' span.input-group-btn').remove();
}
function reloadPjax()
{
    $(document).on('pjax:complete', function(xhr, textStatus) {
        $('#' + xhr.target.id + ' tr.filters td:eq(0)').html('<a href="#" class="reloadPjax" ' +
            'title="Показать все" data-toggle="tooltip">' +
            '<i class="fa fa-refresh"></i></a>');
        if ($('select.select2inBox').length) {
            /**
             * Uncaught query function not defined for Select2 s2id
             * http://stackoverflow.com/questions/14483348/
             * query-function-not-defined-for-select2-undefined-error
             */
            $('select.select2inBox').select2();
        }
        if ($('select.select2').length) {
            $('select.select2').select2();
        }
        tooltipPopover();
        tbDatePicker();
        tbDateRangePicker();
        tbDateTimePicker();
        tbDateTimePicker2();
        statusSelect();
    });
    $(document).on('pjax:start', function(xhr, textStatus) {

    });
    $('.reloadPjax').live('click', function() {
        //var id = $(this).parents('div[id$="-pjax"]').attr('id');
        //var id2 = $(this).parents('.grid-view').parents().find('div[id^="w"]').attr('id');
        var id3 = $(this).parents('.grid-view:eq(0)').parent().attr('id');
        $.pjax.reload('#' + id3,
            {
                "push":true,
                "replace":false,
                "timeout":5000,
                "scrollTo":false,
                url: window.location.pathname
            }
        );
        return false;
    });
}
function noKeyDown(element)
{
    $(element).live('keydown', function (event) {
        event.preventDefault();
    });
}
function modalBackdrop()
{
    $('.modal').on('hide.bs.modal', function (e) {
        $('.modal-backdrop').remove();
    });
}
function deleteFromGrid()
{
    $('.deleteFromGrid, .removeFromGrid').live('click', function() {
        $('.deleteM').modal().attr('url', $(this).attr('url'));
        $('.deleteM .modal-body p').text($(this).attr('confirm'));
        return false;
    });
    $('.deleteM .btn-primary').live('click', function() {
        $.ajax({
            type: 'POST',
            url: $('.deleteM').attr('url'),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function(response) {
                if (response.status == 'ok') {
                    reloadPjaxGridForDelete($('.deleteM').attr('grid'));
                } else {
                    console.log(response.msg);
                }
            }
        });
        $('.deleteM').modal('hide');
    });
    $('.restoreFromGrid').live('click', function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('url'),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function(response) {
                if (response.status == 'ok') {
                    reloadPjaxGridForDelete($('.deleteM').attr('grid'));
                } else {
                    console.log(response.msg);
                }
            }
        });
    });
}
function reloadPjaxGrid(grid)
{
    if ($('#' + grid + ' tr.filters input:eq(0)').length) {
        $('#' + grid + ' tr.filters input:eq(0)').trigger('change');
    } else if ($('#' + grid + ' tr.filters select:eq(0)').length) {
        $('#' + grid + ' tr.filters select:eq(0)').trigger('change');
    } else {
        $.pjax.reload('#' + grid,
            {
                push:true,
                replace:false,
                timeout:5000,
                scrollTo:false,
                url: window.location.pathname
            }
        );
    }
}
function reloadPjaxGridForDelete(grid)
{
    $.pjax.reload('#' + grid,
        {
            push:true,
            replace:false,
            timeout:5000,
            scrollTo:false,
            url: window.location.pathname
        }
    );
}
function rowCounter()
{
    var $rowCounter = $('.rowCounter:visible');
    if ($rowCounter.length) {
        $rowCounter.find('select').select2('val', $rowCounter.attr('page-size'));
        $('ul.pagination').addClass('pull-right');
    }
}
function formHasErrors()
{
    if ($('form .has-error').length) {
        $('.cancelBtnM').addClass('change');
    }
}
function statusSelect()
{
    if ($('select.statusSelect').length) {
        $('select.statusSelect').select2('val', 1);
    }
}
function trim(str, charlist)
{
    var whitespace, l = 0,
        i = 0;
    str += '';
    if (!charlist) {
        whitespace =
            ' \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007' +
                '\u2008\u2009\u200a\u200b\u2028\u2029\u3000';
    } else {
        // preg_quote custom list
        charlist += '';
        whitespace = charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '$1');
    }
    l = str.length;
    for (i = 0; i < l; i++) {
        if (whitespace.indexOf(str.charAt(i)) === -1) {
            str = str.substring(i);
            break;
        }
    }
    l = str.length;
    for (i = l - 1; i >= 0; i--) {
        if (whitespace.indexOf(str.charAt(i)) === -1) {
            str = str.substring(0, i + 1);
            break;
        }
    }
    return whitespace.indexOf(str.charAt(0)) === -1 ? str : '';
}
function explode(delimiter, string, limit)
{
    if (arguments.length < 2 || typeof delimiter === 'undefined' || typeof string === 'undefined') return null;
    if (delimiter === '' || delimiter === false || delimiter === null) return false;
    if (typeof delimiter === 'function' || typeof delimiter === 'object' || typeof string === 'function' || typeof string ===
        'object') {
        return {
            0: ''
        };
    }
    if (delimiter === true) delimiter = '1';
    delimiter += '';
    string += '';
    var s = string.split(delimiter);
    if (typeof limit === 'undefined') return s;
    if (limit === 0) limit = 1;
    if (limit > 0) {
        if (limit >= s.length) return s;
        return s.slice(0, limit - 1)
            .concat([s.slice(limit - 1)
                .join(delimiter)
            ]);
    }
    if (-limit >= s.length) return [];
    s.splice(s.length + limit);
    return s;
}
function strpos(haystack, needle, offset)
{
    var i = (haystack + '')
        .indexOf(needle, (offset || 0));
    return i === -1 ? false : i;
}
