/**
 * Created by Niko on 16/05/2016.
 */
var count, old_id, new_id, all_categories;


/* ---------------------------------------------------------------------------
Metodo para cargar las categorias de una categoria padre

@param id_fat: Id del padre del cual se quieren mostrar las categorias.
@param category_name: Nombre de la categoria padre.
@param element: Elemento del DOM desde el cual se ejecuta el evento click.
 --------------------------------------------------------------------------- */
function showCategories(id_fat, category_name, element){
    $.ajax({
        data: {type: '1'},
        url:   '../categorias/obtenerCategorias/'+id_fat,
        type:  'post',
        success:  function (response) {
            response = eval("("+response+")"); // Convierte el JSON en un array de objetos.
            loadChanges(id_fat, category_name, element, response);
        },
        error: function (error) {
            alert(error);
        }
    });

}
/* ------------------- FIN showCategories ------------------ */



/* -----------------------------------------------------------------------------
Metodo para verificar si ya existe un elemento dentro del DOM

@param element: recibe clase o id del elemento del cual se quiere verificar.
 ------------------------------------------------------------------------------- */
function verifyElement(element){
    return $(element).length;
}
/* --------------- FIN verifyElement ------------- */




/*-------------------------------------------------------------------------------------------------------------------------
Metodo para añadir una nueva categoria .

@param id_f: recibe el ID de la categoria padre (a la cual va a partenecer), el valor 0 se asigna a categorias principales.
 ------------------------------------------------------------------------------------------------------------------------- */
function addCategory(id_f){
    var category_f = document.getElementById('category-f-' + id_f).value;
    var category_n = document.getElementById('category-n-' + id_f).value;

    $.ajax({
        data: {type: '1', category_n: category_n, category_f: category_f},
        url:   '../categorias/agregarCategoria',
        type:  'post',
        success:  function (response) {
            var new_button = '<div id="' + response + '"  class="item-category father_'+id_f+'">'+category_n+'' +
                '<div  class="div_click father_'+new_id+'" style="width: 100%; height: 100%;" onclick="showCategories(' + response + ', ' + '\u0027' + category_n + '\u0027' +', this)"></div>'+
               // '<i onclick="showModifyPanel('+ response +')" class="fa fa-pencil edit-category-btn" aria-hidden="true"></i> ' +
                '<i onclick="deleteCategory(' + response + ', '+new_id+');" class="fa fa-trash delete-category" aria-hidden="true"></i>' +
                '</div>';
            $("#content_items_" + id_f).append(new_button);
        }
    });

}


/*-------------------------------------------------------------------------------------------------------------------------
 Metodo para eliminar una categoria .

 @param id_delete: recibe el ID de la categoria que se desea eliminar;
 @param element: recibe el número del contenedor al cual pertenece.
 ------------------------------------------------------------------------------------------------------------------------- */
function deleteCategory(id_delete, element){
    $.ajax({
        url:   '../categorias/eliminarCategoria/'+id_delete,
        type:  'post',
        success:  function (response) {
            if (response == 1){
                $('#'+id_delete).remove();
                $('#modify_'+id_delete).remove();
                count = element + 1;
                removeElements();

            }else{
                alert('No se pudo eliminar la categoria.')
            }
        }
    });
}
/* ------------------------------------- FIN deleteCategory ------------------------------------ */


function modifyCategory(id_category_m){
    var name_category = document.getElementById('modify_new_name_cat_'+id_category_m).value;
    var new_father_cat = document.getElementById('modify_new_cat_'+id_category_m).value;

    $.ajax({
        data: {name_category: name_category},
        url:   '../categorias/modifycategory/'+id_category_m+'/'+new_father_cat,
        type:  'post',
        success:  function (response) {
            console.log('Modificacion exitosa');
        },
        error: function (error) {
            alert(error);
        }
    });
}



