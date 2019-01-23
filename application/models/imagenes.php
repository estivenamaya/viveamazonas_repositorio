<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Imagenes extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function agregarImagen($data)
	{
		
		$response = $this -> db -> insert('galeria_archivos',$data);
		
		//----------------------------------------------------
		$id_imagen = $this->db->insert_id();
		//----------------------------------------------------
	
		if(!$id_imagen){
			return 0;
		}
		
		//----------------------------------------------------
		
		return $id_imagen;
		
	}
	
////////////////////////////////////////////////////////////////////////////////////////

	function editarImagen($id_imagen, $datos)
	{

		$this->db->where('id_galeria_archivos',$id_imagen);
	    $this->db->update('galeria_archivos', $datos);
	    return ($this->db->affected_rows() > 0);
	}
	
	
////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerImagen($id_imagen)
	{

		$this->db->from('galeria_archivos');
		$this->db->where('id_galeria_archivos',$id_imagen);
		$result = $this->db->get();
	
		if($result->num_rows())
		{ 
			return $result->row_array();
		}
		else
		{
			return false;
		}
	}

////////////////////////////////////////////////////////////////////////////////////////
	
	function eliminarImagen($id_imagen)
	{

		$this->db->where('id_galeria_archivos',$id_imagen);
		return $this->db->delete('galeria_archivos');
	}


////////////////////////////////////////////////////////////////////////////////////////


	function listarImagenes($id_galeria)
	{

		$this->db->from('galeria_archivos');
		$this ->db-> where('id_galerias',$id_galeria);
		//$this->db->order_by("posicion", "asc");			
		$result = $this->db->get();
		if ($result->num_rows() > 0) {
			return $result -> result_array();
		}
		else{
			return 0;
		}
		
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function obtener($id_imagen)
	{
		
		$this->db->from('galeria_archivos');
		$this -> db -> where('id_galeria_archivos',$id_imagen);
		$result = $this -> db ->get();
		return $result -> row_array();
	}
	

/////////////////////////////fin////////////////////////////////////////////////////////





	
}


