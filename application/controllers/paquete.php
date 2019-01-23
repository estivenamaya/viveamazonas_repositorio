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
		$this->load->model('paquetes');


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


	function eliminar_PlanActividad(){
		if ($this->session->userdata('id_usuario')) {
			$id = $this->input->post('id');
			$data['estado_planes_actividad'] = 'Inactivo';
			if ($this->paquetes->modificarEstado_PlanActividad($id, $data)){
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

