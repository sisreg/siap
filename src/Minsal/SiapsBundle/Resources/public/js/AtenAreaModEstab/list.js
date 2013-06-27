$(document).ready(function() {
    $('#reporte').click(function() {
        url = Routing.generate('_report_show') + '/rCarteraServicios/HTML';
        window.open(url, '_blank');
        return false;
    });

});