/*----------------------------------------------------------------------------------------
Metodo para crear la estructura HTML con las categorias que se mostraran

@param: id_fat: recibe el ID de la categoria padre,
@param: category_name: recibe el nombre de la categoria padre,
@param element: recibe clase o id del elemento del cual se quiere verificar,
@param response: recibe un arreglo de objetos a partir de los cuales se creara la lista.
------------------------------------------------------------------------------------------ */
function loadChanges(id_fat, category_name, element, response){
    old_id = parseInt(element.getAttribute('class').substr(-1));

    new_id = old_id + 1;
    count = old_id + 1;

    removeElements();
    resizeScroll();

    $.ajax({
        data: {type: '1'},
        url:   '../categorias/obtenerCategorias/-1',
        type:  'post',
        success:  function (response_c) {
            response_c = eval("("+response_c+")"); // Convierte el JSON en un array de objetos.

            for(j = 0; j < response_c.length; j++) {
                all_categories = all_categories + '<option value = "' + response_c[j]['id_categoria'] + '">' + response_c[j]['nombre'] + '</option>';
            }

            var append = '<article id="item_category_'+new_id+'" class="content-list-category"><h5 class="dad-category"> '+category_name+'</h5><div id="content_items_'+new_id+'">';

            for(i = 0; i < response.length; i++){
                var nombre = response[i]['nombre'];
                append = append +   '<div id="'+response[i]['id_categoria']+'" " class="item-category father_'+new_id+'">'+response[i]['nombre']+'' +
                    '<div  class="div_click father_'+new_id+'" style="width: 100%; height: 100%;" onclick="showCategories('+response[i]['id_categoria']+', ' + '\u0027' + response[i]['nombre'] + '\u0027' +', this)"></div>'+
                    '<i onclick="showModifyPanel('+response[i]['id_categoria']+')" class="fa fa-pencil edit-category-btn" aria-hidden="true"></i>' +
                    '<i onclick="deleteCategory('+response[i]['id_categoria']+', '+new_id+');" class="fa fa-trash delete-category" aria-hidden="true"></i></div>'+
                    '<div class="modify_cat_content" id="modify_'+response[i]['id_categoria']+'">'+
                    '<select class="modify_cat_fat"  id="modify_new_cat_'+response[i]['id_categoria']+'">'+all_categories+
                    '</select>'+
                    '<input class="modify_cat_name" type="text" value="'+response[i]['nombre']+'" id="modify_new_name_cat_'+response[i]['id_categoria']+'">'+
                    '<i onclick="modifyCategory('+response[i]['id_categoria']+')" class="fa fa-floppy-o" aria-hidden="true"></i>'+
                    '</div>';
            }

            append  =  append + '</div><div><input id="category-f-' +new_id + '" type="hidden" value="' +id_fat + '" name="category-f">'+
                '<input id="category-n-' +new_id + '" type="text" name="category-n" placeholder="Añadir categoria">'+
                '<i onclick="addCategory(' + new_id + ');" class="fa fa-plus" aria-hidden="true"></i></div></article>';

            all_categories = '';
            $('.scroll-items').append(append);

        },
        error: function (error) {
            alert(error);
        }
    });

}
/* --------------------------------------------- FIN loadChanges ------------------------------------------------- */





/* ------------------------------------------------------------------------------------------
Metodo que elimina los contenedores de categorias que hayan sido instanciados anteriormente.
--------------------------------------------------------------------------------------------- */
function removeElements(){
    var elements = true;
    while (elements){
        if (verifyElement("#item_category_"+count)){
            $("#item_category_"+count).remove();
            count++;
        }else{
            elements = false;
        }
    }
}
/* ----------------------------------- FIN removeElements ----------------------------------- */





/* --------------------------------------------------------------------------------------------------------------
 Metodo que verifica cuantos contenedores de categorias existen para modificar el ancho del contenedor (scroll).
 ------------------------------------------------------------------------------------------------------------- */
function resizeScroll(){
    if(old_id == 0){
        var multiplier = 1;
    }else{
        var multiplier = old_id + 1;
    }
    var width_scroll = (250 * multiplier) + 270;
    $('.scroll-items').css('width', width_scroll+'px');
}
/* ---------------------------------------- FIN resizeScroll ----------------------------------------------- */



function showModifyPanel(id_modify){
    $('#modify_'+id_modify).slideToggle();
}

$('.popup-content').click(function (){
    $('.general-popup').slideUp();
    $(this).slideUp();
});

$('#show-category-btn').click(function (){
    $('.general-popup').slideDown();
    $('.popup-content').slideDown();
});