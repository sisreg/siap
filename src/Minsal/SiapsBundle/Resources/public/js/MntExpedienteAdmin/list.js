$(document).ready(function() {
    $("#fecha_inicio").datepicker().mask("99-99-9999");
    $("#fecha_fin").datepicker().mask("99-99-9999");
    
    $("#emitir_informe").click(function() {
        $('#resultado').load(Routing.generate('expedientes_creados'),{'datos':$('#expedientes_creados').serialize()});
        return false;
    });
   
    
//para exportar reportes
    $('#exportar_hoja_calculo').click(function() {
        if ($('.ui-paging-info').text() != 'Sin registros que mostrar') {
            url = Routing.generate('_exportar_reporte') + '/expedientes_creados/xls?fecha_inicio=' + $('#fecha_inicio').val() + '&fecha_fin=' + $('#fecha_fin').val();
            window.open(url, '_blank');
            return false;
        }
       else {
            return false;
        }
        
    });
    $('#exportar_pdf').click(function() {
        if ($('.ui-paging-info').text() != 'Sin registros que mostrar') {
            url = Routing.generate('_exportar_reporte') + '/expedientes_creados/PDF?fecha_inicio=' + $('#fecha_inicio').val() + '&fecha_fin=' + $('#fecha_fin').val();
            window.open(url, '_blank');
            return false;
        }
        else {
            return false;
        }
        
    });
});

