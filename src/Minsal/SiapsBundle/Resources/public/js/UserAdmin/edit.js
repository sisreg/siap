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
        } else
        if ($('input:checkbox[name*="groups"]:checked').length > 1) {
            ($('#error')) ? $('#error').remove() : '';
            var elem = $("<div id='error' title='Seleccionar un rol'>" +
                    "Solo puede seleccionar un rol por usuario</div>");

            elem.insertBefore($("#divpie"));
            $("#error").dialog();
            return false;
        }
    });


});

