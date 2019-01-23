/**
 * Created by Niko on 01/06/2016.
 */

function getCity(id_city_element){
    var id_department = jQuery('#departamento').val();
    jQuery.ajax({
        type: 'post',
        data: {idDepartamento : id_department},
        url: site_url + 'main/obtenerMunicipios',
        success: function(response){
            console.log(response);
            jQuery('#' + id_city_element).html(response);
        },
        error: function(e){
            alert(e.resultType);
        }
    });
}

function getCityD(id_city_element){
    var id_department = document.getElementById('departamento').value;
    jQuery.ajax({
        type: 'post',
        data: {idDepartamento : id_department},
        url: '../../main/obtenerMunicipios',
        success: function(response){
            jQuery('#' + id_city_element).html(response);
        },
        error: function(e){
            alert(e.resultType);
        }
    });
}