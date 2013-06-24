$(document).ready(function() {
    $("#tBuscarPaciente").jqGrid({
        url: Routing.generate('cargar_paciente'),
        postData: $('#buscarForm').serialize(),
        datatype: 'json',
        altRows: true,
        height: "100%",
        hidegrid: false,
        colNames: ['idPaciente', 'NEC', 'Apellidos', 'Nombres', 'F. NAC.', 'Documento', 'Nombre Madre', 'Conocido por', 'Acciones'],
        colModel: [
            {name: 'id', index: 'id', editable: false},
            {name: 'nec', index: 'nec', editable: false, width: 80,align:"center"},
            {name: 'apellidos', index: 'apellidos', editable: false, width: 200},
            {name: 'nombres', index: 'nombres', editable: false, width: 200},
            {name: 'fecha_nacimiento', index: 'fecha_nacimiento', editable: false, width: 70,align:"center"},
            {name: 'documento', index: 'documento', editable: false, width: 110,align:"center"},
            {name: 'nombre_madre', index: 'nombre_madre', editable: false, width: 180},
            {name: 'conocido_por', index: 'conocido_por', editable: false, width: 120},
            {name: 'acciones', index: 'acciones', editable: false, width: 50,align:"center"}
        ],
        multiselect: false,
        rowNum: 10,
        rowList: [10, 20, 30],
        loadonce: true,
        pager: jQuery('#pBuscarPaciente'),
        viewrecords: true,
        loadComplete: function() {
            $('#lregistro').text('Total de registros: ' + $(this).getGridParam('records'));
        },
        gridComplete: function() {
            var ids = jQuery("#tBuscarPaciente").jqGrid('getDataIDs');
            for (var i = 0; i < ids.length; i++) {
                var cl = ids[i];
                if (cl != 0) {
                    ce = "<a class=\"btn sonata-action-element\" href=\""+cl+"\/edit\"><i class=\"icon-edit\"></i></a>";
                    $(this).jqGrid('setRowData', ids[i], {acciones: ce});
                }
            }
        }
    }).jqGrid('navGrid', '#pBuscarPaciente',
            {edit: false, add: false, del: false, search: false, refresh: false}
    ).hideCol(['id']);
});

