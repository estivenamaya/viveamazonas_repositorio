<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
/**
 * Description of errors
 *
 * @author Ing. Marcel M. Piña Parma
 * @name errors
 * @version 1.0
 * @date 04 Jul 2013
 *
 * 
 * Description:
 * Clase para poder customizar el error 404 y asi colocarle CSS
 * 
 * */

class Errors extends CI_Controller
{
 private $data = array();

 function __construct()
 {
 parent::__construct();
 $this->load->helper('html');
 }

 function error_404()
 {
 //llamamos a la vista que muestra el error 404 personalizado
 $this->load->view('errors/404');
 }
}
/* End of file errors.php */
/* Location: ./application/controllers/errors.php */