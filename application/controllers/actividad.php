<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividad extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('actividades');
		$this->load->model('galerias');
		$this->load->model('categoria');
		$this->load->model('imagenes');
		$this->load->model('carrito');
		$this->load->model('pedidos');
		$this->load->model('lenguajes');
		$this->load->model('contenidos');
		$this->load->model('usuarios');
		$this->load->model('comentarios');

		if (isset($this->session->userdata('userdata')['idioma'])) {
			$this->lenguaje = $this->session->userdata('userdata')['idioma'];
			if ($this->session->userdata('userdata')['idioma'] == 1){
				$this->lang->load('header', 'spanish');
				$this->lang->load('index', 'spanish');
				$this->lang->load('activity', 'spanish');
				$this->lang->load('footer', 'spanish');
			}
			else{
				$this->lang->load('header', 'english');
				$this->lang->load('index', 'english');
				$this->lang->load('activity', 'english');
				$this->lang->load('footer', 'english');
			}
			
		}
		else{
			$this->lenguaje = 1;
			$this->lang->load('header', 'spanish');
			$this->lang->load('index', 'spanish');
			$this->lang->load('activity', 'spanish');
			$this->lang->load('footer', 'spanish');
		}

	}
/////////////////////////////////////////////////////////////////////////////////////////////////
	function modificarEstado(){

		if( $this->session->userdata('id_usuario') ){

			if ($this->input->post('id')) {
				
				$data['estado'] = $this->input->post('estado');

				if ($this->actividades->modificarEstado($this->input->post('id'), $data)){

					echo 1;

				}else{

					echo 0;

				}

				

			}else{
				echo 0;
			}

		}else{

			redirect('panel');

		}

	}


	function agregar()
	{
		
		if( $this->session->userdata('id_usuario') ) 
		{

				$galeria['tipo']= 'actividades';
				$id_galeria = $this -> galerias -> agregarGaleria($galeria);
				
				$producto['nombre'] = 'Nuevo producto';
				$producto['id_galeria'] = $id_galeria;
				$producto['fecha_creacion'] = date("Y-m-d");
				$id_producto = $this -> actividades-> agregarProducto($producto);
				redirect('producto/editar/'.$id_producto);


		}
		else{ 
	
			 redirect('panel');
		}
	}

	function eliminarActividad(){
		if ($this->session->userdata('id_usuario')) {
			$id = $this->input->post('id');
			$data['estado_actividades'] = 'Inactivo';
			if ($this->actividades->modificarEstado($id, $data)){
				$respuesta['estado'] = true;
				$respuesta['mensaje'] = 'Actividad eliminada correctamente';
			}
			else{
				$respuesta['estado'] = false;
				$respuesta['mensaje'] = 'Hubo un error al intentar eliminar la actividad, por favor intente de nuevo más tarde';
			}

			echo json_encode($respuesta);
		}
	}


	function eliminar_PlanActividad(){
		if ($this->session->userdata('id_usuario')) {
			$id = $this->input->post('id');
			$data['estado_planes_actividad'] = 'Inactivo';
			if ($this->actividad->modificarEstado_PlanActividad($id, $data)){
				$respuesta['estado'] = true;
				$respuesta['mensaje'] = 'Plan de la actividad eliminado correctamente';
			}
			else{
				$respuesta['estado'] = false;
				$respuesta['mensaje'] = 'Hubo un error al intentar eliminar la actividad, por favor intente de nuevo más tarde';
			}

			echo json_encode($respuesta);
		}
	}


	function llamarOferta(){

		$this->load->view('Oferta');
	}

	/**
	* @author Estiven Amaya
	*  Esta es para eliminar las actividades cuando ya estan dentro de un paquete
	*
	*/


	function eliminarTallaColor(){
		if ($this->session->userdata('id_usuario')) {
			if ($this->input->post('id_color_talla')) {
				if ($this->actividades->eliminarTallaColor($this->input->post('id_color_talla'))) {
					echo 1;
				}else{
					echo 0;
				}
			}
		}else{
			redirect('panel');
		}
	}


	/**
	 * Añade una nueva caracteristica de color y talla a un producto
	 * 
	 * @param int ($id_producto)
	 *
	 **/
	// function agregarTallaColor($id_producto){
		
	// 	if ($this->session->userdata('id_usuario')) {
	// 		if ($this->input->post('post')) {
	// 			$img_type = '';
	// 			for ($i=0; $i < 6; $i++) { 
	// 				$info = $this->input->post('info-'.$i);
					
	// 				if ($info['id_pc'] == '-1') {
	// 					$last = $this->actividades->obtenerUltimoTallaColor();
						
	// 					$info['id_pc'] = $last[0]['id_producto_color'] + 1;

	// 				}

	// 				if ($id_producto == '-1') {
	// 					$last = $this->actividades->obtenerUltimoProducto();
						
	// 					$id_producto = $last[0]['id_producto'] + 1;

	// 				}
										
	// 				/* Upload file */
	// 				if (isset($_FILES['userfile-'.$i]) && $info['color'] != '0' && !empty($_FILES['userfile-'.$i]['name'])){
	// 					//Comprobamos si el fichero es una imagen
	// 					if ($_FILES['userfile-'.$i]['type']=='image/png' || $_FILES['userfile-'.$i]['type']=='image/jpeg'){
	// 						//Subimos el fichero al servidor
	// 						$img_type = str_replace('image/', '', $_FILES['userfile-'.$i]['type']);
	// 						$dir =  './uploads/actividades/'.$id_producto.'/color';
	// 						if(!file_exists($dir)){
	// 							mkdir($dir, 0755, true);
	// 						}
	// 						if(move_uploaded_file($_FILES['userfile-'.$i]["tmp_name"], $dir."/".$info['id_pc'].'.'.$img_type)){
	// 							$data['imagen_pc'] = $info['id_pc'].'.'.$img_type;
	// 							$dir = './uploads/actividades/'.$id_producto.'/color/';

	// 							$this->uploadThumbs($info['id_pc'].'.'.$img_type, $img_type, $id_producto, $dir);

	// 						}
	// 					}
	// 				}

	// 				$talla_g = ''; 

	// 				if (!empty($info['talla'])) {   
	// 					$j = 1;
	// 					foreach ($info['talla'] as $talla){
	// 						if ($j == count($info['talla'])){
	// 							$talla_g .= $talla;
	// 						}else{
	// 							$talla_g .= $talla.',';
	// 						}
	// 						$j++;
	// 					}	
	// 				}

	// 				$data['id_producto_color'] = $info['id_pc'];
	// 				$data['id_producto_pc'] = $id_producto;
	// 				$data['color_pc'] = $info['color'];
	// 				$data['talla_pc'] = $talla_g;
	// 				$data['cantidad_pc'] = $info['cantidad_pc'];
					

	// 				if ($this->actividades->obtenerTallaColor($info['id_pc'], 'id_producto_color') ) {
	// 					if ($info['color'] != 'nuevo' && $info['color'] != '0') {
	// 						$this->actividades->modificarTallaColor($info['id_pc'], $data);
	// 					}				
	// 				}else{

	// 					if (!empty($info['color']) && $info['color'] != '0') {
	// 						$this->actividades->agregarTallaColor($data);
	// 					}		
	// 				}

	// 			}

	// 			redirect('producto/lista');
	// 		}
	// 	}else{
	// 		redirect('panel');
	// 	}
	// }


