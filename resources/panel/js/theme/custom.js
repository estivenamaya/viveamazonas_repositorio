/**
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var CURRENT_URL = window.location.href.split('?')[0],
    $BODY = $('body'),
    $MENU_TOGGLE = $('#menu_toggle'),
    $SIDEBAR_MENU = $('#sidebar-menu'),
    $SIDEBAR_FOOTER = $('.sidebar-footer'),
    $LEFT_COL = $('.left_col'),
    $RIGHT_COL = $('.right_col'),
    $NAV_MENU = $('.nav_menu'),
    $FOOTER = $('footer');


// Sidebar
$(document).ready(function() {

    // TODO: This is some kind of easy fix, maybe we can improve this
    var setContentHeight = function () {
        // reset height
        $RIGHT_COL.css('min-height', $(window).height());

        var bodyHeight = $BODY.outerHeight(),
            footerHeight = $BODY.hasClass('footer_fixed') ? 0 : $FOOTER.height(),
            leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
            contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

        // normalize content
        contentHeight -= $NAV_MENU.height() + footerHeight;

        $RIGHT_COL.css('min-height', contentHeight);
    };

    $SIDEBAR_MENU.find('a').on('click', function(ev) {
        var $li = $(this).parent();

        if ($li.is('.active')) {
            $li.removeClass('active');
            $('ul:first', $li).slideUp(function() {
                setContentHeight();
            });
        } else {
            // prevent closing menu if we are on child menu
            if (!$li.parent().is('.child_menu')) {
                $SIDEBAR_MENU.find('li').removeClass('active');
                $SIDEBAR_MENU.find('li ul').slideUp();
            }
            
            $li.addClass('active');

            $('ul:first', $li).slideDown(function() {
                setContentHeight();
            });
        }
    });

    // toggle small or large menu
    $MENU_TOGGLE.on('click', function() {
        if ($BODY.hasClass('nav-md')) {
            $BODY.removeClass('nav-md').addClass('nav-sm');

            if ($SIDEBAR_MENU.find('li').hasClass('active')) {
                $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
            }
        } else {
            $BODY.removeClass('nav-sm').addClass('nav-md');

            if ($SIDEBAR_MENU.find('li').hasClass('active-sm')) {
                $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
            }
        }

        setContentHeight();
    });

    // check active menu
    $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

    $SIDEBAR_MENU.find('a').filter(function () {
        return this.href == CURRENT_URL;
    }).parent('li').addClass('current-page').parents('ul').slideDown(function() {
        setContentHeight();
    }).parent().addClass('active'); 

    // recompute content when resizing
    $(window).smartresize(function(){  
        setContentHeight();
    });

    // fixed sidebar
    if ($.fn.mCustomScrollbar) {
        $('.menu_fixed').mCustomScrollbar({
            autoHideScrollbar: true,
            theme: 'minimal',
            mouseWheel:{ preventDefault: true }
        });
    }
});
// /Sidebar

// Panel toolbox
$(document).ready(function() {
    $('.collapse-link').on('click', function() {
        var $BOX_PANEL = $(this).closest('.x_panel'),
            $ICON = $(this).find('i'),
            $BOX_CONTENT = $BOX_PANEL.find('.x_content');
        
        // fix for some div with hardcoded fix class
        if ($BOX_PANEL.attr('style')) {
            $BOX_CONTENT.slideToggle(200, function(){
                $BOX_PANEL.removeAttr('style');
            });
        } else {
            $BOX_CONTENT.slideToggle(200); 
            $BOX_PANEL.css('height', 'auto');  
        }

        $ICON.toggleClass('fa-chevron-up fa-chevron-down');
    });

    $('.close-link').click(function () {
        var $BOX_PANEL = $(this).closest('.x_panel');

        $BOX_PANEL.remove();
    });
});
// /Panel toolbox

// Tooltip
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });
});
// /Tooltip

// Progressbar
if ($(".progress .progress-bar")[0]) {
    $('.progress .progress-bar').progressbar(); // bootstrap 3
}
// /Progressbar

// Switchery
$(document).ready(function() {
    if ($(".js-switch")[0]) {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function (html) {
            var switchery = new Switchery(html, {
                color: '#26B99A'
            });
        });
    }
});
// /Switchery

// iCheck
$(document).ready(function() {
    if ($("input.flat")[0]) {
        $(document).ready(function () {
            $('input.flat').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
        });
    }
});
// /iCheck

// Table
$('table input').on('ifChecked', function () {
    checkState = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('table input').on('ifUnchecked', function () {
    checkState = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});

var checkState = '';

$('.bulk_action input').on('ifChecked', function () {
    checkState = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('.bulk_action input').on('ifUnchecked', function () {
    checkState = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});
$('.bulk_action input#check-all').on('ifChecked', function () {
    checkState = 'all';
    countChecked();
});
$('.bulk_action input#check-all').on('ifUnchecked', function () {
    checkState = 'none';
    countChecked();
});

function countChecked() {
    if (checkState === 'all') {
        $(".bulk_action input[name='table_records']").iCheck('check');
    }
    if (checkState === 'none') {
        $(".bulk_action input[name='table_records']").iCheck('uncheck');
    }

    var checkCount = $(".bulk_action input[name='table_records']:checked").length;

    if (checkCount) {
        $('.column-title').hide();
        $('.bulk-actions').show();
        $('.action-cnt').html(checkCount + ' Records Selected');
    } else {
        $('.column-title').show();
        $('.bulk-actions').hide();
    }
}

// Accordion
$(document).ready(function() {
    $(".expand").on("click", function () {
        $(this).next().slideToggle(200);
        $expand = $(this).find(">:first-child");

        if ($expand.text() == "+") {
            $expand.text("-");
        } else {
            $expand.text("+");
        }
    });
});

// NProgress
if (typeof NProgress != 'undefined') {
    $(document).ready(function () {
        NProgress.start();
    });

    $(window).load(function () {
        NProgress.done();
    });
}

/**
 * Resize function without multiple trigger
 * 
 * Usage:
 * $(window).smartresize(function(){  
 *     // code here
 * });
 */
