$(document).ready(function() {
    $("#tBuscarPaciente").jqGrid({
        url: Routing.generate('cargar_paciente'),
        datatype: 'json',
        altRows: true,
        height: "100%",
        hidegrid: false,
        colNames: ['idPaciente', 'NEC', 'Nombre Completo', 'F. NAC.', 'DUI', 'Nombre Madre', 'Conocido por'],
        colModel: [
            {name: 'id', index: 'id', editable: false, editoptions: {size: 15}},
            {name: 'nec', index: 'nec', editable: false, width: 50},
            {name: 'nombre_completo', index: 'nombre_completo', editable: false, width: 450},
            {name: 'fecha_nacimiento', index: 'fecha_nacimiento', editable: false, width: 80},
            {name: 'dui', index: 'dui', editable: false, width: 80},
            {name: 'nombre_madre', index: 'nombre_madre', editable: false, width: 250},
            {name: 'conocido_por', index: 'conocido_por', editable: false, width: 80},
        ],
        multiselect: false,
        //caption: "Proyectos PEP",
        rowNum: 10,
        rowList: [10, 20, 30],
        loadonce: true,
        pager: jQuery('#pBuscarPaciente'),
        viewrecords: true
    }).jqGrid('navGrid', '#pBuscarPaciente',
            {edit: false, add: false, del: false, search: false, refresh: false}
    ).hideCol(['id']);
});

