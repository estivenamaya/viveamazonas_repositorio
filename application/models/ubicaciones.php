<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');/**
  * Modelo para acceder a paises, deptos y ciudades de la BD
  *
 * @package		CodeIgniter
 * @author		Ceron 
 * @copyright	Copyright (c) 2015, MundoComputo
 * @link		http://mundocomputo.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

class Ubicaciones extends CI_Model 
{

//////////////////////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerPais()
	{
		$result = $this -> db ->get('ubicacion_pais');
		return $result -> result_array();
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerDepartamentos()
	{
		$this -> db -> order_by('nombre');
		$result = $this -> db ->get('ubicacion_departamentos');
		return $result -> result_array();
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerMunicipios($id_departamento)
	{
		$this -> db -> where('id_departamento',$id_departamento);
		$result = $this -> db ->get('ubicacion_municipios');
		return $result -> result_array();
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////	

	function obtenerInfoPorCiudad($id_ciudad){
		$this->db->from('ubicacion_municipios um');
		$this->db->join('ubicacion_departamentos ud', 'ud.id_departamento = um.id_departamento');
		$this->db->where('um.id_municipio', $id_ciudad);
		$resultado = $this->db->get();

		if ($resultado->num_rows() > 0) {
			return  $resultado->row_array();
		}
		else{
			return 0;
		}
	}

}