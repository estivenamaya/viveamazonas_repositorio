<?php
/**
  * Controlador para las vistas basicas del sitio
  *
 * @package		CodeIgniter
 * @author		Ceron 
 * @copyright	Copyright (c) 2015, MundoComputo
 * @link		http://mundocomputo.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->view('codigofacilito/bienvenido');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('slides');
		$this->load->model('actividades');
		$this->load->model('categoria');
		$this->load->model('usuarios');
		$this->load->model('contenidos');
		$this->load->model('ubicaciones');
		$this->load->model('imagenes');
		$this->load->model('testimonios');
		$this->load->model('myemail');
		$this->load->model('lenguajes');
		$this->load->model('destinos');


		if (isset($this->session->userdata('userdata')['idioma'])) {
			$this->lenguaje = $this->session->userdata('userdata')['idioma'];
			if ($this->session->userdata('userdata')['idioma'] == 1){
				$this->lang->load('header', 'spanish');
				$this->lang->load('index', 'spanish');
				$this->lang->load('contact', 'spanish');
				$this->lang->load('cart', 'spanish');
				$this->lang->load('footer', 'spanish');
			}
			else{
				$this->lang->load('header', 'english');
				$this->lang->load('index', 'english');
				$this->lang->load('contact', 'english');
				$this->lang->load('cart', 'english');
				$this->lang->load('footer', 'english');
			}
			
		}
		else{
			$this->lenguaje = 1;
			$this->lang->load('header', 'spanish');
			$this->lang->load('index', 'spanish');
			$this->lang->load('contact', 'spanish');
			$this->lang->load('cart', 'spanish');
			$this->lang->load('footer', 'spanish');
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////
	#Crear funcion que muestre en el home , loas fotos de los destinos 

     function destinoInHome(){
     	$this->load->view('destino/site/destinos',$data);
     }

    function pruebaRest(){
        $data = array();
        $data['mensaje'] = 'Info';
	    $data['estado'] = true;
	    $data['objeto'] = $this->input->post('id');
	    
        echo json_encode($data);
        die();
    }
/**
 * Descripcion: Cambia el idioma del sitio
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
	function cambiarIdioma(){
		if ($this->input->post('idioma')) {
			$data['userdata'] = $this->session->userdata('userdata');
			$data['userdata']['idioma'] = $this->input->post('idioma');
			$this->session->unset_userdata('userdata');
			$this->session->set_userdata($data);
			if ($this->session->userdata('userdata')['idioma'] == 1){
				$this->lang->load('header', 'spanish');
				$this->lang->load('index', 'spanish');
				$this->lang->load('contact', 'spanish');
			}
			else{
				$this->lang->load('header', 'english');
				$this->lang->load('index', 'english');
				$this->lang->load('contact', 'english');
			}
		}
	}
// ================================================================================ //

/**
 * Descripcion: Cambia la moneda del sitio
 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
 * @param:
 * @return:
 */
	function cambiarMoneda(){
		if ($this->input->post('moneda')) {
			$data['userdata'] = $this->session->userdata('userdata');
			$data['userdata']['moneda'] = $this->input->post('moneda');
			$this->session->unset_userdata('userdata');
			$this->session->set_userdata($data);
		}
	}
// ================================================================================ //

