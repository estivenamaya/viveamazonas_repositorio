<?php

class Cliente extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('usuarios');
		$this->load->model('pedidos');
		$this->load->model('ubicaciones');
		$this->load->model('contenidos');
		$this->load->model('actividades');
		$this->load->model('ubicaciones');
		$this->load->model('lenguajes');
		$this->load->model('imagenes');
		$this->load->model('destinos');
		$this->load->model('myemail');

		if (isset($this->session->userdata('userdata')['idioma'])) {
			$this->lenguaje = $this->session->userdata('userdata')['idioma'];
			if ($this->session->userdata('userdata')['idioma'] == 1){
				$this->lang->load('header', 'spanish');
				$this->lang->load('account', 'spanish');
				$this->lang->load('buyed', 'spanish');
				$this->lang->load('favorites', 'spanish');
				$this->lang->load('footer', 'spanish');
			}
			else{
				$this->lang->load('header', 'english');
				$this->lang->load('account', 'english');
				$this->lang->load('buyed', 'english');
				$this->lang->load('favorites', 'english');
				$this->lang->load('footer', 'english');
			}
			
		}
		else{
			$this->lenguaje = 1;
			$this->lang->load('header', 'spanish');
			$this->lang->load('account', 'spanish');
			$this->lang->load('buyed', 'spanish');
			$this->lang->load('favorites', 'spanish');
			$this->lang->load('footer', 'spanish');
		}
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Descripcion: Valida que la informacion de login para un usuario sea correcta
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function ingresar(){
			if (!empty($this->input->post('usuario')) && !empty($this->input->post('pass'))){
				$flag = $this->usuarios->validarUsuario(trim($this->input->post('usuario')), trim($this->input->post('pass')));
				
				if($flag){
					if ($flag['tipo_usuario'] != 1) {
						$this->session->set_userdata('userdata', $flag);
						die('success');
					}
					else{
						die('Error, Usuario no registrado');
					}
				}
				else	
					die('Error, Usuario y/o contraseña incorrecta');

			}
			else{
				die('Error, datos incompletos');
			}
		}
	// ================================================================================ //

	/**
	 * Descripcion: Agrega un nuevo cliente al sistema
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function agregar(){
			if ($this->input->post()) { 
				$data['id_usuarios'] = 'null';
				$data['tipo_usuario'] = '2';
				$data['nombre_usuarios'] = $this->input->post('nombre');
				$data['apellido_usuarios'] = $this->input->post('apellido');
				$data['email_usuarios'] = trim($this->input->post('usuario'));
				$data['password_usuarios'] = md5($this->input->post('contrasenia'));
				$data['estado_usuarios'] = '1';
				$data['id_idioma'] = '1';

				$response = $this->usuarios->agregar($data);

				if ($response) {
					$flag = $this->usuarios->validarUsuario(trim($data['email_usuarios']), $this->input->post('contrasenia'));

					if($flag){
						if ($flag['tipo_usuario'] != 1) {
							$this->session->set_userdata('userdata', $flag);
							die('success');
						}
						else{
							die('0');
						}
					}
				}else{
					die('0');
				}
			    
				$this->load->model('myemail');
				
				//$this->myemail->mailRegistro($usr);
				//$this->myemail->mailRegistroUsuario($usr);
		 
			}
		}
	// ================================================================================ //

	/**
	 * Descripcion: Carga una vista con las actividades y destinos favoritos
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return: View
	 */
		function favoritos(){
			$data['actividades'] = $this->actividades->obtenerFavoritos($this->session->userdata('userdata')['id_usuario']);
			$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();
			$data['contenidos_footer'] = $this->contenidos->listarContenidos();
			$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
			$data['likes'] = $this->usuarios->obtenerLikesUsuario($this->session->userdata('userdata')['id_usuario'], '-1');
			$data['destinos'] = $this->destinos->obtenerFavoritos($this->session->userdata('userdata')['id_usuario']);

			if ($data['destinos'] != 0) {
				for ($i=0; $i < count($data['destinos']); $i++) { 
					$data['destinos'][$i]['imagenes'] = $this->imagenes->listarImagenes($data['destinos'][$i]['id_galeria']);
				}
			}

			if ($data['actividades'] != 0) {
				for ($i=0; $i < count($data['actividades']); $i++) { 
					$data['actividades'][$i]['imagenes'] = $this->imagenes->listarImagenes($data['actividades'][$i]['id_galeria']);
				}
			}
			$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
			$this->load->view('site/favoritos', $data);
		}
	// ================================================================================ //

	/**
	 * Descripcion: Carga el historial de compras del cliente
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: 
	 * @return: View
	 */ 
		function historial(){
			$id_usuario = $this->session->userdata('userdata')['id_usuario'];
			$data['ordenes'] = $this->pedidos->obtenerOrdenesCliente($id_usuario);
			$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();

			if ($data['ordenes'] != 0) {
				for ($i=0; $i < count($data['ordenes']); $i++) { 
					$data['ordenes'][$i]['actividades'] = $this->pedidos->obtenerActividadOrden($data['ordenes'][$i]['id_orden']);
				}

				for ($i=0; $i < count($data['ordenes']); $i++) { 
					$data['ordenes'][$i]['paquetes'] = $this->pedidos->obtenerPaqueteOrden($data['ordenes'][$i]['id_orden']);
				}
			}


			$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
			$data['contenidos_footer'] = $this->contenidos->listarContenidos();
			$data['likes'] = $this->usuarios->obtenerLikesUsuario($this->session->userdata('userdata')['id_usuario'], '-1');

			$this->load->view('site/historial_compras', $data);
		}
	// ================================================================================ //
	

