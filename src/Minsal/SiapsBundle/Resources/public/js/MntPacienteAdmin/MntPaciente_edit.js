/*  src/Minsal/SiapsBundle/Resource/public/js/MntPacienteAdmin/MntPaciente_edit.html.twig
 *  Se utiliza para la creación y actualización de los pacientes.
 */
$(document).ready(function() {

    $('#form_paciente').submit(function() {
        if ($('#idPaisDomicilio').val() == '68') {
            if ($('select[id$="_idDepartamentoDomicilio"]').val() == '') {
                ($('#error')) ? $('#error').remove() : '';
                var elem = $("<div id='error' title='Error de Llenado'><center>" +
                        "Debe de introducir el Departamento Domicilio"
                        + "</center></div>");
                elem.insertAfter($("#form_paciente"));
                $("#error").dialog({
                    close: function() {
                        $('select[id$="_idDepartamentoDomicilio"]').focus();
                    }

                });
                return false;
            }
        }
        $('.deshabilitados').removeAttr('disabled');
    });

    $('.deshabilitados').attr('disabled', 'disabled');

    $('input[id$="_fechaNacimiento"]').datepicker().mask("99-99-9999").focusout(function() {
        calcular_edad();
    });

    if ($('input[id$="_fechaNacimiento"]').val() != '') {
        calcular_edad();
    }

    $('i').popover('show');

    if ($('input:checkbox[id$="_asegurado"]').is(':checked')) {
        $('select[id$="_idAreaCotizacion"]').removeAttr('disabled');
        $('input:checkbox[id$="_cotizante"]').removeAttr('disabled');
        $('input[id$="_numeroAfiliacion"]').removeAttr('disabled');
    }

    if ($('select[id$="_idDocPaciente"] option:selected').text() == 'Ninguno') {
        $('input[id$="_numeroDocIdePaciente"]').val('');
        $('input[id$="_numeroDocIdePaciente"]').attr('disabled', 'disabled');
    } else {
        if ($('select[id$="_idDocPaciente"] option:selected').text() == 'DUI') {
            $('input[id$="_numeroDocIdePaciente"]').removeAttr('disabled');
            $('input[id$="_numeroDocIdePaciente"]').mask("99999999-9")
        } else if ($('select[id$="_idDocPaciente"] option:selected').text() == 'NIT') {
            $('input[id$="_numeroDocIdePaciente"]').removeAttr('disabled');
            $('input[id$="_numeroDocIdePaciente"]').mask("9999-999999-999-9")
        } else if ($('select[id$="_idDocPaciente"] option:selected').text() == 'Partida Nacimiento' || $('select[id$="_idDocPaciente"] option:selected').text() == 'Otros') {
            $('input[id$="_numeroDocIdePaciente"]').removeAttr('disabled');
            $('input[id$="_numeroDocIdePaciente"]').unmask();
        }
    }

    if ($('select[id$="_idDocResponsable"] option:selected').text() == 'Ninguno') {
        $('input[id$="_numeroDocIdeResponsable"]').val('');
        $('input[id$="_numeroDocIdeResponsable"]').attr('disabled', 'disabled');
    } else {
        if ($('select[id$="_idDocResponsable"] option:selected').text() == 'DUI') {
            $('input[id$="_numeroDocIdeResponsable"]').removeAttr('disabled');
            $('input[id$="_numeroDocIdeResponsable"]').mask("99999999-9")
        } else if ($('select[id$="_idDocResponsable"] option:selected').text() == 'NIT') {
            $('input[id$="_numeroDocIdeResponsable"]').removeAttr('disabled');
            $('input[id$="_numeroDocIdeResponsable"]').mask("9999-999999-999-9")
        } else if ($('select[id$="_idDocResponsable"] option:selected').text() == 'Partida Nacimiento' || $('select[id$="_idDocResponsable"] option:selected').text() == 'Otros') {
            $('input[id$="_numeroDocIdeResponsable"]').removeAttr('disabled');
            $('input[id$="_numeroDocIdeResponsable"]').unmask();
        }
    }

    if ($('select[id$="_idDocProporcionoDatos"] option:selected').text() == 'Ninguno') {
        $('input[id$="_numeroDocIdeProporDatos"]').val('');
        $('input[id$="_numeroDocIdeProporDatos"]').attr('disabled', 'disabled');
    } else {
        if ($('select[id$="_idDocProporcionoDatos"] option:selected').text() == 'DUI') {
            $('input[id$="_numeroDocIdeProporDatos"]').removeAttr('disabled');
            $('input[id$="_numeroDocIdeProporDatos"]').mask("99999999-9")
        } else if ($('select[id$="_idDocProporcionoDatos"] option:selected').text() == 'NIT') {
            $('input[id$="_numeroDocIdeProporDatos"]').removeAttr('disabled');
            $('input[id$="_numeroDocIdeProporDatos"]').mask("9999-999999-999-9")
        } else if ($('select[id$="_idDocProporcionoDatos"] option:selected').text() == 'Partida Nacimiento' || $('select[id$="_idDocProporcionoDatos"] option:selected').text() == 'Otros') {
            $('input[id$="_numeroDocIdeProporDatos"]').removeAttr('disabled');
            $('input[id$="_numeroDocIdeProporDatos"]').unmask();
        }
    }

    $('.telefono').mask("9999-9999");

    $('input[id$="_numeroAfiliacion"]').blur(function() {
        $(this).val(($(this).val()).replace(/[^\d]/g, ''))
    }
    );

    $('input.limpiar').blur(function() {
        $(this).val(limpiar_nombres($(this).val()))
    });

    $('.mayuscula').blur(function() {
        $(this).val($(this).val().toUpperCase())
    });

    $('#edad').focusout(function() {
        if (!(/día/.test($(this).val())) && !(/año/.test($(this).val())) && !(/mes/.test($(this).val()))) {
            $(this).val(($(this).val()).replace(/[^\d]/g, ''))
            var regexp = /^[\d]{2,3}$/;
            if (!regexp.test($('#edad').val())) {
                alert("Para hacer el cálculo de la edad debe ingresar un número entero de dos o tres dígitos");
            }
            else {
                var fecha = new Date();
                var anio = fecha.getFullYear();
                var anio_nacimiento = anio - $(this).val();
                /*$('select[id$="_fechaNacimiento_day"]').val('1');
                 $('select[id$="_fechaNacimiento_month"]').val('1');
                 $('select[id$="_fechaNacimiento_year"]').val(anio_nacimiento);*/
                $('input[id$="_fechaNacimiento"]').val('01-01-' + anio_nacimiento);
            }
        }
    });

    $('select[id$="_idDocPaciente"]').change(function() {
        $('input[id$="_numeroDocIdePaciente"]').removeAttr('disabled');
        if ($('select[id$="_idDocPaciente"] option:selected').text() == 'DUI') {
            $('input[id$="_numeroDocIdePaciente"]').val('').mask("99999999-9")
        }
        else if ($('select[id$="_idDocPaciente"] option:selected').text() == 'NIT') {
            $('input[id$="_numeroDocIdePaciente"]').val('').mask("9999-999999-999-9")
        }
        else {
            if ($('select[id$="_idDocPaciente"] option:selected').text() == 'Ninguno') {
                $('input[id$="_numeroDocIdePaciente"]').val('');
                $('input[id$="_numeroDocIdePaciente"]').attr('disabled', 'disabled');
            }
            else {
                if ($('select[id$="_idDocPaciente"] option:selected').text() == 'Partida Nacimiento' || $('select[id$="_idDocPaciente"] option:selected').text() == 'Otros' || $('select[id$="_idDocPaciente"] option:selected').text() == 'Pasaporte') {
                    $('input[id$="_numeroDocIdePaciente"]').val('').unmask();
                } else {
                    $('input[id$="_numeroDocIdePaciente"]').val('');
                    $('input[id$="_numeroDocIdePaciente"]').mask("99999999999999999999")

                }
            }
        }
    })

    $('select[id$="_idDocResponsable"]').change(function() {
        $('input[id$="_numeroDocIdeResponsable"]').removeAttr('disabled');
        if ($('select[id$="_idDocResponsable"] option:selected').text() == 'DUI') {
            $('input[id$="_numeroDocIdeResponsable"]').val('').mask("99999999-9")
        }
        else if ($('select[id$="_idDocResponsable"] option:selected').text() == 'NIT') {
            $('input[id$="_numeroDocIdeResponsable"]').val('').mask("9999-999999-999-9")
        }
        else {
            if ($('select[id$="_idDocResponsable"] option:selected').text() == 'Ninguno') {
                $('input[id$="_numeroDocIdeResponsable"]').val('');
                $('input[id$="_numeroDocIdeResponsable"]').attr('disabled', 'disabled');
            }
            else {
                if ($('select[id$="_idDocResponsable"] option:selected').text() == 'Partida Nacimiento' || $('select[id$="_idDocResponsable"] option:selected').text() == 'Otros' || $('select[id$="_idDocResponsable"] option:selected').text() == 'Pasaporte') {
                    $('input[id$="_numeroDocIdeResponsable"]').val('').unmask();
                } else {
                    $('input[id$="_numeroDocIdeResponsable"]').val('');
                    $('input[id$="_numeroDocIdeResponsable"]').mask("99999999999999999999")

                }
            }
        }
    });

    $('select[id$="_idDocProporcionoDatos"]').change(function() {
        $('input[id$="_numeroDocIdeProporDatos"]').removeAttr('disabled');
        if ($('select[id$="_idDocProporcionoDatos"] option:selected').text() == 'DUI') {
            $('input[id$="_numeroDocIdeProporDatos"]').val('');
            $('input[id$="_numeroDocIdeProporDatos"]').mask("99999999-9")
        }
        else if ($('select[id$="_idDocProporcionoDatos"] option:selected').text() == 'NIT') {
            $('input[id$="_numeroDocIdeProporDatos"]').val('');
            $('input[id$="_numeroDocIdeProporDatos"]').mask("9999-999999-999-9")
        }
        else {
            if ($('select[id$="_idDocProporcionoDatos"] option:selected').text() == 'Ninguno') {
                $('input[id$="_numeroDocIdeProporDatos"]').val('');
                $('input[id$="_numeroDocIdeProporDatos"]').attr('disabled', 'disabled');
            }
            else {
                if ($('select[id$="_idDocProporcionoDatos"] option:selected').text() == 'Partida Nacimiento' || $('select[id$="_idDocResponsable"] option:selected').text() == 'Otros' || $('select[id$="_idDocResponsable"] option:selected').text() == 'Pasaporte') {
                    $('input[id$="_numeroDocIdeProporDatos"]').val('').unmask();
                } else {
                    $('input[id$="_numeroDocIdeProporDatos"]').val('');
                    $('input[id$="_numeroDocIdeProporDatos"]').mask("99999999999999999999")
                }
            }
        }
    })

    $('input:checkbox[id$="_asegurado"]').click(function() {
        if ($('input:checkbox[id$="_asegurado"]').is(':checked')) {
            $('select[id$="_idAreaCotizacion"]').removeAttr('disabled');
            $('input:checkbox[id$="_cotizante"]').removeAttr('disabled');
            $('input[id$="_numeroAfiliacion"]').removeAttr('disabled');
        }
        else {
            $('select[id$="_idAreaCotizacion"] option[value=""]').attr('selected', true);
            $('select[id$="_idAreaCotizacion"]').attr('disabled', 'disabled');
            $('input:checkbox[id$="_cotizante"]').attr('disabled', 'disabled');
            $('input:checkbox[id$="_cotizante"]').attr('checked', false);
            $('input[id$="_numeroAfiliacion"]').val('');
            $('input[id$="_numeroAfiliacion"]').attr('disabled', 'disabled');
        }
    });

    /*LIMPIAR APELLIDO CASADA SI ES HOMBRE*/
    $('select[id$="_idSexo"]').change(function() {
        if ($('select[id$="_idSexo"]').val() == '1')
            $('input[id$="_apellidoCasada"]').attr('disabled', 'disabled');
        else
            $('input[id$="_apellidoCasada"]').removeAttr('disabled');
    });

    if ($('select[id$="_idSexo"]').val() == '1')
        $('input[id$="_apellidoCasada"]').attr('disabled', 'disabled');
    else
        $('input[id$="_apellidoCasada"]').removeAttr('disabled');
    /*LLENAR DATOS PERSONA RESPONSABLE*/
    $('select[id$="_idParentescoResponsable"]').change(function() {
        if ($('select[id$="_idParentescoResponsable"] option:selected').text() == 'Madre') {
            $('input[id$="_nombreResponsable"]').val($('input[id$="_nombreMadre"]').val());
            $('select[id$="_idDocResponsable"]').val("");
            $('input[id$="_numeroDocIdeResponsable"]').val("");
            $('input[id$="_direccionResponsable"]').val("");
            $('input[id$="_telefonoResponsable"]').val("");

        }
        else if ($('select[id$="_idParentescoResponsable"] option:selected').text() == 'Padre') {
            $('input[id$="_nombreResponsable"]').val($('input[id$="_nombrePadre"]').val());
            $('select[id$="_idDocResponsable"]').val("");
            $('input[id$="_numeroDocIdeResponsable"]').val("");
            $('input[id$="_direccionResponsable"]').val("");
            $('input[id$="_telefonoResponsable"]').val("");
        }
        else {
            if ($('select[id$="_idParentescoResponsable"] option:selected').text() == 'Compañero(a) ' || $('select[id$="_idParentescoResponsable"] option:selected').text() == 'Esposo(a)') {
                $('input[id$="_nombreResponsable"]').val($('input[id$="_nombreConyuge"]').val());
                $('select[id$="_idDocResponsable"]').val("");
                $('input[id$="_numeroDocIdeResponsable"]').val("");
                $('input[id$="_direccionResponsable"]').val("");
                $('input[id$="_telefonoResponsable"]').val("");
            }
            else if ($('select[id$="_idParentescoResponsable"] option:selected').text() == 'El paciente') {
                $('input[id$="_nombreResponsable"]').val($('input[id$="_primerNombre"]').val() + ' ' + $('input[id$="_primerApellido"]').val());
                $('select[id$="_idDocResponsable"]').val($('select[id$="_idDocPaciente"]').val());
                $('input[id$="_numeroDocIdeResponsable"]').val($('input[id$="_numeroDocIdePaciente"]').val());
                $('input[id$="_direccionResponsable"]').val($('input[id$="_direccion"]').val());
                $('input[id$="_telefonoResponsable"]').val($('input[id$="_telefonoCasa"]').val());
            }
            else {
                $('input[id$="_nombreResponsable"]').val("");
                $('select[id$="_idDocResponsable"]').val("");
                $('input[id$="_numeroDocIdeResponsable"]').val("");
                $('input[id$="_direccionResponsable"]').val("");
                $('input[id$="_telefonoResponsable"]').val("");
            }

        }
    });
    /*LLENAR DATOS PERSONA PROPORCIONÓ DATOS*/
    $('select[id$="_idParentescoProporDatos"]').change(function() {
        if ($('select[id$="_idParentescoProporDatos"] option:selected').text() == 'Madre') {
            $('input[id$="_nombreProporcionoDatos"]').val($('input[id$="_nombreMadre"]').val());
            if ($('select[id$="_idParentescoResponsable"] option:selected').text() == 'Madre') {
                $('select[id$="_idDocProporcionoDatos"]').val($('select[id$="_idDocResponsable"]').val());
                $('input[id$="_numeroDocIdeProporDatos"]').val($('input[id$="_numeroDocIdeResponsable"]').val());
            } else {
                $('select[id$="_idDocProporcionoDatos"]').val("");
                $('input[id$="_numeroDocIdeProporDatos"]').val("");
            }
        }
        else if ($('select[id$="_idParentescoProporDatos"] option:selected').text() == 'Padre') {
            $('input[id$="_nombreProporcionoDatos"]').val($('input[id$="_nombrePadre"]').val());
            if ($('select[id$="_idParentescoResponsable"] option:selected').text() == 'Padre') {
                $('select[id$="_idDocProporcionoDatos"]').val($('select[id$="_idDocResponsable"]').val());
                $('input[id$="_numeroDocIdeProporDatos"]').val($('input[id$="_numeroDocIdeResponsable"]').val());
            } else {
                $('select[id$="_idDocProporcionoDatos"]').val("");
                $('input[id$="_numeroDocIdeProporDatos"]').val("");
            }
        }
        else {
            if ($('select[id$="_idParentescoProporDatos"] option:selected').text() == 'Compañero(a) ' || $('select[id$="_idParentescoProporDatos"] option:selected').text() == 'Esposo(a)') {
                $('input[id$="_nombreProporcionoDatos"]').val($('input[id$="_nombreConyuge"]').val());
                if ($('select[id$="_idParentescoResponsable"] option:selected').text() == 'Compañero(a) ' || $('select[id$="_idParentescoResponsable"] option:selected').text() == 'Esposo(a)') {
                    $('select[id$="_idDocProporcionoDatos"]').val($('select[id$="_idDocResponsable"]').val());
                    $('input[id$="_numeroDocIdeProporDatos"]').val($('input[id$="_numeroDocIdeResponsable"]').val());
                } else {
                    $('select[id$="_idDocProporcionoDatos"]').val("");
                    $('input[id$="_numeroDocIdeProporDatos"]').val("");
                }
            }
            else if ($('select[id$="_idParentescoProporDatos"] option:selected').text() == 'El paciente') {
                $('input[id$="_nombreProporcionoDatos"]').val($('input[id$="_primerNombre"]').val() + ' ' + $('input[id$="_primerApellido"]').val());
                $('select[id$="_idDocProporcionoDatos"]').val($('select[id$="_idDocPaciente"]').val());
                $('input[id$="_numeroDocIdeProporDatos"]').val($('input[id$="_numeroDocIdePaciente"]').val());
            } else {
                if ($('select[id$="_idParentescoProporDatos"] option:selected').text() == $('select[id$="_idParentescoResponsable"] option:selected').text()) {
                    $('input[id$="_nombreProporcionoDatos"]').val($('input[id$="_nombreResponsable"]').val());
                    $('select[id$="_idDocProporcionoDatos"]').val($('select[id$="_idDocResponsable"]').val());
                    $('input[id$="_numeroDocIdeProporDatos"]').val($('input[id$="_numeroDocIdeResponsable"]').val());
                }
                else {
                    $('input[id$="_nombreProporcionoDatos"]').val("");
                    $('select[id$="_idDocProporcionoDatos"]').val("");
                    $('input[id$="_numeroDocIdeProporDatos"]').val("");
                }
            }

        }
    });
    /*CARGAR DEPARTAMENTOS NACIMIENTO*/
    $('select[id$="_idPaisNacimiento"]').change(function() {
        $('select[id$="_idDepartamentoNacimiento"]').children().remove();
        $('select[id$="_idDepartamentoNacimiento"]').append('<option value="">Seleccione...</option>');
        if ($('select[id$="_idPaisNacimiento"]').val() == '') {
            $('select[id$="_idDepartamentoNacimiento"]').attr('disabled', 'disabled');

        } else {
            $.getJSON(Routing.generate('get_departamentos') + '?idPais=' + $('select[id$="_idPaisNacimiento"]').val(),
                    function(data) {
                        $.each(data.deptos, function(indice, depto) {
                            $('select[id$="_idDepartamentoNacimiento"]').append('<option value="' + depto.id + '">' + depto.nombre + '</option>');
                        });
                    });
            $('select[id$="_idDepartamentoNacimiento"]').removeAttr('disabled');
        }

    });

    /*CARGAR MUNICIPIOS NACIMIENTO*/
    $('select[id$="_idDepartamentoNacimiento"]').change(function() {
        $('select[id$="_idMunicipioNacimiento"]').children().remove();
        $('select[id$="_idMunicipioNacimiento"]').append('<option value="">Seleccione...</option>');
        if ($('select[id$="_idDepartamentoNacimiento"]').val() == '') {
            $('select[id$="_idMunicipioNacimiento"]').attr('disabled', 'disabled');
        } else {
            $.getJSON(Routing.generate('get_municipios') + '?idDepartamento=' + $('select[id$="_idDepartamentoNacimiento"]').val(),
                    function(data) {
                        $.each(data.municipios, function(indice, munic) {
                            $('select[id$="_idMunicipioNacimiento"]').append('<option value="' + munic.id + '">' + munic.nombre + '</option>');
                        });
                    });
            $('select[id$="_idMunicipioNacimiento"]').removeAttr('disabled');
        }

    });

    /*CARGAR MUNICIPIOS DE DOMICILIO*/
    $('select[id$="_idDepartamentoDomicilio"]').change(function() {
        $('select[id$="_idMunicipioDomicilio"]').children().remove();
        $('select[id$="_idMunicipioDomicilio"]').append('<option value="">Seleccione...</option>');
        if ($('select[id$="_idDepartamentoDomicilio"]').val() == '') {
            $('select[id$="_idMunicipioDomicilio"]').attr('disabled', 'disabled');
        } else {
            $.getJSON(Routing.generate('get_municipios') + '?idDepartamento=' + $('select[id$="_idDepartamentoDomicilio"]').val(),
                    function(data) {
                        $.each(data.municipios, function(indice, munic) {
                            $('select[id$="_idMunicipioDomicilio"]').append('<option value="' + munic.id + '">' + munic.nombre + '</option>');
                        });
                    });
            $('select[id$="_idMunicipioDomicilio"]').removeAttr('disabled');
        }

    });

    /*LIMPIAR CANTONES DE DOMICILIO AL CAMBIAR MUNICIPIO*/
    $('select[id$="_idMunicipioDomicilio"]').change(function() {
        $('select[id$="_areaGeograficaDomicilio"]').val('')
        $('select[id$="_idCantonDomicilio"]').children().remove();
        $('select[id$="_idCantonDomicilio"]').append('<option value="">Seleccione...</option>');
    });

    /*CUANDO CARGA EL MUNICIPIO DE DOMICILIO SI ESTA LLENO*/
    if ($('select[id$="_idDepartamentoNacimiento"]').val() != '') {
        $('select[id$="_idDepartamentoNacimiento"]').removeAttr('disabled');
        valor = $('select[id$="_idMunicipioNacimiento"]').val();
        $('select[id$="_idMunicipioNacimiento"]').children().remove();
        $.getJSON(Routing.generate('get_municipios') + '?idDepartamento=' + $('select[id$="_idDepartamentoNacimiento"]').val(),
                function(data) {
                    $.each(data.municipios, function(indice, munic) {
                        if (valor == munic.id)
                            $('select[id$="_idMunicipioNacimiento"]').append('<option selected="selected" value="' + munic.id + '">' + munic.nombre + '</option>');
                        else
                            $('select[id$="_idMunicipioNacimiento"]').append('<option value="' + munic.id + '">' + munic.nombre + '</option>');
                    });
                });
        $('select[id$="_idMunicipioNacimiento"]').removeAttr('disabled');
    }

    if ($('select[id$="_idDepartamentoDomicilio"]').val() != '') {
        valorDoc = $('select[id$="_idMunicipioDomicilio"]').val();
        $('select[id$="_idMunicipioDomicilio"]').children().remove();
        $.getJSON(Routing.generate('get_municipios') + '?idDepartamento=' + $('select[id$="_idDepartamentoDomicilio"]').val(),
                function(data) {
                    $.each(data.municipios, function(indice, municDoc) {
                        if (valorDoc == municDoc.id)
                            $('select[id$="_idMunicipioDomicilio"]').append('<option selected="selected" value="' + municDoc.id + '">' + municDoc.nombre + '</option>');
                        else
                            $('select[id$="_idMunicipioDomicilio"]').append('<option value="' + municDoc.id + '">' + municDoc.nombre + '</option>');
                    });
                });
        $('select[id$="_idMunicipioDomicilio"]').removeAttr('disabled');
    }

    /*CARGAR CANTONES DE DOMICILIO*/
    $('select[id$="_areaGeograficaDomicilio"]').change(function() {
        $('select[id$="_idCantonDomicilio"]').children().remove();
        $('select[id$="_idCantonDomicilio"]').append('<option value="">Seleccione...</option>');
        if ($('select[id$="_areaGeograficaDomicilio"]').val() != '2') {
            $('select[id$="_idCantonDomicilio"]').attr('disabled', 'disabled');
        } else {
            $.getJSON(Routing.generate('get_cantones') + '?idMunicipio=' + $('select[id$="_idMunicipioDomicilio"]').val(),
                    function(data) {
                        $.each(data.cantones, function(indice, canton) {
                            $('select[id$="_idCantonDomicilio"]').append('<option value="' + canton.id + '">' + canton.nombre + '</option>');
                        });
                    });
            $('select[id$="_idCantonDomicilio"]').removeAttr('disabled');
        }

    });

    //AGREGANDO JSON PARA CARGAR LOS PAISES ALEDAÑOS A EL SALVADOR
    if ($('select[id$="_idDepartamentoDomicilio"]').val() == '') {
        $.getJSON(Routing.generate('get_paises'),
                function(data) {
                    $.each(data.paises, function(indice, aux) {
                        if (aux.id == 68)
                            $('#idPaisDomicilio').append('<option selected="selected" value="' + aux.id + '">' + aux.nombre + '</option>');
                        else
                            $('#idPaisDomicilio').append('<option value="' + aux.id + '">' + aux.nombre + '</option>');
                    });
                });
        $('select[id$="_idDepartamentoDomicilio"]').children().remove();
        $('select[id$="_idDepartamentoDomicilio"]').append('<option value="">Seleccione..</option>');
        $.getJSON(Routing.generate('get_departamentos') + '?idPais=68',
                function(data) {
                    $.each(data.deptos, function(indice, depto) {
                        $('select[id$="_idDepartamentoDomicilio"]').append('<option value="' + depto.id + '">' + depto.nombre + '</option>');
                    });
                });
        $('select[id$="_idDepartamentoDomicilio"]').removeAttr('disabled');
        $('input[id$="_primerApellido"]').focus();
    } else {
        $.getJSON(Routing.generate('get_pais_depto') + '?idDepartamento=' + $('select[id$="_idDepartamentoDomicilio"]').val(),
                function(datos) {
                    $.getJSON(Routing.generate('get_paises'),
                            function(data) {
                                $.each(data.paises, function(indice, aux2) {
                                    if (datos.pais == aux2.id)
                                        $('#idPaisDomicilio').append('<option selected="selected" value="' + aux2.id + '">' + aux2.nombre + '</option>');
                                    else
                                        $('#idPaisDomicilio').append('<option value="' + aux2.id + '">' + aux2.nombre + '</option>');
                                });
                            });
                }
        );
    }
    //AL CAMBIAR EL PAIS DE DOMICILIO QUE CARGUE LOS DEPARTAMENTO DE DOMICILIO.
    $('#idPaisDomicilio').change(function() {
        $('select[id$="_idDepartamentoDomicilio"]').children().remove();
        $('select[id$="_idDepartamentoDomicilio"]').append('<option value="">Seleccione..</option>');
        $('select[id$="_idMunicipioDomicilio"]').children().remove();
        $('select[id$="_idMunicipioDomicilio"]').append('<option value="">Seleccione..</option>');
        $('select[id$="_idMunicipioDomicilio"]').attr('disabled', 'disabled');
        $.getJSON(Routing.generate('get_departamentos') + '?idPais=' + $('#idPaisDomicilio').val(),
                function(data) {
                    $.each(data.deptos, function(indice, depto) {
                        $('select[id$="_idDepartamentoDomicilio"]').append('<option value="' + depto.id + '">' + depto.nombre + '</option>');
                    });
                });
    });

    //PARA CALCULAR LA EDAD DEL PACIENTE
    function calcular_edad() {
        $.getJSON(Routing.generate('edad_paciente') + '?fecha_nacimiento=' + $('input[id$="_fechaNacimiento"]').val(),
                function(data) {
                    $('input[id="edad"]').val(data.edad);
                });
    }


});


