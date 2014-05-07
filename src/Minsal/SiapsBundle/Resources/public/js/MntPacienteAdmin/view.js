$(document).ready(function() {
    $('#imprimir_hoja').click(function() {
        url = Routing.generate('_report_paciente') + '/hoja_datos_paciente/PDF?paciente='+$('#paciente').val();
        window.open(url, '_blank');
        return false;
    });
    
    $('#imprimir_hoja_consulta').click(function() {
        url = Routing.generate('_report_paciente') + '/hoja_consulta/PDF?paciente='+$('#paciente').val();
        window.open(url, '_blank');
        return false;
    });

});