$(document).ready(function() {
    $('#resultadoBusqueda').load(Routing.generate('buscar_ingresos'));
    $('#resultadoBusqueda').show();
});