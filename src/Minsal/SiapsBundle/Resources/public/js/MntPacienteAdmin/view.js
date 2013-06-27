$(document).ready(function() {
    $("#buscar").click(function() {
        $("#reporteForm").attr("action", Routing.generate('_report_show') + '/primerReporte/PDF');
        $("#reporteForm").submit();
    });

});

