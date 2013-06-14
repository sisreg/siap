$(document).ready(function() {

   $('#reporte').button().click(function() {
        url = Routing.generate('_report_show') + '/primReporte/HTML';
        window.open(url, '_blank');
        return false;
    });

});

