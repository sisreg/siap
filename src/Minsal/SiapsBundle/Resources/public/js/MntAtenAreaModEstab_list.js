$(document).ready(function() {

    $('#reporte').button().click(function() {
        $.ajax({
            type: "GET",
            url: Routing.generate('_report_show')+'/primerReporte/PDF',
            data: $("#reporteForm").serialize()

        });
        return false;
        

    });

});

