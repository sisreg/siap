$(document).ready(function() {
    $('i').popover('show');

    /*COLOCAR LOS DATEPICKER Y LOS IMPUT MASK A LOS CAMPOS DE FECHA*/
    $('input[id$="_fecha"]').datepicker().mask("99-99-9999");
    $('input[id$="_fechaProbableParto"]').datepicker().mask("99-99-9999");
    /*OCULTAR LO RELACIONADO A LO OBSTETRICO*/
    $('div[id$="_fechaProbableParto"]').hide();
    $('div[id$="_semanasAmenorrea"]').hide();

    if ($("#sexo").val() != 2 || $("#embarazo").val() == '0')
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

    /*CARGAR LAS ESPECIALIDADES DE HOSPITALIZACION*/
    //
    if ($('select[id$="_idAtenAreaModEstab"]').val() == '') {
        $.getJSON(Routing.generate('get_especialidad_ingresos'),
                function(data) {
                    $('select[id$="_idAtenAreaModEstab"]').children().remove();
                    $('select[id$="_idAtenAreaModEstab"]').append('<option value="" selected=selected>Seleccione...</option>');
                    $.each(data.especialidades, function(indice, aux) {
                        $('select[id$="_idAtenAreaModEstab"]').append('<option value="' + aux.id + '">' + aux.nombre + '</option>');
                    });
                    $('select[id$="_idAtenAreaModEstab"]').removeAttr('readonly');
                    $('select[id$="_idProcedenciaIngreso"]').focus();
                });
    } else {
        $.getJSON(Routing.generate('get_especialidad_ingresos'),
                function(data) {
                    valor = $('select[id$="_idAtenAreaModEstab"]').val();
                    $('select[id$="_idAtenAreaModEstab"]').children().remove();
                    $('select[id$="_idAtenAreaModEstab"]').append('<option value="">Seleccione...</option>');
                    $.each(data.especialidades, function(indice, aux) {
                        if (valor == aux.id)
                            $('select[id$="_idAtenAreaModEstab"]').append('<option selected="selected" value="' + aux.id + '">' + aux.nombre + '</option>');
                        else
                            $('select[id$="_idAtenAreaModEstab"]').append('<option value="' + aux.id + '">' + aux.nombre + '</option>');
                    });
                    $('select[id$="_idAtenAreaModEstab"]').removeAttr('readonly');
                    $('select[id$="_idProcedenciaIngreso"]').focus();
                });
    }

    $('select[id$="_idAtenAreaModEstab"]').change(function() {
        $('select[id$="idAmbienteIngreso"]').children().remove();
        $('select[id$="idAmbienteIngreso"]').append('<option value="">Seleccione...</option>');
        $.getJSON(Routing.generate('get_servicios_hospitalarios') + '?idAtenAreaModEstab=' + $('select[id$="_idAtenAreaModEstab"]').val(),
                function(data) {
                    $.each(data.especialidades, function(indice, aux) {
                        $('select[id$="idAmbienteIngreso"]').append('<option value="' + aux.id + '">' + aux.nombreAmbiente + '</option>');
                    });
                    $('select[id$="idAmbienteIngreso"]').append('<option disabled="disabled">-------------------</option>');
                    $.getJSON(Routing.generate('get_servicios_hospitalarios_otros') + '?idAtenAreaModEstab=' + $('select[id$="_idAtenAreaModEstab"]').val(),
                            function(data) {
                                $.each(data.especialidades, function(indice, aux) {
                                    $('select[id$="idAmbienteIngreso"]').append('<option value="' + aux.id + '">' + aux.nombreAmbiente + '</option>');
                                });
                            });
                    $('select[id$="idAmbienteIngreso"]').removeAttr('readonly');
                });
    });
    /*COLOCAR HORA ACTUAL DEL SISTEMA*/
    if ($('select[id$="_hora_hour"]').val() == '0' ){
        var dia = new Date();
        $('select[id$="_hora_hour"]').val(dia.getHours())
        $('select[id$="_hora_minute"]').val(dia.getMinutes())
    }
    



});