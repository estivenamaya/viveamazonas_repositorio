<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contenidos extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }


    /**
     * Descripcion: Agrega un nuevo contenido al sistema
     * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
     * @param: Array $data -> Recibe un arreglo con la informacion del contenido
     * @return: Int
     */
    	function agregarContenido($data){
			$this->db-> insert('contenidos',$data);
			return $this->db->insert_id();
		}
    // ================================================================================ //
	

	/**
	 * Descripcion: Modifica la informacion de un contenido en un idioma especifico
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_contenido -> Recibe el identificador del contenido que se desea modificar
	 * @param: Int $id_lenguaje -> Recibe el identificador del lenguaje en el cual se desea modificar
	 * @param: Array $datos -> Recibe un arreglo con la nueva informacion del contenido
	 * @return: Boolean
	 */
		function modificarContenido($id_contenido, $id_lenguaje, $datos){
			$this->db->where('id_contenido',$id_contenido);
			$this->db->where('id_lenguaje', $id_lenguaje);
			return $this->db->update('contenidos', $datos);
		}
	// ================================================================================ //
	

	/**
	 * Descripcion: Obtiene la informacion de un contenido en especifico
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_contenido -> Recibe el identificador del contenido que se desea obtener
	 * @param: Int $id_lenguaje -> Recibe el identificado del lenguaje en el cual se desea consultar el contenido (-1 para obtenerlo en todos los lenguajes)
	 * @return: Array
	 */	
		function obtenerContenido($id_contenido, $id_lenguaje){
			$this->db->from('contenidos');
			if ($id_lenguaje != '-1') {
				$this->db->where('id_lenguaje', $id_lenguaje);
			}
			$this->db->where('id_contenido',$id_contenido);
			$result = $this->db->get();
		
			if($result->num_rows())
			{ 
				return $result->result_array();
			}else
				return 0;
		}
	// ================================================================================ //

	/**
	 * Descripcion: Obtiene la informacion del ultimo contenido registrado
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return: Array
	 */
		function obtenerUltimocontenido(){
			$this->db->from('contenidos');
			$this->db->order_by("id_contenido", "desc");
			$this->db->limit(1);			
			$result = $this->db->get();
			if($result->num_rows())
			{ 
				return $result->row_array();
			}else
				return 0;
		}
	// ================================================================================ //

	function eliminarContenido($id_contenido)
	{

		$this->db->where('id_contenido',$id_contenido);
		return $this->db->delete('contenidos');
	}


////////////////////////////////////////////////////////////////////////////////////////


	function listarContenidos()
	{

		$this->db->from('contenidos');
		$this->db->order_by("id_contenido", "desc");	
		$this->db->group_by('id_contenido');		
		$result = $this->db->get();
		
		if($result->num_rows())
		{ 
			return $result->result_array();
		}else
			return 0;
	}

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function obtener($id_contenido)
	{
		
		$this->db->from('contenidos');
		$this -> db -> where('id_contenido',$id_contenido);
		$result = $this -> db ->get();
		return $result -> row_array();
	}
	

/////////////////////////////fin////////////////////////////////////////////////////////





	
}


