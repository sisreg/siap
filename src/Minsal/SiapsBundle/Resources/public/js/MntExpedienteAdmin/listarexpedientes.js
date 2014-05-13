$(document).ready(function() {
    $("#fecha_inicio").datepicker().mask("99-99-9999");
    $("#fecha_fin").datepicker().mask("99-99-9999");


    $field = $('#usuario');
    $field.prepend('<option/>').val(function() {
        return
        $('[selected]', this).val();
    })
    $field.select2({
        placeholder: 'Seleccione...',
        allowClear: true
    });
    $.getJSON(Routing.generate('obtener_usuarios_archivo'),
            function(data) {
                $.each(data.usuarios, function(indice, aux) {
                    $field.append($('<option>', {value: aux.id, text: aux.firstname+' '+aux.lastname}));
                });
            });

    $("#emitir_informe").click(function() {
        $('#resultado').load(Routing.generate('expedientes_creados'), {'datos': $('#expedientes_creados').serialize()});
        return false;
    });


//para exportar reportes
    $('#exportar_hoja_calculo').click(function() {
        if ($('.ui-paging-info').text() != 'Sin registros que mostrar') {
            url = Routing.generate('_exportar_reporte') + '/expedientes_creados/xls?fecha_inicio=' + $('#fecha_inicio').val() + '&fecha_fin=' + $('#fecha_fin').val()+ '&usuario=' + $('select[id$="_usuario"] option:selected').val();
            window.open(url, '_blank');
            return false;
        }
        else {
            return false;
        }

    });
    
    $('#exportar_pdf').click(function() {
        alert($('select[id$="usuario"] option:selected').val());
        if ($('.ui-paging-info').text() != 'Sin registros que mostrar') {
            url = Routing.generate('_exportar_reporte') + '/expedientes_creados/PDF?fecha_inicio=' + $('#fecha_inicio').val() + '&fecha_fin=' + $('#fecha_fin').val()+ '&usuario=' + $('select[id$="_usuario"] option:selected').val();
            window.open(url, '_blank');
            return false;
        }
        else {
            return false;
        }

    });
});
