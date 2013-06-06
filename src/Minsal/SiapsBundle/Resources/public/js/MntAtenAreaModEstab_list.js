$(document).ready(function() {

    $('#reporte').button().click(function() {
        $("#reporteForm").attr("action",Routing.generate('_report_show')+'/primerReporte/PDF');
        $("#reporteForm").submit();
    });

});

