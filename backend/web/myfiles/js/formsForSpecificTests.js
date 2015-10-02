$(document).ready(function () {
    showForm();
});
function showForm()
{
    $('select#test-form_for_specific_tests').live('change', function() {
        var v = $(this).val();
        var $formForSpecificTestsDiv = $('.formForSpecificTestsDiv');
        var url = $formForSpecificTestsDiv.attr('url') + '?form=' + v;
        if (v == $formForSpecificTestsDiv.attr('value') && $formForSpecificTestsDiv.attr('id')) {
            url += '&id=' + $formForSpecificTestsDiv.attr('id');
        }
        $.ajax({
            type: 'GET',
            url: url,
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            success: function(response) {
                if (response.status == 'ok') {
                    $('.formForSpecificTestsDiv').removeClass('hide');
                    $('.formForSpecificTestsDiv .form').html(response.form);
                    if (response.data) {
                        for (var i in response.data) {
                            switch (response.data[i]['type']) {
                                case 'text' :
                                    $('.formForSpecificTestsDiv input[name="FormsForSpecificTests[' +
                                        i + '::text]"]').val(response.data[i]['value']);
                                    break;
                                case 'textarea' :
                                    $('.formForSpecificTestsDiv textarea[name="FormsForSpecificTests[' +
                                        i + '::textarea]"]').text(response.data[i]['value']);
                                    break;
                                case 'select' :
                                    if (typeof response.data[i]['value'] !== 'string') {
                                        for (var v in response.data[i]['value']) {
                                            $('.formForSpecificTestsDiv select[name="FormsForSpecificTests[' +
                                                i + '::select]"] option[value="' + response.data[i]['value'][v] +
                                                '"]').attr('selected', 'selected');
                                        }
                                    } else {
                                        $('.formForSpecificTestsDiv select[name="FormsForSpecificTests[' +
                                            i + '::select]"] option[value="' + response.data[i]['value'] +
                                            '"]').attr('selected', 'selected');
                                    }
                                    $('.formForSpecificTestsDiv select[name="FormsForSpecificTests[' +
                                        i + '::select]"]').change();
                                    break;
                                case 'radio' :
                                    $('.formForSpecificTestsDiv input[type="radio"][name="FormsForSpecificTests[' +
                                        i + '::radio]"]').removeAttr('checked');
                                    $('.formForSpecificTestsDiv input[type="radio"][name="FormsForSpecificTests[' +
                                        i + '::radio]"][value="' + response.data[i]['value'] + '"]').prop('checked', true);
                                    break;
                                case 'checkbox' :
                                    $('.formForSpecificTestsDiv input[type="checkbox"][name="FormsForSpecificTests['
                                        + i + '::checkbox][]"]').removeAttr('checked');
                                    if (typeof response.data[i]['value'] !== 'string') {
                                        for (var v in response.data[i]['value']) {
                                            $('.formForSpecificTestsDiv input[type="checkbox"][name="FormsForSpecificTests['
                                                + i + '::checkbox][]"][value="' + response.data[i]['value'][v] +
                                                '"]').prop('checked', true);
                                        }
                                    } else {
                                        $('.formForSpecificTestsDiv input[type="checkbox"][name="FormsForSpecificTests['
                                            + i + '::checkbox][]"][value="' + response.data[i]['value'] +
                                            '"]').prop('checked', true);
                                    }
                                    break;
                            }
                        }
                    }
                } else {
                    $('.formForSpecificTestsDiv').addClass('hide');
                    console.log(response.message);
                }
            }
        });
        return false;
    });
}