$(document).ready(function() {
    $('#dui').mask("99999999-9");
    $("#fecha_nacimiento").datepicker().mask("99-99-9999");
    $("#capturar").hide();
    $("#buscarGlobal").hide();
    $("#limpiar").click(function() {
        $('#buscarForm')[0].reset();
        $('#resultadoBusqueda').hide();
        $("#buscar").show();
        $("#buscarGlobal").hide();
        $("#capturar").hide();
        return false;
    });

    $("#buscar").click(function() {
        if ($("#primer_apellido").val() == '' && $("#primer_nombre").val() == '') {
            //SE ELIMINA O SE CREA EL ELEMENTO
            ($('#error')) ? $('#error').remove() : '';
            //SE LE ASIGNA VALOR AL ELEMENTO
            var elem = $("<div id='error' title='Campos Obligatorios'>" +
                    "Los campos:\n\
                <ul><li> <strong>Primer Apellido</strong> </li><li><strong>Primer Nombre</strong></li></ul>\n\
                <center>Son obligatorios<center></div>");
            //SE AGREGA LUEGO DEL FORMULARIO
            elem.insertAfter($("#buscarForm"));
            //SE DEFINEN LAS PROPIEDADES DE LA VENTANA Y SE ABRE.
            $("#error").dialog({
                close: function() {
                    $("#primer_apellido").focus();
                }
            });

        } else {
            $("#capturar").show();
            $('#resultadoBusqueda').show();
            $('#resultadoBusqueda').load(Routing.generate('buscar_paciente'));
            // $("#buscarGlobal").show();
            //$("#buscar").show();
        }
        return false;
    });
    $("#buscarGlobal").click(function() {
        if ($("#primer_apellido").val() == '' && $("#primer_nombre").val() == '') {
            //SE ELIMINA O SE CREA EL ELEMENTO
            ($('#error')) ? $('#error').remove() : '';
            //SE LE ASIGNA VALOR AL ELEMENTO
            var elem = $("<div id='error' title='Campos Obligatorios'>" +
                    "Los campos:\n\
                <ul><li> <strong>Primer Apellido</strong> </li><li><strong>Primer Nombre</strong></li></ul>\n\
                <center>Son obligatorios<center></div>");
            //SE AGREGA LUEGO DEL FORMULARIO
            elem.insertAfter($("#buscarForm"));
            //SE DEFINEN LAS PROPIEDADES DE LA VENTANA Y SE ABRE.
            $("#error").dialog({
                close: function() {
                    $("#primer_apellido").focus();
                }
            });

        } else {
            $("#capturar").show();
            $(this).hide();
            $("#buscar").show();
            $('#resultadoBusqueda').show();
            $('#resultadoBusqueda').load(Routing.generate('buscar_paciente_global'));
        }
        return false;
    });

    //PASANDO A MAYUSCULAS LOS ELEMENTOS
    $("#primer_apellido").keyup(function() {
        $(this).val(limpiar_nombres($("#primer_apellido").val()));
    });
    $("#segundo_apellido").keyup(function() {
        $(this).val(limpiar_nombres($("#segundo_apellido").val()));
    });

    $("#primer_nombre").keyup(function() {
        $(this).val(limpiar_nombres($("#primer_nombre").val()));
    });

    $("#segundo_nombre").keyup(function() {
        $(this).val(limpiar_nombres($("#segundo_nombre").val()));
    });

    $("#tercer_nombre").keyup(function() {
        $(this).val(limpiar_nombres($("#tercer_nombre").val()));
    });

    $("#nombre_madre").keyup(function() {
        $(this).val(limpiar_nombres($("#nombre_madre").val()));
    });

    $("#conocido_por").keyup(function() {
        $(this).val(limpiar_nombres($("#conocido_por").val()));
    });

});