(function($,sr){
    // debouncing function from John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function (func, threshold, execAsap) {
      var timeout;

        return function debounced () {
            var obj = this, args = arguments;
            function delayed () {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null; 
            }

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100); 
        };
    };

    // smartresize 
    jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');


/* ========== Metodo para refrezcar las opciones(eliminar, subir archivo) de cada imagen ======== */
function updateImages(){
    var name_complete = $('.load-photos').children(':nth-last-child(1)').attr('id');
    var name = name_complete.split('_');

    var old_id_photo = parseInt(name[1]);
    var i;
    for(i=0; i <= old_id_photo; i++){
        $('.btn.btn-file.btn-alt.btn-sm.btn-del', '#formulario_'+i).css('display', 'initial');
        $('.btn.btn-file.btn-alt.btn-sm.btn-del', '#formulario_'+i).css('top', '33%');
        if (i == old_id_photo){
            $('.btn.btn-file.btn-alt.btn-sm.btn-del', '#formulario_'+ i).css('display', 'none');
        }
    }
}


function deleteOnList(id_product, name_product, table, link){
    if (confirm('¿Seguro que desea eliminar: ' + name_product + '?')) {
        
        var nTr = $("#row_"+id_product)[0];
        var oTable = $('#'+table).dataTable();

        oTable.fnDeleteRow(nTr, function(){
            $.post(link,{id : id_product},
                function(data){
                    respuesta = eval('(' +data+ ')');

                    $().toastmessage('showToast', {text : respuesta.mensaje, position : 'top-center', type : respuesta.estado });

                })
        })
        alert('Se ha eliminado correctamente');
            
    }
}


