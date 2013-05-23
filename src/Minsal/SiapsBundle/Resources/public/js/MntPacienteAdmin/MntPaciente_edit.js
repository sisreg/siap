$(document).ready(function() {
    function limpiar_nombres(text) {
        var text = text.toLowerCase(); // a minusculas
        text = text.replace(/[áàäâå]/, 'a');
        text = text.replace(/[éèëê]/, 'e');
        text = text.replace(/[íìïî]/, 'i');
        text = text.replace(/[óòöô]/, 'o');
        text = text.replace(/[úùüû]/, 'u');
        text = text.replace(/[ýÿ]/, 'y');
        text = text.replace(/[^a-zA-ZñÑ\s]/, '');
        text = text.toUpperCase();
        return text;
    }

    $('input[id$="_telefonoResponsable"]').mask("9999-9999");
    $('input[id$="_telefonoTrabajo"]').mask("9999-9999");
    $('input[id$="_telefonocasa"]').mask("9999-9999");
    $('input[id$="_primerApellido"]').keyup(function() {
        $('input[id$="_primerApellido"]').val(limpiar_nombres($('input[id$="_primerApellido"]').val()));
    });
    $('input[id$="_segundoApellido"]').keyup(function() {
        $('input[id$="_segundoApellido"]').val(limpiar_nombres($('input[id$="_segundoApellido"]').val()));
    });
    $('input[id$="_apellidoCasada"]').keyup(function() {
        $('input[id$="_apellidoCasada"]').val(limpiar_nombres($('input[id$="_apellidoCasada"]').val()));
    });
    $('input[id$="_primerNombre"]').keyup(function() {
        $('input[id$="_primerNombre"]').val(limpiar_nombres($('input[id$="_primerNombre"]').val()));
    });
    $('input[id$="_segundoNombre"]').keyup(function() {
        $('input[id$="_segundoNombre"]').val(limpiar_nombres($('input[id$="_segundoNombre"]').val()));
    });
    $('input[id$="_tercerNombre"]').keyup(function() {
        $('input[id$="_tercerNombre"]').val(limpiar_nombres($('input[id$="_tercerNombre"]').val()));
    });
    $('input[id$="_conocidoPor"]').keyup(function() {
        $('input[id$="_conocidoPor"]').val(limpiar_nombres($('input[id$="_conocidoPor"]').val()));
    });
    $('input[id$="_nombrePadre"]').keyup(function() {
        $('input[id$="_nombrePadre"]').val(limpiar_nombres($('input[id$="_nombrePadre"]').val()));
    });
    $('input[id$="_nombreMadre"]').keyup(function() {
        $('input[id$="_nombreMadre"]').val(limpiar_nombres($('input[id$="_nombreMadre"]').val()));
    });
    $('input[id$="_nombreConyuge"]').keyup(function() {
        $('input[id$="_nombreConyuge"]').val(limpiar_nombres($('input[id$="_nombreConyuge"]').val()));
    });
    $('input[id$="_nombreResponsable"]').keyup(function() {
        $('input[id$="_nombreResponsable"]').val(limpiar_nombres($('input[id$="_nombreResponsable"]').val()));
    });
    $('input[id$="_nombreProporcionoDatos"]').keyup(function() {
        $('input[id$="_nombreProporcionoDatos"]').val(limpiar_nombres($('input[id$="_nombreProporcionoDatos"]').val()));
    });

    $('input[id$="_direccion"]').keyup(function() {
        $('input[id$="_direccion"]').val(($('input[id$="_direccion"]').val()).toUpperCase());
    });
    $('input[id$="_direccionResponsable"]').keyup(function() {
        $('input[id$="_direccionResponsable"]').val(($('input[id$="_direccionResponsable"]').val()).toUpperCase());
    });
    $('input[id$="_lugarTrabajo"]').keyup(function() {
        $('input[id$="_lugarTrabajo"]').val(($('input[id$="_lugarTrabajo"]').val()).toUpperCase());
    });
    $('textarea[id$="_observacion"]').keyup(function() {
        $('textarea[id$="_observacion"]').val(($('textarea[id$="_observacion"]').val()).toUpperCase());
    });

    $('select[id$="_idDocPaciente"]').change(function() {
        var seleccion = $('select[id$="_idDocPaciente"]').val();
        $('input[id$="_numeroDocIdePaciente"]').val("");
        if (seleccion == 1) {
            $('input[id$="_numeroDocIdePaciente"]').mask("99999999-9");
        }
    });
    /*CARGAR DEPARTAMENTOS*/
    $('select[id$="_idPaisNacimiento"]').change(function() {
        $('select[id$="_idDepartamentoNacimiento"]').children().remove();
        $('select[id$="_idDepartamentoNacimiento"]').append('<option value="0">Seleccione...</option>');
        if ($('select[id$="_idPaisNacimiento"]').val() == '') {
            $('select[id$="_idDepartamentoNacimiento"]').attr('disabled', 'disabled');
        } else {
            $.getJSON(Routing.generate('get_departamentos') + '?idPais=' + $('select[id$="_idPaisNacimiento"]').val(),
                    function(data) {
                        $.each(data, function(key, val) {
                            if (key == 'rows') {
                                $.each(val, function(id, registro) {
                                    $('select[id$="_idDepartamentoNacimiento"]').append('<option value="' + registro['cell'][0] + '">' + registro['cell'][1] + '</option>');
                                });
                            }
                        });
                    });
            $('select[id$="_idDepartamentoNacimiento"]').removeAttr('disabled');
        }

    });

});

