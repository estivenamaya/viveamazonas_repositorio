<?php

class Comentario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('usuarios');
		$this->load->model('comentarios');
	}

	/**
	 * Descripcion: Agrega un nuevo comentario a una actividad
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_actividad -> Recibe el identificador de la actividad a la cual se le asignara el comentario
	 * @return:
	 */
		function agregarComentario($id_actividad){
			if ($this->session->userdata('userdata')['id_usuario']) {
				$calificacion = $this->input->post('calificacion');
				if ($this->input->post('calificacion') > 5) {
					$calificacion = 5;
				}else if($this->input->post('calificacion') < 1){
					$calificacion = 1;
				}

				$data['id_comentarios_actividad'] = 'null';
				$data['id_actividad'] = $id_actividad;
				$data['contenido_comentario'] = $this->input->post('comentario');
				$data['fecha_comentario'] = date('Y-m-d');
				$data['calificacion_comentario'] = $calificacion;
				$data['id_usuario'] = $this->session->userdata('userdata')['id_usuario'];
				if($this->comentarios->agregarComentario($data)){
					echo '1';
				}
				else{
					echo '0';
				}
			}
			else{
				echo '0';
			}
		}
	// ================================================================================ //

	/**
	 * Descripcion: Elimina un comentario de una actividad
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_comentario -> Recibe el identificador del comentario que se desea eliminar
	 * @return:
	 */
		function eliminarComentario($id_comentario){
			if ($this->session->userdata('userdata')['id_usuario'] == $this->input->post('usuario')) {
				if($this->comentarios->eliminarComentario($id_comentario)){
					echo '1';
				}
				else{
					echo '0';
				}
			}
		}
	// ================================================================================ //

}