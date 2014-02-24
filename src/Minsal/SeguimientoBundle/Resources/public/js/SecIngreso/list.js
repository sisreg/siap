$(document).ready(function() {
    $("#fecha_nacimiento").datepicker().mask("99-99-9999");
    $("#nec").focus();

    //PASANDO A MAYUSCULAS LOS ELEMENTOS
    $("#primer_apellido").keyup(function() {
        $(this).val(limpiar_nombres($("#primer_apellido").val()));
    });
    $("#segundo_apellido").keyup(function() {
        $(this).val(limpiar_nombres($("#segundo_apellido").val()));
    });

    $("#apellido_casada").keyup(function() {
        $(this).val(limpiar_nombres($("#apellido_casada").val()));
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

    $.getJSON(Routing.generate('get_servicios_hospitalarios_todos'),
            function(data) {
                $.each(data.especialidades, function(indice, aux) {
                    $('#servicio_ingreso').append('<option value="' + aux.id + '">' + aux.nombre + '</option>');
                });
            });

    $("#buscar").click(function() {
        if ($("#nec").val() != '') {
           
            $('#resultadoBusqueda').load(Routing.generate('buscar_ingresos'));
            $('#resultadoBusqueda').show();
        } else {
            if ($("#fecha_nacimiento").val() != '') {
                $('#resultadoBusqueda').load(Routing.generate('buscar_ingresos'));
                $('#resultadoBusqueda').show();
            }
            else {
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
                    $('#resultadoBusqueda').load(Routing.generate('buscar_ingresos'));
                    $('#resultadoBusqueda').show();
                }
            }
        }
        return false;
    });

});