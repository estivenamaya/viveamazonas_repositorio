// ------------------------------------------------
//  Mobile Menu
// ------------------------------------------------

if ($.isFunction($.fn.slicknav)) {
    {
        $(document).ready(function () {
            $('#idrop').slicknav({prependTo: '#mobile'});
        });
    }
}

// ------------------------------------------------
//  Slider Revolution
// ------------------------------------------------

if ($.isFunction($.fn.revolution)) {
    $(function () {
        jQuery("#slider1").revolution({
            sliderLayout          : "none",
            dottedOverlay         : "none",
            delay                 : 6000,
            navigation            : {
                keyboardNavigation   : "off",
                keyboard_direction   : "horizontal",
                mouseScrollNavigation: "off",
                mouseScrollReverse   : "default",
                onHoverStop          : "off",
                arrows               : {
                    enable: true
                },
                touch                : {
                    touchenabled       : "on",
                    swipe_threshold    : 75,
                    swipe_min_touches  : 1,
                    swipe_direction    : "horizontal",
                    drag_block_vertical: false
                }
                ,
                bullets              : {
                    enable           : true,
                    hide_onmobile    : true,
                    hide_under       : 600,
                    style            : "hermes",
                    hide_onleave     : true,
                    hide_delay       : 200,
                    hide_delay_mobile: 1200,
                    direction        : "horizontal",
                    h_align          : "center",
                    v_align          : "bottom",
                    h_offset         : 0,
                    v_offset         : 30,
                    space            : 5,
                    tmp              : ''
                }
            },
            responsiveLevels      : [1240, 1024, 778, 480],
            visibilityLevels      : [1240, 1024, 778, 480],
            gridwidth             : [1240, 1024, 778, 480],
            gridheight            : [700, 600, 500, 400],
            lazyLoad              : "on",
            parallax              : {
                type  : "scroll",
                origo : "enterpoint",
                speed : 400,
                levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 25, 47, 48, 49, 50, 51, 55],
                type  : "scroll"
            },
            shadow                : 0,
            spinner               : "off",
            stopLoop              : "off",
            stopAfterLoops        : -1,
            stopAtSlide           : -1,
            shuffle               : "off",
            autoHeight            : "off",
            hideThumbsOnMobile    : "off",
            hideSliderAtLimit     : 0,
            hideCaptionAtLimit    : 0,
            hideAllCaptionAtLilmit: 0,
            debugMode             : false,
            fallbacks             : {
                simplifyAll           : "off",
                nextSlideOnWindowFocus: "off",
                disableFocusListener  : false
            }
        });
    });
    $(function () {
        jQuery("#slider2").revolution({
            sliderType  : "standard",
            sliderLayout: "auto",
            delay       : 8000,
            navigation  : {
                arrows: {enable: true}
            },
            lazyLoad    : "on",
            gridwidth   : 767,
            gridheight  : 400
        });
    });
}


// ------------------------------------------------
//  Owl Carousel v2
// ------------------------------------------------

if ($.isFunction($.fn.owlCarousel)) {
    $('.owl-testimonios').owlCarousel({
        margin: 20,
        items : 1,
        nav   : false,
        dots  : true
    });
}
// ------------------------------------------------
//  Dense Retina Display
// ------------------------------------------------

if ($.isFunction($.fn.dense)) {
    $('.img-retina').dense();
}

// ------------------------------------------------
//  Bootstrap Select
// ------------------------------------------------

if ($.isFunction($.fn.selectpicker)) {
    $('.selectpicker').selectpicker({
        style: 'btn-custom'
    });
}

// ------------------------------------------------
//  Parallax
// ------------------------------------------------

if ($.isFunction($.fn.parallax)) {
    $(document).ready(function () {
        $('.parallax').parallax();
    });
}

// ------------------------------------------------
//  Masonry Grids
// ------------------------------------------------

if ($.isFunction($.fn.masonry)) {
    $('#grid_ms').masonry({
        // options
        itemSelector: '.grid-item'
    });
}

// ------------------------------------------------
//  Qty Products add
// ------------------------------------------------

$(".ddd").on("click", function () {

    var $button = $(this),
        $input = $button.closest('.sp-quantity').find("input.quntity-input");
    var oldValue = $input.val(),
        newVal;

    if ($.trim($button.text()) == "+") {
        newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 1) {
            newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 1;
        }
    }
    $input.val(newVal);
});


// ------------------------------------------------
//  Checkout Wizard
// ------------------------------------------------

