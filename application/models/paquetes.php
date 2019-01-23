<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paquetes extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
		if (isset($this->session->userdata('userdata')['idioma']) && !empty($this->session->userdata('userdata')['idioma'])) {
			$this->idioma = $this->session->userdata('userdata')['idioma'];
		}else{
			$this->idioma = 1;
		}
    }


	function modificarEstado_PlanActividad($id_paquete, $data){

		$this->db->where('id_paquete', $id_paquete);

		return $this->db->update('paquetes', $data);

	}
