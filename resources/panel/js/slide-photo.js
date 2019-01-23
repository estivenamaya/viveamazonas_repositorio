/**
 * Created by Niko on 27/05/2016.
 */

/* ======= Metodo previsualizar una imagen seleccionada antes de ser subida al servidor =======
 @param id_photo: id de la imagen en base de datos.
 @param input: elemento del DOM quien ejecuta la accion.
 */
function readURLSlide(input, id_photo, id_db) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img-photo-' + id_photo).attr('src', e.target.result);
            savePhotoSlide(input, id_photo);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

/* ======= Metodo para añadir una nueva imagen a la galeria del producto =======
 @param id_photo: id de la imagen en base de datos.
 @param input: elemento del DOM quien ejecuta la accion.
 @param id_product: id del producto en base de datos.
 */

function savePhotoSlide(input, id_photo){
    $.ajax({
        url: "../slide/addphoto/"+id_photo,
        type: 'POST',
        data: new FormData($("#formulario_" + id_photo)[0]),
        processData: false,
        contentType: false,
        success: function (response) {
            $('.btn.btn-file.btn-alt.btn-sm.btn-del', '#formulario_'+id_photo).attr('onclick', 'deletePhotoSlide('+response+' , '+id_photo+')');
            $('#file_' + id_photo, '#formulario_'+id_photo).attr('onchange', 'readURL(this, '+id_photo+', '+response+')');
            addPhotoThumbSlide(input, response);
            updateImages();
        },
        error: function (e) {
            console.log(e.responseText);
        }
    });
}


/* ======= Metodo que interpreta cual es el id del siguiente elemento para la carga de imagenes =======
 @param element: elemento del DOM quien ejecuta la accion.
 @param id_product: id del producto en base de datos.
 */
function addPhotoThumbSlide(element, id_db) {
    var name_complete = jQuery('.load-photos').children(':nth-last-child(1)').attr('id');
    var name = name_complete.split('_');

    var old_id_photo = parseInt(name[1]);

    var my_id = jQuery(element).attr('id');
    my_id = my_id.split('_');

    if (name_complete == 'formulario_' + my_id[1]){
        var new_id_photo = old_id_photo + 1;
        modelNewPhotoSlide(new_id_photo, id_db);
    }

}


/* ======= Metodo que crea un formulario para subir una nueva imagen =======
 @param id_photo: id de la imagen en base de datos.
 @param id_product: id del producto en base de datos.
 */
function modelNewPhotoSlide(id_photo, id_db){
    var new_photo = '<form style="display: none;" name="formulario_'+id_photo+'" id="formulario_'+id_photo+'" enctype="multipart/form-data" class="col-md-4 col-sm-4 col-xs-12 thumb-photo slide-form">'+
        '<input type="hidden" name="db_id_photo_'+id_photo+'" id="db_id_photo_'+id_photo+'" value="-1">'+
    '<div class="fileupload fileupload-new" data-provides="fileupload">'+
    '<div class="fileupload-preview thumbnail form-control"  id="thumb_'+id_photo+'">'+
    '<img id="img-photo-'+id_photo+'" src="../uploads/actividades/upload-file.jpg"/>'+
    '<div class="overflow">'+ 
    '<span class=" fileupload btn btn-file btn-alt btn-sm">'+
    '<input onchange="readURLSlide(this,'+id_photo+', '+id_db+');" class="input-photo-product" type="file" name="file_'+id_photo+'" class="fileup" id="file_'+id_photo+'"/>'+
    '<i class="fa fa-upload" aria-hidden="true"></i>'+
    '</span>'+
    '<span class="btn btn-file btn-alt btn-sm btn-del" data-dismiss="fileupload" onClick="deletePhotoSlide('+ id_db +', '+ id_photo +')"><i class="fa fa-trash-o" aria-hidden="true"></i></span>'+
    '</div>'+
    '</div>'+
           
    '</div>'+
    '</form>';

    $('.load-photos').append(new_photo);
    $('#formulario_'+id_photo).show('300');

}






function modifyTextSlide(id_slide, id_form){
    var principal = document.getElementById('principal_' + id_form).value;
    var secundario = document.getElementById('secundario_' + id_form).value;

    $.ajax({
        url: '../slide/addtext/' + id_slide,
        data: {principal: principal, secundario: secundario},
        type: 'post',
        success: function (response) {
            if (response == 1) {
                alert('Texto modificado correctamente');
            }
        },
        error: function (e) {
            alert(e.responsetext);
        }
    });
}

function deletePhotoSlide(id_db, id_form){
    $.ajax({
        url: "../slide/eliminarPrueba/",
        type: "POST",
        data: {id:id_db},
        success: function (response) {
            console.log(response);
            $('#formulario_'+id_form).hide('fast', function(){ $('#formulario_'+id_form).remove(); });
        },
        error: function (e) {
            console.log(e.responsetext);
        }
    });
}