/////////////////////////////////////////////////////////////////////////////////////////////////

	function eliminar()
	{

		if($this->session->userdata('id_usuario')) 
		{
			
			if($this->input->post('id'))
			{
		    	
				if($servicio = $this -> clientes->obtenerDatosCliente($this->input->post('id')) )
				{
					
					
					if( $this -> clientes->eliminarCliente($this->input->post('id')) )
					{
						
						
						$respuesta = array (
						  'eliminado'=>true,
						  'estado'=>'success',
						  'mensaje'=>'Cliente eliminado');
					
					}
					else
					{

						$respuesta = array (
						  'eliminado'=>false,
						  'estado'=>'error',
						  'mensaje'=>"Ups, hubo un error al eliminar el cliente, por favor contáctese con soporte.");
					} 
				}
				else
				{
					$respuesta = array (
					  'eliminado'=>false,
					  'estado'=>'error',
					  'mensaje'=>"El cliente no se encuentra en la base de datos. No es posible eliminar.");
				}
			}
			else
			{
		
				$respuesta = array (
				  'eliminado'=>false,
				  'estado'=>'error',
				  'mensaje'=>"No tiene permisos para esta acción");
			}

		}
		else
		{
	
			$respuesta = array (
			  'eliminado'=>false,
			  'estado'=>'error',
			  'mensaje'=>"No tiene permisos para esta acción");
		}
		echo json_encode($respuesta);
		
	}
	

/////////////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Descripcion: Valida si existe o no un usuario con el mismo email
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function validarNombreUsuario(){
			if($this->input->post('usuario'))
			{
				$flag = $this->usuarios->validarNombreUsuario($this->input->post('usuario'));
				
				if($flag)
					echo '0';
				else	
					echo '1';
			}
		}
	// ================================================================================ //
	
		

