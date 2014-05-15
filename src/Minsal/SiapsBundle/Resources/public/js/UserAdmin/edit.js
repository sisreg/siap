$(document).ready(function() {
    $('i').popover('show');
    $('.mensaje').dialog({
        autoOpen: false,
        width: 300,
        buttons: {
            "Ok": function() {
                $(this).dialog("close");
            }

        }

    });
    $(":submit").click(function() {
        if (!$('input:checkbox[name*="groups"]').is(':checked')) {
            ($('#error')) ? $('#error').remove() : '';
            var elem = $("<div id='error' title='Seleccionar un rol'>" +
                    "Debe Seleccionar un rol para el usuario</div>");

            elem.insertBefore($("#divpie"));
            $("#error").dialog();
            return false;
        }
    });
    
    $('input[id$="_username"]').focusout(function(){
        $('input[id$="_email"]').val($('input[id$="_username"]').val()+'@salud.gob.sv')
    }); 
    
    
    $('input[id$="_enabled"]').attr("checked","checked");


});