/////////////////////////////////////////////////////////////////////////////////////////////////
	/**
	 * Descripcion: Carga la informacion de una actividad en especifico
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_actividad -> Recibe el identificador de la actividad que se desea obtener
	 * @return: View
	 */
		function ver($id_actividad){
			$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
			$data['paquetes'] = $this->actividades->paquetesActividad($id_actividad, $this->lenguaje);
			$data['actividad'] = $this->actividades->obtenerActividad($id_actividad, $this->lenguaje);
			$data['contenidos_footer'] = $this->contenidos->listarContenidos();
			
			if (isset($this->session->userdata('userdata')['id_usuario'])) {
				$data['likes'] = $this->usuarios->obtenerLikesUsuario($this->session->userdata('userdata')['id_usuario'], '-1');
			}
			else{
				$data['likes'] = 0;
			}

			$data['comentarios'] = $this->comentarios->obtenerComentariosActividad($id_actividad);
			$data['actividad'][0]['imagenes'] = $this->imagenes->listarImagenes($data['actividad'][0]['id_galeria']);
			$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
			$this->load->view('site/producto', $data);
		
		}
	// ================================================================================ //
	/**
	 * Descripcion: Muestra una lista con todas las actividades disponibles
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: 
	 * @return: View
	 */
		function todas(){
			$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
			$data['actividades'] = $this->actividades->listarActividades('activas');
			$data['contenidos_footer'] = $this->contenidos->listarContenidos();
			$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
			
			if (isset($this->session->userdata('userdata')['id_usuario'])) {
			$data['likes'] = $this->usuarios->obtenerLikesUsuario($this->session->userdata('userdata')['id_usuario'], '-1');
			}
			else{
				$data['likes'] = 0;
			}

			if ($data['actividades'] != 0) {
				for ($i=0; $i < count($data['actividades']); $i++) { 
					$data['actividades'][$i]['imagenes'] = $this->imagenes->listarImagenes($data['actividades'][$i]['id_galeria']);
				}
			}
			$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
			$this->load->view('site/productos', $data);
		}
	// ================================================================================ //
	/**
	 * Descripcion: Modifica o agrega una nueva actividad al registro del sistema
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_actividad -> Recibe el identificador de la actividad que se desea modificar (-1 si es un nuevo registro)
	 * @return: View
	 */
		function modificar($id_actividad){
			if( $this->session->userdata('id_usuario')){
				$data['actividad'] = $this->actividades->obtenerActividad($id_actividad, '-1');
				$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
				if ($data['actividad'] != 0) {
					$data['imagenes'] = $this->imagenes->listarImagenes($data['actividad'][0]['id_galeria']);
				}
				if ($this->input->post()) {
					$info = $this->input->post();

					if ($data['actividad'] != 0) {
						foreach ($info as $actividad) {
							$actividad_temp = $this->actividades->obtenerActividad($id_actividad, $actividad['id_lenguaje']);
							if ($actividad_temp == 0 && !empty($actividad['titulo_actividades'])) {
								$actividad['id_actividad'] = $id_actividad;
								$actividad['id_actividades'] = 'null';
								$this->actividades->agregarActividad($actividad);
							}else{
								$this->actividades->modificarActividad($id_actividad, $actividad['id_lenguaje'], $actividad);
							}
							
						}
					}else{
						$ultima_actividad = $this->actividades->obtenerUltimaActividad(); //Se obtiene la ultima actividad para continuar con un orden numerico

						if ($ultima_actividad == 0) {
							$ultima_actividad['id_actividad'] = 0;
						}

						// Datos de la nueva galeria =======================
							$galeria['id_galerias'] = 'null';
							$galeria['tipo_galerias'] = 'Actividad';
							$id_galeria = $this->galerias->agregarGaleria($galeria);
						// ==================================================

						foreach ($info as $actividad) { // Recorre cada informacion de la actividad segun el idioma para ser registrada
							$actividad['id_actividad'] = $ultima_actividad['id_actividad'] + 1;
							$actividad['id_actividades'] = 'null';
							$actividad['id_galeria'] = $id_galeria;
							if (!empty($actividad['titulo_actividades'])) {
								$this->actividades->agregarActividad($actividad); // Agrega la nueva actividad
							}
						}

						$id_actividad = $ultima_actividad['id_actividad'] + 1;
					}

					redirect('actividad/modificar/'.$id_actividad);
				}
				$data['id_actividad'] = $id_actividad;
				
				$this->load->view('panel/editar_actividad', $data);
			}
			else{
				 redirect('panel');
			}
		}
	// ================================================================================ //

	/**
	 * Descripcion: Lista todos los paquetes disponibles para una actividad
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_paquete -> Recibe el identificador de la actividad para obtener sus paquetes
	 * @return: View
	 */
		function paquetes($id_actividad){
			if($this->session->userdata('id_usuario')){
				$data['paquetes'] = $this->actividades->paquetesActividad($id_actividad, '-1');
				$data['actividad'] = $this->actividades->obtenerActividad($id_actividad, 1);
				$data['id_actividad'] = $id_actividad;
				$this->load->view('panel/lista_paquetes', $data);
			}
			else{
				redirect('panel');
			}
		}
	// ================================================================================ //

	/**
	 * Descripcion: Modifica o agrega un paquete al sistema
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_actividad -> Recibe el identificador de la actividad a la cual pertencese el paquete
	 * @param: Int $id_paquete -> Recibe el dientificador del paquete que se desea modificar (-1 si es nuevo)
	 * @return: Boolean
	 */
		function modificarPaquete($id_actividad, $id_paquete){
			if($this->session->userdata('id_usuario')){
				$data['paquete'] = $this->actividades->obtenerPaquete($id_paquete, '-1');
				$data['actividad'] = $id_actividad; 
				$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
				if ($this->input->post()) {
					$info = $this->input->post();
					if ($data['paquete'] != 0) {
						foreach ($info as $paquete) {
							$paquete_temp = $this->actividades->obtenerPaquete($id_paquete, $paquete['id_lenguaje']);
							if ($paquete_temp == 0 && !empty($paquete['titulo_planes_actividad'])) {
								$paquete['id_actividad'] = $id_actividad;
								$paquete['id_paquete'] = $id_paquete;
								$paquete['id_planes_actividad'] = 'null';
								$this->actividades->agregarPaquete($paquete);
							}else{
								$this->actividades->modificarPaquete($id_paquete, $paquete['id_lenguaje'], $paquete);
							}
						}
					}else{
						$ultimo_paquete = $this->actividades->obtenerUltimoPaquete(); //Se obtiene la ultima actividad para continuar con un orden numerico

						if ($ultimo_paquete == 0) {
							$ultimo_paquete['id_paquete'] = 0;
						}

						foreach ($info as $paquete) { // Recorre cada informacion de la actividad segun el idioma para ser registrada
							$paquete['id_paquete'] = $ultimo_paquete['id_paquete'] + 1;
							$paquete['id_actividad'] = $id_actividad;
							$paquete['id_planes_actividad'] = 'null';
							if (!empty($paquete['titulo_planes_actividad'])) {
								$this->actividades->agregarPaquete($paquete); // Agrega la nueva actividad
							}
						}

						$id_paquete = $ultimo_paquete['id_paquete'] + 1;
					}

					redirect('actividad/modificarpaquete/'.$id_actividad.'/'.$id_paquete);
				}
				$data['id_actividad'] = $id_actividad;
				$this->load->view('panel/editar_paquete', $data);
			}
			else{
				redirect('panel');
			}
		}
	// ================================================================================ //

	/**
	 * Descripcion: Modifica la cantidad de una actividad en el carrito
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function cantidadCarrito(){
			if ($this->input->post('articulo') == 1) {
				$this->carrito->actualizarCantidadActividad($this->input->post('id_posicion'), $this->input->post('tipo'));
			}
			else{
				$this->carrito->actualizarCantidadPaquete($this->input->post('id_posicion'), $this->input->post('tipo'), $this->input->post('id_posicion_paquete'));
			}	
		}
	// ================================================================================ //

	/**
	 * Descripcion: Elimina un articulo de la lista de productos en el carrito
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function eliminarArticulo(){
			$this->carrito->eliminarArticulo($this->input->post('id_actividad'), $this->input->post('id_paquete'), $this->input->post('tipo'));
		}
	// ================================================================================ //

	function editar_imagen()
	{

		if($this->session->userdata('id_usuario')) 
		{
				
			$name = $this->input->post('name');
			//Subir imagen
			//Configuración de la libreria upload
			$config['upload_path'] = './uploads/actividades/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size']	= '3000000';
			$config['max_width']  = '2048';
			$config['max_height']  = '1536';
			$config['encrypt_name']  = 'TRUE';
	
			$this->load->library('upload', $config);
			
			$this->load->library('thumbs', $config);
	
				
			if ( ! $this->upload->do_upload($name) )
			{
				
				$error = array('error' => $this->upload->display_errors());

				if( $this->input->post('id') == "" )
				{
					$respuesta = array (
					  'upload'=>false,
					  'estado'=>'error',
					  'imagen'=>'',				  
					  'mensaje'=>$error['error']);
				}
				else
				{
					$respuesta = array (
					  'upload'=>false,
					  'estado'=>'nothing',
					  'imagen'=>'',				  
					  'mensaje'=>$error['error']);
				}
			}
			else
			{
				
				$img = $this->upload->data();
				
				$this->thumbs->crear_thumbs('./uploads/actividades/',$img['file_name'],'t',70,70);
				$this->thumbs->crear_thumbs('./uploads/actividades/',$img['file_name'],'s',280,280);
				$this->thumbs->crear_thumbs('./uploads/actividades/',$img['file_name'],'m',480,480);
				$this->thumbs->crear_thumbs('./uploads/actividades/',$img['file_name'],'b',600,600);
				$this->thumbs->crear_thumbs('./uploads/actividades/',$img['file_name'],'g',800,800);

				$imagen['imagen'] = $img['file_name'];

				if( $this->input->post('id') == "" )
				{
					$imagen['posicion'] = $this->input->post('pos');
					$imagen['id_galeria'] = $this->input->post('id_galeria');
					$id_imagen = $this -> imagenes -> agregarImagen($imagen);

					$respuesta = array (
					  'upload'=>true,
					  'id_imagen'=>$id_imagen,
					  'estado'=>'success',
					  'imagen'=>$img['file_name'],				  
					  'mensaje'=>'Imágen guardada!');
				}
				else
				{
					$temp_imagen = $this -> imagenes -> obtenerImagen($this->input->post('id'));

					if( $this -> imagenes -> editarImagen( $this->input->post('id'), $imagen ) )
					{
						//eliminar imágen
						$absolute_path = FCPATH.'uploads/imagenes/';

						
						if( file_exists($absolute_path.$imagen['imagen']) )
							@unlink($absolute_path.$imagen['imagen']);
						if( file_exists($absolute_path.'t'.$imagen['imagen']) )
							@unlink($absolute_path.'t'.$imagen['imagen']);
						if( file_exists($absolute_path.'s'.$imagen['imagen']) )
							@unlink($absolute_path.'s'.$imagen['imagen']);
						if( file_exists($absolute_path.'m'.$imagen['imagen']) )
							@unlink($absolute_path.'m'.$imagen['imagen']);
						if( file_exists($absolute_path.'b'.$imagen['imagen']) )
							@unlink($absolute_path.'b'.$imagen['imagen']);
						if( file_exists($absolute_path.'g'.$imagen['imagen']) )
							@unlink($absolute_path.'g'.$imagen['imagen']);

						$respuesta = array (
						  'upload'=>true,
						  'id_imagen'=>$this->input->post('id'),
						  'estado'=>'success',
						  'imagen'=>$img['file_name'],				  
						  'mensaje'=>'Imágen actualizada!');
					}
					else
					{

						$respuesta = array (
						  'upload'=>false,
						  'id_imagen'=>$this->input->post('id'),
						  'estado'=>'nothing',
						  'imagen'=>$img['file_name'],				  
						  'mensaje'=>'Ups! No es posible editar la imagen. Por favor intente de nuevo');
					}
				}

			}

		}
		else
		{
	
			$respuesta = array (
			  'upload'=>false,
			  'estado'=>'error',
			  'imagen'=>'',				  
			  'mensaje'=>'No tiene permisos para esta acción.');
		}
	
		echo json_encode($respuesta);

	}


/////////////////////////////////////////////////////////////////////////////////////////////////

	function eliminar_imagen()
	{
		if($this->session->userdata('id_usuario')) 
		{
			
			if($this->input->post('id'))
			{
		    	
				if($imagen = $this->imagenes->obtenerImagen($this->input->post('id')) )
				{
					
					
					if( $this->imagenes->eliminarImagen($this->input->post('id')) )
					{
						
						//eliminar imágenes
						$absolute_path = FCPATH.'uploads/actividades/';
						
						if( file_exists($absolute_path.$imagen['imagen']) )
							@unlink($absolute_path.$imagen['imagen']);
						if( file_exists($absolute_path.'t'.$imagen['imagen']) )
							@unlink($absolute_path.'t'.$imagen['imagen']);
						if( file_exists($absolute_path.'s'.$imagen['imagen']) )
							@unlink($absolute_path.'s'.$imagen['imagen']);
						if( file_exists($absolute_path.'m'.$imagen['imagen']) )
							@unlink($absolute_path.'m'.$imagen['imagen']);
						if( file_exists($absolute_path.'b'.$imagen['imagen']) )
							@unlink($absolute_path.'b'.$imagen['imagen']);
						if( file_exists($absolute_path.'g'.$imagen['imagen']) )
							@unlink($absolute_path.'g'.$imagen['imagen']);
						
						$respuesta = array (
						  'eliminado'=>true,
						  'estado'=>'success',
						  'mensaje'=>'Imágen eliminada');
					
					}
					else
					{

						$respuesta = array (
						  'eliminado'=>false,
						  'estado'=>'error',
						  'mensaje'=>"Ups! hubo un error al eliminar la imágen, por favor contáctese con soporte.");
					} 
				}
				else
				{
					$respuesta = array (
					  'eliminado'=>false,
					  'estado'=>'error',
					  'mensaje'=>"La imágen no se encuentra en la base de datos. No es posible eliminar.");
				}
			}
			else
			{
		
				$respuesta = array (
				  'eliminado'=>false,
				  'estado'=>'error',
				  'mensaje'=>"No tiene permisos para esta acción");
			}

		}
		else
		{
	
			$respuesta = array (
			  'eliminado'=>false,
			  'estado'=>'error',
			  'mensaje'=>"No tiene permisos para esta acción");
		}
		echo json_encode($respuesta);
		
	}
	

/////////////////////////////////////////////////////////////////////////////////////////////////

	function eliminar()
	{
		if($this->session->userdata('id_usuario','id_planes_actividad')) 
		{
			
			if($this->input->post('id'))
			{
		    	
				if($producto = $this->actividades->obtenerProducto($this->input->post('id')) )
				{
					
					
					if( $this->actividades->eliminarProducto($this->input->post('id')) )
					{
						
						$dir = './uploads/actividades/'.$this->input->post('id');
						if (is_dir($dir)) {
							eliminarDir($dir);
						}

						$imagenes = $this->imagenes->listarImagenes($producto['id_galeria']);
						$this->galerias->eliminarGaleria($producto['id_galeria']);
						//eliminar imágenes
						$absolute_path = FCPATH.'uploads/actividades/';
						
						foreach($imagenes as $imagen)
						{
							if( file_exists($absolute_path.$imagen['imagen']) )
								@unlink($absolute_path.$imagen['imagen']);
							if( file_exists($absolute_path.'t'.$imagen['imagen']) )
								@unlink($absolute_path.'t'.$imagen['imagen']);
							if( file_exists($absolute_path.'s'.$imagen['imagen']) )
								@unlink($absolute_path.'s'.$imagen['imagen']);
							if( file_exists($absolute_path.'m'.$imagen['imagen']) )
								@unlink($absolute_path.'m'.$imagen['imagen']);
							if( file_exists($absolute_path.'b'.$imagen['imagen']) )
								@unlink($absolute_path.'b'.$imagen['imagen']);
							if( file_exists($absolute_path.'g'.$imagen['imagen']) )
								@unlink($absolute_path.'g'.$imagen['imagen']);
						}

						$respuesta = array (
						  'eliminado'=>true,
						  'estado'=>'success',
						  'mensaje'=>'Producto eliminado');
					
					}
					else
					{

						$respuesta = array (
						  'eliminado'=>false,
						  'estado'=>'error',
						  'mensaje'=>"Ups, hubo un error al eliminar el producto, por favor contáctese con soporte.");
					} 
				}
				else
				{
					$respuesta = array (
					  'eliminado'=>false,
					  'estado'=>'error',
					  'mensaje'=>"El producto no se encuentra en la base de datos. No es posible eliminar.");
				}
			}
			else
			{
		
				$respuesta = array (
				  'eliminado'=>false,
				  'estado'=>'error',
				  'mensaje'=>"No tiene permisos para esta acción");
			}

		}
		else
		{
	
			$respuesta = array (
			  'eliminado'=>false,
			  'estado'=>'error',
			  'mensaje'=>"No tiene permisos para esta acción");
		}
		echo json_encode($respuesta);
		
	}
	

/////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Descripcion: Muestra una lista con todas las actividades del sistema
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return: View
	 */
		function lista(){
			if($this->session->userdata('id_usuario') && $this->session->userdata('tipo_usuario') == 1) 
			{
				$data['actividades'] = $this ->actividades->listarActividades('activas');
				$this->load->view('panel/lista_actividades', $data);
			}
			else{
				redirect('panel');
			}
		
		}
	// ================================================================================ //
	


