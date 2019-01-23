/**
 * Created by Niko on 25/05/2016.
 */

/* ======= Metodo que interpreta cual es el id del siguiente elemento para la carga de imagenes =======
 @param element: elemento del DOM quien ejecuta la accion.
 @param id_product: id del producto en base de datos.
 */
function addPhotoThumb(element, id_product, upload, galeria) {
    var name_complete = $('.main-gallery-product').children(':nth-last-child(1)').attr('name');
    var name = name_complete.split('_');

    var old_id_photo = parseInt(name[1]);

    var my_id = $(element).attr('id');
    my_id = my_id.split('_');

    if (name_complete == 'formulario_' + my_id[1]){
        var new_id_photo = old_id_photo + 1;
        modelNewPhoto(new_id_photo, id_product, upload, galeria);
    }

}

/* ======= Metodo que crea un formulario para subir una nueva imagen =======
 @param id_photo: id de la imagen en base de datos.
 @param id_product: id del producto en base de datos.
 */
function modelNewPhoto(id_photo, id_product, upload, galeria){

    var new_photo = '<form name="formulario_'+id_photo+'" id="formulario_'+id_photo+'" enctype="multipart/form-data" class="col-md-4 col-sm-4 col-xs-12 thumb-photo">'+
                    '<input type="hidden" name="status_'+id_photo+'" id="status_'+id_photo+'" value="">'+
                    '<input type="hidden" id="id_product_rel_'+id_photo+'" value="'+galeria+'">'+
                    '<input type="hidden" name="db_id_photo_'+id_photo+'" id="db_id_photo_'+id_photo+'" value="-1">'+
                    '<div class="fileupload fileupload-new" data-provides="fileupload">'+
                    '<div class="fileupload-preview thumbnail form-control"  id="thumb_'+id_photo+'">'+
                    '<img id="img-photo-'+id_photo+'" src="../../uploads/actividades/upload-file.jpg"/>'+
                    '<div class="overflow">'+
                    '<span class=" fileupload btn btn-file btn-alt btn-sm">'+
                    '<input onchange="readUrlProduct(this,'+id_photo+', '+id_product+', `'+upload+'`);" class="input-photo-product" type="file" name="file_'+id_photo+'" class="fileup" id="file_'+id_photo+'"/>'+
                    '<i class="fa fa-upload" aria-hidden="true"></i>'+
                    '</span>'+
                    '<span class="btn btn-file btn-alt btn-sm btn-del" data-dismiss="fileupload" onClick=""><i class="fa fa-trash-o" aria-hidden="true"></i></span>'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '</form>';

    $('.load-photos').append(new_photo);
    $('#formulario_'+id_photo).show('300');
    iconoCarga(0); // Oculta el icono de carga

}

/* ======= Metodo previsualizar una imagen seleccionada antes de ser subida al servidor =======
 @param id_photo: id de la imagen en base de datos.
 @param input: elemento del DOM quien ejecuta la accion.
 @param id_product: id del producto en base de datos.
 */
function readUrlProduct(input, id_photo, id_product, upload) {
    iconoCarga(1); // Muestra el icono de carga
    if(id_product == '-1') {
        alert('No se pueden añadir imagenes a este producto');
    }else{
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-photo-' + id_photo).attr('src', e.target.result);
                savePhotoProduct(id_photo, input, id_product, upload);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
}

/* ======= Metodo para añadir una nueva imagen a la galeria del producto =======
@param id_photo: id de la imagen en base de datos.
@param input: elemento del DOM quien ejecuta la accion.
@param id_product: id del producto en base de datos.
 */

function savePhotoProduct(id_photo, input, id_product, upload){
    var id_gallery = document.getElementById('id_product_rel_' + id_photo).value;
    $.ajax({
        url: "../../"+upload+"/addphoto/"+id_photo+"/"+id_gallery,
        type: 'POST',
        data: new FormData($("#formulario_" + id_photo)[0]),
        processData: false,
        contentType: false,
        success: function (response) {
            $('.btn.btn-file.btn-alt.btn-sm.btn-del', '#formulario_'+id_photo).attr('onclick', 'deletePhoto('+response+', '+id_photo+')');
            addPhotoThumb(input, id_product, upload, id_gallery); 
            updateImages();
        },
        error: function (e) {
            console.log(e);
        }
    });
}

/* ===== Metodo para eliminar una imagen de la galeria ======
@param id_photo: id de la imagen en base de datos.
@param item_delete: numero del contendor padre que debe ser removido del DOM.
 */

function deletePhoto(id_photo, item_delete){
    $.ajax({
        url: "../../actividad/deletePhoto/"+id_photo,
        processData: false,
        contentType: false,
        success: function (response) {
            if(response != '2'){
                $('#formulario_'+item_delete).hide('fast', function(){ $('#formulario_'+item_delete).remove(); });
                updateImages();
            }else{
                console.log('No se pudo eliminar');
            }

        },
        error: function (e) {
            console.log(e);
        }
    });
}



