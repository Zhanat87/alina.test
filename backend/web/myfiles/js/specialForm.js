$(document).ready(function() {
    specialFormClose();
    specialFormOpen();
    specialFormSave();
    specialFormInputClear();
});
function specialFormClose()
{
    $('.specialFormClose').live('click', function() {
        $('#specialForm .md-close').click();
        return false;
    });
}
function specialFormOpen()
{
    $('.specialFormOpen').live('click', function() {
        getSpecialForm($(this).attr('url'));
        return false;
    });
}
function getSpecialForm(url)
{
    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'html',
        success: function(data) {
            $('#specialForm .modal-body').html(data);
            var formId = $('#specialForm form').attr('id');
            switch (formId) {
                case 'selection34' :
                    selection34();
                    break;
                case 'doubleNegative' :
                    doubleNegative();
                    break;
                case 'depletionTcrabCd19' :
                    depletionTcrabCd19();
                    break;
                case 'depletionTcrabCd192' :
                    depletionTcrabCd192();
                    break;
                case 'selection56' :
                    selection56();
                    break;
                case 'cd34Plus' :
                    cd34Plus();
                    break;
                case 'cd34Plus2' :
                    cd34Plus2();
                    break;
                case 'cd34cd37aad' :
                    cd34cd37aad();
                    break;
                case 'ift' :
                    ift();
                    break;
                case 'ift2' :
                    ift2();
                    break;
                case 'treg' :
                    treg();
                    break;
            }
        }
    });
}
function specialFormSave()
{
    $('.specialFormSave').live('click', function() {
        var $this = $(this);
        var form = $('#specialForm form');
        if (form.find('.has-error').length) {
            return false;
        }
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function(response) {
                if (response.status == 'ok') {
                    $this.next().click();
                } else {
                    for (var i in response) {
                        if (form.find('input[id="' + i + '"]').length) {
                            var formElement = form.find('input[id="' + i + '"]');
                        } else if (form.find('select[id="' + i + '"]').length) {
                            var formElement = form.find('select[id="' + i + '"]');
                        } else if (form.find('textarea[id="' + i + '"]').length) {
                            var formElement = form.find('textarea[id="' + i + '"]');
                        }
                        formElement.parent().addClass('has-error').find('.help-block').text(response[i]);
                    }
                }
            }
        });
        return false;
    });
}
//console.log(parseFloat(0)); // 0
//console.log(parseFloat(01)); // 1
//console.log(parseFloat(0,2)); // 0
//console.log(parseFloat(0.3)); // 0.3
function positiveValue(value)
{
    var floatValue = parseFloat(value);
    return isNaN(floatValue) ? false : true;
}
function specialFormInputClear()
{
    $(document).on('change', '#specialForm .modal-body input', function(){
        console.log('after all callbacks, val = ' + $(this).val());
        if ($(this).val() == 'NaN' || $(this).val() == 'Infinity') {
            $(this).val('').change();
        }
    });
}
function selection34()
{
    $('#specialForm .modal-title').text('селекция 34');
    $('#selection34-apheresis_wbc_density').live('change', function() {
        $('#selection34-apheresis_wbc_viability').val($(this).val()).change();
    });
    $('#selection34-apheresis_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#selection34-apheresis_wbc_in_sample').val($('#selection34-apheresis_wbc_viability').val() * v / 1000).change();
    });
    $('#selection34-apheresis_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#selection34-apheresis_wbc_in_sample').val($('#selection34-apheresis_sample_volume').val() * v / 1000).change();
    });
    $('#selection34-apheresis_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#selection34-apheresis_cd34_volume').val($('#selection34-apheresis_cd34_percent').val() * v / 100 * 1000).change();
        $('#selection34-apheresis_cd3_volume').val($('#selection34-apheresis_cd3_percent').val() * v / 100).change();
        $('#selection34-apheresis_cd19_volume').val($('#selection34-apheresis_cd19_percent').val() * v / 100).change();
    });
    $('#selection34-apheresis_cd34_percent').live('change', function() {
        var v = $(this).val();
        $('#selection34-apheresis_cd34_volume').val($('#selection34-apheresis_wbc_in_sample').val() * v / 100 * 1000).change();
    });
    $('#selection34-apheresis_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#selection34-apheresis_cd3_volume').val($('#selection34-apheresis_wbc_in_sample').val() * v / 100).change();
    });
    $('#selection34-apheresis_cd19_percent').live('change', function() {
        var v = $(this).val();
        $('#selection34-apheresis_cd19_volume').val($('#selection34-apheresis_cd34_percent').val() * v / 100).change();
    });
    /**/
    $('#selection34-selection_original_wbc_density').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_original_wbc_viability').val($('#selection34-selection_original_7_aad').val() * v / 100).change();
    });
    $('#selection34-selection_original_7_aad').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_original_wbc_viability').val($('#selection34-selection_original_wbc_density').val() * v / 100).change();
    });
    $('#selection34-selection_original_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_original_wbc_in_sample').val($('#selection34-selection_original_wbc_viability').val() * v / 1000).change();
    });
    $('#selection34-selection_original_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_original_wbc_in_sample').val($('#selection34-selection_original_sample_volume').val() * v / 1000).change();
    });
    $('#selection34-selection_original_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_original_cd34_volume').val($('#selection34-selection_original_cd34_percent').val() * v / 100 * 1000).change();
        $('#selection34-selection_original_cd3_volume').val($('#selection34-selection_original_cd3_percent').val() * v / 100).change();
        $('#selection34-selection_original_cd19_volume').val($('#selection34-selection_original_cd19_percent').val() * v / 100).change();
    });
    $('#selection34-selection_original_cd34_percent').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_original_cd34_volume').val($('#selection34-selection_original_wbc_in_sample').val() * v / 100 * 1000).change();
    });
    $('#selection34-selection_original_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_original_cd3_volume').val($('#selection34-selection_original_wbc_in_sample').val() * v / 100).change();
    });
    $('#selection34-selection_original_cd19_percent').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_original_cd19_volume').val($('#selection34-selection_original_cd34_percent').val() * v / 100).change();
    });
    /**/
    $('#selection34-selection_target_wbc_density').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_target_wbc_viability').val($('#selection34-selection_target_7_aad').val() * v / 100).change();
    });
    $('#selection34-selection_target_7_aad').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_target_wbc_viability').val($('#selection34-selection_target_wbc_density').val() * v / 100).change();
    });
    $('#selection34-selection_target_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_target_wbc_in_sample').val($('#selection34-selection_target_wbc_viability').val() * v / 1000).change();
    });
    $('#selection34-selection_target_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_target_wbc_in_sample').val($('#selection34-selection_target_sample_volume').val() * v / 1000).change();
    });
    $('#selection34-selection_target_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_target_cd34_volume').val($('#selection34-selection_target_cd34_percent').val() * v / 100 * 1000).change();
        $('#selection34-selection_target_cd3_volume').val($('#selection34-selection_target_cd3_percent').val() * v / 100 * 10000).change();
        $('#selection34-selection_target_cd19_volume').val($('#selection34-selection_target_cd19_percent').val() * v / 100 * 10000).change();
    });
    $('#selection34-selection_target_cd34_percent').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_target_cd34_volume').val($('#selection34-selection_target_wbc_in_sample').val() * v / 100 * 1000).change();
    });
    $('#selection34-selection_target_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_target_cd3_volume').val($('#selection34-selection_target_wbc_in_sample').val() * v / 100 * 10000).change();
    });
    $('#selection34-selection_target_cd19_percent').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_target_cd19_volume').val($('#selection34-selection_target_cd34_percent').val() * v / 100 * 10000).change();
    });
    /**/
    $('#selection34-selection_non_target_wbc_density').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_non_target_wbc_viability').val($('#selection34-selection_non_target_7_aad').val() * v / 100).change();
    });
    $('#selection34-selection_non_target_7_aad').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_non_target_wbc_viability').val($('#selection34-selection_non_target_wbc_density').val() * v / 100).change();
    });
    $('#selection34-selection_non_target_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_non_target_wbc_in_sample').val($('#selection34-selection_non_target_wbc_viability').val() * v / 1000).change();
    });
    $('#selection34-selection_non_target_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_non_target_wbc_in_sample').val($('#selection34-selection_non_target_sample_volume').val() * v / 1000).change();
    });
    $('#selection34-selection_non_target_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_non_target_cd34_volume').val($('#selection34-selection_non_target_cd34_percent').val() * v / 100 * 1000).change();
        $('#selection34-selection_non_target_cd3_volume').val($('#selection34-selection_non_target_cd3_percent').val() * v / 100).change();
        $('#selection34-selection_non_target_cd19_volume').val($('#selection34-selection_non_target_cd19_percent').val() * v / 100).change();
    });
    $('#selection34-selection_non_target_cd34_percent').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_non_target_cd34_volume').val($('#selection34-selection_non_target_wbc_in_sample').val() * v / 100 * 1000).change();
    });
    $('#selection34-selection_non_target_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_non_target_cd3_volume').val($('#selection34-selection_non_target_wbc_in_sample').val() * v / 100).change();
    });
    $('#selection34-selection_non_target_cd19_percent').live('change', function() {
        var v = $(this).val();
        $('#selection34-selection_non_target_cd19_volume').val($('#selection34-selection_non_target_cd34_percent').val() * v / 100).change();
    });

    $('#selection34-selection_target_cd34_volume').live('change', function() {
        var v = $(this).val();
        var weight = parseFloat($('#selection34-weight').val());
        if (positiveValue(weight)) {
            $('#selection34-cd34_density').val(v / weight / 10).change();
        }
    });
    $('#selection34-weight').live('change', function() {
        var v = parseFloat($(this).val());
        if (positiveValue(v)) {
            $('#selection34-cd34_density').val($('#selection34-selection_target_cd34_volume').val() / v).change();
            $('#selection34-cd3_density').val($('#selection34-selection_target_cd3_volume').val() / v / 10).change();
            $('#selection34-cd19_density').val($('#selection34-selection_target_cd19_volume').val() / v / 10).change();
        } else {
            $('#selection34-cd34_density, #selection34-cd3_density, #selection34-cd19_density').val('').change();
        }
    });

    $('#selection34-selection_target_cd3_volume').live('change', function() {
        var v = $(this).val();
        var weight = parseFloat($('#selection34-weight').val());
        if (positiveValue(weight)) {
            $('#selection34-cd3_density').val(v / weight / 10).change();
        }
    });

    $('#selection34-selection_target_cd19_volume').live('change', function() {
        var v = $(this).val();
        var weight = parseFloat($('#selection34-weight').val());
        if (positiveValue(weight)) {
            $('#selection34-cd19_density').val(v / weight / 10).change();
        }
    });
}
function doubleNegative()
{
    $('#specialForm .modal-title').text('дубль-негативные');
    $('#doublenegative-leukocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#doublenegative-granulocytes_value_density').val($('#doublenegative-granulocytes_value_percent').val() * v / 100).change();
        $('#doublenegative-monocytes_value_density').val($('#doublenegative-monocytes_value_percent').val() * v / 100).change();
        $('#doublenegative-lymphocytes_value_density').val($('#doublenegative-lymphocytes_value_percent').val() * v / 100).change();
    });
    $('#doublenegative-granulocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#doublenegative-granulocytes_value_density').val($('#doublenegative-leukocytes_value_density').val() * v / 100).change();
    });
    $('#doublenegative-monocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#doublenegative-monocytes_value_density').val($('#doublenegative-leukocytes_value_density').val() * v / 100).change();
    });
    $('#doublenegative-lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#doublenegative-lymphocytes_value_density').val($('#doublenegative-leukocytes_value_density').val() * v / 100);
        $('#doublenegative-cd3_t_lymphocytes_value_density').val($('#doublenegative-cd3_t_lymphocytes_value_percent').val() * v / 100).change();
        $('#doublenegative-cd3_4_t_helper_value_density').val($('#doublenegative-cd3_4_t_helper_value_percent').val() * v / 100).change();
        $('#doublenegative-cd3_8_t_cytotoxic_value_density').val($('#doublenegative-cd3_8_t_cytotoxic_value_percent').val() * v / 100).change();
        $('#doublenegative-cd3_cd4_cd8_tcrgd_value_density').val($('#doublenegative-cd3_cd4_cd8_tcrgd_value_percent').val() * v / 100).change();
        $('#doublenegative-cd3_cd4_cd8_tcrab_value_density').val($('#doublenegative-cd3_cd4_cd8_tcrab_value_percent').val() * v / 100).change();
    });
    $('#doublenegative-cd3_t_lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#doublenegative-cd3_t_lymphocytes_value_density').val($('#doublenegative-lymphocytes_value_percent').val() * v / 100).change();
    });
    $('#doublenegative-cd3_4_t_helper_value_percent').live('change', function() {
        var v = $(this).val();
        $('#doublenegative-cd3_4_t_helper_value_density').val($('#doublenegative-lymphocytes_value_percent').val() * v / 100).change();
    });
    $('#doublenegative-cd3_8_t_cytotoxic_value_percent').live('change', function() {
        var v = $(this).val();
        $('#doublenegative-cd3_8_t_cytotoxic_value_density').val($('#doublenegative-lymphocytes_value_percent').val() * v / 100).change();
    });
    $('#doublenegative-cd3_cd4_cd8_tcrgd_value_percent').live('change', function() {
        var v = $(this).val();
        $('#doublenegative-cd3_cd4_cd8_tcrgd_value_density').val($('#doublenegative-lymphocytes_value_percent').val() * v / 100).change();
    });
    $('#doublenegative-cd3_cd4_cd8_tcrab_value_percent').live('change', function() {
        var v = $(this).val();
        $('#doublenegative-cd3_cd4_cd8_tcrab_value_density').val($('#doublenegative-lymphocytes_value_percent').val() * v / 100).change();
    });
}
function cd34Plus()
{
    $('#specialForm .modal-title').text('Определение количества гемопоэтических клеток-предшественников (CD34+)');
    $('#cd34plus-wbc').live('change', function() {
        var v = $(this).val();
        $('#cd34plus-cd34_volume').val($('#cd34plus-cd34_percent').val() * v / 100).change();
    });
    $('#cd34plus-cd34_percent').live('change', function() {
        var v = $(this).val();
        $('#cd34plus-cd34_volume').val($('#cd34plus-wbc').val() * v / 100).change();
    });
    $('#cd34plus-cd34_volume').live('change', function() {
        $('#cd34plus-cd34_mass').val($(this).val() * 1000).change();
    });
}
function cd34Plus2()
{
    $('#specialForm .modal-title').text('Определение количества гемопоэтических клеток-предшественников (CD34+)');
    $('#cd34plus2-wbc').live('change', function() {
        var v = $(this).val();
        $('#cd34plus2-cd34_volume').val($('#cd34plus2-cd34_percent').val() * v / 100).change();
    });
    $('#cd34plus2-cd34_percent').live('change', function() {
        var v = $(this).val();
        $('#cd34plus2-cd34_volume').val($('#cd34plus2-wbc').val() * v / 100).change();
    });
    $('#cd34plus2-cd34_volume').live('change', function() {
        if ($('#cd34plus2-wbc_m').val()) {
            $('#cd34plus2-cd34_mass').val($(this).val() * $('#cd34plus2-wbc_v').val() / $('#cd34plus2-wbc_m').val()).change();
        }
    });
    $('#cd34plus2-wbc_v').live('change', function() {
        if ($('#cd34plus2-wbc_m').val()) {
            $('#cd34plus2-cd34_mass').val($(this).val() * $('#cd34plus2-cd34_volume').val() / $('#cd34plus2-wbc_m').val()).change();
        }
    });
    $('#cd34plus2-wbc_v').live('change', function() {
        var v = $(this).val();
        if (v) {
            $('#cd34plus2-cd34_mass').val($('#cd34plus2-wbc_v') * $('#cd34plus2-cd34_volume').val() / v).change();
        }
    });
}
function cd34cd37aad()
{
    $('#specialForm .modal-title').text('Определение CD34, CD3, 7-AAD');
    $('#cd34cd37aad-wbc').live('change', function() {
        var v = $(this).val();
        $('#cd34cd37aad-_7_aad2').val($('#cd34cd37aad-_7_aad').val() * v / 100).change();
        $('#cd34cd37aad-cd34_volume').val($('#cd34cd37aad-cd34_percent').val() * v / 100).change();
        $('#cd34cd37aad-cd3_volume').val($('#cd34cd37aad-cd3_percent').val() * v / 100).change();
    });
    $('#cd34cd37aad-_7_aad').live('change', function() {
        var v = $(this).val();
        $('#cd34cd37aad-_7_aad2').val($('#cd34cd37aad-wbc').val() * v / 100).change();
    });
    $('#cd34cd37aad-cd34_percent').live('change', function() {
        var v = $(this).val();
        $('#cd34cd37aad-cd34_volume').val($('#cd34cd37aad-wbc').val() * v / 100).change();
    });
    $('#cd34cd37aad-cd34_volume').live('change', function() {
        var v = $(this).val();
        if ($('#cd34cd37aad-wbc_m').val()) {
            $('#cd34cd37aad-cd34_mass').val($('#cd34cd37aad-wbc_v').val() * v / $('#cd34cd37aad-wbc_m').val()).change();
        }
    });
    $('#cd34cd37aad-wbc_v').live('change', function() {
        var v = $(this).val();
        if ($('#cd34cd37aad-wbc_m').val()) {
            $('#cd34cd37aad-cd34_mass').val($('#cd34cd37aad-cd34_volume').val() * v / $('#cd34cd37aad-wbc_m').val()).change();
            $('#cd34cd37aad-cd3_mass2').val($('#cd34cd37aad-cd3_volume').val() * v / $('#cd34cd37aad-wbc_m').val() / 100).change();
        }
    });
    $('#cd34cd37aad-wbc_m').live('change', function() {
        var v = $(this).val();
        if (v) {
            $('#cd34cd37aad-cd34_mass').val($('#cd34cd37aad-cd34_volume').val() * $('#cd34cd37aad-wbc_v').val() / v).change();
            $('#cd34cd37aad-cd3_mass2').val($('#cd34cd37aad-cd3_volume').val() * $('#cd34cd37aad-wbc_v').val() / v / 100).change();
        }
    });
    $('#cd34cd37aad-cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#cd34cd37aad-cd3_volume').val($('#cd34cd37aad-wbc').val() * v / 100).change();
    });
    $('#cd34cd37aad-cd3_volume').live('change', function() {
        if ($('#cd34cd37aad-wbc_m').val()) {
            var v = $(this).val();
            $('#cd34cd37aad-cd3_mass2').val($('#cd34cd37aad-wbc_v').val() * v / $('#cd34cd37aad-wbc_m').val() / 100).change();
        }
    });
}
function selection56()
{
    $('#specialForm .modal-title').text('селекция 56');
    $('#selection56-apheresis_wbc_density').live('change', function() {
        var v = $(this).val();
        $('#selection56-apheresis_wbc_viability').val($('#selection56-apheresis_7_aad').val() * v / 100).change();
    });
    $('#selection56-apheresis_7_aad').live('change', function() {
        var v = $(this).val();
        $('#selection56-apheresis_wbc_viability').val($('#selection56-apheresis_wbc_density').val() * v / 100).change();
    });
    $('#selection56-apheresis_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#selection56-apheresis_wbc_in_sample').val($('#selection56-apheresis_wbc_viability').val() * v / 1000).change();
    });
    $('#selection56-apheresis_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#selection56-apheresis_wbc_in_sample').val($('#selection56-apheresis_sample_volume').val() * v / 1000).change();
    });
    $('#selection56-apheresis_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#selection56-apheresis_cd56_volume').val($('#selection56-apheresis_cd56_percent').val() * v / 100 * 1000).change();
        $('#selection56-apheresis_cd3_volume').val($('#selection56-apheresis_cd3_percent').val() * v / 100).change();
        $('#selection56-apheresis_nkt_volume').val($('#selection56-apheresis_nkt_percent').val() * v / 100).change();
        $('#selection56-apheresis_cd19_volume').val($('#selection56-apheresis_cd19_percent').val() * v / 100).change();
    });
    $('#selection56-apheresis_cd56_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-apheresis_cd56_volume').val($('#selection56-apheresis_wbc_in_sample').val() * v / 100 * 1000).change();
    });
    $('#selection56-apheresis_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-apheresis_cd3_volume').val($('#selection56-apheresis_wbc_in_sample').val() * v / 100).change();
    });
    $('#selection56-apheresis_nkt_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-apheresis_nkt_volume').val($('#selection56-apheresis_wbc_in_sample').val() * v / 100).change();
    });
    $('#selection56-apheresis_cd19_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-apheresis_cd19_volume').val($('#selection56-apheresis_wbc_in_sample').val() * v / 100).change();
    });

    $('#selection56-selection_original_wbc_density').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_original_wbc_viability').val($('#selection56-selection_original_7_aad').val() * v / 100).change();
    });
    $('#selection56-selection_original_7_aad').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_original_wbc_viability').val($('#selection56-selection_original_wbc_density').val() * v / 100).change();
    });
    $('#selection56-selection_original_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_original_wbc_in_sample').val($('#selection56-selection_original_wbc_viability').val() * v / 1000).change();
    });
    $('#selection56-selection_original_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_original_wbc_in_sample').val($('#selection56-selection_original_sample_volume').val() * v / 1000).change();
    });
    $('#selection56-selection_original_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_original_cd56_volume').val($('#selection56-selection_original_cd56_percent').val() * v / 100 * 1000).change();
        $('#selection56-selection_original_cd3_volume').val($('#selection56-selection_original_cd3_percent').val() * v / 100).change();
        $('#selection56-selection_original_nkt_volume').val($('#selection56-selection_original_nkt_percent').val() * v / 100).change();
        $('#selection56-selection_original_cd19_volume').val($('#selection56-selection_original_cd19_percent').val() * v / 100).change();
    });
    $('#selection56-selection_original_cd56_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_original_cd56_volume').val($('#selection56-selection_original_wbc_in_sample').val() * v / 100 * 1000).change();
    });
    $('#selection56-selection_original_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_original_cd3_volume').val($('#selection56-selection_original_wbc_in_sample').val() * v / 100).change();
    });
    $('#selection56-selection_original_nkt_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_original_nkt_volume').val($('#selection56-selection_original_wbc_in_sample').val() * v / 100).change();
    });
    $('#selection56-selection_original_cd19_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_original_cd19_volume').val($('#selection56-selection_original_wbc_in_sample').val() * v / 100).change();
    });

    $('#selection56-selection_target_wbc_density').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_target_wbc_viability').val($('#selection56-selection_target_7_aad').val() * v / 100).change();
    });
    $('#selection56-selection_target_7_aad').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_target_wbc_viability').val($('#selection56-selection_target_wbc_density').val() * v / 100).change();
    });
    $('#selection56-selection_target_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_target_wbc_in_sample').val($('#selection56-selection_target_wbc_viability').val() * v / 1000).change();
    });
    $('#selection56-selection_target_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_target_wbc_in_sample').val($('#selection56-selection_target_sample_volume').val() * v / 1000).change();
    });
    $('#selection56-selection_target_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_target_cd56_volume').val($('#selection56-selection_target_cd56_percent').val() * v / 100 * 1000).change();
        $('#selection56-selection_target_cd3_volume').val($('#selection56-selection_target_cd3_percent').val() * v / 100 * 10000).change();
        $('#selection56-selection_target_nkt_volume').val($('#selection56-selection_target_nkt_percent').val() * v / 100 * 10000).change();
        $('#selection56-selection_target_cd19_volume').val($('#selection56-selection_target_cd19_percent').val() * v / 100 * 10000).change();
    });
    $('#selection56-selection_target_cd56_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_target_cd56_volume').val($('#selection56-selection_target_wbc_in_sample').val() * v / 100 * 1000).change();
    });
    $('#selection56-selection_target_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_target_cd3_volume').val($('#selection56-selection_target_wbc_in_sample').val() * v / 100).change();
    });
    $('#selection56-selection_target_nkt_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_target_nkt_volume').val($('#selection56-selection_target_wbc_in_sample').val() * v / 100).change();
    });
    $('#selection56-selection_target_cd19_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_target_cd19_volume').val($('#selection56-selection_target_wbc_in_sample').val() * v / 100).change();
    });

    $('#selection56-selection_non_target_wbc_density').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_non_target_wbc_viability').val($('#selection56-selection_non_target_7_aad').val() * v / 100).change();
    });
    $('#selection56-selection_non_target_7_aad').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_non_target_wbc_viability').val($('#selection56-selection_non_target_wbc_density').val() * v / 100).change();
    });
    $('#selection56-selection_non_target_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_non_target_wbc_in_sample').val($('#selection56-selection_non_target_wbc_viability').val() * v / 1000).change();
    });
    $('#selection56-selection_non_target_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_non_target_wbc_in_sample').val($('#selection56-selection_non_target_sample_volume').val() * v / 1000).change();
    });
    $('#selection56-selection_non_target_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_non_target_cd56_volume').val($('#selection56-selection_non_target_cd56_percent').val() * v / 100 * 1000).change();
        $('#selection56-selection_non_target_cd3_volume').val($('#selection56-selection_non_target_cd3_percent').val() * v / 100).change();
        $('#selection56-selection_non_target_nkt_volume').val($('#selection56-selection_non_target_nkt_percent').val() * v / 100).change();
        $('#selection56-selection_non_target_cd19_volume').val($('#selection56-selection_non_target_cd19_percent').val() * v / 100).change();
    });
    $('#selection56-selection_non_target_cd56_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_non_target_cd56_volume').val($('#selection56-selection_non_target_wbc_in_sample').val() * v / 100 * 1000).change();
    });
    $('#selection56-selection_non_target_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_non_target_cd3_volume').val($('#selection56-selection_non_target_wbc_in_sample').val() * v / 100).change();
    });
    $('#selection56-selection_non_target_nkt_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_non_target_nkt_volume').val($('#selection56-selection_non_target_wbc_in_sample').val() * v / 100).change();
    });
    $('#selection56-selection_non_target_cd19_percent').live('change', function() {
        var v = $(this).val();
        $('#selection56-selection_non_target_cd19_volume').val($('#selection56-selection_non_target_wbc_in_sample').val() * v / 100).change();
    });

    $('#selection56-selection_target_cd56_volume').live('change', function() {
        if ($('#selection56-weight').val()) {
            $('#selection56-cd56_density').val($(this).val() / $('#selection56-weight').val()).change();
        }
    });
    $('#selection56-weight').live('change', function() {
        if ($(this).val()) {
            $('#selection56-cd56_density').val($('#selection56-selection_target_cd56_volume').val() / $(this).val()).change();
            $('#selection56-cd3_cd56_density').val($('#selection56-selection_target_cd3_volume').val() / $(this).val() / 10).change();
            $('#selection56-cd19_density').val($('#selection56-selection_target_cd19_volume').val() / $(this).val() / 10).change();
        }
    });
    $('#selection56-selection_target_cd3_volume').live('change', function() {
        if ($('#selection56-weight').val()) {
            $('#selection56-cd3_cd56_density').val($(this).val() / $('#selection56-weight').val() / 10).change();
        }
    });
    $('#selection56-selection_target_cd19_volume').live('change', function() {
        if ($('#selection56-weight').val()) {
            $('#selection56-cd19_density').val($(this).val() / $('#selection56-weight').val() / 10).change();
        }
    });
}
function depletionTcrabCd192()
{
    $('#specialForm .modal-title').text('деплеция TCRab/CD19 2');

    $('#depletiontcrabcd192-weight').live('change', function() {
        if ($(this).val()) {
            $('#depletiontcrabcd192-cd56_density').val($('#depletiontcrabcd192-depletion_target_cd56_volume').val() / $(this).val()).change();
            $('#depletiontcrabcd192-cd3_cd56_density').val($('#depletiontcrabcd192-depletion_target_cd3_cd56_volume').val() / $(this).val() / 10).change();
            $('#depletiontcrabcd192-cd20_density').val($('#depletiontcrabcd192-depletion_target_cd20_volume').val() / $(this).val() / 10).change();
        }
    });

    $('#depletiontcrabcd192-depletion_target_cd56_volume').live('change', function() {
        if ($('#depletiontcrabcd192-weight').val()) {
            $('#depletiontcrabcd192-cd56_density').val($(this).val() / $('#depletiontcrabcd192-weight').val()).change();
        }
    });
    $('#depletiontcrabcd192-depletion_target_cd3_cd56_volume').live('change', function() {
        if ($('#depletiontcrabcd192-weight').val()) {
            $('#depletiontcrabcd192-cd3_cd56_density').val($(this).val() / $('#depletiontcrabcd192-weight').val() / 10).change();
        }
    });
    $('#depletiontcrabcd192-depletion_target_cd20_volume').live('change', function() {
        if ($('#depletiontcrabcd192-weight').val()) {
            $('#depletiontcrabcd192-cd20_density').val($(this).val() / $('#depletiontcrabcd192-weight').val() / 10).change();
        }
    });

    $('#depletiontcrabcd192-depletion_target_wbc_density').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd192-depletion_target_wbc_viability').val($('#depletiontcrabcd192-depletion_target_7_aad').val() * v / 100).change();
    });
    $('#depletiontcrabcd192-depletion_target_7_aad').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd192-depletion_target_wbc_viability').val($('#depletiontcrabcd192-depletion_target_wbc_density').val() * v / 100).change();
    });

    $('#depletiontcrabcd192-depletion_target_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd192-depletion_target_wbc_in_sample').val($('#depletiontcrabcd192-depletion_target_sample_volume').val() * v / 1000).change();
    });
    $('#depletiontcrabcd192-depletion_target_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd192-depletion_target_wbc_in_sample').val($('#depletiontcrabcd192-depletion_target_wbc_viability').val() * v / 1000).change();
    });

    $('#depletiontcrabcd192-depletion_target_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd192-depletion_target_cd56_volume').val($('#depletiontcrabcd192-depletion_target_cd56_percent').val() * v / 100 * 1000).change();
        $('#depletiontcrabcd192-depletion_target_cd3_cd56_volume').val($('#depletiontcrabcd192-depletion_target_cd3_cd56_percent').val() * v / 100 * 10000).change();
        $('#depletiontcrabcd192-depletion_target_nkt_volume').val($('#depletiontcrabcd192-depletion_target_nkt_percent').val() * v / 100 * 10000).change();
        $('#depletiontcrabcd192-depletion_target_cd20_volume').val($('#depletiontcrabcd192-depletion_target_cd20_percent').val() * v / 100 * 10000).change();
    });
    $('#depletiontcrabcd192-depletion_target_cd56_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd192-depletion_target_cd56_volume').val($('#depletiontcrabcd192-depletion_target_wbc_in_sample').val() * v / 100 * 1000).change();
    });

    $('#depletiontcrabcd192-depletion_target_cd3_cd56_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd192-depletion_target_cd3_cd56_volume').val($('#depletiontcrabcd192-depletion_target_wbc_in_sample').val() * v / 100 * 10000).change();
    });

    $('#depletiontcrabcd192-depletion_target_nkt_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd192-depletion_target_nkt_volume').val($('#depletiontcrabcd192-depletion_target_wbc_in_sample').val() * v / 100 * 10000).change();
    });

    $('#depletiontcrabcd192-depletion_target_cd20_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd192-depletion_target_cd20_volume').val($('#depletiontcrabcd192-depletion_target_wbc_in_sample').val() * v / 100 * 10000).change();
    });
}
function depletionTcrabCd19()
{
    $('#specialForm .modal-title').text('деплеция TCRab/CD19');
    $('#depletiontcrabcd19-apheresis_whole_wbc_density').live('change', function() {
        $('#depletiontcrabcd19-apheresis_whole_wbc_viability').val($(this).val()).change();
        $('#depletiontcrabcd19-apheresis_whole_wbc_in_sample').val($('#depletiontcrabcd19-apheresis_whole_sample_volume').val() * v / 1000).change();
    });

    $('#depletiontcrabcd19-apheresis_whole_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_whole_wbc_in_sample').val($('#depletiontcrabcd19-apheresis_whole_wbc_density').val() * v / 1000).change();
    });

    $('#depletiontcrabcd19-apheresis_whole_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_whole_cd34_volume').val($('#depletiontcrabcd19-apheresis_whole_cd34_percent').val() * v / 100 * 1000).change();
        $('#depletiontcrabcd19-apheresis_whole_tcr_ab_volume').val($('#depletiontcrabcd19-apheresis_whole_tcr_ab_percent').val() * v / 100).change();
        $('#depletiontcrabcd19-apheresis_whole_cd3_volume').val($('#depletiontcrabcd19-apheresis_whole_cd3_percent').val() * v / 100).change();
        $('#depletiontcrabcd19-apheresis_whole_cd20_volume').val($('#depletiontcrabcd19-apheresis_whole_cd20_percent').val() * v / 100).change();
    });
    $('#depletiontcrabcd19-apheresis_whole_cd34_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_whole_cd34_volume').val($('#depletiontcrabcd19-apheresis_whole_wbc_in_sample').val() * v / 100 * 1000).change();
    });

    $('#depletiontcrabcd19-apheresis_whole_tcr_ab_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_whole_tcr_ab_volume').val($('#depletiontcrabcd19-apheresis_whole_wbc_in_sample').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-apheresis_whole_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_whole_cd3_volume').val($('#depletiontcrabcd19-apheresis_whole_wbc_in_sample').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-apheresis_whole_cd20_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_whole_cd20_volume').val($('#depletiontcrabcd19-apheresis_whole_wbc_in_sample').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-apheresis_wbc_density').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_wbc_viability').val($('#depletiontcrabcd19-apheresis_7_aad').val() * v / 100).change();
        $('#depletiontcrabcd19-apheresis_tcr_ab_volume').val($('#depletiontcrabcd19-apheresis_tcr_ab_percent').val() * v / 100).change();
        $('#depletiontcrabcd19-apheresis_cd3_volume').val($('#depletiontcrabcd19-apheresis_cd3_percent').val() * v / 100).change();
        $('#depletiontcrabcd19-apheresis_cd20_volume').val($('#depletiontcrabcd19-apheresis_cd20_percent').val() * v / 100).change();
    });
    $('#depletiontcrabcd19-apheresis_7_aad').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_wbc_viability').val($('#depletiontcrabcd19-apheresis_wbc_density').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-depletion_original_wbc_density').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_original_wbc_viability').val($('#depletiontcrabcd19-depletion_original_7_aad').val() * v / 100).change();
        $('#depletiontcrabcd19-depletion_original_tcr_ab_volume').val($('#depletiontcrabcd19-depletion_original_tcr_ab_percent').val() * v / 100).change();
        $('#depletiontcrabcd19-depletion_original_cd3_volume').val($('#depletiontcrabcd19-depletion_original_cd3_percent').val() * v / 100).change();
        $('#depletiontcrabcd19-depletion_original_cd20_volume').val($('#depletiontcrabcd19-depletion_original_cd20_percent').val() * v / 100).change();
    });
    $('#depletiontcrabcd19-depletion_original_7_aad').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_original_wbc_viability').val($('#depletiontcrabcd19-depletion_original_wbc_density').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-depletion_target_wbc_density').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_target_wbc_viability').val($('#depletiontcrabcd19-depletion_target_7_aad').val() * v / 100).change();
        $('#depletiontcrabcd19-depletion_target_tcr_ab_volume').val($('#depletiontcrabcd19-depletion_target_tcr_ab_percent').val() * v / 100 * 10000).change();
        $('#depletiontcrabcd19-depletion_target_cd3_volume').val($('#depletiontcrabcd19-depletion_target_cd3_percent').val() * v / 100 * 10000).change();
        $('#depletiontcrabcd19-depletion_target_cd20_volume').val($('#depletiontcrabcd19-depletion_target_cd20_percent').val() * v / 100 * 10000).change();
    });
    $('#depletiontcrabcd19-depletion_target_7_aad').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_target_wbc_viability').val($('#depletiontcrabcd19-depletion_target_wbc_density').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-depletion_non_target_wbc_density').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_non_target_wbc_viability').val($('#depletiontcrabcd19-depletion_non_target_7_aad').val() * v / 100).change();
        $('#depletiontcrabcd19-depletion_non_target_tcr_ab_volume').val($('#depletiontcrabcd19-depletion_non_target_tcr_ab_percent').val() * v / 100).change();
        $('#depletiontcrabcd19-depletion_non_target_cd3_volume').val($('#depletiontcrabcd19-depletion_non_target_cd3_percent').val() * v / 100).change();
        $('#depletiontcrabcd19-depletion_non_target_cd20_volume').val($('#depletiontcrabcd19-depletion_non_target_cd20_percent').val() * v / 100).change();
    });
    $('#depletiontcrabcd19-depletion_non_target_7_aad').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_non_target_wbc_viability').val($('#depletiontcrabcd19-depletion_non_target_wbc_density').val() * v / 100).change();
    });

   $('#depletiontcrabcd19-apheresis_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_wbc_in_sample').val($('#depletiontcrabcd19-apheresis_wbc_viability').val() * v / 1000).change();
    });
    $('#depletiontcrabcd19-apheresis_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_wbc_in_sample').val($('#depletiontcrabcd19-apheresis_sample_volume').val() * v / 1000).change();
    });

    $('#depletiontcrabcd19-depletion_original_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_original_wbc_in_sample').val($('#depletiontcrabcd19-depletion_original_wbc_viability').val() * v / 1000).change();
    });
    $('#depletiontcrabcd19-depletion_original_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_original_wbc_in_sample').val($('#depletiontcrabcd19-depletion_original_sample_volume').val() * v / 1000).change();
    });

    $('#depletiontcrabcd19-depletion_target_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_target_wbc_in_sample').val($('#depletiontcrabcd19-depletion_target_wbc_viability').val() * v / 1000).change();
    });
    $('#depletiontcrabcd19-depletion_target_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_target_wbc_in_sample').val($('#depletiontcrabcd19-depletion_target_sample_volume').val() * v / 1000).change();
    });

    $('#depletiontcrabcd19-depletion_non_target_sample_volume').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_non_target_wbc_in_sample').val($('#depletiontcrabcd19-depletion_non_target_wbc_viability').val() * v / 1000).change();
    });
    $('#depletiontcrabcd19-depletion_non_target_wbc_viability').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_non_target_wbc_in_sample').val($('#depletiontcrabcd19-depletion_non_target_sample_volume').val() * v / 1000).change();
    });

    $('#depletiontcrabcd19-apheresis_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_cd34_volume').val($('#depletiontcrabcd19-apheresis_cd34_percent').val() * v / 100 * 1000).change();
    });
    $('#depletiontcrabcd19-apheresis_cd34_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_cd34_volume').val($('#depletiontcrabcd19-apheresis_wbc_in_sample').val() * v / 100 * 1000).change();
    });

    $('#depletiontcrabcd19-depletion_original_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_original_cd34_volume').val($('#depletiontcrabcd19-depletion_original_cd34_percent').val() * v / 100 * 1000).change();
    });
    $('#depletiontcrabcd19-depletion_original_cd34_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_original_cd34_volume').val($('#depletiontcrabcd19-depletion_original_wbc_in_sample').val() * v / 100 * 1000).change();
    });

    $('#depletiontcrabcd19-depletion_target_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_target_cd34_volume').val($('#depletiontcrabcd19-depletion_target_cd34_percent').val() * v / 100 * 1000).change();
    });
    $('#depletiontcrabcd19-depletion_target_cd34_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_target_cd34_volume').val($('#depletiontcrabcd19-depletion_target_wbc_in_sample').val() * v / 100 * 1000).change();
    });

    $('#depletiontcrabcd19-depletion_non_target_wbc_in_sample').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_non_target_cd34_volume').val($('#depletiontcrabcd19-depletion_non_target_cd34_percent').val() * v / 100 * 1000).change();
    });
    $('#depletiontcrabcd19-depletion_non_target_cd34_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_non_target_cd34_volume').val($('#depletiontcrabcd19-depletion_non_target_wbc_in_sample').val() * v / 100 * 1000).change();
    });

    $('#depletiontcrabcd19-apheresis_tcr_ab_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_tcr_ab_volume').val($('#depletiontcrabcd19-apheresis_wbc_density').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-depletion_original_tcr_ab_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_original_tcr_ab_volume').val($('#depletiontcrabcd19-depletion_original_wbc_density').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-depletion_target_tcr_ab_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_target_tcr_ab_volume').val($('#depletiontcrabcd19-depletion_target_wbc_density').val() * v / 100 * 10000).change();
    });

    $('#depletiontcrabcd19-depletion_non_target_tcr_ab_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_non_target_tcr_ab_volume').val($('#depletiontcrabcd19-depletion_non_target_wbc_density').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-apheresis_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_cd3_volume').val($('#depletiontcrabcd19-apheresis_wbc_density').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-depletion_original_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_original_cd3_volume').val($('#depletiontcrabcd19-depletion_original_wbc_density').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-depletion_target_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_target_cd3_volume').val($('#depletiontcrabcd19-depletion_target_wbc_density').val() * v / 100 * 10000).change();
    });

    $('#depletiontcrabcd19-depletion_non_target_cd3_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_non_target_cd3_volume').val($('#depletiontcrabcd19-depletion_non_target_wbc_density').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-apheresis_cd20_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-apheresis_cd20_volume').val($('#depletiontcrabcd19-apheresis_wbc_density').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-depletion_original_cd20_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_original_cd20_volume').val($('#depletiontcrabcd19-depletion_original_wbc_density').val() * v / 100).change();
    });

    $('#depletiontcrabcd19-depletion_target_cd20_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_target_cd20_volume').val($('#depletiontcrabcd19-depletion_target_wbc_density').val() * v / 100 * 10000).change();
    });

    $('#depletiontcrabcd19-depletion_non_target_cd20_percent').live('change', function() {
        var v = $(this).val();
        $('#depletiontcrabcd19-depletion_non_target_cd20_volume').val($('#depletiontcrabcd19-depletion_non_target_wbc_density').val() * v / 100).change();
    });

    $('#depletion_target_tcr_ab_volume').live('change', function() {
        if ($('#depletiontcrabcd19-weight').val()) {
            $('#depletiontcrabcd19-tcr_ab_density').val($(this).val() / $('#depletiontcrabcd19-weight') / 10).change();
        }
    });

    $('#depletion_target_cd3_volume').live('change', function() {
        if ($('#depletiontcrabcd19-weight').val()) {
            $('#depletiontcrabcd19-cd3_density').val($(this).val() / $('#depletiontcrabcd19-weight') / 10).change();
        }
    });

    $('#depletion_target_cd20_volume').live('change', function() {
        if ($('#depletiontcrabcd19-weight').val()) {
            $('#depletiontcrabcd19-cd20_density').val($(this).val() / $('#depletiontcrabcd19-weight') / 10).change();
        }
    });

    $('#depletiontcrabcd19-tcr_ab_log').live('change', function() {
        if ($('#depletiontcrabcd19-weight').val()) {
            var v = $(this).val();
            $('#depletiontcrabcd19-cd34_density').val($('#depletiontcrabcd19-depletion_target_cd34_volume').val() * v / $('#depletiontcrabcd19-weight')).change();
        }
    });
    $('#depletiontcrabcd19-depletion_target_cd34_volume').live('change', function() {
        if ($('#depletiontcrabcd19-weight').val()) {
            var v = $(this).val();
            $('#depletiontcrabcd19-cd34_density').val($('#depletiontcrabcd19-tcr_ab_log').val() * v / $('#depletiontcrabcd19-weight')).change();
        }
    });
    $('#depletiontcrabcd19-weight').live('change', function() {
        if ($(this).val()) {
            $('#depletiontcrabcd19-cd34_density').val($('#depletiontcrabcd19-tcr_ab_log').val() * $('#depletiontcrabcd19-depletion_target_cd34_volume').val() / $('#depletiontcrabcd19-weight')).change();
            $('#depletiontcrabcd19-tcr_ab_density').val($('#depletion_target_tcr_ab_volume') / $(this).val() / 10).change();
            $('#depletiontcrabcd19-cd3_density').val($('#depletion_target_cd3_volume') / $(this).val() / 10).change();
            $('#depletiontcrabcd19-cd20_density').val($('#depletion_target_cd20_volume') / $(this).val() / 10).change();
        }
    });

    $('#depletiontcrabcd19-depletion_target_tcr_ab_volume').live('change', function() {
        if ($(this).val()) {
            $('#depletiontcrabcd19-tcr_ab_log').val(Math.log10($('#depletiontcrabcd19-depletion_original_tcr_ab_volume').val() / $(this).val() * 10000)).change();
        }
    });
    $('#depletiontcrabcd19-depletion_original_tcr_ab_volume').live('change', function() {
        if ($('#depletiontcrabcd19-depletion_target_tcr_ab_volume').val()) {
            $('#depletiontcrabcd19-tcr_ab_log').val(Math.log10($(this).val() / $('#depletiontcrabcd19-depletion_target_tcr_ab_volume').val() * 10000)).change();
        }
    });

    $('#depletiontcrabcd19-depletion_target_cd20_volume').live('change', function() {
        if ($(this).val()) {
            $('#depletiontcrabcd19-cd20_log').val(Math.log10($('#depletiontcrabcd19-depletion_original_cd20_volume').val() / $(this).val() * 10000)).change();
        }
    });
    $('#depletiontcrabcd19-depletion_original_cd20_volume').live('change', function() {
        if ($('#depletiontcrabcd19-depletion_target_cd20_volume').val()) {
            $('#depletiontcrabcd19-cd20_log').val(Math.log10($(this).val() / $('#depletiontcrabcd19-depletion_target_cd20_volume').val() * 10000)).change();
        }
    });
}
function treg()
{
    $('#specialForm .modal-title').text('трег');
    $('#treg-leukocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#treg-granulocytes_value_density').val($('#treg-granulocytes_value_percent').val() * v / 100).change();
        $('#treg-lymphocytes_value_density').val($('#treg-lymphocytes_value_percent').val() * v / 100).change();
        $('#treg-monocytes_value_density').val($('#treg-monocytes_value_percent').val() * v / 100).change();
    });
    $('#treg-granulocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#treg-granulocytes_value_density').val($('#treg-leukocytes_value_density').val() * v / 100).change();
        $('#treg-leukocytes2').val(v + $('#treg-monocytes_value_percent').val() + $('#treg-lymphocytes_value_percent').val()).change();
    });

    $('#treg-monocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#treg-monocytes_value_density').val($('#treg-leukocytes_value_density').val() * v / 100).change();
        $('#treg-leukocytes2').val(v + $('#treg-lymphocytes_value_percent').val() + $('#treg-granulocytes_value_percent').val()).change();
    });

    $('#treg-lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#treg-lymphocytes_value_density').val($('#treg-leukocytes_value_density').val() * v / 100).change();
        $('#treg-leukocytes2').val(v + $('#treg-monocytes_value_percent').val() + $('#').val()).change();
    });

    $('#treg-granulocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#treg-leukocytes').val(v + $('#treg-monocytes_value_density').val() + $('#treg-lymphocytes_value_density').val()).change();
    });
    $('#treg-monocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#treg-leukocytes').val(v + $('#treg-granulocytes_value_density').val() + $('#treg-lymphocytes_value_density').val()).change();
    });
    $('#treg-lymphocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#treg-leukocytes').val(v + $('#treg-granulocytes_value_density').val() + $('#treg-monocytes_value_density').val()).change();
    });

    $('#treg-treg2').live('change', function() {
        $('#treg-treg').val($(this).val()).change();
    });
}
function ift()
{
    $('#specialForm .modal-title').text('ифт');
    $('#ift-leukocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift-granulocytes_value_density').val($('#ift-granulocytes_value_percent').val() * v / 100).change();
        $('#ift-monocytes_value_density').val($('#ift-monocytes_value_percent').val() * v / 100).change();
        $('#ift-lymphocytes_value_density').val($('#ift-lymphocytes_value_percent').val() * v / 100).change();
    });
    $('#ift-granulocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-granulocytes_value_density').val($('#ift-leukocytes_value_density').val() * v / 100).change();
    });
    $('#ift-monocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-monocytes_value_density').val($('#ift-leukocytes_value_density').val() * v / 100).change();
    });
    $('#ift-lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-lymphocytes_value_density').val($('#ift-leukocytes_value_density').val() * v / 100).change();
    });


    $('#ift-lymphocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift-cd3_t_lymphocytes_value_density').val($('#ift-cd3_t_lymphocytes_value_percent').val() * v / 100).change();
        $('#ift-cd3_4_t_helper_value_density').val($('#ift-cd3_4_t_helper_value_percent').val() * v / 100).change();
        $('#ift-cd3_8_t_cytotoxic_value_density').val($('#ift-cd3_8_t_cytotoxic_value_percent').val() * v / 100).change();
        $('#ift-cd19_b_lymphocytes_value_density').val($('#ift-cd19_b_lymphocytes_value_percent').val() * v / 100).change();
        $('#ift-cd16_56_nk_value_density').val($('#ift-cd16_56_nk_value_percent').val() * v / 100).change();
        $('#ift-cd3_16_56_nkt_value_density').val($('#ift-cd3_16_56_nkt_value_percent').val() * v / 100).change();
    });

    $('#ift-cd3_t_lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-cd3_t_lymphocytes_value_density').val($('#ift-lymphocytes_value_density').val() * v / 100).change();
        $('#ift-cd3_tcrab_value_density').val($('#ift-cd3_tcrab_value_percent').val() * v / 100).change();
        $('#ift-cd3_tcrgd_value_density').val($('#ift-cd3_tcrgd_value_percent').val() * v / 100).change();
        $('#ift-cd4_lymphocytes').val($('#ift-cd4_cd3').val() * v / 100).change();
        $('#ift-lymphocytes2').val(v + $('#ift-cd19_b_lymphocytes_value_percent').val() + $('#ift-cd16_56_nk_value_percent').val()).change();
        $('#ift-cd8_lymphocytes').val($('#ift-cd8_cd3').val() * v / 100).change();
        $('#ift-cd4_8_lymphocytes').val($('#ift-cd4_8_cd3').val() * v / 100).change();
    });
    $('#ift-cd3_4_t_helper_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-cd3_4_t_helper_value_density').val($('#ift-lymphocytes_value_density').val() * v / 100).change();
    });
    $('#ift-cd3_8_t_cytotoxic_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-cd3_8_t_cytotoxic_value_density').val($('#ift-lymphocytes_value_density').val() * v / 100).change();
    });
    $('#ift-cd19_b_lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-cd19_b_lymphocytes_value_density').val($('#ift-lymphocytes_value_density').val() * v / 100).change();
    });
    $('#ift-cd16_56_nk_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-cd16_56_nk_value_density').val($('#ift-lymphocytes_value_density').val() * v / 100).change();
    });
    $('#ift-cd3_16_56_nkt_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-cd3_16_56_nkt_value_density').val($('#ift-lymphocytes_value_density').val() * v / 100).change();
    });

    $('#ift-granulocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift-leukocytes').val(v + $('#ift-monocytes_value_density').val() + $('#ift-lymphocytes_value_density').val()).change();
    });
    $('#ift-monocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift-leukocytes').val(v + $('#ift-granulocytes_value_density').val() + $('#ift-lymphocytes_value_density').val()).change();
    });
    $('#ift-lymphocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift-leukocytes').val(v + $('#ift-granulocytes_value_density').val() + $('#ift-monocytes_value_density').val()).change();
    });

    $('#ift-granulocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-leukocytes2').val(v + $('#ift-monocytes_value_percent').val() + $('#ift-lymphocytes_value_percent').val()).change();
    });
    $('#ift-monocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-leukocytes2').val(v + $('#ift-granulocytes_value_percent').val() + $('#ift-lymphocytes_value_percent').val()).change();
    });
    $('#ift-lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-leukocytes2').val(v + $('#ift-granulocytes_value_percent').val() + $('#ift-monocytes_value_percent').val()).change();
    });

    $('#ift-cd3_t_lymphocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift-lymphocytes').val(v + $('#ift-cd19_b_lymphocytes_value_density').val() + $('#ift-cd16_56_nk_value_density').val()).change();
    });
    $('#ift-cd19_b_lymphocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift-lymphocytes').val(v + $('#ift-cd3_t_lymphocytes_value_density').val() + $('#ift-cd16_56_nk_value_density').val()).change();
    });
    $('#ift-cd16_56_nk_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift-lymphocytes').val(v + $('#ift-cd3_t_lymphocytes_value_density').val() + $('#ift-cd19_b_lymphocytes_value_density').val()).change();
    });

    $('#ift-cd19_b_lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-lymphocytes2').val(v + $('#ift-cd3_t_lymphocytes_value_percent').val() + $('#ift-cd16_56_nk_value_percent').val()).change();
    });
    $('#ift-cd16_56_nk_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-lymphocytes2').val(v + $('#ift-cd3_t_lymphocytes_value_percent').val() + $('#ift-cd19_b_lymphocytes_value_percent').val()).change();
    });

    $('#ift-cd3_4_t_helper_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift-tlymphocytes').val(v + $('#ift-cd3_8_t_cytotoxic_value_density').val()).change();
    });
    $('#ift-cd3_8_t_cytotoxic_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift-tlymphocytes').val(v + $('#ift-cd3_4_t_helper_value_density').val()).change();
    });

    $('#ift-cd3_4_t_helper_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-tlymphocytes2').val(v + $('#ift-cd3_8_t_cytotoxic_value_percent').val()).change();
    });
    $('#ift-cd3_8_t_cytotoxic_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift-tlymphocytes2').val(v + $('#ift-cd3_4_t_helper_value_percent').val()).change();
    });
    $('#ift-cd3_tcrab_value_percent').live('change', function() {
        $('#ift-cd3_tcrab_value_density').val($('#ift-cd3_t_lymphocytes_value_percent').val() * v / 100).change();
        $('#ift-tcr_sum').val($('#ift-cd3_tcrgd_value_percent').val() + $(this).val()).change();
    });
    $('#ift-cd3_tcrgd_value_percent').live('change', function() {
        $('#ift-cd3_tcrgd_value_density').val($('#ift-cd3_t_lymphocytes_value_percent').val() * v / 100).change();
        $('#ift-tcr_sum').val($('#ift-cd3_tcrab_value_percent').val() + $(this).val()).change();
    });

    $('#ift-cd4_cd3').live('change', function() {
        var v = $(this).val();
        $('#ift-cd4_lymphocytes').val($('#ift-cd3_t_lymphocytes_value_percent').val() * v / 100).change();
    });

    $('#ift-cd8_cd3').live('change', function() {
        var v = $(this).val();
        $('#ift-cd8_lymphocytes').val($('#ift-cd3_t_lymphocytes_value_percent').val() * v / 100).change();
    });

    $('#ift-cd4_8_cd3').live('change', function() {
        var v = $(this).val();
        $('#ift-cd4_8_lymphocytes').val($('#ift-cd3_t_lymphocytes_value_percent').val() * v / 100).change();
    });

    $('#ift-cd4_lymphocytes').live('change', function() {
        $('#ift-cd4_cd8_sum').val($('#ift-cd8_lymphocytes').val() + $(this).val()).change();
    });
    $('#ift-cd8_lymphocytes').live('change', function() {
        $('#ift-cd4_cd8_sum').val($('#ift-cd4_lymphocytes').val() + $(this).val()).change();
    });
}
function ift2()
{
    $('#specialForm .modal-title').text('ифт 2');
    $('#ift2-leukocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift2-granulocytes_value_density').val($('#ift2-granulocytes_value_percent').val() * v / 100).change();
        $('#ift2-monocytes_value_density').val($('#ift2-monocytes_value_percent').val() * v / 100).change();
        $('#ift2-lymphocytes_value_density').val($('#ift2-lymphocytes_value_percent').val() * v / 100).change();
    });
    $('#ift2-granulocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-granulocytes_value_density').val($('#ift2-leukocytes_value_density').val() * v / 100).change();
    });
    $('#ift2-monocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-monocytes_value_density').val($('#ift2-leukocytes_value_density').val() * v / 100).change();
    });
    $('#ift2-lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-lymphocytes_value_density').val($('#ift2-leukocytes_value_density').val() * v / 100).change();
    });


    $('#ift2-lymphocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift2-cd3_t_lymphocytes_value_density').val($('#ift2-cd3_t_lymphocytes_value_percent').val() * v / 100).change();
        $('#ift2-cd3_4_t_helper_value_density').val($('#ift2-cd3_4_t_helper_value_percent').val() * v / 100).change();
        $('#ift2-cd3_8_t_cytotoxic_value_density').val($('#ift2-cd3_8_t_cytotoxic_value_percent').val() * v / 100).change();
        $('#ift2-cd19_b_lymphocytes_value_density').val($('#ift2-cd19_b_lymphocytes_value_percent').val() * v / 100).change();
        $('#ift2-cd16_56_nk_value_density').val($('#ift2-cd16_56_nk_value_percent').val() * v / 100).change();
        $('#ift2-cd3_16_56_nkt_value_density').val($('#ift2-cd3_16_56_nkt_value_percent').val() * v / 100).change();
    });

    $('#ift2-cd3_t_lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-cd3_t_lymphocytes_value_density').val($('#ift2-lymphocytes_value_density').val() * v / 100).change();
    });
    $('#ift2-cd3_4_t_helper_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-cd3_4_t_helper_value_density').val($('#ift2-lymphocytes_value_density').val() * v / 100).change();
    });
    $('#ift2-cd3_8_t_cytotoxic_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-cd3_8_t_cytotoxic_value_density').val($('#ift2-lymphocytes_value_density').val() * v / 100).change();
    });
    $('#ift2-cd19_b_lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-cd19_b_lymphocytes_value_density').val($('#ift2-lymphocytes_value_density').val() * v / 100).change();
    });
    $('#ift2-cd16_56_nk_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-cd16_56_nk_value_density').val($('#ift2-lymphocytes_value_density').val() * v / 100).change();
    });
    $('#ift2-cd3_16_56_nkt_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-cd3_16_56_nkt_value_density').val($('#ift2-lymphocytes_value_density').val() * v / 100).change();
    });

    $('#ift2-granulocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift2-leukocytes').val(v + $('#ift2-monocytes_value_density').val() + $('#ift2-lymphocytes_value_density').val()).change();
    });
    $('#ift2-monocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift2-leukocytes').val(v + $('#ift2-granulocytes_value_density').val() + $('#ift2-lymphocytes_value_density').val()).change();
    });
    $('#ift2-lymphocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift2-leukocytes').val(v + $('#ift2-granulocytes_value_density').val() + $('#ift2-monocytes_value_density').val()).change();
    });

    $('#ift2-granulocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-leukocytes2').val(v + $('#ift2-monocytes_value_percent').val() + $('#ift2-lymphocytes_value_percent').val()).change();
    });
    $('#ift2-monocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-leukocytes2').val(v + $('#ift2-granulocytes_value_percent').val() + $('#ift2-lymphocytes_value_percent').val()).change();
    });
    $('#ift2-lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-leukocytes2').val(v + $('#ift2-granulocytes_value_percent').val() + $('#ift2-monocytes_value_percent').val()).change();
    });

    $('#ift2-cd3_t_lymphocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift2-lymphocytes').val(v + $('#ift2-cd19_b_lymphocytes_value_density').val() + $('#ift2-cd16_56_nk_value_density').val()).change();
    });
    $('#ift2-cd19_b_lymphocytes_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift2-lymphocytes').val(v + $('#ift2-cd3_t_lymphocytes_value_density').val() + $('#ift2-cd16_56_nk_value_density').val()).change();
    });
    $('#ift2-cd16_56_nk_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift2-lymphocytes').val(v + $('#ift2-cd3_t_lymphocytes_value_density').val() + $('#ift2-cd19_b_lymphocytes_value_density').val()).change();
    });

    $('#ift2-cd3_t_lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-lymphocytes2').val(v + $('#ift2-cd19_b_lymphocytes_value_percent').val() + $('#ift2-cd16_56_nk_value_percent').val()).change();
    });
    $('#ift2-cd19_b_lymphocytes_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-lymphocytes2').val(v + $('#ift2-cd3_t_lymphocytes_value_percent').val() + $('#ift2-cd16_56_nk_value_percent').val()).change();
    });
    $('#ift2-cd16_56_nk_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-lymphocytes2').val(v + $('#ift2-cd3_t_lymphocytes_value_percent').val() + $('#ift2-cd19_b_lymphocytes_value_percent').val()).change();
    });

    $('#ift2-cd3_4_t_helper_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift2-tlymphocytes').val(v + $('#ift2-cd3_8_t_cytotoxic_value_density').val()).change();
    });
    $('#ift2-cd3_8_t_cytotoxic_value_density').live('change', function() {
        var v = $(this).val();
        $('#ift2-tlymphocytes').val(v + $('#ift2-cd3_4_t_helper_value_density').val()).change();
    });

    $('#ift2-cd3_4_t_helper_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-tlymphocytes2').val(v + $('#ift2-cd3_8_t_cytotoxic_value_percent').val()).change();
    });
    $('#ift2-cd3_8_t_cytotoxic_value_percent').live('change', function() {
        var v = $(this).val();
        $('#ift2-tlymphocytes2').val(v + $('#ift2-cd3_4_t_helper_value_percent').val()).change();
    });
}