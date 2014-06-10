/*  src/Minsal/SeguimientoBundle/Resource/public/js/SecIngreso/edit.html.twig
 *  Se utiliza para la creación y actualización de los ingresos.
 */

$(document).ready(function() {
    $('select[id$="_idEstablecimientoReferencia"]').select2({
        placeholder: 'Seleccionar...',
        allowClear:  true,
        width:       '100%'
    });

    $('select[id$="_idProcedenciaIngreso"]').prepend('<option/>').val(function(){return $('[selected]',this).val() ;});
    $('select[id$="_idProcedenciaIngreso"]').select2({
        placeholder: 'Seleccione la procedencia del ingreso...',
        allowClear:  true,
        width:       '100%'
    });

    $('select[id$="_idCircunstanciaIngreso"]').prepend('<option/>').val(function(){return $('[selected]',this).val() ;});
    $('select[id$="_idCircunstanciaIngreso"]').select2({
        placeholder: 'Seleccione la circunstancia del ingreso...',
        allowClear:  true,
        width:       '100%'
    });

    $('select[id$="_idAtenAreaModEstab"] option').each(function() {
        if( this.text == "") {
            this.remove();
        }
    });
    $('select[id$="_idAtenAreaModEstab"]').prepend('<option/>').val(function(){return $('[selected]',this).val() ;});
    $('select[id$="_idAtenAreaModEstab"]').select2({
        placeholder: 'Seleccionar...',
        allowClear:  true,
        width:       '100%'
    });

    $('select[id$="_hora_hour"]').prepend('<option/>').val(function(){return $('[selected]',this).val() ;});
    $('select[id$="_hora_hour"]').select2({
        placeholder: 'Hora...',
        allowClear:  true
    });

    $('select[id$="_hora_minute"]').prepend('<option/>').val(function(){return $('[selected]',this).val() ;});
    $('select[id$="_hora_minute"]').select2({
        placeholder: 'Minutos...',
        allowClear:  true
    });

    $('select[id$="_idAmbienteIngreso"]').select2({
        placeholder: 'Seleccionar...',
        allowClear:  true,
        width:       '100%'
    });

    $('select[id$="_idTipoAccidente"]').select2({
        placeholder: 'Seleccione si existiera...',
        allowClear:  true,
        width:       '100%'

    });

    $('select[id$="_idEmpleado"]').select2({
        placeholder: 'Seleccionar...',
        allowClear:  true,
        width:       '100%'
    });

    $('i').popover('show');

    /*COLOCAR LOS DATEPICKER Y LOS IMPUT MASK A LOS CAMPOS DE FECHA*/
    $('input[id$="_fecha"]').datepicker().mask("99-99-9999");
    $('input[id$="_fechaProbableParto"]').datepicker().mask("99-99-9999");
    if($('input[id$="_fecha"]').val()=='')
        $('input[id$="_fecha"]').datepicker({ defaultDate: new Date()});

    /*OCULTAR LO RELACIONADO A LO OBSTETRICO*/
    $('div[id$="_embarazada"]').hide();
    $('div[id$="_fechaProbableParto"]').hide();
    $('div[id$="_semanasAmenorrea"]').hide();
    
    /*VALIDAR SI ES MUJER Y SI ESTA EMBARAZADA*/
    if ($("#sexo").val() == 2  && $("#embarazo").val() == '1')
        $('div[id$="_embarazada"]').show();
    
    /*AL DAR CLIC EN EMBARAZADA */
    $('input:checkbox[name*="embarazada"]').click(function() {
        if ($('input:checkbox[name*="embarazada"]').is(':checked')) {
            $('div[id$="_fechaProbableParto"]').show();
            $('div[id$="_semanasAmenorrea"]').show();
        } else {
            $('div[id$="_fechaProbableParto"]').hide();
            $('div[id$="_semanasAmenorrea"]').hide();
        }
    });
    
    if($('select[id$="idAmbienteIngreso"]').select2('val')) {
        var aux2 = $('select[id$="idAmbienteIngreso"]').select2('val');
        $('select[id$="idAmbienteIngreso"]').children().remove();

        $('select[id$="idAmbienteIngreso"]').prepend('<option/>').val(function(){return $('[selected]',this).val() ;});
        $('select[id$="idAmbienteIngreso"]').select2({
            placeholder: 'Seleccionar...',
            allowClear:  true,
            width:       '100%'
        });

        $.getJSON(Routing.generate('get_servicios_hospitalarios') + '?idAtenAreaModEstab=' + $('select[id$="_idAtenAreaModEstab"]').select2('val'), function(data) {
            $.each(data.especialidades, function(indice, aux) {
                if(aux.nombreAmbiente != "") {
                    $('select[id$="idAmbienteIngreso"]').append($('<option>', {value:aux.id, text: aux.nombreAmbiente}));
                }
            });

            $('select[id$="idAmbienteIngreso"]').append($('<option>', {value: 'n', text: '-------------------', disabled: true }));
            $.getJSON(Routing.generate('get_servicios_hospitalarios_otros') + '?idAtenAreaModEstab=' + $('select[id$="_idAtenAreaModEstab"]').select2('val'), function(data) {
                $.each(data.especialidades, function(indice, aux) {
                    if(aux.nombreAmbiente != "") {
                        $('select[id$="idAmbienteIngreso"]').append($('<option>', {value:aux.id, text: aux.nombreAmbiente}));
                    }
                });
            });
            $('select[id$="idAmbienteIngreso"]').select2('readonly', false);
            $('select[id$="idAmbienteIngreso"]').select2('val', aux2);
        });
    } else {
        $('select[id$="idAmbienteIngreso"]').children().remove();

        $('select[id$="idAmbienteIngreso"]').prepend('<option/>').val(function(){return $('[selected]',this).val() ;});
        $('select[id$="idAmbienteIngreso"]').select2({
            placeholder: 'Seleccionar...',
            allowClear: true
        });

        $('select[id$="idAmbienteIngreso"]').select2('readonly',true);
    }

    $('select[id$="_idAtenAreaModEstab"]').on("change", function(e) {
        $('select[id$="idAmbienteIngreso"]').children().remove();

        $('select[id$="idAmbienteIngreso"]').prepend('<option/>').val(function(){return $('[selected]',this).val() ;});
        $('select[id$="idAmbienteIngreso"]').select2({
            placeholder: 'Seleccionar...',
            allowClear:  true,
            width:       '100%'
        });

        if (e.val) {
            $.getJSON(Routing.generate('get_servicios_hospitalarios') + '?idAtenAreaModEstab=' + e.val, function(data) {
                $.each(data.especialidades, function(indice, aux) {
                    if(aux.nombreAmbiente != "") {
                        $('select[id$="idAmbienteIngreso"]').append($('<option>', {value:aux.id, text: aux.nombreAmbiente}));
                    }
                });

                $('select[id$="idAmbienteIngreso"]').append($('<option>', {value: 'n', text: '-------------------', disabled: true }));
                $.getJSON(Routing.generate('get_servicios_hospitalarios_otros') + '?idAtenAreaModEstab=' + e.val, function(data) {
                    $.each(data.especialidades, function(indice, aux) {
                        if(aux.nombreAmbiente != "") {
                            $('select[id$="idAmbienteIngreso"]').append($('<option>', {value:aux.id, text: aux.nombreAmbiente}));
                        }
                    });
                });
                $('select[id$="idAmbienteIngreso"]').select2('readonly',false);
            });
        } else {
            $('select[id$="idAmbienteIngreso"]').select2('readonly', true);
        }
    });
    
    /*COLOCAR HORA ACTUAL DEL SISTEMA*/
    if ($('select[id$="_hora_hour"]').val() == '0' ){
        var dia = new Date();
        $('select[id$="_hora_hour"]').val(dia.getHours());
        $('select[id$="_hora_minute"]').val(dia.getMinutes());
    }
});