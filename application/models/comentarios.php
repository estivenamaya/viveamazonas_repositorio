<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comentarios extends CI_Model 
{
    function __construct()
    {        
        parent::__construct();
		$this->load->database();
    }

    /**
     * Descripcion: Obtiene todos los comentarios de una actividad
     * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
     * @param: Int $id_actividad -> Recibe el identificador de la actividad para obtener sus comentarios
     * @return: Array || 0
     */
    	function obtenerComentariosActividad($id_actividad){
    		$this->db->from('comentarios_actividad ca');
    		$this->db->join('usuarios u', 'u.id_usuarios = ca.id_usuario');
    		$this->db->where('ca.id_actividad', $id_actividad);
    		$this->db->order_by('ca.id_comentarios_actividad', 'desc');
    		$resultado = $this->db->get();

    		if ($resultado->num_rows() > 0) {
    			return $resultado->result_array();
    		}
    		else{
    			return 0;
    		}
    	}
   // ================================================================================ //

    /**
     * Descripcion: Agrega un nuevo comentario a una actividad
     * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
     * @param: Array $data -> Recibe un arreglo con la inormacion del comentario
     * @return: Int
     */
    	function agregarComentario($data){
    		$this->db->insert('comentarios_actividad', $data);
    		return $this->db->insert_id();
    	}
   // ================================================================================ //

    /**
     * Descripcion: Elimina un comentario de la base de datos
     * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
     * @param: Int $id_comentario -> Recibe el identificador del comentario que se desea eliminar
     * @return:
     */
    	function eliminarComentario($id_comentario){
    		$this->db->where('id_comentarios_actividad', $id_comentario);
    		return $this->db->delete('comentarios_actividad');
    	}
   // ================================================================================ //

}