if ($.isFunction($.fn.formalize)) {
    $(document).ready(function () {
        $('#checkout').formalize({
            timing      : 300,
            nextCallBack: function () {
                if (validateEmpty($('#checkout .open'))) {
                    scrollToNewSection($('#checkout .open'));
                    return true;
                }
                ;
                return false;
            },
            prevCallBack: function () {
                return scrollToNewSection($('#checkout .open').prev())
            }
        });
        $('#global').formalize({
            navType     : 'global',
            prevNav     : '#global-nav-prev',
            nextNav     : '#global-nav-next',
            timing      : 300,
            nextCallBack: function () {
                return validateEmpty($('#global .open'));
            }
        });

        $('#btn-global').on('click', function () {
            $('#btn-checkout').removeClass('disabled');
            $(this).addClass('disabled');
            $('#sectional').hide();
            $('#global').show();
        });

        $('#btn-checkout').on('click', function () {
            $('#btn-global').removeClass('disabled');
            $(this).addClass('disabled');
            $('#global').hide();
            $('#sectional').show();
        });

        $('input').on('keyup change', function () {
            $(this).closest($('.valid')).removeClass('valid');
        });

        function validateEmpty(section) {
            var errors = 0;
            section.find($('.required-field')).each(function () {
                var $this = $(this),
                    input = $this.find($('input'));
                if (input.val() === "") {
                    errors++;
                    $this.addClass('field-error');
                    $this.append('\<div class="form-error-msg">This field is required!\</div>');
                }
            });
            if (errors > 0) {
                section.removeClass('valid');
                return false;
            }
            section.find($('.field-error')).each(function () {
                $(this).removeClass('field-error');
            });
            section.find($('.form-error-msg')).each(function () {
                $(this).remove();
            });
            section.addClass('valid');
            return true;
        }

        function scrollToNewSection(section) {
            var top = section.offset().top;
            $("html, body").animate({
                scrollTop: top
            }, '200');
            return true;
        }
    });
}

