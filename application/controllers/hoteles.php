<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Hoteles extends CI_Controller {



	function construct(){

		partent::__construt();
	}

	function mostrar_hoteles(){
		$this->load->view('site/hoteles');
	}


}