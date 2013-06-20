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
            {name: 'id', index: 'id', editable: false, editoptions: {size: 15}},
            {name: 'nec', index: 'nec', editable: false, width: 80},
            {name: 'apellidos', index: 'apellidos', editable: false, width: 200},
            {name: 'nombres', index: 'nombres', editable: false, width: 200},
            {name: 'fecha_nacimiento', index: 'fecha_nacimiento', editable: false, width: 70},
            {name: 'documento', index: 'documento', editable: false, width: 110},
            {name: 'nombre_madre', index: 'nombre_madre', editable: false, width: 180},
            {name: 'conocido_por', index: 'conocido_por', editable: false, width: 120},
            {name: 'acciones', index: 'acciones', editable: false, width: 100},
        ],
        multiselect: false,
        //caption: "Proyectos PEP",
        rowNum: 10,
        rowList: [10, 20, 30],
        loadonce: true,
        pager: jQuery('#pBuscarPaciente'),
        viewrecords: true,
        loadComplete: function() {
            $('#lregistro').text('Total de registros: ' + $("#tBuscarPaciente").getGridParam('records'));
        },
        gridComplete: function() {
            var ids = jQuery("#tBuscarPaciente").jqGrid('getDataIDs');
            for (var i = 0; i < ids.length; i++) {
                var cl = ids[i];
                if (cl != 0) {
                    ce = "<a id=\"capturar\" class=\"btn sonata-action-element\" href=\"create\"><i class=\"icon-edit\"></i></a>";
                    ce+= "<a id=\"imprimir\" class=\"btn sonata-action-element\" href=\""+cl+"\/edit\"><i class=\"icon-print\"></i></a>";
                    jQuery("#tBuscarPaciente").jqGrid('setRowData', ids[i], {acciones: ce});
                }
            }
        }
    }).jqGrid('navGrid', '#pBuscarPaciente',
            {edit: false, add: false, del: false, search: false, refresh: false}
    ).hideCol(['id']);
});