/////////////////////////////////////////////////////////////////////////////////////////////////


	public function login() 
	{

		if ($this -> input -> post('usuario') != "" && $this -> input -> post('pass') != "") 
		{
			
			$flag = $this->clientes->validarCliente(trim($this -> input -> post('usuario')), trim($this -> input -> post('pass')));
			
			if($flag != false )
			{
			    
			    $this->session->set_userdata($flag);

				die('success');
			}
			else	
			{
				
				die('failed');
			}
			

		} else 
		{
			die('failed');
		}
	
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

	
	function panel()
	{

		if($this->session->userdata('id_cliente')) 
		{
			
			$data['usr'] = $this-> clientes ->obtenerDatosCliente($this->session->userdata('id_cliente'));



			$this->load->view('site/panel_cliente', $data);

		}
		else{
			
			 redirect('/main/registro');
		}
		
	}	
		
	
/////////////////////////////////////////////////////////////////////////////////////////////////

	function salir()
	{
		$this->session->sess_destroy();
		redirect('');
	}

	
/////////////////////////////////////////////////////////////////////////////////////////////////


	
	function lista()
	{
			
		if($this->session->userdata('id_usuario')) 
		{
			$data['clientes'] = $this->usuarios->obtenerUsuarios();
			$this->load->view('panel/lista_clientes', $data);
		}
		else{
			
			 redirect('panel');
		}

	}	
		
	
/////////////////////////////////////////////////////////////////////////////////////////////////


	function cambiarEstado()
	{
		if( $this->session->userdata('id_usuario') ) 
		{
			
			if($this->input->post('id'))
			{
		    	
				if($cliente = $this->clientes->obtenerDatosCliente($this->input->post('id')) )
				{
					
					$estado['pagado'] = $this->input->post('pagado'); 
					if( $this->clientes->cambiarEstado( $this->input->post('id'), $estado ) )
					{
						
						
						$respuesta = array (
						  'editado'=>true,
						  'estado'=>'Success',
						  'mensaje'=>'El estado del cliente ha sido modificado');
					
					}
					else
					{

						$respuesta = array (
						  'editado'=>false,
						  'estado'=>'Error',
						  'mensaje'=>"Ups, hubo un error al eliminar el cliente, por favor contáctese con soporte.");
					} 
					
				}
				else
				{
					$respuesta = array (
					  'editado'=>false,
					  'estado'=>'Error',
					  'mensaje'=>"El cliente no se encuentra en la base de datos. No es posible eliminar.");
				}
			}
			else
			{
		
				$respuesta = array (
				  'editado'=>false,
				  'estado'=>'Error',
				  'mensaje'=>"No tiene permisos para esta acción");
			}

		}
		else
		{
	
			$respuesta = array (
			  'editado'=>false,
			  'estado'=>'Error',
			  'mensaje'=>"No tiene permisos para esta acción");
		}
		echo json_encode($respuesta);
		
	}
	
/////////////////////////////////////////////////////////////////////////////////////////////////

	function comprobarSesion()
	{
		if( $this->session->userdata('userdata')['id_usuario'] ) 
		{
			exit('1');
		}
		else
		{
			exit('0');
		}
	}

	
/////////////////////////////////////////////////////////////////////////////////////////////////

	function cuenta(){
		if ($this->session->userdata('userdata')['id_usuario']) {
			$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
			$data['contenidos_footer'] = $this->contenidos->listarContenidos();
			$data['likes'] = $this->usuarios->obtenerLikesUsuario($this->session->userdata('userdata')['id_usuario'], '-1');
			$data['usuario'] = $this->usuarios->obtenerDatosUsuario($this->session->userdata('userdata')['id_usuario']);
			$ubicacion = $this->ubicaciones->obtenerInfoPorCiudad($data['usuario']['id_ciudad']);
			$data['usuario']['id_departamento'] = $ubicacion['id_departamento'];
			$data['usuario']['nombre'] = $ubicacion['nombre'];
			$data['usuario']['nombre_municipio'] = $ubicacion['nombre_municipio'];
			$data['departamentos'] = $this->ubicaciones->obtenerDepartamentos();
			$data['municipios'] = $this->ubicaciones->obtenerMunicipios($data['usuario']['id_departamento']);
			$data['lenguajes'] = $this->lenguajes->obtenerLenguajes();

			$this->load->view('site/mi-cuenta', $data);
		}else{
			redirect('');
		}
	}



	function pedido($id_pedido){
		if ($this->session->userdata('id_cliente')) {

			$list_search = '';
			$recent_search = $this->productos->listarBusquedasFrecuentes();

			foreach ($recent_search as $words) {
				$list_search .= ' '.$words['nombre'].' '.$words['marca'].' '.$words['referencia'];
			}

			$data['recent_search'] = explode(' ', $list_search);

			$data['contenidos'] = $this->contenidos->listarContenidos();
			$data['productos'] = $this->pedidos->productosPedido($id_pedido);
			$data['cliente'] = $this->clientes->obtenerDatosCliente($this->session->userdata('id_cliente'));
			$data['pedido'] = $this->pedidos->obtenerPedido($id_pedido);
			$data['banners'] = $this->banner_m->getBanner();

			if ($this->session->userdata('id_cliente') == $data['pedido']['id_cliente']) {
				$this->load->view('site/pedido', $data);
			}else{
				redirect('');
			}
			
		}else{
			redirect('main/registro');
		}
	}

	function modificar(){
		$id_usuario = $this->session->userdata('userdata')['id_usuario'];
		$buscar = ['%40', '+', '%23'];
		$reemplazar = ['@', ' ', '#'];
		if ($id_usuario){
			if ($this->input->post('form')) {
				$vacio = false;
				/* Filtrar los datos */
				$info_temp = explode(';', addslashes(htmlspecialchars($this->input->post('form'))));
				for ($i=0; $i < count($info_temp); $i++) { 
					$temp = explode('=', $info_temp[$i]);
					$data[$temp[0]] = str_replace('&amp', '', $temp[1]);
					if ((empty($data[$temp[0]])) && $i != 0 && $i != 1 && $i != 6) {
						$vacio = true;
					}
				}

				if ($vacio) {
					echo 'Por favor no olvide que todos los campos marcados con (*) son obligatorios';
				}
				else{
					if ($this->usuarios->obtenerDatosUsuario($id_usuario) != 0) {
						$info['nombre_usuarios'] = str_replace($buscar, $reemplazar, $data['nombre_usuarios']);
						$info['apellido_usuarios'] = str_replace($buscar, $reemplazar, $data['apellido_usuarios']);
						$info['email_usuarios'] = str_replace($buscar, $reemplazar, $data['email_usuarios']);
						$info['id_idioma'] = $data['id_idioma'];
						$info['telefono_usuarios'] = $data['telefono_usuarios'];
						$info['movil_usuarios'] = $data['movil_usuarios'];
						$info['direccion_usuarios'] = str_replace($buscar, $reemplazar, $data['direccion_usuarios']);
						$info['id_ciudad'] = $data['id_ciudad'];

						if (!empty($data['password']) || !empty($data['r-password'])) {
							if ($data['password'] == $data['r-password']) {
								$info['password_usuarios'] = md5($data['password']);
							}
							else{
								echo 'Las contraseñas no coinciden';
								die();
							}
						}

						if ($this->usuarios->modificarUsuario($id_usuario, $info)) {
							echo '1';
						}
						else{
							echo 'Ha ocurrido un error al intentar modificar los datos';
						}

					}
					else{
						echo 'El usuario no existe';
					}
				}
			}
		}
		else{
			redirect('');
		}
	}


	/**
	 * Descripcion: Agrega o elimina un articulode la lista de favoritos
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_articulo -> Recibe el identificador del articulo que se desea agregar o eliminar
	 * @param: String $tipo -> Recibe el tipo de articulo (Actividad, Destino)
	 * @return:
	 */
		function establecerLike($id_articulo, $tipo){
			if ($this->session->userdata('userdata')['id_usuario']) {
				$id_usuario = $this->session->userdata('userdata')['id_usuario'];
				$likes = $this->usuarios->obtenerLikesUsuario($id_usuario, $tipo);
				$existe = false;

				if ($likes != 0) {
					foreach ($likes as $like) {
						if ($like['id_articulo'] == $id_articulo && $like['tipo_like'] == $tipo) {
							$existe = true;
						}
					}
				}

				if ($existe) {
					if($this->usuarios->eliminarLike($id_usuario, $id_articulo, $tipo)){
						echo '1';
					}
					else{
						echo '0';
					}
				}
				else{
					$data['id_usuario_like'] = 'null';
					$data['id_usuario'] = $id_usuario;
					$data['id_articulo'] = $id_articulo;
					$data['tipo_like'] = $tipo;
					if ($this->usuarios->agregarLike($data)){
						echo '1';
					}
					else{
						echo '0';
					}
				}
			}
		}
	// ================================================================================ //

	/**
	 * Descripcion: Genera una nueva contraseña y se la envia al cliente por email
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return: 
	 */
		function recordarContrasenia(){
			if ($this->input->post('email')) {
				if($this->usuarios->validarNombreUsuario($this->input->post('email'))){
					$password = 'VA-'.rand(10000,99999);
					$password_md5 = md5($password); 
					$info = $this->usuarios->obtenerUsuarioPorEmail($this->input->post('email'));
					$info['password_usuarios'] = $password_md5;
					if ($this->usuarios->modificarUsuario($info['id_usuarios'], $info)){
						$info['password'] = $password;
						if ($this->myemail->recordarContrasenia($info)){
							echo 'Se ha enviado un correo con su nueva contraseña, 1';
							die();
						}
						else{
							echo 'Ha ocurrido un error al intentar enviar el correo, 0';
							die();
						}
					}
					else{
						echo 'Ha ocurrido un error por favor intente de nuevo mas tarde, 0';
						die();
					}
				}
				else{
					echo 'Lo sentimos el email que ha escrito no se encuentra registrado, 0';
					die();
				}
			}else{
				if (!isset($this->session->userdata('userdata')['id_usuario'])) {
					$data['ofertas'] = $this->actividades->listarActividadesEstado('Oferta');
					$data['contenidos_footer'] = $this->contenidos->listarContenidos();
					$this->load->view('site/recordar_contrasenia', $data); 
				}
				else{
					redirect('');
				}
			}
		}
	// ================================================================================ //

	/**
	 * Descripcion: Agrega un nuevo suscriptor al sistema
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function agregarSuscriptor(){
			if ($this->input->post('email')) {
				if (!$this->usuarios->obtenerSuscriptor($this->input->post('email'))) {
					$info['id_suscripcion'] = 'null';
					$info['email_suscripcion'] = $this->input->post('email');
					$info['fecha_suscripcion'] = date('Y-m-d');
					if($this->usuarios->agregarSuscriptor($info)){
						echo 'Felicidades, ahora haces parte de nuestro grupo de suscriptores.';
					}
					else{
						echo 'Ha ocurrido un error, por favor intenta de nuevo mas tarde.';
					}
				}
				else{
					echo 'Ya existe una suscripcion con esta cuenta.';
				}
			}
		}
	// ================================================================================ //
}
