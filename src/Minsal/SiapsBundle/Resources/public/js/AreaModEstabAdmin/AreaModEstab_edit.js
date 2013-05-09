$(document).ready(function() {
    var $check = $('input:checkbox');
    
    $listado = $('ul[id$="_atenciones"]');
    $capa_listado = $listado.parent().append('<div id="tree">hola</div>');

    $("#tree").dynatree({
        checkbox: true,
        selectMode: 2,
        initAjax: {
            url: Routing.generate('get_atenciones')
        },        
        onClick: function(node, event) {
            // We should not toggle, if target was "checkbox", because this
            // would result in double-toggle (i.e. no toggle)
            if (node.getEventTargetType(event) != 'expander')
                if (node.getEventTargetType(event) == "title"){
                    node.toggleSelect();
                    if (node.isSelected())
                        $('input:checkbox[value="'+node.data.key+'"]').attr('checked', true);
                    else
                        $('input:checkbox[value="'+node.data.key+'"]').attr('checked', false);
                }
                else{
                    if (node.isSelected())
                        $('input:checkbox[value="'+node.data.key+'"]').attr('checked', false);
                    else
                        $('input:checkbox[value="'+node.data.key+'"]').attr('checked', true);
                }
        },
    });
});