/**
 * Descripcion: Inicia sesion en el sitio
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
    function login(){
        var email = jQuery('#email_login').val();
        var password = jQuery('#password_login').val();

        if (email != '' && password != '') {
            $.post(site_url + 'cliente/ingresar',{usuario : email, pass: password},
                function(data){
                    if (data == 'success') {
                        jQuery("#user-menu").load(location.href + " #user-menu");
                        jQuery("#confirmar-orden").load(location.href + " #confirmar-orden");
                        jQuery('.modal.fade.login-modal-sm').slideUp();
                        jQuery('.modal-backdrop.fade').fadeOut();
                        jQuery('#login-error').html('');
                        jQuery('body').removeClass('modal-open');
                    }else{
                        jQuery('#login-error').html(data);
                    }
                }
            )
        }
        else{
            jQuery('#login-error').html('Error, Por favor llene todos los datos');
        }
    }
// ================================================================================ //

/**
 * Descripcion: Registro de un nuevo usuario
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
  function registro(){
    var email = jQuery('#email_registro').val();
    var password = jQuery('#password_registro').val();
    var r_password = jQuery('#rpassword_registro').val();
    var apellidos = jQuery('#apellidos_registro').val();
    var nombres = jQuery('#nombre_registro').val();
    var igree = jQuery('#igree').prop('checked');

    if (email != '' && password != '' && r_password != '' && apellidos != '' && nombres != '') {
        if(igree){
            //Verica que no exista un usuario con el mismo email
            $.post(site_url + 'cliente/validarNombreUsuario',{usuario : email},
                function(data){
                    if (data == 1) {
                        if (password == r_password && password != '') {
                            //Envia los datos principales para ser registrados
                            $.post(site_url + 'cliente/agregar',{usuario : email, contrasenia : password, apellido : apellidos, nombre : nombres},
                                function(data){
                                    if (data == 'success') {
                                        jQuery("#user-menu").load(location.href + " #user-menu");
                                        jQuery('.modal.fade.registro-modal-sm').slideUp();
                                        jQuery('.modal-backdrop.fade').fadeOut();
                                        jQuery('#registro-error').html('');
                                        jQuery('body').removeClass('modal-open');
                                    }else{
                                        jQuery('#registro-error').html('Ha ocurrido un error');
                                    }
                                }
                            )
                        }else{
                            jQuery('#registro-error').html('Error, las contraseñas no coinciden');
                        }
                    }else{
                        jQuery('#registro-error').html('Error, el usuario ya se encuentra registrado');
                    }
                }
            )
        }
        else{
            jQuery('#registro-error').html('Por favor acepte los terminos y condiciones');
        }
    }
    else{
        jQuery('#registro-error').html('Error, Por favor llene todos los datos');
    }

  }
// ================================================================================ //

/**
 * Descripcion: Modifica la informacion de un cliente
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
    function modificarCliente(){
        var formulario = jQuery('#formulario-editar').serialize();
        $.post(site_url + 'cliente/modificar',{form : formulario},
            function(data){
                if (data == 1) {
                    jQuery("#datos-personales").load(location.href + " #datos-personales");
                    jQuery('#response-form').html('<p style="color:#fff; padding:3px 10px;" class="label-success">Modificacion exitosa, los cambios se veran reflejados cuando vuelva a iniciar sesion</p>');
                }
                else{
                    jQuery('#response-form').html('<p style="color:#fff; padding:3px 10px;" class="label-danger">'+data+'</p>');
                }
            }
        )
    }
// ================================================================================ //

/**
 * Descripcion: Agrega una nueva actividad al carrito de compras
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
    function agregarActividad(actividad, tipo, nombre, precio){
        $.post(site_url + 'main/carrito',{id_actividad : actividad, tipo_compra : 1},
            function(data){
                jQuery("#paquete").load(location.href + " #paquete");
                jQuery("#user-menu").load(location.href + " #user-menu");
                jQuery('.titulo-producto-checkout').html(nombre);
                jQuery('.precio-producto-checkout').html(precio);
                slideDownDom('#checkout-modal');
                jQuery('body').addClass('modal-open');
            }
        )
    }
// ================================================================================ //

/**
 * Descripcion: Agrega un nuevo paquete al carrito de compras
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
    function agregarPaquete(paquete, actividad, nombre, precio){
        $.post(site_url + 'main/carrito',{id_actividad : actividad, tipo_compra : 0, id_paquete : paquete},
            function(data){
                jQuery("#paquete").load(location.href + " #paquete");
                jQuery("#user-menu").load(location.href + " #user-menu");
                if (data == 1) {
                    jQuery('.titulo-producto-checkout').html(nombre);
                    jQuery('.precio-producto-checkout').html(precio);
                    slideDownDom('#checkout-modal');
                    jQuery('body').addClass('modal-open');
                }
                else{
                    jQuery('.titulo-producto-checkout').html(nombre);
                    jQuery('.precio-producto-checkout').html(precio);
                    slideDownDom('#checkout-modal-error');
                    jQuery('body').addClass('modal-open');
                }
            }
        )
    }
// ================================================================================ //

/**
 * Descripcion:
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
    function number_format (number, decimals, dec_point, thousands_sep) {
      number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
      var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof dec_point === 'undefined') ? ',' : dec_point,
        dec = (typeof thousands_sep === 'undefined') ? '.' : thousands_sep,
        s = '',
        toFixedFix = function (n, prec) {
          var k = Math.pow(10, prec);
          return '' + Math.round(n * k) / k;
        };
      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
      if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, dec);
      }
      if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
      }
      return s.join(sep);
    }
// ================================================================================ //

/**
 * Descripcion: Confirma la orden de un pedido
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param: 
 * @return:
 */
    function confirmarOrden(elemento){
        $.post(site_url + 'cliente/comprobarsesion',{},
            function(data){
                if (data == 1) {
                    jQuery('#formulario-pago').submit();
                    // var pago = jQuery('input[type="radio"][name="tipo_pago"]:checked').val();

                    // $.post(site_url + 'actividad/compra',{tipo_pago : pago},
                    //     function(data){
                    //         console.log(data);
                    //         if (data == '1') {
                    //             alert('Exito');
                    //         }
                    //         else{
                    //             alert('Error');
                    //         }
                    //     }
                    // )
                }else{
                    alert('no');
                }
            }
        )
    }
// ================================================================================ //

/**
 * Descripcion: Elimina un articulo de la lista de carrito
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
    function eliminarArticulo(actividad, paquete, id_tipo){
        $.post(site_url + 'actividad/eliminarArticulo',{id_actividad : actividad, id_paquete : paquete, tipo : id_tipo},
            function(data){
                location.reload();
            }
        )
    }
// ================================================================================ //

/**
 * Descripcion: Crea el efecto slideDown sobre un elemento
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param: String elemento -> Recibe el identificador o clase del elemento que se desea mostrar
 * @return:
 */
    function slideDownDom(elemento){
        jQuery(elemento).slideDown();
    }
// ================================================================================ //

/**
 * Descripcion: Crea el efecto slideUp sobre un elemento
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param: String elemento -> Recibe el identificador o clase del elemento que se desea ocultar
 * @return:
 */
    function slideUpDom(elemento){
        jQuery(elemento).slideUp();
        jQuery('body').removeClass('modal-open');
    }
// ================================================================================ //

