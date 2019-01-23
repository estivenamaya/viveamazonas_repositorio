<?php

class Slide extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('slides');
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	function lista()
	{
		
		if($this->session->userdata('id_usuario')) 
		{
			
			$data['slides'] = $this ->slides ->listarSlides();
			$this->load->view('panel/lista_slides', $data);
		}
		else
		{
	
			redirect('panel');
		}
		
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

	function editar()
	{

		if($this->session->userdata('id_usuario')) 
		{
				
			$name = $this->input->post('name');
			//Subir imagen
			//Configuración de la libreria upload
			$config['upload_path'] = './uploads/slides/';
			$config['allowed_types'] = 'gif|jpg|png';
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
				
				$this->thumbs->crear_thumbs('../uploads/slides/',$img['file_name'],'s',320,122);
				$this->thumbs->crear_thumbs('../uploads/slides/',$img['file_name'],'b',1440,550);

				$slide['imagen'] = $img['file_name'];

				if( $this->input->post('id') == "" )
				{
					$slide['posicion'] = $this->input->post('pos');
					$id_slide = $this -> slides -> agregarSlide($slide);

					$respuesta = array (
					  'upload'=>true,
					  'id_slide'=>$id_slide,
					  'estado'=>'success',
					  'imagen'=>$img['file_name'],				  
					  'mensaje'=>'Imágen guardada!');
				}
				else
				{
					$temp_slide = $this -> slides -> obtenerSlide($this->input->post('id'));

					if( $this -> slides -> editarSlide( $this->input->post('id'), $slide ) )
					{
						//eliminar imágen
						$absolute_path = FCPATH.'uploads/slides/';
						
						if( file_exists($absolute_path.$temp_slide['imagen']) )
							@unlink($absolute_path.$temp_slide['imagen']);
						if( file_exists($absolute_path.'s'.$temp_slide['imagen']) )
							@unlink($absolute_path.'s'.$temp_slide['imagen']);
						if( file_exists($absolute_path.'b'.$temp_slide['imagen']) )
							@unlink($absolute_path.'b'.$temp_slide['imagen']);

						$respuesta = array (
						  'upload'=>true,
						  'id_slide'=>$this->input->post('id'),
						  'estado'=>'success',
						  'imagen'=>$img['file_name'],				  
						  'mensaje'=>'Imágen actualizada!');
					}
					else
					{

						$respuesta = array (
						  'upload'=>false,
						  'id_slide'=>$this->input->post('id'),
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

	function eliminar()
	{
		if($this->session->userdata('id_usuario'))
		{
			
			if($this->input->post('id'))
			{
		    	
				if($slide = $this->slides->obtenerSlide($this->input->post('id')) )
				{
					
					
					if( $this->slides->eliminarSlide($this->input->post('id')) )
					{
						
						//eliminar imágenes
						$absolute_path = FCPATH.'uploads/slides/';
						
						if( file_exists($absolute_path.$slide['imagen']) )
							@unlink($absolute_path.$slide['imagen']);
						if( file_exists($absolute_path.'s'.$slide['imagen']) )
							@unlink($absolute_path.'s'.$slide['imagen']);
						if( file_exists($absolute_path.'b'.$slide['imagen']) )
							@unlink($absolute_path.'b'.$slide['imagen']);
						
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


	function addText($id_slide){
		$data['principal'] = $this->input->post('principal');
		$data['secundario'] = $this->input->post('secundario');

		$response = $this->slides->addText($data, $id_slide);

		echo $response;
	}
	

	function addPhoto($id_form){

		/* Upload file */
		if (isset($_FILES['file_'.$id_form])){

			//Comprobamos si el fichero es una imagen
			if ($_FILES['file_'.$id_form]['type']=='image/png' || $_FILES['file_'.$id_form]['type']=='image/jpeg'){
		
				//Subimos el fichero al servidor
				$img_type = str_replace('image/', '', $_FILES['file_'.$id_form]['type']);
				$dir =  './uploads/slides';
		
				if(!file_exists($dir)){
					mkdir($dir, 0755);
				}	

				if(move_uploaded_file($_FILES['file_'.$id_form]["tmp_name"], $dir."/".$_FILES['file_'.$id_form]['name'])){

					if ($this->slides->obtener($this->input->post('db_id_photo_'.$id_form))){
						$data_photo['posicion'] = '1';
						$data_photo['imagen'] = $_FILES['file_'.$id_form]['name'];

						$this->uploadThumbs($_FILES['file_'.$id_form]['name'], $img_type);

						$return = $this->slides->editarSlide($this->input->post($this->input->post('db_id_photo_'.$id_form), 'db_id_photo_'.$id_form));

					}else{

						$data_photo['posicion'] = '1';
						$data_photo['imagen'] = $_FILES['file_'.$id_form]['name'];

						$this->uploadThumbs($_FILES['file_'.$id_form]['name'], $img_type);
						$this->slides->agregarSlide($data_photo);

						$return = $this->slides->listarUltimoSlides();




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

	function eliminarPrueba(){
		$img = $this->slides->obtenerSlide($this->input->post('id'));
		if (unlink('./uploads/slides/'.$img['imagen']) && unlink('./uploads/slides/small_'.$img['imagen']) && unlink('./uploads/slides/medium_'.$img['imagen'])){
			if ($this->slides->eliminarSlide($this->input->post('id'))){
				echo '1';
			}else{
				echo '3';
			}
		}else{
			echo '2';
		}
	}


	function uploadThumbs($name, $img_type){

		$dir = './uploads/slides/';
		list($w_src, $h_src, $type) = getimagesize($dir.$name);

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

	    $img_dst_small = imagecreatetruecolor(350, 135);  //  resample
	    $img_dst_medium = imagecreatetruecolor(880, 340);  //  resample

	    imagecopyresampled($img_dst_small, $img_src, 0, 0, 0, 0, 350, 135, $w_src, $h_src);
	    imagejpeg($img_dst_small, $dir.'small_'.$name);    //  save new image
	    //unlink($file_src);  //  clean up image storage
		       
		imagedestroy($img_dst_small);

		imagecopyresampled($img_dst_medium, $img_src, 0, 0, 0, 0, 880, 340, $w_src, $h_src);
	    imagejpeg($img_dst_medium, $dir.'medium_'.$name);    //  save new image
	    imagedestroy($img_src); 

	}
	

/////////////////////////////////////////////////////////////////////////////////////////////////


}
