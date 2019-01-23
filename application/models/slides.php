<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slides extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function agregarSlide($data)
	{
		
		$response = $this -> db -> insert('slides',$data);
		
		//----------------------------------------------------
		$id_slide = $this->db->insert_id();
		//----------------------------------------------------
	
		if(!$id_slide){
			return 0;
		}
		
		//----------------------------------------------------
		
		return $id_slide;
		
	}
	
////////////////////////////////////////////////////////////////////////////////////////

	function editarSlide($id_slide, $datos)
	{

		$this->db->where('id_slide',$id_slide);
	    $this->db->update('slides', $datos);
	    return ($this->db->affected_rows() > 0);
	}

///////////////////////////////////////////////////////////////////////////////////////

	function addText($data, $id_slide){
		$this->db->where('id_slide',$id_slide);
		$this->db->update('slides', $data);

		if ($this->db->affected_rows() > 0){
			return '1';
		}else{
			return '2';
		}
	}
	
////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerSlide($id_slide)
	{

		$this->db->from('slides');
		$this->db->where('id_slide',$id_slide);
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
	
	function eliminarSlide($id_slide)
	{
		
		$this->db->where('id_slide',$id_slide);
		return $this->db->delete('slides');
	}


////////////////////////////////////////////////////////////////////////////////////////


	function listarSlides()
	{

		$this->db->from('slides');
		$this->db->order_by("posicion", "asc");			
		$result = $this->db->get();
		return $result -> result_array();
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function listarUltimoSlides()
	{

		$this->db->from('slides');
		$this->db->order_by("id_slide", "desc");
		$this->db->limit(1);
		$result = $this->db->get();
		$response = $result -> result_array();
		return $response[0]['id_slide'];
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function obtener($id_slide)
	{
		
		$this->db->from('slides');
		$this -> db -> where('id_slide',$id_slide);
		$result = $this -> db ->get();
		return $result -> row_array();
	}
	

/////////////////////////////fin////////////////////////////////////////////////////////





	
}


