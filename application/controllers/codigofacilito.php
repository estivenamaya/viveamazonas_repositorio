<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Codigofacilito extends CI_Controller{

	function __contruct() {
		parent::__construct();

	}

	function index(){
		$this->load->view('codigofacilito/bienvenido');
		$this->load->view('codigofacilito/bienvenido2');

	}


}

?>