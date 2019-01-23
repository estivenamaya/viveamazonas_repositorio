<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Actividades extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
		if (isset($this->session->userdata('userdata')['idioma']) && !empty($this->session->userdata('userdata')['idioma'])) {
			$this->idioma = $this->session->userdata('userdata')['idioma'];
		}else{
			$this->idioma = 1;
		}
    }


    /**
     * Descripcion: Obtiene la informacion de la ultima actividad registrada
     * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
     * @param:
     * @return:
     */
	    function obtenerUltimaActividad(){
	    	$this->db->from('actividades');
	    	$this->db->order_by('id_actividad', 'desc');
	    	$this->db->limit(1);
	    	$result = $this->db->get();

	    	if ($result-> num_rows() > 0) {
	    		return $result-> row_array();
	    	}else{
	    		return 0;
	    	}

	    }
	// ================================================================================ //

	/**
	 * Descripcion: Obtiene las actividades favoritas del usuario
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function obtenerFavoritos($id_usuario){
			$this->db->from('usuario_like ul');
			$this->db->join('actividades a', 'ul.id_articulo = a.id_actividad');
			$this->db->where('ul.tipo_like', 'Actividad');
			$this->db->where('ul.id_usuario', $id_usuario);
			$this->db->where('a.id_lenguaje', $this->idioma);
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
	 * @param: Int $id_actividad -> Recibe el identificador de la actividad que se desea modificar
	 * @param: Int $id_lenguaje -> Recibe el identificador del idioma en el cual se desea modificar
	 * @param: Array $datos -> Recibe un arreglo con todos los nuevos datos de la actividad
	 * @return: Bolean
	 */
		function modificarActividad($id_actividad, $id_lenguaje, $datos){
			$this->db->where('id_actividad', $id_actividad);
			$this->db->where('id_lenguaje', $id_lenguaje);
			return $this->db->update('actividades', $datos);
		}
	// ================================================================================ //
	/**
	 * Descripcion: Agrega una nueva actividad al sistema
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Array $data -> Recibe un arreglo con la informacion de la actividad
	 * @return: Int
	 */
		function agregarActividad($data){
			$this->db->insert('actividades', $data);
			return $this->db->insert_id();
		}
	// ================================================================================ //
	/**
	 * Descripcion: Obtiene la informacion de una actividad en especifico
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_actividad -> Recibe el identificador de la actividad que se desea obtener
	 * @param: Int $id_lenguaje -> Recibe el identificador del lenguaje en el cual se desea obtener (-1 trae todos los idiomas)
	 * @return: Array
	 */
		function obtenerActividad($id_actividad, $id_lenguaje){
			$this->db->from('actividades a');
			$this->db->where('a.id_actividad', $id_actividad);
			if ($id_lenguaje != '-1') {
				$this->db->where('a.id_lenguaje', $id_lenguaje);
			}
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
	 * Descripcion: Obtiene todos los paquetes de una actividad
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_actividad -> Recibe el identificador de la actividad para obtener sus paquetes
	 * @param: Int $id_lenguaje -> Define el idioma para mostrar los paquetes
	 * @return: Array
	 */
		function paquetesActividad($id_actividad, $id_lenguaje){
			$this->db->from('planes_actividad pa');
			if ($id_lenguaje != '-1') {
				$this->db->where('id_lenguaje', $id_lenguaje);
			}
			$this->db->where('pa.id_actividad', $id_actividad);
			$this->db->group_by('pa.id_paquete');
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
	 * Descripcion: Obtiene un paquete en especidifoc segun su identificador
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_paquete() -> Recibe el identificador del paquete que se desea obtener
	 * @return: Array
	 */
		function obtenerPaquete($id_paquete, $id_lenguaje){
			$this->db->from('planes_actividad');
			$this->db->where('id_paquete', $id_paquete);
			if ($id_lenguaje != '-1') {
				$this->db->where('id_lenguaje', $id_lenguaje);
			}
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
	 * Descripcion: Obtiene el ultimo paquete registrado
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return: Array
	 */
		function obtenerUltimoPaquete(){
			$this->db->from('planes_actividad');
			$this->db->order_by('id_paquete', 'desc');
			$this->db->limit(1);
			$resultado = $this->db->get();

			if ($resultado->num_rows() > 0) {
				return $resultado->row_array();
			}
			else{
				return 0;
			}
		}
	// ================================================================================ //
	/**
	 * Descripcion: Agrega un nuevo pauqete al sistema
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Array $data -> Recibe un arreglo con toda la informacion del nuevo paquete
	 * @return: Int
	 */
		function agregarPaquete($data){
			$this->db->insert('planes_actividad', $data);
			return $this->db->insert_id();
		}
	// ================================================================================ //
	/**
	 * Descripcion: Modifica la informacion de un paquete segun su identificador
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_paquete -> Recibe el identificador del paquete que se desea modificar
	 * @param: Int $id_lenguaje -> Recibe el identificador del lenguaje en el cual se desea modificar el paquete
	 * @param: Array $data -> Recibe un arreglo con la nueva informacion del paquete
	 * @return: Boolean
	 */
		function modificarPaquete($id_paquete, $id_lenguaje, $data){
			$this->db->where('id_lenguaje', $id_lenguaje);
			$this->db->where('id_paquete', $id_paquete);
			return $this->db->update('planes_actividad', $data);
		}
	// ================================================================================ //
	
	function eliminarProducto($id_producto)
	{

		$this->db->where('id_producto',$id_producto);
		$this->db->delete('producto_busqueda');

		$this->db->where('id_producto_pc',$id_producto);
		$this->db->delete('producto_color_talla');

		$this->db->where('id_galeria',$id_producto);
		$this->db->delete('galerias');

		$this->db->where('id_producto',$id_producto);
		return $this->db->delete('productos');
	}
 	// ================================================================================ //

	/**
	 * Descripcion: Obtiene todas las actividades registradas en el sistema
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return: Array
	 */
		function listarActividades($estado = 'todas'){
			$this->db->from('actividades');
			$this->db->group_by("id_actividad");	
			$this->db->order_by("id_actividades", "desc");	
			$this->db->where('id_lenguaje', $this->idioma);	

			if ($estado == 'activas') {
				$this->db->where('estado_actividades != ', 'Inactivo');
			}

			if ($estado == 'inactivas') {
				$this->db->where('estado_actividades == ', 'Inactivo');
			}

			$result = $this->db->get();
			return $result -> result_array();
		}
	// ================================================================================ //

	/**
	 * Descripcion: Obtiene todas las actividades registradas en el sistema segun el estado
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: String $estado -> Recibe el estado de las actividades que se desean listar
	 * @return: Array
	 */
		function listarActividadesEstado($estado){
			$this->db->from('actividades');
			$this->db->group_by("id_actividad");	
			$this->db->order_by("id_actividades", "desc");
			$this->db->where('estado_actividades', $estado);			
			$result = $this->db->get();

			if ($result->num_rows() > 0) {
				return $result -> result_array();
			}else{
				return 0;
			}
		}
	// ================================================================================ //

	function listarProductosBuscar($search, $sort_by, $brand, $price)
	{

		$where_price = '';

		//Parametro de busqueda por precio
		if (!empty($price)) {
			//Si el precio esta en un rango de dos valores
			if (strpos($price, '-')) {
				$price = explode('-', $price);
				$where_price = ' AND (p.precio BETWEEN '.$price[0].' AND '.$price[1].' OR p.precio_oferta BETWEEN '.$price[0].' AND '.$price[1].')';
			}
			//Si el parametro es uno solo
			else{
				$where_price = ' AND p.precio >= '.$price;
			}
		}

		//Si no se utiliza un parametro de busqueda traera todos los productos
		if (empty($search) || $search == ' ') {
			$where_cond = '(p.estado = "Destacado" OR p.estado = "Nuevo y Destacado" OR p.estado = "Nuevo" )'; 
		}else{
			//Si el parametro de busqueda tiene menos de 7 caracteres se busca mediante LIKE
			if (strlen($search) <= 7) {
				if (!empty($brand) && $brand != ' ') {
					$where_cond = "pb.tags LIKE '%".$search."%' AND p.marca = '".$brand."'";
				}
				else{
					$where_cond = "pb.tags LIKE '%".$search."%'";
				}
				
			}
			else{
				//Si el parametro tiene mas de 7 caracteres se busca mediante fulltext
				if (!empty($brand) && $brand != ' ') {
					$where_cond = " MATCH (pb.tags) AGAINST ('".$search."' IN BOOLEAN MODE) AND p.marca = '".$brand."'";
				}
				else{
					$where_cond = " MATCH (pb.tags) AGAINST ('".$search."' IN BOOLEAN MODE) ";
				}				
				
			}
		}

		//Se concatena parametro de precio a la consulta (WHERE)
		$where_cond .= $where_price;

		$query  = "SELECT p.*, c.nombre as categoria, i.imagen as foto";
		$query .= ' FROM productos p';
		$query .= ' JOIN producto_busqueda pb ON pb.id_producto = p.id_producto';
		$query .= ' JOIN categorias c ON c.id_categoria = p.id_categoria';
		$query .= ' JOIN imagenes i ON i.id_galeria = p.id_galeria and i.posicion = 0';
		$query .= ' WHERE '.$where_cond;
		$query .= ' GROUP BY p.id_producto';

		//Segun la eleccion de crea un orden para la obtencion de datos (ORDER BY)
		if (!empty($sort_by) && $sort_by != ' ') {
			switch ($sort_by) {
				case 'price_asc':
					$query .= ' ORDER BY p.precio asc';
					break;

				case 'price_desc':
					$query .= ' ORDER BY p.precio desc';
					break;

				case 'name':
					$query .= ' ORDER BY p.nombre asc';
					break;

				case 'last_add':
					$query .= ' ORDER BY p.id_producto desc';
					break;
				
				default:
					# code...
					break;
			}
		}
		else{
			//Ordenamiento por defecto
			$query .= ' ORDER BY p.nombre asc';
		}

		//Obtiene los resultados de la consulta
		$result = $this->db->query($query);

		if($result->num_rows() > 0)
		{ 
			
			return $result->result_array();
		}
		else
		{
			return 0;
		}
		
	}




////////////////////////////////////////////////////////////////////////////////////////


	function listarProductosActivos()
	{

		$this->db->select('p.*, c.nombre as categoria,i.imagen as foto');
		$this->db->from('productos p');
		$this->db->where('p.estado   !=','Inactivo');
		$this->db->join('categorias c','c.id_categoria = p.id_categoria', 'left');
		$this->db->join('imagenes i','i.id_galeria = p.id_galeria and i.posicion = 0 ', 'left');
		$this->db->group_by("p.id_producto");
		$this->db->order_by("p.id_producto", "asc");			
		$result = $this->db->get();
		return $result -> result_array();
	}



////////////////////////////////////////////////////////////////////////////////////////


	function listarProductosDestacados($search)
	{
		if (empty($search) || $search == ' ') {
			$where_cond = '(p.estado = "Destacado" OR p.estado = "Nuevo y Destacado" ) AND p.estado != "Inactivo"'; 
		}else{
			$search = substr($search, 1);
			$where_cond = '(p.estado = "Destacado" OR p.estado = "Nuevo y Destacado") AND (p.nombre LIKE "%'.$search.'%" OR p.entradilla LIKE "%'.$search.'%")';
		}
		$this->db->select('p.*, c.nombre as categoria,i.imagen as foto');
		$this->db->from('productos p');
		$this->db->where($where_cond);
		$this->db->join('categorias c','c.id_categoria = p.id_categoria', 'left');
		$this->db->join('imagenes i','i.id_galeria = p.id_galeria and i.posicion = 0 ', 'left');
		$this->db->group_by("p.id_producto");	
		$this->db->order_by("p.id_producto", "desc");			
		$result = $this->db->get();

		return $result -> result_array();
	 }



////////////////////////////////////////////////////////////////////////////////////////


	function listarProductosMasVistos($limit)
	{

		$this->db->select('p.*, c.nombre as categoria,i.imagen as foto');
		$this->db->from('productos p');
		$this->db->join('categorias c','c.id_categoria = p.id_categoria', 'left');
		$this->db->join('imagenes i','i.id_galeria = p.id_galeria and i.posicion = 0 ', 'left');
		$this->db->group_by("p.id_producto");	
		$this->db->order_by("p.visitas", "desc");			
		$this->db->limit($limit);
		$result = $this->db->get();
		return $result -> result_array();
	 }


////////////////////////////////////////////////////////////////////////////////////////


	function listarProductosImagenes()
	{
		$this->db->select('imagen');
		$this->db->from('imagenes');
		$this->db->where('id_galeria');

		$subquery = $this->db->_compile_select();

		$this->db->select('p.*, c.nombre as categoria');
		$this->db->from('productos p');
		$this->db->join('categorias c','c.id_categoria = p.id_categoria', 'left');
		$this->db->join('imagenes i','i.id_galeria = p.id_galeria ', 'left');
		$this->db->group_by("p.id_producto");
		$this->db->order_by("p.id_producto", "asc");			
		$result = $this->db->get();
		return $result -> result_array();
	}

////////////////////////////////////////////////////////////////////////////////////////



	function listarEnum( $column_name )
	{

/*
		$query = mysql_query("SHOW COLUMNS FROM productos LIKE 'sistema'");

		// Creamos un Array con el resultado de la consulta
		$result = mysql_fetch_array($query);
		return $result = explode("','",preg_replace("/(enum|set)\\('(.+?)'\\)/","\\\\2",$result[1]));
*/
		$result = mysql_query("SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS
		WHERE TABLE_NAME = 'productos' AND COLUMN_NAME = '$column_name'")
		or die (mysql_error());

		$row = mysql_fetch_array($result);
		$enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

		return $enumList;
	}

/////////////////////////////fin////////////////////////////////////////////////////////


	function modificarEstado($id_actividad, $data){

		$this->db->where('id_actividad', $id_actividad);

		return $this->db->update('actividades', $data);

	}


	function modificarEstado_PlanActividad($id_planes_actividad, $data){

		$this->db->where('id_planes_actividad', $id_planes_actividad);

		return $this->db->update('actividades', $data);

	}


	function obtenerCategoriaPorId($id_categoria){
        $this->db->from('categorias');
        $this->db->where("id_categoria", $id_categoria);
        $result = $this ->db ->get();
        return $result->row_array();
    }

    function obtenerProductoBusqueda($id_producto){
        $this->db->from('producto_busqueda');
        $this->db->where("id_producto", $id_producto);
        $result = $this ->db ->get();
        return $result->row_array();
    }


	
}


