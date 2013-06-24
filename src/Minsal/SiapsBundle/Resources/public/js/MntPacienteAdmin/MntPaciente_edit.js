$(document).ready(function() {
    
    $('#form_paciente').submit(function() {
        $('.deshabilitados').removeAttr('disabled');
    });

    $('.deshabilitados').attr('disabled', 'disabled');
    
    $('i').popover('show');   
    
     /*DESHABILITANDO CAMPOS CUANDO CARGA FORMULARIO*/
   /*  $('select[id$="_idDepartamentoNacimiento"]').attr('disabled', 'disabled');
     $('select[id$="_idMunicipioNacimiento"]').attr('disabled', 'disabled');
     $('select[id$="_idMunicipioDomicilio"]').attr('disabled', 'disabled');
     $('select[id$="_idCantonDomicilio"]').attr('disabled', 'disabled');*/
     
     if ($('input:checkbox[id$="_asegurado"]').is(':checked')){
        $('select[id$="_idAreaCotizacion"]').removeAttr('disabled');
        $('input:checkbox[id$="_cotizante"]').removeAttr('disabled');
        $('input[id$="_numeroAfiliacion"]').removeAttr('disabled');
     }/*else{
        $('select[id$="_idAreaCotizacion"]').attr('disabled', 'disabled');
        $('input:checkbox[id$="_cotizante"]').attr('disabled', 'disabled');
        $('input[id$="_numeroAfiliacion"]').attr('disabled', 'disabled');
     }*/
 
    if ($('select[id$="_idDocPaciente"] option:selected').text() == 'Ninguno') {
        $('input[id$="_numeroDocIdePaciente"]').val('');
        $('input[id$="_numeroDocIdePaciente"]').attr('disabled', 'disabled');
    }
    
    $('.telefono').mask("9999-9999");
    
    $('input[id$="_numeroAfiliacion"]').keyup(function(){
         $(this).val(($(this).val()).replace(/[^\d]/g, ''))
        }     
    );
    
    $('input.limpiar').keyup(function() {
        $(this).val(limpiar_nombres($(this).val()))
    });

    $('.mayuscula').keyup(function() {
        $(this).val($(this).val().toUpperCase())
    });

    $('#edad').focusout(function() {
        if(!(/día/.test($(this).val())) && !(/año/.test($(this).val())) && !(/mes/.test($(this).val()))){
            $(this).val(($(this).val()).replace(/[^\d]/g, ''))
            var regexp = /^[\d]{2,3}$/;
            if(!regexp.test($('#edad').val())) {
                alert("Para hacer el cálculo de la edad debe ingresar un número entero de dos o tres un dígitos");
            }
            else {
                var fecha = new Date();
                var anio = fecha.getFullYear();
                var anio_nacimiento = anio - $(this).val();
                 $('select[id$="_fechaNacimiento_day"]').val('1');
                 $('select[id$="_fechaNacimiento_month"]').val('1');
                 $('select[id$="_fechaNacimiento_year"]').val(anio_nacimiento);
            }
        }
    });

  /*  $('input:submit[value="Actualizar"]').click(function() {
        
        $('select[id$="_idDepartamentoNacimiento"]').removeAttr('disabled');
        $('select[id$="_idMunicipioNacimiento"]').removeAttr('disabled');
        $('select[id$="_idMunicipioDomicilio"]').removeAttr('disabled');
        $('select[id$="_idCantonDomicilio"]').removeAttr('disabled');
        $('select[id$="_idAreaCotizacion"]').removeAttr('disabled');
        $('input:checkbox[id$="_cotizante"]').removeAttr('disabled');
        $('input[id$="_numeroAfiliacion"]').removeAttr('disabled');
    });*/
    
    $('select[id$="_idDocPaciente"]').change(function(){
        $('input[id$="_numeroDocIdePaciente"]').removeAttr('disabled');
        if ($('select[id$="_idDocPaciente"] option:selected').text() == 'DUI') {
            $('input[id$="_numeroDocIdePaciente"]').mask("99999999-9")
        }
        else if ($('select[id$="_idDocPaciente"] option:selected').text() == 'NIT') {
            $('input[id$="_numeroDocIdePaciente"]').mask("9999-999999-999-9")
        }
        else {
            if($('select[id$="_idDocPaciente"] option:selected').text() == 'Ninguno'){
                $('input[id$="_numeroDocIdePaciente"]').val('');
                $('input[id$="_numeroDocIdePaciente"]').attr('disabled', 'disabled');
            }
            else{
                $('input[id$="_numeroDocIdePaciente"]').mask("99999999999999999999")
            }
        }
    })

    $('select[id$="_idDocResponsable"]').change(function(){
        $('input[id$="_numeroDocIdeResponsable"]').removeAttr('disabled');
        if ($('select[id$="_idDocResponsable"] option:selected').text() == 'DUI') {
            $('input[id$="_numeroDocIdeResponsable"]').mask("99999999-9")
        }
        else if ($('select[id$="_idDocResponsable"] option:selected').text() == 'NIT') {
            $('input[id$="_numeroDocIdeResponsable"]').mask("9999-999999-999-9")
        }
        else {
            if($('select[id$="_idDocResponsable"] option:selected').text() == 'Ninguno'){
                $('input[id$="_numeroDocIdeResponsable"]').val('');
                $('input[id$="_numeroDocIdeResponsable"]').attr('disabled', 'disabled');
            }
            else{
                $('input[id$="_numeroDocIdeResponsable"]').mask("99999999999999999999")
            }
        }
    })

    $('select[id$="_idDocProporcionoDatos"]').change(function(){
        $('input[id$="_numeroDocIdeProporDatos"]').removeAttr('disabled');
        if ($('select[id$="_idDocProporcionoDatos"] option:selected').text() == 'DUI') {
            $('input[id$="_numeroDocIdeProporDatos"]').mask("99999999-9")
        }
        else if ($('select[id$="_idDocProporcionoDatos"] option:selected').text() == 'NIT') {
            $('input[id$="_numeroDocIdeProporDatos"]').mask("9999-999999-999-9")
        }
        else {
            if($('select[id$="_idDocProporcionoDatos"] option:selected').text() == 'Ninguno'){
                $('input[id$="_numeroDocIdeProporDatos"]').val('');
                $('input[id$="_numeroDocIdeProporDatos"]').attr('disabled', 'disabled');
            }
            else{
                $('input[id$="_numeroDocIdeProporDatos"]').mask("99999999999999999999")
            }
        }
    })

    $('input:checkbox[id$="_asegurado"]').click(function() {
        if ($('input:checkbox[id$="_asegurado"]').is(':checked')){
            $('select[id$="_idAreaCotizacion"]').removeAttr('disabled');
            $('input:checkbox[id$="_cotizante"]').removeAttr('disabled');
            $('input[id$="_numeroAfiliacion"]').removeAttr('disabled');
        }
        else{
            $('select[id$="_idAreaCotizacion"] option[value=""]').attr('selected',true);
            $('select[id$="_idAreaCotizacion"]').attr('disabled', 'disabled');
            $('input:checkbox[id$="_cotizante"]').attr('disabled', 'disabled');
            $('input:checkbox[id$="_cotizante"]').attr('checked', false);
            $('input[id$="_numeroAfiliacion"]').val('');
            $('input[id$="_numeroAfiliacion"]').attr('disabled', 'disabled');
        }
    });
     
    /*LIMPIAR APELLIDO CASADA SI ES HOMBRE*/
    $('select[id$="_idSexo"]').change(function() {
        if ($('select[id$="_idSexo"]').val() != '1') {
            $('input[id$="_apellidoCasada"]').val('');
        } 
    });
    
    /*LLENAR DATOS PERSONA RESPONSABLE*/
    $('select[id$="_idParentescoResponsable"]').change(function() {
       if ($('select[id$="_idParentescoResponsable"] option:selected').text() == 'Madre') {
            $('input[id$="_nombreResponsable"]').val($('input[id$="_nombreMadre"]').val());
            $('select[id$="_idDocResponsable"]').val("");
            $('input[id$="_numeroDocIdeResponsable"]').val("");
            $('input[id$="_direccionResponsable"]').val("");
            $('input[id$="_telefonoResponsable"]').val("");
            
        }
        else if($('select[id$="_idParentescoResponsable"] option:selected').text() == 'Padre'){
            $('input[id$="_nombreResponsable"]').val($('input[id$="_nombrePadre"]').val());
            $('select[id$="_idDocResponsable"]').val("");
            $('input[id$="_numeroDocIdeResponsable"]').val("");
            $('input[id$="_direccionResponsable"]').val("");
            $('input[id$="_telefonoResponsable"]').val("");
        }
        else{
            if($('select[id$="_idParentescoResponsable"] option:selected').text() == 'Conyuge'){
                $('input[id$="_nombreResponsable"]').val($('input[id$="_nombreConyuge"]').val());
                $('select[id$="_idDocResponsable"]').val("");
                $('input[id$="_numeroDocIdeResponsable"]').val("");
                $('input[id$="_direccionResponsable"]').val("");
                $('input[id$="_telefonoResponsable"]').val("");
            }
            else if($('select[id$="_idParentescoResponsable"] option:selected').text() == 'El paciente'){
                $('input[id$="_nombreResponsable"]').val($('input[id$="_primerNombre"]').val()+' '+$('input[id$="_primerApellido"]').val());
                $('select[id$="_idDocResponsable"]').val($('select[id$="_idDocPaciente"]').val());
                $('input[id$="_numeroDocIdeResponsable"]').val($('input[id$="_numeroDocIdePaciente"]').val());
                $('input[id$="_direccionResponsable"]').val($('input[id$="_direccion"]').val());
                $('input[id$="_telefonoResponsable"]').val($('input[id$="_telefonoCasa"]').val());
            }
            else{
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
        if ($('select[id$="_idParentescoProporDatos"] option:selected').text() == $('select[id$="_idParentescoResponsable"] option:selected').text()) {
            $('input[id$="_nombreProporcionoDatos"]').val($('input[id$="_nombreResponsable"]').val());
            $('select[id$="_idDocProporcionoDatos"]').val($('select[id$="_idDocResponsable"]').val());
            $('input[id$="_numeroDocIdeProporDatos"]').val($('input[id$="_numeroDocIdeResponsable"]').val());
        }
        else if($('select[id$="_idParentescoProporDatos"] option:selected').text() == 'El paciente'){
            $('input[id$="_nombreProporcionoDatos"]').val($('input[id$="_primerNombre"]').val()+' '+$('input[id$="_primerApellido"]').val());
            $('select[id$="_idDocProporcionoDatos"]').val($('select[id$="_idDocPaciente"]').val());
            $('input[id$="_numeroDocIdeProporDatos"]').val($('input[id$="_numeroDocIdePaciente"]').val());
        }
        else{
            $('input[id$="_nombreProporcionoDatos"]').val("");
            $('select[id$="_idDocProporcionoDatos"]').val("");
            $('input[id$="_numeroDocIdeProporDatos"]').val("");
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
    
    /*CARGAR CANTONES DE DOMICILIO*/
    $('select[id$="_areaGeograficaDomicilio"]').change(function() {
        $('select[id$="_idCantonDomicilio"]').children().remove();
        $('select[id$="_idCantonDomicilio"]').append('<option value="">Seleccione...</option>');
        if ($('select[id$="_areaGeograficaDomicilio"]').val() != '2' ) {
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

    /*CALCULAR EDAD*/
    $('select[id$="_fechaNacimiento_year"]').change(function() {
        if($('select[id$="_fechaNacimiento_day"]').val() != '' && $('select[id$="_fechaNacimiento_month"]').val() != '' && $('select[id$="_fechaNacimiento_year"]').val() != ''){
            var fecha_nac=$('select[id$="_fechaNacimiento_day"]').val() + '-' +$('select[id$="_fechaNacimiento_month"]').val() + '-' 
                    + $('select[id$="_fechaNacimiento_year"]').val();
            $.getJSON(Routing.generate('edad_paciente') + '?fecha_nacimiento=' + fecha_nac ,
                    function(data) {
                        $('input[id="edad"]').val(data.edad);
                    });
        }

    });

});


