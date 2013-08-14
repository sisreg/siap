$(document).ready(function() {
    $("#tableExpedientesCreados").jqGrid({
        url: Routing.generate('expedientes_creados_listado'),
        postData: $('#expedientes_creados').serialize(),
        datatype: 'json',
        altRows: true,
        height: "100%",
        hidegrid: false,
        caption: "Detalle de Expedientes",
        colNames: ['Número Expediente', 'Fecha de Creación', 'Nombre Paciente', 'Sexo', 'Fecha de Nacimiento'],
        colModel: [
            {name: 'numero', index: 'numero', editable: false, width: 125},
            {name: 'fecha_creacion', index: 'fecha_creacion', editable: false, width: 125, align: "center"},
            {name: 'nombre_paciente', index: 'nombre_paciente', editable: false, width: 325},
            {name: 'sexo', index: 'sexo', editable: false, width: 80, align: "center"},
            {name: 'fecha_nacimiento', index: 'fecha_nacimiento', editable: false, width: 175, align: "center"}
        ],
        multiselect: false,
        rowNum: 10,
        rowList: [10, 20, 30],
        loadonce: true,
        autowidth:true,
        pager: jQuery('#pagerExpedientesCreados'),
        viewrecords: true,
        loadComplete: function() {
            $('#lregistro').text('Total de registros: ' + $(this).getGridParam('records'));                        
        }
    }).jqGrid('navGrid', '#pagerExpedientesCreados',
            {edit: false, add: false, del: false, search: false, refresh: false}
    );
});

