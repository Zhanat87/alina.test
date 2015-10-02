$(document).ready(function() {
    testModalOpen();
    testModalClose();
    testModalSave();
    deleteTestOrder();
    testedTest();
});
function testModalOpen()
{
    $('.testModalOpen').live('click', function() {
        if (!$('#testModal').attr('url')) {
            getTestGrid($(this).attr('url'));
        }
        $('#testModal').attr('url', $('.requestUrl').text());
        checkedTests();
        window.history.pushState('string', 'Title', $(this).attr('url'));
        return false;
    });
}
function checkedTests()
{
    if (!$('#testModalGrid table input[type="checkbox"]').is(':checked')) {
        var tests = $('#testOrderInput').val();
        $('#testModalGrid table input[type="checkbox"]').prop('checked', false);
        if (tests) {
            tests = explode(',', tests);
            for (var i in tests) {
                $('#testModalGrid table tr[data-key=' + tests[i] + '] input[type="checkbox"]').prop('checked', true);
            }
        }
    }
}
function testModalClose()
{
    $('.testModalClose').live('click', function() {
        $('#testModal .md-close').click();
        return false;
    });
}
function getTestGrid(url)
{
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'html',
        success: function(data) {
            $('#testModal .modal-body').html(data);
            checkedTests();
        }
    });
}
function testModalSave()
{
    $('.testModalSave').live('click', function() {
        var keys = $('#testModalGrid').yiiGridView('getSelectedRows');
        if (keys.length) {
            var tbody = '';
            for (var i in keys) {
                var $tr = $('#testModalGrid tr[data-key=' + keys[i] + ']');
                tbody += '<tr><td><a href="#" class="table-link danger deleteTestOrder" data-toggle="tooltip" ' +
                'title="Удалить" id="' + keys[i] + '"><span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i>' +
                '<i class="fa fa-times fa-stack-1x fa-inverse"></i></span></a></td>' +
                '<td>' + $tr.find('td:eq(2)').text() + '</td><td>' + $tr.find('td:eq(3)').text() + '</td>' +
                '<td>' + $tr.find('td:eq(4)').text() + '</td><td>' + $tr.find('td:eq(5)').text() + '</td></tr>';
            }
            $('.testOrderDiv').removeClass('hide').find('tbody').html(tbody);
            $('#testOrderInput').val(keys.join());
        } else {
            $('.testOrderDiv').addClass('hide');
            $('#testOrderInput').val('');
        }
        $('#testModal .md-close').click();
        return false;
    });
}
function deleteTestOrder(test, order, url, specialForm)
{
    $.ajax({
        type: 'POST',
        url: url,
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        data: JSON.stringify({'testId' : test, 'orderId' : order, 'specialForm' : specialForm}),
        success: function(response) {
            if (response.status == 'ok') {
                var $testOrderInput = $('#testOrderInput');
                var tests = explode(',', $testOrderInput.val());
                var newTests = [];
                for (var i in tests) {
                    if (tests[i] != test) {
                        newTests.push(tests[i]);
                    }
                }
                $testOrderInput.val(newTests.join());
                $('a.deleteTestOrder[test=' + test + '][order=' + order + ']').parent().parent().remove();
                if ($('.testOrderDiv tbody tr').size() == 0) {
                    $('.testOrderDiv').addClass('hide');
                }
                $('#confirmModal .md-close').click();
            } else {
                console.log(response.msg);
            }
        }
    });
}
function invalidateTestOrder(test, order, url)
{
    $.ajax({
        type: 'POST',
        url: url,
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        data: JSON.stringify({'testId' : test, 'orderId' : order}),
        success: function(response) {
            if (response.status == 'ok') {
                var $a = $('a.testedA[test=' + test + '][order=' + order + '][action=invalidate]');
                if ($a.attr('view') == 'index') {
                    $a.next().removeClass('hide');
                    $a.remove();
                } else {
                    $a.addClass('hide'); // self
                    $a.next().addClass('hide'); // downloadPdfA
                    $a.next().next().addClass('hide'); // showPdfA
                    $a.next().next().next().removeClass('hide'); // specialFormOpen
                    $a.next().next().next().next().removeClass('hide'); // deleteTestOrder
                    $a.next().next().next().next().next().removeClass('hide'); // validate
                }
                $a.parent().parent().removeClass('success');
                $('#confirmModal .md-close').click();
            } else {
                console.log(response.msg);
            }
        }
    });
}
function validateTestOrder(test, order, url, admin, specialForm)
{
    $.ajax({
        type: 'POST',
        url: url,
        contentType: 'application/json; charset=utf-8',
        dataType: 'json',
        data: JSON.stringify({'testId' : test, 'orderId' : order, 'specialForm' : specialForm}),
        success: function(response) {
            if (response.status == 'ok') {
                var $a = $('a.testedA[test=' + test + '][order=' + order + '][action=validate]');
                $a.addClass('hide'); // self
                $a.prev().addClass('hide'); // deleteTestOrder
                $a.prev().prev().addClass('hide'); // specialFormOpen
                $a.prev().prev().prev().removeClass('hide'); // showPdfA
                $a.prev().prev().prev().prev().removeClass('hide').attr('href', response.pathToPdf); // downloadPdfA
                if (admin) {
                    $a.prev().prev().prev().prev().prev().removeClass('hide'); // invalidate
                }
                $a.parent().parent().addClass('success');
                $('#confirmModal .md-close').click();
            } else {
                console.log(response.msg);
            }
        }
    });
}
function testedTest()
{
    $('.confirmModalClose').live('click', function() {
        $('#confirmModal .md-close').click();
        return false;
    });
    $('.testedA').live('click', function() {
        $('#confirmModal').attr('test', $(this).attr('test')).attr('order', $(this).attr('order')).attr('action',
            $(this).attr('action')).attr('admin', $(this).attr('admin')).attr('action-url',
            $(this).attr('url')).attr('special-form', $(this).attr('special-form'));
        $('#confirmModal .modal-body p').text($(this).attr('confirm'));
        return false;
    });
    $('.confirmModalSave').live('click', function() {
        var $confirmModal = $('#confirmModal');
        var action = $confirmModal.attr('action');
        var test = $confirmModal.attr('test');
        var order = $confirmModal.attr('order');
        var url = $confirmModal.attr('action-url');
        // если кнопка удалить, то просто удалить строку
        if (action == 'delete') {
            deleteTestOrder(test, order, url, $confirmModal.attr('special-form'));
        // если сделать не валидным, то ajax-запрос на изменение валидации теста и показать кнопку удалить
        } else if (action == 'invalidate') {
            invalidateTestOrder(test, order, url);
        // если сделать валидным
        } else {
            validateTestOrder(test, order, url, $confirmModal.attr('admin'), $confirmModal.attr('special-form'));
        }
        return false;
    });
}