////////////////////////////////////////////////////////////////////////////////////////////////
//  Funciones del carrito de compras
////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * agregarProductoCarrito
 *
 * agrega un producto al carrito de compras
 * @access	public
 * @param	int ($id)
 * @return	boolean
 */

	

	function agregarProductoCarrito()
	{
		
		
		$this->load->model('carrito');

		if( $this->input->post('id_producto') != false ){
			

			$info =  $this-> actividades->obtenerProducto( $this->input->post('id_producto') );
			
			
			$imagen = $info['imagen'];

			$precio = ($info['precio_oferta'] != 0)?$info['precio_oferta']:$info['precio'] ;
			
			$referencia =  $info['referencia'];
						
			$identificador= $this->input->post('id_producto');
			
			$cantidad = 1;//(int)$datos['cantidad'];

			$this -> carrito -> addProducto($info['nombre'], $this->input->post('id_producto') , $precio, $cantidad, $imagen,$referencia,'');

			exit('1');
			
		}

		exit('0');	
	
	}




////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * disminuirProductoCarrito
 *
 * resta un producto de una catidad del mismo producto del carrito de compras
 * @access	public
 * @param	int ($id)
 * @return	boolean
 */

	

	function disminuirProductoCarrito()
	{
		
		
		$this->load->model('carrito');
		$this -> carrito -> updateProducto( $this->input->post('posicion'),  $this->input->post('cantidad') );
		 
		echo 1;
	
	}




