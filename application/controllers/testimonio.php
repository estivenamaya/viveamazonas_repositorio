<?
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * author: Nikollai Hernandez
 * date: 23/06/2016
 */

class Testimonio extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('testimonios');
		$this->load->library('session');
	}


	/**
	 * Descripcion: Carga una lista con cada uno de los testimonios registrados
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return: View
	 */
		function lista(){

			if($this->session->userdata('id_usuario')){
				$data['testimonios'] = $this->testimonios->getTestimonios();
				$this->load->view('panel/lista_testimonios', $data);		
			}else{
				redirect('panel');
			}
	}
	// ================================================================================ //
	


	function editar($id_testimonio){

		if($this->session->userdata('id_usuario')) 
		{

			if ($this->input->post('info')) {
				
				$data = $this->input->post('info');

				if ($this->testimonios->getTestimoniosById($data['id_testimonio'])) {

					$this->testimonios->modifyTestimonio($data['id_testimonio'], $data);

				}else{

					$last = $this->testimonios->getLastTestimonio();

					$data['id_testimonio'] = $last[0]['id_testimonio'] + 1;

					//$data['imagen_testimonio'] = ($last[0]['id_testimonio'] + 1).'.jpg';

					$this->testimonios->setTestimonio($data);

				}
				

				/* =============== Imagen principal ================ */
				/* Upload file */

				if (!empty($_FILES['img_input_testimonio_'.$id_testimonio]['name'])){
					
					//Comprobamos si el fichero es una imagen
					if ($_FILES['img_input_testimonio_'.$id_testimonio]['type']=='image/png' || $_FILES['img_input_testimonio_'.$id_testimonio]['type']=='image/jpeg'){
						//Subimos el fichero al servidor
						$img_type = str_replace('image/', '', $_FILES['img_input_testimonio_'.$id_testimonio]['type']);
						$dir =  './uploads/testimonios';
						if(!file_exists($dir)){
							mkdir($dir, 0755);
						}
						if(!move_uploaded_file($_FILES['img_input_testimonio_'.$id_testimonio]["tmp_name"], $dir."/".$data['id_testimonio'].'.'.$img_type)){

							$this->session->set_flashdata('error', 'Ha ocurrido un error al intentar subir la imagen principal, por favor intente de nuevo mas tarde.');
						}

						$data['imagen_testimonio'] = $data['id_testimonio'].'.'.$img_type;
						$this->testimonios->modifyTestimonio($data['id_testimonio'], $data);
					}else{

						$this->session->set_flashdata('error', 'Por favor utilice imagenes de tipo JPG o PNG en la imagen principal');
					}
				}
				/* =============== Fin Imagen principal ================ */

				redirect('testimonio/lista');

			}

			$data['testimonio'] = $this->testimonios->getTestimoniosById($id_testimonio);

			$this->load->view('panel/editar_testimonios', $data);		

		}else{

			redirect('panel');

		}

	}


	function eliminar(){


		if($this->session->userdata('id_usuario')){

			if ($this->input->post('id')) {

				if ($this->testimonios->getTestimoniosById($this->input->post('id'))) {
				
				if ($this->testimonios->deleteTestimonio($this->input->post('id'))){

					$respuesta = array (
						  'eliminado'=>true,
						  'estado'=>'success',
						  'mensaje'=>'Servicio eliminado');
					
				}

				}	
		
			}

					

		}else{

			redirect('panel');

		}
	}




}