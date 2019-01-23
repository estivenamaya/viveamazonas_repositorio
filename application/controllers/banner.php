<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class banner extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('banner_m');
		$this->load->library('session');
	}

	function eliminar(){

		if ($this->input->post('id')) {
			$info['imagen_banner_'.$this->input->post('id')] = '';

			if ($this->banner_m->modifyBanner(1, $info)){
				echo '1';
			}
			else{
				echo '0';
			}
		}
	}

	function editar()
	{

		if ($this->session->userdata('id_usuario')) {

			if ($this->input->post('info')) {
				
				$id_banner = $this->banner_m->getBanner();
				$id_banner = $id_banner['id_banner'];

				

				for ($i=1; $i < 4 ; $i++) { 
					/* =============== Imagen principal ================ */
					/* Upload file */
					if (!empty($_FILES['imagen_banner_'.$i]['name'])){
						
						//Comprobamos si el fichero es una imagen
						if ($_FILES['imagen_banner_'.$i]['type']=='image/png' || $_FILES['imagen_banner_'.$i]['type']=='image/jpeg'){
							//Subimos el fichero al servidor
							$img_type = str_replace('image/', '', $_FILES['imagen_banner_'.$i]['type']);
							$dir =  './uploads/banner/';
							if(!file_exists($dir)){
								mkdir($dir, 0700, true);
							}
							if(!move_uploaded_file($_FILES['imagen_banner_'.$i]["tmp_name"], $dir."/imagen_banner_".$i.".".$img_type)){


								$this->session->set_flashdata('error', 'Ha ocurrido un error al intentar subir la imagen principal, por favor intente de nuevo mas tarde.');
							}
							else{
								$info['imagen_banner_'.$i] = 'imagen_banner_'.$i.'.'.$img_type;
							}
						}else{
							$this->session->set_flashdata('error', 'Por favor utilice imagenes de tipo JPG o PNG en la imagen principal');
						}
					}
					/* =============== Fin Imagen principal ================ */
				}

				if (empty($id_banner)) {

					$info['id_banner'] = 1;

					$this->banner_m->setBanner($info);

				}else{

					$this->banner_m->modifyBanner($id_banner, $info);

				}
				
				redirect('banner/editar');

			}else{

				$data['banner'] = $this->banner_m->getBanner();

				$this->load->view('panel/editar_banner', $data);

			}

		}else{

			redirect('panel');

		}

		

	}

}
