$(document).ready(function() {
    /*COLOCAR LOS DATEPICKER Y LOS IMPUT MASK A LOS CAMPOS DE FECHA*/
    $('input[id$="_fecha"]').datepicker().mask("99-99-9999");
    $('input[id$="_fechaProbableParto"]').datepicker().mask("99-99-9999");
    /*OCULTAR LO RELACIONADO A LO OBSTETRICO*/
    $('div[id$="_fechaProbableParto"]').hide();
    $('div[id$="_semanasAmenorrea"]').hide();
    if ($("#sexo").val()!=2 && $("#embarazo").val()=='false')
        $('div[id$="_embarazada"]').hide();
    
    $('input:checkbox[name*="embarazada"]').click(function() {
        if ($('input:checkbox[name*="embarazada"]').is(':checked')) {
            $('div[id$="_fechaProbableParto"]').show();
            $('div[id$="_semanasAmenorrea"]').show();
        } else {
            $('div[id$="_fechaProbableParto"]').hide();
            $('div[id$="_semanasAmenorrea"]').hide();
        }
    });
    /**/
});