/*
* ========== Metodo para previsualizar un input de tipo file =================
* @param: input: recibe el elemento input del DOM
* @param: element: recibe el id o clase del elemento donde se visualizara la imagen. ejemplo: (#preview-img - .preview-img)
* */
function previewImage(input, element){
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(element).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


function goToLink(link){
    location.href = link;
}
          

function modifyState(id_product){
    var new_state = document.getElementById('estado-'+id_product).value;
    
    if(confirm('¿Seguro que desea cambiar el estado del producto?')){

        $.ajax({
            data: {id : id_product, estado : new_state},
            url: '../producto/modificarEstado',
            type: 'post',
            success: function(response){
                if (response) {
                    alert('Modificacion exitosa');
                }
            },
            error: function(e){
                alert('Error: ' + e.resultText);
            }
        });

    }

} 

var changesOnColor = 0;

function addNewColor(){
    var color_name_v = $('#color-name').val();
    var color_code_v = $('.colorpicker-alpha').css('background-color');

    $.ajax({
        type: 'post',
        data: {color_name : color_name_v, color_code : color_code_v},
        url: '../../main/agregarColor',
        success: function(response){
            if (response == 1) {
                alert('Color añadido correctamente');
                changesOnColor = 1;
            }else{
                alert('Ha ocurrido un error, por favor intente de nuevo mas tarde.');
            }
        },
        error: function(e){
            console.log(e);
        }
    });
}

function deleteColor(id_color_v){
    $.ajax({ 
        type: 'post',
        data: {id_color : id_color_v},
        url: '../../main/eliminarColor',
        success: function(response){
            if (response == 1) {
                changesOnColor = 1;
                $('#color-' + id_color_v).remove();
            }else{
                alert('Ha ocurrido un error, por favor intente de nuevo mas tarde.');
            }
        },
        error: function(e){
            console.log(e);
        }
    });
}

function changeColor(id_select){
    if ($('#select-color-'+id_select).val() == 'nuevo') {
        $('#color-edit').fadeIn(100);
        $('.popup-content.tranparent-popup').fadeIn(100);
    }

    $('#select-color-show-'+id_select+' i').css('background-color', $('#select-color-'+id_select).val());
}  

function deleteItemColor(id_item_color){
    $.ajax({
        type: 'post',
        data: {id_color_talla : id_item_color},
        url: '../../producto/eliminartallacolor',
        success: function(response){
            console.log(response);
            if (response == 1) {
                $('#item-color-' + id_item_color).remove();
                location.reload();
            }else{
                alert('Ha ocurrido un error, por favor intente de nuevo mas tarde.');
            }
        },
        error: function(e){
            console.log(e);
        }
    });
}

$('.tranparent-popup').on('click', function () {
    $('#color-edit').fadeOut(200);
    if (changesOnColor == 1) {
        location.reload();
    }
});

$('.admin-color').on('click', function () {
    $('#color-edit').fadeIn(200);
    $('.tranparent-popup').fadeIn(200);
});

/**
 * Descripcion: Muestra u oculta el icono de carga en la pantalla
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param: Boolean estado -> Recibe en tipo de dato boolean para definir si se muestra u oculta el icono de carga
 * @return:
 */
    function iconoCarga(estado){
        if (estado) {
            jQuery('.load-image-content').show();
        }
        else{
            jQuery('.load-image-content').hide();
        }
    }
// ================================================================================ //




    function eliminarActividad(id_actividad){
        $.post(base_url + 'actividad/eliminarActividad', { id : id_actividad }, function(response){
            console.log(response);
            respuesta = eval('(' + response + ')');

            if (respuesta['estado']) {
                $('#row_' + id_actividad).remove();
            }

            alert(respuesta['mensaje']);
        });

    }


    function eliminar_PlanActividad(id_planes_actividad){
        alert('HOLA');
            
         $.post(base_url + 'actividad/eliminar_PlanActividad', { id : id_planes_actividad }, function(response){
            console.log(response);
            respuesta = eval('(' + response + ')');

            if (respuesta['estado']) {
                $('#row_' + id_planes_actividad).remove();
            }

            alert(respuesta['mensaje']);
        });

        }

