$(document).ready(function() {
    $('#dui').mask("99999999-9");
    $( "#fecha_nacimiento" ).datepicker().attr('readOnly','readOnly');
    $( "#capturar" ).hide();
    $("#limpiar").click(function() {
       $('#buscarForm')[0].reset();
       return false;
    });
    $("#buscar").click(function() {
       $('#buscarForm')[0].reset();
       $( "#capturar" ).show();
       return false;
       
    });
    
    
});

