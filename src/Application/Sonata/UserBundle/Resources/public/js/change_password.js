$(document).ready(function() {
    /*DIALOGOS DE VALIDACION*/
    $('.mensaje').dialog({
        autoOpen: false,
        width: 300
    });
    $("#guardar").click(function() {
        if ($("#fos_user_change_password_form_new_first").val() != $("#fos_user_change_password_form_new_second").val()) {
            $('#mensaje').dialog('open');
            $("#fos_user_change_password_form_new_first").val('');
            $("#fos_user_change_password_form_new_second").val('');
            $("#fos_user_change_password_form_new_first").focus();
            return false;
            
        }

    });
    $('i').popover('show');
});