/**
 * index
 *
 * Muestra la vista principal del sitio
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function index() 
	{
		$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
		$data['slides'] = $this->slides->listarSlides();
		$data['actividades'] = $this->actividades->listarActividades('activas');
		$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
		$data['testimonios'] = $this->testimonios->getTestimonios();
		$data['contenidos_footer'] = $this->contenidos->listarContenidos();

		if (isset($this->session->userdata('userdata')['id_usuario'])) {
			$data['likes'] = $this->usuarios->obtenerLikesUsuario($this->session->userdata('userdata')['id_usuario'], '-1');
		}
		else{
			$data['likes'] = 0;
		}
		
		if ($data['actividades'] != 0) {
			for ($i=0; $i < count($data['actividades']); $i++) { 
				$data['actividades'][$i]['imagenes'] = $this->imagenes->listarImagenes($data['actividades'][$i]['id_galeria']);
			}
		}

		$this->load->view('site/index', $data);

	}


/////////////////////////////////////////////////////////////////////////////////////////////////


/**
 * contenido
 *
 * Muestra la vista de area de contenidos
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function contenido($id) 
	{
		
		$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
		$this->load->model('contenidos');
		$data[] = array();

		$list_search = '';
		$recent_search = $this->productos->listarBusquedasFrecuentes();

		foreach ($recent_search as $words) {
			$list_search .= ' '.$words['nombre'].' '.$words['marca'].' '.$words['referencia'];
		}

		$data['recent_search'] = explode(' ', $list_search);
		
		$data['contenido'] = $this-> contenidos ->obtenerContenido( $id ); 

		$this->load->view('site/contenido', $data);
	
	}

/////////////////////////////////////////////////////////////////////////////////////////////////


/**
 * productos
 *
 * Muestra la vista de la lista de produntos
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function productos() 
	{
		
		$this->load->model('productos');
		$this->load->model('imagenes');

		isset($_REQUEST['cat']) ? $cat = $_REQUEST['cat'] : $cat = '';
		isset($_REQUEST['search']) ? $search = $_REQUEST['search'] : $search = '';
		isset($_REQUEST['sort_by']) ? $sort_by = $_REQUEST['sort_by'] : $sort_by = '';
		isset($_REQUEST['brand']) ? $brand = $_REQUEST['brand'] : $brand = '';
		isset($_REQUEST['price']) ? $price = $_REQUEST['price'] : $price = '';

		if (!empty($brand) && (empty($search)) || $search == ' ') {
			redirect('main/productos');
		}

		if (!empty($price) && (empty($search)) || $search == ' ') {
			redirect('main/productos');
		}

		$list_search = '';
		$recent_search = $this->productos->listarBusquedasFrecuentes();

		foreach ($recent_search as $words) {
			$list_search .= ' '.$words['nombre'].' '.$words['marca'].' '.$words['referencia'];
		}

		$data['recent_search'] = explode(' ', $list_search);


		$data['contenidos'] = $this->contenidos->listarContenidos();
	    $data['masvistos'] = $this->productos ->listarProductosMasVistos(4);
		$data['destacados'] = $this ->productos ->listarProductosBuscar($search, $sort_by, $brand, $price);
		$data['banners'] = $this ->banner_m ->getBanner();

		//$search = substr($search, 1);

		$data['search'] = $cat.'$--$'.$search;

		$this->load->view('site/productos', $data);
	
	}


/////////////////////////////////////////////////////////////////////////////////////////////////


	


/**
 * contacto
 *
 * Muestra la vista de contacto
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function contactenos() 
	{
		$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
		$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
		$data['contenidos_footer'] = $this->contenidos->listarContenidos();
		if (isset($this->session->userdata('userdata')['id_usuario'])) {
			$data['likes'] = $this->usuarios->obtenerLikesUsuario($this->session->userdata('userdata')['id_usuario'], '-1');
		}
		else{
			$data['likes'] = 0;
		}
		if ($this->input->post('data')) {
			if($this->myemail->mailContacto($this->input->post('data'))){
				$data['tipo'] = 'exito';
				$data['respuesta'] = 'Se ha enviado tu mensaje';
			}
			else{
				$data['tipo'] = 'error';
				$data['respuesta'] = 'No se ha podido enviar el mensaje, por favor intente de nuevo mas tarde';
			}
		}

		$this->load->view('site/contactenos', $data);
	
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * registro
 *
 * Muestra la vista de area de registro de usuarios del sitio
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function registro() 
	{
		$data['contenidos'] = $this->contenidos->listarContenidos();

		$list_search = '';
		$recent_search = $this->productos->listarBusquedasFrecuentes();

		foreach ($recent_search as $words) {
			$list_search .= ' '.$words['nombre'].' '.$words['marca'].' '.$words['referencia'];
		}

		$data['recent_search'] = explode(' ', $list_search);
		
		$data['departamentos'] = $this->ubicaciones->obtenerDepartamentos();
		$this->load->view('site/registro', $data);
	
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * carrito
 *
 * Muestra la vista del listado de productos agregados al carrito
 * 
 * @access	public
 * @param	void
 * @return	view
 */

	public function carrito() 
	{

		$this->load->library('session');
		
		$this->load->model('carrito');
		$this->load->model('actividades');
		$this->load->model('imagenes');


		if($this->input->post('id_actividad')){
			$id_actividad = $this->input->post('id_actividad');

			if ($this->input->post('tipo_compra')) {

				$info = $this->actividades->obtenerActividad($id_actividad, $this->lenguaje);

				$imagen = $this->imagenes->listarImagenes($info[0]['id_galeria']);

				if(isset($imagen[0])){
					$imagen = base_url().'uploads/actividades/'.$info[0]['id_galeria'].'/m'.$imagen[0]['archivo'];
				}
				else{
					$imagen = base_url().'uploads/producto.png';
				}
				
				$precio_cop = $info[0]['precio_actividades_cop'];

				$precio_usd = $info[0]['precio_actividades_usd'];

				$cantidad = 1;

				$nombre = $info[0]['titulo_actividades'];
 
				echo $this ->carrito -> addProducto($nombre, $id_actividad, $precio_cop, $precio_usd, $cantidad, $imagen);

				die ('1');

			}else{
				$id_paquete = $this->input->post('id_paquete');

				$info = $this->actividades->obtenerPaquete($id_paquete, $this->lenguaje);

				echo $this->carrito->agregarPaquete($info[0]);
				die();

			}
			
		}	 

			$data['carrito'] = $this ->carrito ->carro;
			$data['nf'] = $this ->carrito ->nf;
			
		$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
		$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
		$data['contenidos_footer'] = $this->contenidos->listarContenidos();

		if (isset($this->session->userdata('userdata')['id_usuario'])) {
			$data['likes'] = $this->usuarios->obtenerLikesUsuario($this->session->userdata('userdata')['id_usuario'], '-1');
		}
		else{
			$data['likes'] = 0;
		}

		$this->load->view('site/carrito', $data);
	
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

/**
 * obtenerDepartamento
 *
 * recibe el id de un pais y retorna una cadena con un select de los departamentos que pertenecen al pais
 * 
 * @access	public
 * @param	int ($idPais)
 * @return	string (retorna una cadena con un select de departamentos)
 */

	
	function obtenerDepartamentos()
	{
		$this->load->model('ubicaciones');

		$pais = $this->input->post('idPais');
		$cadena = '';
   		if($pais == '52')
		{
			$departamentos = $this -> ubicaciones -> obtenerDepartamentos();
			foreach($departamentos as $d)
			{
				$cadena .= '<option value="'.$d['id_departamento'].'">'.$d['nombre'].'</option>';
			}
		}else
		{
			$cadena .='<select name="departamento" id="departamento">';
			$cadena .= '<option value="999">-No aplica-</option>';
			$cadena .='</select>';
		}
		echo $cadena;
	}

////////////////////////////////////////////////////////////////////////////////////////

/**
 * obtenerMunicipio
 *
 * recibe el id de un depto y retorna una cadena con las opciones de un select de los municipios que pertenecen al depto
 * 
 * @access	public
 * @param	int ($idDepartamento)
 * @return	string (retorna una cadena con un select de municipios)
 */
	
	function obtenerMunicipios()
	{
		$this->load->model('ubicaciones');

		$idDepartamento = $this->input->post('idDepartamento');
		$cadena = '';
		$municipios = $this ->ubicaciones -> obtenerMunicipios($idDepartamento);

		foreach($municipios as $m)
		{
			$cadena .= '<option value="'.$m['id_municipio'].'">'.$m['nombre_municipio'].'</option>';
		}
		echo $cadena;
	}

////////////////////////////////////////////////////////////////////////////////////////

/**
 * agregarColor
 *
 * Metodo para añadir un nuevo color de productos
 * 
 * @access	public
 * @return	boolean
 */
	
	function agregarColor()
	{
		$this->load->model('productos');

		if ($this->input->post('color_code') && $this->input->post('color_name')) {
			$data['id_producto_colores'] = 'null';
			$data['nombre_color'] = $this->input->post('color_name');
			$data['codigo_color'] = $this->input->post('color_code');

			if ($this->productos->agregarColor($data)) {
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}

////////////////////////////////////////////////////////////////////////////////////////

/**
 * agregarColor
 *
 * Metodo para eliminar un color de productos
 * 
 * @access	public
 * @return	boolean
 */
	
	function eliminarColor()
	{
		$this->load->model('productos');

		if ($this->input->post('id_color')) {

			if ($this->productos->eliminarColor($this->input->post('id_color'))) {
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}

////////////////////////////////////////////////////////////////////////////////////////

	

}