/**
 * Descripcion: Agrega o elimina un articulode la lista de favoritos
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param: Int id_articulo -> Recibe el identificador del articulo que se desea agregar o eliminar
 * @param: String tipo -> Recibe el tipo de articulo (Actividad, Destino)
 * @return:
 */
    function establecerLike(id_articulo, tipo){
        $.post(site_url + 'cliente/establecerlike/' + id_articulo + '/' + tipo,{},
            function(data){
                if (data == '1') {
                    if (jQuery('#like-actividad-' + id_articulo).hasClass('like')) {
                        jQuery('#like-actividad-' + id_articulo).removeClass('like');
                    }
                    else{
                        jQuery('#like-actividad-' + id_articulo).addClass('like');
                    }
                    jQuery("#likes").load(location.href + " #likes");
                }
            }
        )
    }
// ================================================================================ //
/**
 * Descripcion: Agrega un nuevo comentario a una actividad
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param: Int $id_actividad -> Recibe el identificador de la actividad
 * @return:
 */
    function agregarComentario(id_actividad){
        var comentario_actividad = jQuery('#contenido-comentario').val();
        var calificacion_actividad = jQuery('#calificacion-comentario').val();
        $.post(site_url + 'comentario/agregarComentario/' + id_actividad,{comentario : comentario_actividad, calificacion : calificacion_actividad},
            function(data){
                if (data == '1') {
                    jQuery('#contenido-comentario').val('');
                    jQuery("#comentarios-actividad").load(location.href + " #comentarios-actividad");
                }
                else{
                    jQuery('#response-error').html('<p style="color:#fff; padding:3px 10px; margin-top: 10px; text-align: left;" class="label-warning">No se ha podido añadir el comentario</p>');
                }
            }
        )
    }
// ================================================================================ //

/**
 * Descripcion: Elimina un comentario
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param: Int id_comentario -> recibe el identificador del comentario
 * @param: Int id_usuario -> Recibe el identificador del usuario
 * @return:
 */
    function eliminarComentario(id_comentario, id_usuario){
        $.post(site_url + 'comentario/eliminarComentario/' + id_comentario,{usuario : id_usuario},
            function(data){
                if (data == '1') {
                    jQuery('#comentario-' + id_comentario).remove();
                }
            }
        )
    }
// ================================================================================ //

/**
 * Descripcion: Calcula la calificacion para el comentario
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param: Int calificacion -> Recibe el numero con la calificacion del comentario
 * @return:
 */
    function calificar(calificacion){
        jQuery('.calificacion-estrella').removeClass('check-estrella');
        for (var i = 1; i <= calificacion; i++) {
            jQuery('#calificacion-estrella-' + i).addClass('check-estrella');
            jQuery("#calificacion_actividad").load(location.href + " #calificacion_actividad");
        }
        jQuery('#calificacion-comentario').val(calificacion);
    }
// ================================================================================ //

/**
 * Descripcion: Valida que exista un usuario y posterior a esto genera una nueva contraseña
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
    function recordarContrasenia(){
        var email_usuario = jQuery('#email-form').val();
        if (email_usuario.trim() != ''){
            $.post(site_url + 'cliente/recordarContrasenia',{email : email_usuario},
                function(data){
                    var response = data.split(',');
                    if (response[1].trim() == '1') {
                        jQuery('#email-form').val('');
                        jQuery('#response-form').html('<p style="color:#fff; padding:3px 10px;" class="label-success">'+response[0]+'</p>');
                    }
                    else{
                        jQuery('#response-form').html('<p style="color:#fff; padding:3px 10px;" class="label-danger">'+response[0]+'</p>');
                    }
                }
            )
        }
    }
// ================================================================================ //

/**
 * Descripcion: Agrega un nuevo suscriptor
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
    function agregarSuscriptor(){
        var email_usuario = jQuery('#email-suscripcion').val();
        if (email_usuario.trim() != ''){
            $.post(site_url + 'cliente/agregarSuscriptor',{email : email_usuario},
                function(data){
                    jQuery('#email-suscripcion').val('');
                    jQuery('#respues-suscripcion').html(data);
                }
            )
        }
    }
// ================================================================================ //

/**
 * Descripcion: Cambia el idioma del sitio
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
    function cambiarIdioma(id_lenguaje){
        $.post(site_url + 'main/cambiarIdioma',{idioma : id_lenguaje},
            function(data){
                location.reload();
            }
        )
    }
// ================================================================================ //

/**
 * Descripcion: Cambia la moneda del sitio
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
    function cambiarMoneda(id_moneda){
        $.post(site_url + 'main/cambiarMoneda',{moneda : id_moneda},
            function(data){
                location.reload();
            }
        )
    }
// ================================================================================ //

