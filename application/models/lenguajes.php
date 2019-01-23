<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lenguajes extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		$this->load->database();
    }

    /**
     * Descripcion: Obtiene la lista de lenguajes registrados
     * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
     * @param:
     * @return: Array
     */
    	function obtenerLenguajes(){
    		$this->db->from('lenguaje');
    		$resultado = $this->db->get();

    		if ($resultado->num_rows() > 0) {
    			return $resultado->result_array();
    		}
    		else{
    			return 0;
    		}
    	}
   // ================================================================================ //

}