////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * borrarCarrito
 *
 * borra un producto del carrito de compras
 * @access	public
 * @param	int ($id)
 * @return	boolean
 */

	

	function borrarProductoCarrito()
	{
		
		
		$this->load->model('carrito');
		$this -> carrito -> updateProducto( $this->input->post('id'), 0, 0 );
		 
		echo 1;
	
	}



////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * destruirCarrito
 *
 * borra un producto del carrito de compras
 * @access	public
 * @param	int ($id)
 * @return	boolean
 */

	

	function destruirCarrito()
	{
		
		
		$this->load->model('carrito');
		$this -> carrito -> destruirCarrito( );
		redirect('main/carrito');
		 
		
	
	}


////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * compra
 *
 * vista de confirmacion final de la compra
 * @access	public
 * @param	void
 * @return	view
 */

	

	function compra()
	{

        $data['giro']= false;
		$data['consignacion']= false;

		$data['carrito'] = $this ->carrito ->carro;
		$data['nf'] = $this ->carrito ->nf;

		$data['numactividades'] = $this->carrito->numProductos();

		$pedido['info_pedido']['id_orden'] = null;
		$pedido['info_pedido']['id_usuario'] = $this->session->userdata('userdata')['id_usuario'];
		$pedido['info_pedido']['fecha_orden'] = date('Y-m-d');
		$pedido['info_pedido']['hora_orden'] = date('h:i:s');
		$pedido['info_pedido']['estado_orden'] = 'Pendiente';



        $subtotal = 0;
        $total = 0;
        $cantidad = 0;

        if($this->carrito->numProductos() ){ 

	  		for($p =0; $p<$this ->carrito ->nf; $p++)
	  		{ 
	  			if($this ->carrito ->carro['estado'][$p])
	  			{
	  				if ((isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) && $this->input->post('tipo_pago') != "paypal") {
	  					$moneda = 'COP';
	  					$cantidad++;
	  					$subtotal = $this ->carrito ->carro['precio_cop'][$p] * $this ->carrito ->carro['cantidad'][$p];
	  				}
	  				else{
	  					$cantidad++;
	  					$moneda = 'USD';
	  					$subtotal = $this ->carrito ->carro['precio_usd'][$p] * $this ->carrito ->carro['cantidad'][$p];
	  				}

	

		  			if (!empty($this->carrito->carro['paquetes'][$p])) {

		  				for ($j=1; $j <= count($this->carrito->carro['paquetes'][$p]); $j++) { 

		  					if ($this ->carrito ->carro['paquetes'][$p][$j]['estado']) {
		  						if ((isset($this->session->userdata('userdata')['moneda']) && ($this->session->userdata('userdata')['moneda'] == 1 || !isset($this->session->userdata('userdata')['moneda']))) && $this->input->post('tipo_pago') != "paypal") {
		  							$cantidad++;
		  							$moneda = 'COP';
			  						$subtotal = $subtotal +  ($this ->carrito ->carro['paquetes'][$p][$j]['precio_cop'] * $this ->carrito ->carro['paquetes'][$p][$j]['cantidad']);
				  				}
				  				else{
				  					$cantidad++;
				  					$moneda = 'USD';
				  					$subtotal = $subtotal +  ($this ->carrito ->carro['paquetes'][$p][$j]['precio_usd'] * $this ->carrito ->carro['paquetes'][$p][$j]['cantidad']);
				  				}
		  					}
		  				}
		  			}

		  			$total = $total + $subtotal;
		  		}
		  	} 
		}

		$pedido['info_pedido']['valor_orden'] = $total;

		if ($this->session->userdata('userdata')['id_usuario']) {
			if (!empty($data['carrito'])) { 
				$id_orden = $this->pedidos->crearPedido($pedido['info_pedido']);
				if ($id_orden) {
					$this->pedidos->crearProductoPedido($data['carrito'], $id_orden);
					$this->carrito->destruirCarrito();
				}
			}
		}
	  			
		if( $this->input->post('tipo_pago') == "pagosonline"){
			$apiKey = '2i0jgk8icdnb9k2bc6b06tbjen';
			$merchantId = '509440';
			$referenceCode = 'VA-'.$id_orden;
			$id_cuenta = "510588";

			$valor =  $total;
			$concepto = "Actividades Amazonas";
			
			$firma = md5($apiKey.'~'.$merchantId.'~'.$referenceCode.'~'.$valor.'~'.$moneda);

			$data["form_payu"] = '<form style="display:none;" id="formulario_pago" method="post" action="https://gateway.payulatam.com/ppp-web-gateway/">
			   <input name="merchantId"    type="hidden"  value="'.$merchantId.'"   >
			   <input name="accountId"     type="hidden"  value="'.$id_cuenta.'" >
			   <input name="description"   type="hidden"  value="'.$concepto.'"  >
			   <input name="referenceCode" type="hidden"  value="'.$referenceCode.'" >
			   <input name="amount"        type="hidden"  value="'.$valor.'"   >
			   <input name="tax"           type="hidden"  value="0"  >
			   <input name="taxReturnBase" type="hidden"  value="0" >
			   <input name="currency"      type="hidden"  value="'.$moneda.'" >
			   <input name="signature"     type="hidden"  value="'.$firma.'"  >
			   <input name="ShippingCountry" type="hidden"  value="CO" >
			   <input name="responseUrl"    type="hidden"  value="'.base_url().'cuota/response" >
			   <input name="confirmationUrl"    type="hidden"  value="'.base_url().'cuota/confirmacion" >
			   <input name="Submit"        type="submit"  value="Enviar" >
			 </form>';

			 $data["payment_m"] = "pagosonline";

		}

		else if ( $this->input->post('tipo_pago') == "paypal") 
		{
			$this->load->library("Paypal_lib");
			$data["payment_m"] = "paypal";
			//Set variables for paypal form
	        $paypalURL = 'https://www.paypal.com/cgi-bin/webscr'; //test PayPal api url
	        $paypalID = 'nikollaihernandez@gmail.com'; //business email
	        $returnURL = base_url() . 'paypal/success'; //payment success url
	        $cancelURL = base_url() . 'paypal/cancel'; //payment cancel url
	        $notifyURL = base_url() . 'paypal/ipn'; //ipn url
	        //get particular product data

	        $userID = 1; //current user id
	        $logo = base_url() . 'assets/images/codexworld-logo.png';

	        $this->paypal_lib->add_field('business', $paypalID);
	        $this->paypal_lib->add_field('return', $returnURL);
	        $this->paypal_lib->add_field('cancel_return', $cancelURL);
	        $this->paypal_lib->add_field('notify_url', $notifyURL);
	        $this->paypal_lib->add_field('item_name', "Actividad amazonas");
	        $this->paypal_lib->add_field('custom', $userID);
	        $this->paypal_lib->add_field('item_number', $cantidad);
	        $this->paypal_lib->add_field('amount', $total);
	        $this->paypal_lib->add_field('currency_code', $moneda);
	        $this->paypal_lib->image($logo);

	        $this->paypal_lib->paypal_auto_form();

	        die();
		}

		else if ( $this->input->post('tipo_pago') == "consignacion" ) 
		{
			$data['consignacion']= true;
		}

		

		if (isset($this->session->userdata('userdata')['id_usuario'])) {
			$data['likes'] = $this->usuarios->obtenerLikesUsuario($this->session->userdata('userdata')['id_usuario'], '-1');
		}
		else{
			$data['likes'] = 0;
		}

		$data["payment_m"] = "paypal";
		
		$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
		$data['contenidos_footer'] = $this->contenidos->listarContenidos();
		$this->load->view('site/compra', $data);
		
	
	}


	/*
	* ======= Metodo para añadir una nueva imagen a un producto ====
	* @param int (id_file): Id del input type file con el que se recibe la imagen.
			 int (id_gallery): Id de la galeria a a cual pertenece esa imagen
	*/
	function addPhoto($id_file, $id_gallery){

		/* Upload file */
		if (isset($_FILES['file_'.$id_file])){
			//Comprobamos si el fichero es una imagen
			if ($_FILES['file_'.$id_file]['type']=='image/png' || $_FILES['file_'.$id_file]['type']=='image/jpeg'){
				//Subimos el fichero al servidor
				$img_type = str_replace('image/', '', $_FILES['file_'.$id_file]['type']);
				$dir =  './uploads/actividades/'.$id_gallery;
				$nombre_imagen = date('Y-m-d').'-'.rand(1000, 9999).'-'.$_FILES['file_'.$id_file]["name"];
				if(!file_exists($dir)){
					mkdir($dir, 0755);
				}
				if(move_uploaded_file($_FILES['file_'.$id_file]["tmp_name"], $dir."/".$nombre_imagen)){

					$dir = './uploads/actividades/'.$id_gallery.'/';

					if ($this->imagenes->obtenerImagen($this->input->post('db_id_photo_'.$id_file))){
						$data_photo['id_galerias'] = $id_gallery;
						$data_photo['archivo'] = $nombre_imagen;
						$data_photo['tipo_archivo'] = 'Imagen';

						$this->uploadThumbs($nombre_imagen, $img_type, $id_gallery, $dir);

						$this->imagenes->editarImagen($this->input->post('db_id_photo_'.$id_file), $data_photo);

					}else{
						$data_photo['id_galerias'] = $id_gallery;
						$data_photo['archivo'] = $nombre_imagen;
						$data_photo['tipo_archivo'] = 'Imagen';

						$this->uploadThumbs($nombre_imagen, $img_type, $id_gallery, $dir);

						$return = $this->imagenes->agregarImagen($data_photo);

					}

					echo $return;

				}else{
					echo 'No se pudo subir el archivo';
				}
			}else{
				echo 'El formato de imagen no es valido';
			}

		}else{
			echo 'No se ha podido cargar la imagen';
		}

	}

	/*
		========== Metodo para eliminar una imagen del servidor y base de datos
	*/
	function deletePhoto($id_photo){
		$img = $this->imagenes->obtenerImagen($id_photo);

		//Se elimina la informacion de base de datos
		if ($this->imagenes->eliminarImagen($id_photo)){

		//Si se elimina la imagen del servidor
		if (unlink('./uploads/actividades/'.$img['id_galeria'].'/'.$img['imagen']) && unlink('./uploads/actividades/'.$img['id_galeria'].'/t'.$img['imagen']) && unlink('./uploads/actividades/'.$img['id_galeria'].'/s'.$img['imagen']) && unlink('./uploads/actividades/'.$img['id_galeria'].'/m'.$img['imagen']) && unlink('./uploads/actividades/'.$img['id_galeria'].'/b'.$img['imagen']) && unlink('./uploads/actividades/'.$img['id_galeria'].'/g'.$img['imagen'])){
				
				echo '1';

			}else{
				echo '2';
			}
		}else{
			echo '2';
		}

	}

	/*
		======= Metodo para crear los diferentes thumbs de las imagenes =====
		@params $name: Nombre de la imagen tal cual esta en el servidor.
				$img_type: Tipo de formato de la imagen (jpg, png, gif, etc).
				$id_product: Id del producto al cual se asociara la imagen
	*/
	function uploadThumbs($name, $img_type, $id_product, $dir){

		list($w_src, $h_src, $type) = getimagesize($dir.$name);
		$proporcion = $h_src / $w_src;
		switch ($img_type){
			case 'gif':   //   gif -> jpg
	        	$img_src = imagecreatefromgif($dir.$name);
	        break;
	        case 'png':  //   png -> jpg
	        	$img_src = imagecreatefrompng($dir.$name);
	        break;
	      	case 'jpeg' || 'jpg':   //   jpeg -> jpg
	        	$img_src = imagecreatefromjpeg($dir.$name); 
	        break;
	      	
	    }

	    $size_t = 70;
	    $size_s = 280;
	    $size_m = 480;
	    $size_b = 600;
	    $size_g = 800;

	    $img_dst_t = imagecreatetruecolor($size_t / $proporcion, $size_t);  //  resample (70x70)
	    $img_dst_s = imagecreatetruecolor($size_s / $proporcion, $size_s);  //  resample (280x280)
	    $img_dst_m = imagecreatetruecolor($size_m / $proporcion, $size_m);  //  resample (480x480) 
	    $img_dst_b = imagecreatetruecolor($size_b / $proporcion, $size_b);  //  resample (600x600)
	    $img_dst_g = imagecreatetruecolor($size_g / $proporcion, $size_g);  //  resample (800x800)

	    // Thumbs de tamaño t ======================================================
		imagecopyresampled($img_dst_t, $img_src, 0, 0, 0, 0, $size_t / $proporcion, $size_t, $w_src, $h_src);
	    imagejpeg($img_dst_t, $dir.'t'.$name, 200);    //  save new image

	    imagedestroy($img_dst_t);
	    // Fin ========================================================================

	    // Thumbs de tamaño s ======================================================
	    imagecopyresampled($img_dst_s, $img_src, 0, 0, 0, 0, $size_s / $proporcion, $size_s, $w_src, $h_src);
	    imagejpeg($img_dst_s, $dir.'s'.$name, 200);    //  save new image
	    //unlink($file_src);  //  clean up image storage
		       
		imagedestroy($img_dst_s);
		// Fin ========================================================================

		// Thumbs de tamaño m ======================================================
	    imagecopyresampled($img_dst_m, $img_src, 0, 0, 0, 0, $size_m / $proporcion, $size_m, $w_src, $h_src);
	    imagejpeg($img_dst_m, $dir.'m'.$name, 200);    //  save new image
	    //unlink($file_src);  //  clean up image storage
		       
		imagedestroy($img_dst_m);
		// Fin ========================================================================

		// Thumbs de tamaño b ======================================================
	    imagecopyresampled($img_dst_b, $img_src, 0, 0, 0, 0, $size_b / $proporcion, $size_b, $w_src, $h_src);
	    imagejpeg($img_dst_b, $dir.'b'.$name, 200);    //  save new image
	    //unlink($file_src);  //  clean up image storage
		       
		imagedestroy($img_dst_b);
		// Fin ========================================================================

		// Thumbs de tamaño g ======================================================
	    imagecopyresampled($img_dst_g, $img_src, 0, 0, 0, 0, $size_g / $proporcion, $size_g, $w_src, $h_src);
	    imagejpeg($img_dst_g, $dir.'g'.$name, 200);    //  save new image
	    //unlink($file_src);  //  clean up image storage
		       
		imagedestroy($img_dst_g);
		// Fin ========================================================================

	    imagedestroy($img_src); 

	    if (file_exists($dir.$name)) {
	    	unlink($dir.$name);
	    }

	}



	/*
		======= Metodo para crear los diferentes thumbs de las imagenes =====
		@params $name: Nombre de la imagen tal cual esta en el servidor.
				$img_type: Tipo de formato de la imagen (jpg, png, gif, etc).
				$id_product: Id del producto al cual se asociara la imagen
	*/
	function uploadPrueba($name, $img_type, $id_product, $dir){


		list($w_src, $h_src, $type) = getimagesize($dir.$name);

		$proporcion = $h_src / $w_src;

		switch ($img_type){
			case 'gif':   //   gif -> jpg
	        	$img_src = imagecreatefromgif($dir.$name);
	        break;
	        case 'png':  //   png -> jpg
	        	$img_src = imagecreatefrompng($dir.$name);
	        break;
	      	case 'jpeg' || 'jpg':   //   jpeg -> jpg
	        	$img_src = imagecreatefromjpeg($dir.$name); 
	        break;
	      	
	    }

	    $size_t_h = 800;


	    $img_dst_t = imagecreatetruecolor($size_t_h / $proporcion, $size_t_h);  //  resample (70x70)


	    // Thumbs de tamaño t ======================================================
		imagecopyresampled($img_dst_t, $img_src, 0, 0, 0, 0, $size_t_h / $proporcion, $size_t_h, $w_src, $h_src);
	    imagejpeg($img_dst_t, $dir.'prueba-'.$name);    //  save new image

	    imagedestroy($img_dst_t);
	    // Fin ========================================================================


	    imagedestroy($img_src); 

	}


/////////////////////////////////////////////////////////////////////////////////////////////////
	

}
