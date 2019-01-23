<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedidos extends CI_Model 
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

	function crearPedido($data)
	{
		$data['valor_orden'] = str_replace(',', '.', $data['valor_orden']);
		$this->db->insert('ordenes',$data); 
		
		//----------------------------------------------------
		return $this->db->insert_id();
		//----------------------------------------------------

		
		
	}


	function crearProductoPedido($data, $id_orden){

		if(!empty($data)){ 

	  		for($p = 0 ; $p < count($data['nombre']); $p++){

	  			if($data['estado'][$p]){

		  			$producto_pedido['id_orden_articulo'] = 'null';
					$producto_pedido['id_orden'] = $id_orden;
					$producto_pedido['id_actividad'] = $data['producto'][$p];
					$producto_pedido['id_paquete'] = 0;
					$producto_pedido['cantidad_orden_articulos'] = $data['cantidad'][$p];
	  				$producto_pedido['valor_orden_articulos_cop'] = $data['precio_cop'][$p];
	  				$producto_pedido['valor_orden_articulos_usd'] = $data['precio_usd'][$p];
	  				
					$producto_pedido['tipo_orden_articulos'] = '1';

					$this->db->insert('orden_articulos',$producto_pedido);

		  			if (!empty($data['paquetes'][$p])) {

		  				for ($j=1; $j <= count($data['paquetes'][$p]); $j++) { 

		  					if ($data['paquetes'][$p][$j]['estado']) {

		  						$producto_pedido['id_orden_articulo'] = 'null';
								$producto_pedido['id_orden'] = $id_orden;
								$producto_pedido['id_actividad'] = $data['producto'][$p];
								$producto_pedido['id_paquete'] = $data['paquetes'][$p][$j]['id_paquete'];
								$producto_pedido['cantidad_orden_articulos'] = $data['paquetes'][$p][$j]['cantidad'];
				  				$producto_pedido['valor_orden_articulos_cop'] = $data['paquetes'][$p][$j]['precio_cop'];
				  				$producto_pedido['valor_orden_articulos_usd'] = $data['paquetes'][$p][$j]['precio_usd'];
								
								$producto_pedido['tipo_orden_articulos'] = '0';

								$this->db->insert('orden_articulos',$producto_pedido);

		  					}
		  				}
		  			}
		  		}
		  	}
		}
		
	}
	
////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Descripcion: Modifica la informacion de una orden
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_orden -> Recibe el identificador de la orden que se desea modificar
	 * @param: Array $data -> Recibe un arreglo con la nueva informacion de la orden
	 * @return: Boolean
	 */
		function modificarOrden($id_orden, $datos){
			$this->db->where('id_orden',$id_orden);
			return $this->db->update('ordenes', $datos);
		}
	// ================================================================================ //
	
	
////////////////////////////////////////////////////////////////////////////////////////
	
	function obtenerPedido($id_orden){
		$this->db->from('ordenes o');
		$this->db->join('usuarios u', 'o.id_usuario = u.id_usuarios');
		$this->db->join('ubicacion_municipios um', 'um.id_municipio = u.id_ciudad');
		$this->db->join('ubicacion_departamentos ud', 'ud.id_departamento = um.id_departamento');
		$this->db->where('o.id_orden', $id_orden);	
		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result -> row_array();
		}
		else{
			return 0;
		}
	}


	/**
	 * Descripcion: Obtiene las actividades que esen relacionadas con una orden
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_orden -> Recibe el dientificador de laorden para obtener sus actividades
	 * @return:
	 */
		function obtenerActividadOrden($id_orden)
		{
			$this->db->from('orden_articulos o');
			$this->db->join('actividades a', 'o.id_actividad = a.id_actividad');
			$this->db->where('a.id_lenguaje', $this->idioma);
			$this->db->where('o.tipo_orden_articulos', '1');
			$this->db->where('o.id_orden', $id_orden);
			$result = $this->db->get();
		
			if($result->num_rows())
			{ 	
				return $result->result_array();
			}else
				return 0;
		}
	// ================================================================================ //

	/**
	 * Descripcion: Obtiene los paquetes que esten relacionados con una orden
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_orden -> Recibe el identificador de la orden para obtener sus paquetes
	 * @return: 
	 */
		function obtenerPaqueteOrden($id_orden){
			$this->db->from('orden_articulos o');
			$this->db->join('planes_actividad pa', 'pa.id_paquete = o.id_paquete');
			$this->db->join('actividades a', 'pa.id_actividad = a.id_actividad');
			$this->db->where('pa.id_lenguaje', $this->idioma);
			$this->db->where('a.id_lenguaje', $this->idioma);
			$this->db->where('o.tipo_orden_articulos', '0');
			$this->db->where('o.id_orden', $id_orden);
			$result = $this->db->get();
		
			if($result->num_rows())
			{ 	
				return $result->result_array();
			}else
				return 0;
		}
	// ================================================================================ //

	/**
	 * Descripcion:
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function obtenerOrdenesCliente($id_usuario){
			$this->db->from('ordenes o');
			$this->db->where('o.id_usuario', $id_usuario);
			$this->db->order_by('o.id_orden', 'desc');
			$result = $this->db->get();
		
			if($result->num_rows())
			{ 	
				return $result->result_array();
			}else
				return 0;
		}
	// ================================================================================ //
	

////////////////////////////////////////////////////////////////////////////////////

	function productosPedido($id_pedido){
		$this->db->from('producto_pedido pp');
		$this->db->join('productos p', 'pp.id_producto = p.id_producto');
		$this->db->join('galerias g', 'p.id_producto = g.id_galeria');
		$this->db->join('imagenes i', 'g.id_galeria = i.id_galeria');
		$this->db->order_by('p.id_producto', 'desc');
		$this->db->where('pp.id_pedido', $id_pedido);
		$result = $this->db->get();
	
		if($result->num_rows())
		{ 	
			return $result->result_array();
		}else
			return false;
	}

////////////////////////////////////////////////////////////////////////////////////////
	
	function eliminarOrden($id_orden)
	{
		$this->db->where('id_orden',$id_orden);
		$this->db->delete('ordenes');

		$this->db->where('id_orden',$id_orden);
		return $this->db->delete('orden_articulos');
	}


////////////////////////////////////////////////////////////////////////////////////////


	function listarOrdenes()
	{
		$this->db->from('ordenes o');
		$this->db->join('usuarios u', 'o.id_usuario = u.id_usuarios');
		$this->db->join('ubicacion_municipios um', 'um.id_municipio = u.id_ciudad');
		$this->db->join('ubicacion_departamentos ud', 'ud.id_departamento = um.id_departamento');
		$this->db->order_by("o.id_orden", "desc");
		$this->db->group_by("o.id_orden");			
		$result = $this->db->get();

		if ($result->num_rows() > 0) {
			return $result -> result_array();
		}
		else{
			return 0;
		}
	}

/////////////////////////////fin////////////////////////////////////////////////////////

	function ultimoPedido()
	{
		$this->db->from('pedidos');
		$this->db->order_by("pedidos.id_pedido", "desc");
		$this->db->limit(1);				
		$result = $this->db->get();
		return $result -> result_array();
	}

	function listarEnum( $column_name )
	{

		$result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
		WHERE TABLE_NAME = 'ordenes' AND COLUMN_NAME = '$column_name'")
		or die (mysql_error());

		$row = mysql_fetch_array($result);
		$enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

		return $enumList;
	}



	
}


