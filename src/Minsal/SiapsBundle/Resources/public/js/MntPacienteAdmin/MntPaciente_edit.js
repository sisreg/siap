$(document).ready(function() {
    
    $('i').popover('show');   
    
    function limpiar_nombres(text) {

        text = text.replace(/[^a-zA-ZñÑ\s]/g, '');
        
        text = text.toUpperCase();
        return text;
    }

    $('.telefono').mask("9999-9999");
    $('input[id$="_numeroAfiliacion"]').keyup(function(){
         $(this).val(($(this).val()).replace(/[^\d]/g, ''))
        }     
    );

    
    $('a.sonata-ba-action').click(function() {
$('a.sonata-ba-action').hide();
});

    $('input.limpiar').keyup(function() {
        $(this).val(limpiar_nombres($(this).val()))
    });

    $('.mayuscula').keyup(function() {
        $(this).val($(this).val().toUpperCase())
    });

    $('input:checkbox[id$="_asegurado"]').click(function() {
        if ($('input:checkbox[id$="_asegurado"]').is(':checked')){
            $('select[id$="_idAreaCotizacion"]').removeAttr('readOnly');
            $('input:checkbox[id$="_cotizante"]').removeAttr('readOnly');
            $('input[id$="_numeroAfiliacion"]').removeAttr('readOnly');
        }
        else{
            $('select[id$="_idAreaCotizacion"] option[value=""]').attr('selected',true);
            $('select[id$="_idAreaCotizacion"]').attr('readOnly', 'readOnly');
            $('input:checkbox[id$="_cotizante"]').attr('readOnly', true);
            $('input:checkbox[id$="_cotizante"]').attr('checked', false);
            $('input[id$="_numeroAfiliacion"]').val('');
            $('input[id$="_numeroAfiliacion"]').attr('readOnly', 'readOnly');
        }
    });
     
     /*CARGAR DEPARTAMENTOS*/
    $('select[id$="_idPaisNacimiento"]').change(function() {
        $('select[id$="_idDepartamentoNacimiento"]').children().remove();
        $('select[id$="_idDepartamentoNacimiento"]').append('<option value="">Seleccione...</option>');
        if ($('select[id$="_idPaisNacimiento"]').val() == '') {
            $('select[id$="_idDepartamentoNacimiento"]').attr('readOnly', 'readOnly');
            
        } else {
            $.getJSON(Routing.generate('get_departamentos') + '?idPais=' + $('select[id$="_idPaisNacimiento"]').val(),
                    function(data) {
                        $.each(data.deptos, function(indice, depto) {
                            $('select[id$="_idDepartamentoNacimiento"]').append('<option value="' + depto.id + '">' + depto.nombre + '</option>');
                        });
                    });
            $('select[id$="_idDepartamentoNacimiento"]').removeAttr('readOnly');
        }

    });

    /*LIMPIAR APELLIDO CASADA SI ES HOMBRE*/
    $('select[id$="_idSexo"]').change(function() {
        if ($('select[id$="_idSexo"]').val() != '1') {
            $('input[id$="_apellidoCasada"]').val('');
        } 
    });
    
    /*LLENAR DATOS PERSONA PROPORCIONÓ DATOS*/
    $('select[id="persona_dio_datos"]').change(function() {
        if ($('select[id="persona_dio_datos"]').val() == 'paciente') {
            $('input[id$="_nombreProporcionoDatos"]').val($('input[id$="_primerNombre"]').val()+' '+$('input[id$="_primerApellido"]').val());
            $('select[id$="_idDocProporcionoDatos"]').val($('select[id$="_idDocPaciente"]').val());
            $('input[id$="_numeroDocIdeProporDatos"]').val($('input[id$="_numeroDocIdePaciente"]').val());
        }
       /* else if($('select[id="persona_dio_datos"]').val() == 'responsable'){
            
        }
        else{
            
        }*/
    });
    
    /*CARGAR MUNICIPIOS*/
    $('select[id$="_idDepartamentoNacimiento"]').change(function() {
        $('select[id$="_idMunicipioNacimiento"]').children().remove();
        $('select[id$="_idMunicipioNacimiento"]').append('<option value="">Seleccione...</option>');
        if ($('select[id$="_idDepartamentoNacimiento"]').val() == '') {
            $('select[id$="_idMunicipioNacimiento"]').attr('readOnly', 'readOnly');
        } else {
            $.getJSON(Routing.generate('get_municipios') + '?idDepartamento=' + $('select[id$="_idDepartamentoNacimiento"]').val(),
                    function(data) {
                        $.each(data.municipios, function(indice, munic) {
                            $('select[id$="_idMunicipioNacimiento"]').append('<option value="' + munic.id + '">' + munic.nombre + '</option>');
                        });
                    });
            $('select[id$="_idMunicipioNacimiento"]').removeAttr('readOnly');
        }

    });

    /*CARGAR MUNICIPIOS DE DOMICILIO*/
    $('select[id$="_idDepartamentoDomicilio"]').change(function() {
        $('select[id$="_idMunicipioDomicilio"]').children().remove();
        $('select[id$="_idMunicipioDomicilio"]').append('<option value="">Seleccione...</option>');
        if ($('select[id$="_idDepartamentoDomicilio"]').val() == '') {
            $('select[id$="_idMunicipioDomicilio"]').attr('readOnly', 'readOnly');
        } else {
            $.getJSON(Routing.generate('get_municipios') + '?idDepartamento=' + $('select[id$="_idDepartamentoDomicilio"]').val(),
                    function(data) {
                        $.each(data.municipios, function(indice, munic) {
                            $('select[id$="_idMunicipioDomicilio"]').append('<option value="' + munic.id + '">' + munic.nombre + '</option>');
                        });
                    });
            $('select[id$="_idMunicipioDomicilio"]').removeAttr('readOnly');
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
            $('select[id$="_idCantonDomicilio"]').attr('readOnly', 'readOnly');
        } else {
            $.getJSON(Routing.generate('get_cantones') + '?idMunicipio=' + $('select[id$="_idMunicipioDomicilio"]').val(),
                    function(data) {
                        $.each(data.cantones, function(indice, canton) {
                            $('select[id$="_idCantonDomicilio"]').append('<option value="' + canton.id + '">' + canton.nombre + '</option>');
                        });
                    });
            $('select[id$="_idCantonDomicilio"]').removeAttr('readOnly');
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

    function verificar() {
        alert('hola')
    }

    $('.btn btn-primary').click(function(){
       alert('hola') 
    });
});


