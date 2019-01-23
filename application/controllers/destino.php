<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Destino extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('destinos');
		$this->load->model('lenguajes');
		$this->load->model('galerias');
		$this->load->model('imagenes');
		$this->load->model('actividades');
		$this->load->model('contenidos');
		$this->load->model('usuarios');

		if (isset($this->session->userdata('userdata')['idioma'])) {
			$this->lenguaje = $this->session->userdata('userdata')['idioma'];
			if ($this->session->userdata('userdata')['idioma'] == 1){
				$this->lang->load('header', 'spanish');
				$this->lang->load('index', 'spanish');
				$this->lang->load('footer', 'spanish');
			}
			else{
				$this->lang->load('header', 'english');
				$this->lang->load('index', 'english');
				$this->lang->load('footer', 'english');
			}
			
		}
		else{
			$this->lenguaje = 1;
			$this->lang->load('header', 'spanish');
			$this->lang->load('index', 'spanish');
			$this->lang->load('footer', 'spanish');
		}
	}


	function eliminar()
	{
		if($this->session->userdata('id_usuario')) 
		{
			
			if($this->input->post('id'))
			{
		    	
				if($servicio = $this->servicios->obtenerServicio($this->input->post('id')) )
				{
					
					
					if( $this->servicios->eliminarServicio($this->input->post('id')) )
					{
						
						//eliminar imágenes
						$absolute_path = FCPATH.'uploads/servicios/';
						
						if( file_exists($absolute_path.$servicio['imagen']) )
							@unlink($absolute_path.$servicio['imagen']);
						if( file_exists($absolute_path.'s'.$servicio['imagen']) )
							@unlink($absolute_path.'s'.$servicio['imagen']);
						if( file_exists($absolute_path.'m'.$servicio['imagen']) )
							@unlink($absolute_path.'m'.$servicio['imagen']);
						
						$respuesta = array (
						  'eliminado'=>true,
						  'estado'=>'success',
						  'mensaje'=>'Servicio eliminado');
					
					}
					else
					{

						$respuesta = array (
						  'eliminado'=>false,
						  'estado'=>'error',
						  'mensaje'=>"Ups, hubo un error al eliminar el servicio, por favor contáctese con soporte.");
					} 
				}
				else
				{
					$respuesta = array (
					  'eliminado'=>false,
					  'estado'=>'error',
					  'mensaje'=>"El servicio no se encuentra en la base de datos. No es posible eliminar.");
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
	

	/**
	 * Descripcion: Modifica o agrega la informacion de un destino
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_destino -> Recibe el dentificador del destino que se desea modificar (-1 para agregar)
	 * @return: View
	 */
		function modificar($id_destino){
			if($this->session->userdata('id_usuario')){
				$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
				$data['destino'] = $this->destinos->obtenerDestino($id_destino, '-1');
				if ($data['destino'] != 0) {
					$data['imagenes'] = $this->imagenes->listarImagenes($data['destino'][0]['id_galeria']);
				}
				$data['id_destino'] = $id_destino;
				if ($this->input->post()) {
					$info = $this->input->post();

					if ($data['destino'] != 0) {
						foreach ($info as $destino) {
							$destino_temp = $this->destinos->obtenerDestino($id_destino, $destino['id_lenguaje']);
							if ($destino_temp == 0 && !empty($destino['nombre_destino'])) {
								$destino['id_destino'] = $id_destino;
								$destino['id_destinos'] = 'null';
								$this->destinos->agregarDestino($destino);
							}else{
								$this->destinos->modificarDestino($id_destino, $destino['id_lenguaje'], $destino);
							}
							
						}
					}else{

						$ultimo_destino = $this->destinos->obtenerUltimoDestino(); //Se obtiene la ultima destino para continuar con un orden numerico

						// Datos de la nueva galeria =======================
							$galeria['id_galerias'] = 'null';
							$galeria['tipo_galerias'] = 'Destino';
							$id_galeria = $this->galerias->agregarGaleria($galeria);
						// ==================================================

						foreach ($info as $destino) { // Recorre cada informacion de la destino segun el idioma para ser registrada
							$destino['id_destino'] = $ultimo_destino['id_destino'] + 1;
							$destino['id_destinos'] = 'null';
							$destino['id_galeria'] = $id_galeria;
							if (!empty($destino['nombre_destino'])) {
								$this->destinos->agregardestino($destino); // Agrega la nueva destino
							}
						}

						$id_destino = $ultimo_destino['id_destino'] + 1;
					}

					redirect('destino/modificar/'.$id_destino);
				}

				$this->load->view('panel/editar_destino', $data);
			}
			else{
				redirect('panel');
			}
		}
	// ================================================================================ //

	/**
	 * Descripcion: Carga una vista con la lista de todos los destinos registrados
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return: View
	 */
		function lista(){
			if($this->session->userdata('id_usuario')){
				$data['destinos'] = $this->destinos->listarDestinos();
				$this->load->view('panel/lista_destinos', $data);
			}
			else{
				redirect('panel');
			}
		}
	// ================================================================================ //

	/**
	 * Descripcion: Carga una vista con la lista de todos los destinos registrados
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return: View
	 */
		function todos(){
			$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
			$data['destinos'] = $this->destinos->listarDestinos();
			$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
			
			if (isset($this->session->userdata('userdata')['id_usuario'])) {
				$data['likes'] = $this->usuarios->obtenerLikesUsuario($this->session->userdata('userdata')['id_usuario'], '-1');
			}
			else{
				$data['likes'] = 0;
			}

			$data['contenidos_footer'] = $this->contenidos->listarContenidos();
			if ($data['destinos'] != 0) {
				for ($i=0; $i < count($data['destinos']); $i++) { 
					$data['destinos'][$i]['imagenes'] = $this->imagenes->listarImagenes($data['destinos'][$i]['id_galeria']);
				}
			}
			$this->load->view('site/destinos', $data);
		}
	// ================================================================================ //

	/**
	 * Descripcion: Muestra la informacion de un destino
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_destino -> Recibe el identificador del destino que se desea mostrar
	 * @return: View
	 */
		function ver($id_destino){
			$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
			$data['destino'] = $this->destinos->obtenerDestino($id_destino, $this->lenguaje);
			$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
			$data['contenidos_footer'] = $this->contenidos->listarContenidos();
			
			if (isset($this->session->userdata('userdata')['id_usuario'])) {
				$data['likes'] = $this->usuarios->obtenerLikesUsuario($this->session->userdata('userdata')['id_usuario'], '-1');
			}
			else{
				$data['likes'] = 0;
			}

			$data['destino'][0]['imagenes'] = $this->imagenes->listarImagenes($data['destino'][0]['id_galeria']);
			
			$this->load->view('site/destino', $data);
		}
	// ================================================================================ //

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
				$dir =  './uploads/destinos/'.$id_gallery;
				$nombre_imagen = date('Y-m-d').'-'.rand(1000, 9999).'-'.$_FILES['file_'.$id_file]["name"];
				if(!file_exists($dir)){
					mkdir($dir, 0755);
				}
				if(move_uploaded_file($_FILES['file_'.$id_file]["tmp_name"], $dir."/".$nombre_imagen)){

					$dir = './uploads/destinos/'.$id_gallery.'/';

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
}
