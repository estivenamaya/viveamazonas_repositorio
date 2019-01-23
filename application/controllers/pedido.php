<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedido extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('pedidos');
		
	}
/////////////////////////////////////////////////////////////////////////////////////////////////


	/**
	 * Descripcion: Carga una lista con todos las ordenes registradas
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return: View
	 */
		function lista(){
			if($this->session->userdata('id_usuario')){
				$data['ordenes'] = $this->pedidos->listarOrdenes();
				$this->load->view('panel/lista_pedidos', $data);
			}
			else{
				redirect('panel');
			}
		}
	// ================================================================================ //


	/**
	 * Descripcion: Permite editar la informacion basica de una orden
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function editar($id_pedido){
			if($this->session->userdata('id_usuario')){

				if ($this->input->post('orden')) {
					
					$this->pedidos->modificarOrden($id_pedido, $this->input->post('orden'));
	 
				}

				$data['orden'] = $this->pedidos->obtenerPedido($id_pedido);
				$data['orden']['actividades'] = $this->pedidos->obtenerActividadOrden($data['orden']['id_orden']);
				$data['orden']['paquetes'] = $this->pedidos->obtenerPaqueteOrden($data['orden']['id_orden']);
				$data['estados'] = $this->pedidos->listarEnum('estado_orden');

				$this->load->view('panel/editar-pedido', $data);

			}else{
				redirect('panel');
			}
		}

	// ================================================================================ //


	function eliminar(){
		if($this->session->userdata('id_usuario')) 
		{
			$id_pedido = $this->input->post('id');
			echo $this->pedidos->eliminarOrden($id_pedido);
		}
	}


/////////////////////////////////////////////////////////////////////////////////////////////////
	

}
