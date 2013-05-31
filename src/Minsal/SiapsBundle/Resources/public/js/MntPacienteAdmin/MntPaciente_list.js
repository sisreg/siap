$(document).ready(function() {
    $('#dui').mask("99999999-9");
    $("#fecha_nacimiento").datepicker().mask("99-99-9999");
    //$("#capturar").hide();
    $("#limpiar").click(function() {
        $('#buscarForm')[0].reset();
        $('#resultadoBusqueda').hide();
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
        }
        return false;
    });

    //PASANDO A MAYUSCULAS LOS ELEMENTOS
    $("#primer_apellido").keyup(function() {
        $("#primer_apellido").val(($("#primer_apellido").val()).toUpperCase());
    });
    $("#segundo_apellido").keyup(function() {
        $("#segundo_apellido").val(($("#segundo_apellido").val()).toUpperCase());
    });
    
    $("#primer_nombre").keyup(function() {
        $("#primer_nombre").val(($("#primer_nombre").val()).toUpperCase());
    });
    
    $("#segundo_nombre").keyup(function() {
        $("#segundo_nombre").val(($("#segundo_nombre").val()).toUpperCase());
    });
    
    $("#tercer_nombre").keyup(function() {
        $("#tercer_nombre").val(($("#tercer_nombre").val()).toUpperCase());
    });
    
    $("#nombre_madre").keyup(function() {
        $("#nombre_madre").val(($("#nombre_madre").val()).toUpperCase());
    });
    
    $("#conocido_por").keyup(function() {
        $("#conocido_por").val(($("#conocido_por").val()).toUpperCase());
    });

});

