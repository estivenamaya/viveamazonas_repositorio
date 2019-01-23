<?php

class Contenido extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('contenidos');
		$this->load->model('contenidos');
		$this->load->model('lenguajes');
		$this->load->model('usuarios');
		$this->load->model('actividades');
		
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

/////////////////////////////////////////////////////////////////////////////////////////////////

	function lista()
	{
		if( $this->session->userdata('id_usuario') ) 
		{
		
			$data['contenidos'] = $this->contenidos->listarContenidos();
			$this->load->view('panel/lista_contenidos', $data);

		}
		else
		{
	
			 redirect('panel');
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

/*
  Muesta la vista del contenido
*/
/////////////////////////////////////////////////////////////////////////////////////////////////


	function agregar_contenido()
	{
		
		if( $this->session->userdata('id_usuario') ) 
		{

			if( $this->input->post('info') )
			{
				
				$data['contenido'] = $this->input->post('info');
				
				$id_contenido = $this -> contenidos -> agregarContenido($data['contenido']);
				redirect('contenido/lista');

			}
			
			$this->load->view('panel/agregar_contenido');
		}
		else
		{
	
			 redirect('panel');
		}

	}

	////////////////////////////////////////////////






/////////////////////////////////////////////////////////////////////////////////////////////////

/*
  Agrega el contenido
*/
/////////////////////////////////////////////////////////////////////////////////////////////////

	function agregar()
	{
		
		if( $this->session->userdata('id_usuario') ) 
		{

			if( $this->input->post('info') )
			{
				
				$data['contenido'] = $this->input->post('info');
				
				$id_contenido = $this -> contenidos -> agregarContenido($data['contenido']);
				redirect('contenido/lista');

			}
			
			$this->load->view('panel/agregar_contenido');
		}
		else
		{
	
			 redirect('panel');
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

	function modificarContenido($id_contenido){
		if($this->session->userdata('id_usuario')){
			$data['contenido'] = $this->contenidos->obtenerContenido($id_contenido, '-1');
			$data['id_contenido'] = $id_contenido;
			$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
			if ($this->input->post()) {
				$info = $this->input->post();
				if ($data['contenido'] != 0) {

					foreach ($info as $contenido) {
						$contenido_temp = $this->contenidos->obtenerContenido($id_contenido, $contenido['id_lenguaje']);
						if ($contenido_temp == 0 && !empty($contenido['titulo'])) {
							$contenido['id_contenido'] = $id_contenido;
							$contenido['id_contenidos'] = 'null';
							$this->contenidos->agregarContenido($contenido);
						}else{
							$this->contenidos->modificarContenido($id_contenido, $contenido['id_lenguaje'], $contenido);
						}
					}
				}else{
					$ultimo_contenido = $this->contenidos->obtenerUltimocontenido(); //Se obtiene la ultima contenido para continuar con un orden numerico

					if ($ultimo_contenido == 0) {
						$id_contenido = 1;
					}
					else{
						$id_contenido = $ultimo_contenido['id_contenido'] + 1;
					}
					
					foreach ($info as $contenido) { // Recorre cada informacion de la contenido segun el idioma para ser registrada
						$contenido['id_contenido'] = $id_contenido;
						$contenido['id_contenidos'] = 'null';
						if (!empty($contenido['titulo'])) {
							$this->contenidos->agregarContenido($contenido); // Agrega la nueva contenido
						}
					}

					
				}

				redirect('contenido/modificarcontenido/'.$id_contenido);
			}
			$data['id_contenido'] = $id_contenido;
			$this->load->view('panel/editar_contenido', $data);
		}
		else{
			redirect('panel');
		}
	}


	/**
	 * Descripcion: Elimina un contenido del sistema
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function eliminar(){
			if($this->session->userdata('id_usuario')){
				if ($this->contenidos->eliminarContenido($this->input->post('id'))) {
					echo '1';
				}else{
					echo '0';
				}
			}
		}
	// ================================================================================ //
	
/////////////////////////////////////////////////////////////////////////////////////////////////


	function ver($id_contenido){
		$data['contenido'] = $this->contenidos->obtenerContenido($id_contenido, 1);
		$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
		$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
		$data['contenidos_footer'] = $this->contenidos->listarContenidos();
		//$data['likes'] = $this->usuarios->obtenerLikesUsuario($this->session->userdata('userdata')['id_usuario'], '-1');
		$this->load->view('site/contenido', $data);
	}

}
