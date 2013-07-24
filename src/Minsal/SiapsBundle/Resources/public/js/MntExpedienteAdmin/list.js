$(document).ready(function() {
    $("#fecha_inicio").datepicker().mask("99-99-9999");
    $("#fecha_fin").datepicker().mask("99-99-9999");
    
    $("#emitir_informe").click(function() {
        $('#resultado').load(Routing.generate('expedientes_creados'),{'datos':$('#expedientes_creados').serialize()});
        return false;
    });
    
});

