<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Destinos extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();

		if (isset($this->session->userdata('userdata')['idioma']) && !empty($this->session->userdata('userdata')['idioma'])) {
			$this->idioma = $this->session->userdata('userdata')['idioma'];
		}else{
			$this->idioma = 1;
		}
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Descripcion:
     * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
     * @param:
     * @return:
     */
    	function agregarDestino($data){
			$this->db->insert('destinos',$data);
			return $this->db->insert_id();
		}
    // ================================================================================ //

	/**
	 * Descripcion: Modifica la informacion de un destino 
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_destino -> Recibe el identificador del destino que se desea modificar
	 * @param: Int $id_lenguaje -> Recibe el lenguaje en el cual se desea modificar el destino
	 * @param: array $data -> Recibe un arreglo con la nueva informacion del destino
	 * @return:
	 */
		function modificarDestino($id_destino, $id_lenguaje, $datos){
			$this->db->where('id_destino', $id_destino);
			$this->db->where('id_lenguaje', $id_lenguaje);
			return $this->db->update('destinos', $datos);
		}
	// ================================================================================ //

	/**
	 * Descripcion:
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_destino -> Recibe el ientificador del destino que se desea obtener
	 * @param: Int $id_lenguaje -> Recibe el identificador del lenguaje para obtener la informacion
	 * @return: View
	 */	
		function obtenerDestino($id_destino, $id_lenguaje){
			$this->db->from('destinos');
			if ($id_lenguaje != '-1') {
				$this->db->where('id_lenguaje', $id_lenguaje);
			}
			$this->db->where('id_destino',$id_destino);
			$result = $this->db->get();
		
			if ($result->num_rows() > 0) {
				return $result -> result_array();
			}else{
				return 0;
			}
		}
	// ================================================================================ //
	
	/**
	 * Descripcion: Elimina un destino segun su identificador
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function eliminarDestino($id_destino){
			$this->db->where('id_destino',$id_destino);
			return $this->db->delete('destinos');
		}
	// ================================================================================ //

	/**
	 * Descripcion:
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function listarDestinos(){
			$this->db->from('destinos');
			$this->db->order_by("id_destino", "desc");	
			$this->db->group_by('id_destino');	
			$this->db->where('id_lenguaje', $this->idioma);	
			$result = $this->db->get();
			
			if ($result->num_rows() > 0) {
				return $result -> result_array();
			}else{
				return 0;
			}
		}
	// ================================================================================ //

	/**
	 * Descripcion: Obtiene la lista de destinosfavoritos
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function obtenerFavoritos($id_usuario){
			$this->db->from('usuario_like ul');
			$this->db->join('destinos d', 'ul.id_articulo = d.id_destino');
			$this->db->where('ul.tipo_like', 'Destino');
			$this->db->where('ul.id_usuario', $id_usuario);
			$this->db->where('d.id_lenguaje', $this->idioma);
			//$this->db->group_by('a.id_actividad');

			$result = $this->db->get();
		
			if($result->num_rows()){ 
				return $result->result_array();
			}
			else{
				return 0;
			}
		}
	// ================================================================================ //

	/**
	 * Descripcion:
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function obtenerUltimoDestino(){
			$this->db->from('destinos');
			$this->db->order_by("id_destino", "desc");	
			$this->db->limit(1);	
			$result = $this->db->get();

			if ($result->num_rows() > 0) {
				return $result->row_array();
			}else{
				return 0;
			}
		}
	// ================================================================================ //
}


