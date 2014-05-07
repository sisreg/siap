//FUNCIÓN QUE SE UTILIZA PARA PERMITIR SOLO LETRAS Y UN SOLO ESPACIO.
//QUITANDO TODA TILDE, DIERESIS,ETC
        function limpiar_nombres(text) {
        var text = text.toLowerCase(); // a minusculas
        text = text.replace(/[áàäâå]/, 'a');
        text = text.replace(/[éèëê]/, 'e');
        text = text.replace(/[íìïî]/, 'i');
        text = text.replace(/[óòöô]/, 'o');
        text = text.replace(/[úùüû]/, 'u');
        text = text.replace(/[ýÿ]/, 'y');
        text = text.replace(/[^a-zA-ZñÑ\s]/g, '');
        text = text.replace(/\s{2,}/, ' ');
        text = text.toUpperCase();
        return text;
    }
function defalutlModalBodyMessage(e) {
    
    e = typeof e !== 'undefined' ? e : '';

    var html = '<div class="alert alert-block alert-error">\
                <h4>Error al cargar el elemento</h4>\
                Lo sentimos, hubo un problema al cargar la vista, \
                por favor intente nuevamente.<br /> \
                Si el problema persiste por favor contacte al administrador...</div>';

    if(e != '') {
        html = html + '<p><b>Detalle del Error</b><br />' + e + '</p>';
    }
    return html;
}

//Estandarización del uso de modal dentro del proyecto
jQuery(document).ready(function($){

    $('body').append('\
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">\
            <div class="modal-header">\
                <button id="myModalBtnCloseX" type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>\
                <h4 id="myModalLabel"></h4>\
            </div>\
            <div class="modal-body">\
            </div>\
            <div class="modal-footer">\
                <button class="action" data-dismiss="modal" aria-hidden="true"><span class="label">Cerrar</span></button>\
            </div>\
        </div>');

    $("body").on('click', 'a[custom-modal="true"]', function(e){
        var currentIDM = $(this).attr("id");
        if (!(typeof modal_elements === 'undefined') && modal_elements.length != 0) {
            for (var i = 0; i < modal_elements.length; i++) {
                if (currentIDM == modal_elements[i].id){
                    if(modal_elements[i].empty !=  true) {
                        /*Limpiando los elementos del modal*/
                        $('#myModal div.modal-header h4#myModalLabel').empty();
                        $('#myModal div.modal-body').empty();
                        $('#myModal div.modal-footer').empty();

                        /*Verificando el contendio a mostrar*/
                        if (typeof modal_elements[i].header === 'undefined' || modal_elements[i].header == '') {
                            modal_elements[i].header = 'Detalle';
                        }

                        if (typeof modal_elements[i].func === 'undefined' || modal_elements[i].func == '') {
                            modal_elements[i].func = 'defalutlModalBodyMessage';
                        }

                        if (typeof modal_elements[i].parameters === 'undefined' || modal_elements[i].func == '') {
                            var modalBody = window[modal_elements[i].func]();
                        } else {
                            var modalBody = window[modal_elements[i].func](modal_elements[i].parameters);
                        }

                        /*Estableciendo los nuevos valores del modal*/
                        $('#myModal div.modal-header h4#myModalLabel').append(modal_elements[i].header);
                        if (modalBody != '') {
                            $('#myModal div.modal-body').append(modalBody);
                            if (typeof modal_elements[i].closeBtnName === 'undefined' || modal_elements[i].closeBtnName == '') {
                                $('#myModal div.modal-footer').append(modal_elements[i].footer + '<button id="myModalBtnClose" class="action" data-dismiss="modal" aria-hidden="true"><span class="label">Cerrar</span></button>');
                            } else {
                                $('#myModal div.modal-footer').append(modal_elements[i].footer + '<button id="myModalBtnClose" class="action" data-dismiss="modal" aria-hidden="true"><span class="label">'+modal_elements[i].closeBtnName+'</span></button>');
                            }
                        } else {
                            $('#myModal div.modal-body').append(window['defalutlModalBodyMessage']());
                            $('#myModal div.modal-footer').append('<button id="myModalBtnClose" class="action" data-dismiss="modal" aria-hidden="true"><span class="label">Cerrar</span></button>');
                        }

                        if (typeof modal_elements[i].afterLoadCallFunction !== 'undefined' && modal_elements[i].afterLoadCallFunction != '') {
                            window[modal_elements[i].afterLoadCallFunction]();
                        }

                        if (typeof modal_elements[i].widthModal !== 'undefined' && modal_elements[i].widthModal != '') {
                            $('div#myModal').css({ 'width': modal_elements[i].widthModal+'px', 'margin-left': '-'+(modal_elements[i].widthModal/2)+'px' });
                            /*$('div#myModal').css('margin-left','-'+(modal_elements[i].widthModal/2)-30+'px');*/
                        }

                    } else {
                        if (typeof modal_elements[i].emptyMessage === 'undefined') {
                            var mBody = '<i class="icon-exclamation-sign" style="margin-right:7px;"></i>\
                                         No se ha seleccionado ningun elemento del cual se puedan mostrar los detalles,\
                                         por favor seleccione uno e intente nuevamente.';

                            modal_elements[i].emptyMessage = [ {emptyMTitle: 'Elemento no seleccionado', emptyMBody: mBody } ];
                        } else  {
                            
                            if (typeof modal_elements[i].emptyMessage[0].emptyMTitle === 'undefined' || modal_elements[i].emptyMessage[0].emptyMTitle == '') {
                                modal_elements[i].emptyMessage[0].emptyMTitle = 'Elemento no seleccionado';
                            }

                            if (typeof modal_elements[i].emptyMessage[0].emptyMBody === 'undefined' || modal_elements[i].emptyMessage[0].emptyMBody == '') {
                                modal_elements[i].emptyMessage[0].emptyMBody = '<i class="icon-exclamation-sign" style="margin-right:7px;"></i>\
                                         No se ha seleccionado ningun elemento del cual se puedan mostrar los detalles,\
                                         por favor seleccione uno e intente nuevamente.';
                            }
                        
                        $('#myModal div.modal-header h4#myModalLabel').empty();
                        $('#myModal div.modal-body').empty();
                        $('#myModal div.modal-footer').empty();

                        $('#myModal div.modal-header h4#myModalLabel').append(modal_elements[i].emptyMessage[0].emptyMTitle);
                        $('#myModal div.modal-body').append(modal_elements[i].emptyMessage[0].emptyMBody);
                        $('#myModal div.modal-footer').append('<button class="action" data-dismiss="modal" aria-hidden="true"><span class="label">Cerrar</span></button>');
                    }
                };
            }
        } else {
            $('#myModal div.modal-header h4#myModalLabel').empty();
            $('#myModal div.modal-body').empty();
            $('#myModal div.modal-footer').empty();

            $('#myModal div.modal-header h4#myModalLabel').append('Error!!!');
            $('#myModal div.modal-body').append('<div class="alert alert-error">\
                                                     <h4>Ops! ha ocurrido un error</h4>\
                                                     Lo sentimos pero ha ocurrido un error, por favor intente nuevamente, si el problema persiste por favor contacte con el administrador\
                                                 </div>');
            $('#myModal div.modal-footer').append('<button class="action" data-dismiss="modal" aria-hidden="true"><span class="label">Cerrar</span></button>');

        }
    });
});