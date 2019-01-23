<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }


////////////////////////////////////////////////////////////////////////////////////////

	function validarNombreUsuario($username)
	{

		$this->db->from('usuarios');
		$this->db->where('email_usuarios',$username);
		$this->db->where('estado_usuarios','1');
		$result = $this->db->get();
		$num = $result->num_rows();
		return $num; 
	}

////////////////////////////////////////////////////////////////////////////////////////

	/**
	 * Descripcion: Obtiene la informacion de un usuario segun su email
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: String $email -> Recibe el email con el cual se consultara el usuario
	 * @return: Array || 0
	 */
		function obtenerUsuarioPorEmail($email){
			$this->db->from('usuarios');
			$this->db->where('email_usuarios',$email);
			$this->db->where('estado_usuarios','1');
			$result = $this->db->get();
			
			if ($result->num_rows() > 0) {
				return $result->row_array();
			}
			else{
				return 0;
			}
		}
	// ================================================================================ //
	
	function validarUsuario($username, $pass)
	{

		$pass = md5($pass);
		$this->db->from('usuarios');
		$this->db->where('email_usuarios',$username);
		$this->db->where('password_usuarios',$pass);
		$this->db->where('estado_usuarios','1');
		$result = $this->db->get();
	
		if($result->num_rows())
		{ 
			
			$usr = $result->row();
			$dat['id_usuario'] = $usr->id_usuarios;
			$dat['tipo_usuario'] = $usr->tipo_usuario;	
			$dat['nombre'] = $usr->nombre_usuarios;
			$dat['apellido'] = $usr->apellido_usuarios;
			$dat['idioma'] = $usr->id_idioma;
			$dat['moneda'] = $usr->id_moneda;
			
			return $dat;
		}else 
			return false;
	}
	

	/**
	 * Descripcion: Obtiene la informacion de un usuario segun su identificador
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_usuario -> Recibe el identificador del usuario para obtener su informacion
	 * @return: Array || 0
	 */
		function obtenerDatosUsuario($id_usuario){
			$this->db->from('usuarios u');
			$this->db->join('ubicacion_municipios um', 'um.id_municipio = u.id_ciudad');
			$this->db->join('ubicacion_departamentos ud', 'ud.id_departamento = um.id_departamento');
			$this->db->where('u.id_usuarios',$id_usuario);
			$result = $this->db->get();

			if ($result->num_rows() > 0) {
				return $result -> row_array();
			}else{
				return 0;
			}	
		}
	// ================================================================================ //

	


	function obtenerUsuarios()
	{
		
		$this->db->from('usuarios u');
		$this->db->join('ubicacion_municipios um', 'um.id_municipio = u.id_ciudad');
		$this->db->join('ubicacion_departamentos ud', 'ud.id_departamento = um.id_departamento');
		$result = $this ->db ->get();

		if ($result->num_rows() > 0) {
			return $result -> result_array();
		}
		else{
			return 0;
		}
	}
	
	/**
	 * Descripcion: Agrega un nuevo usuario al sistema
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Array $usr -> Recibe un arreglo con toda la informacion del usuario
	 * @return: Int
	 */
		function agregar($usr){
			$this->db->insert('usuarios',$usr);
			return $this->db->insert_id();
		}
	// ================================================================================ //

	function modificarUsuario($id_usuario, $data){

		$this->db->where('id_usuarios', $id_usuario);
		return $this->db->update('usuarios', $data);

	}

	function modificarContrasenia($id_usuario, $data){

		$this->db->where('id_usuarios', $id_usuario);

		return $this->db->update('usuarios', $data);

	}
	

	/**
	 * Descripcion: Agrega un nuevo item a los like del usuario
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Array $data -> Recibe un arreglo con la informacion del nuevo like
	 * @return:
	 */
		function agregarLike($data){
			return $this->db->insert('usuario_like', $data);
		}
	// ================================================================================ //

	/**
	 * Descripcion: Elimina un item de los like del usuario
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function eliminarLike($id_usuario, $articulo, $tipo){
			$this->db->where('id_usuario', $id_usuario);
			$this->db->where('id_articulo', $articulo);
			$this->db->where('tipo_like', $tipo);
			return $this->db->delete('usuario_like');
		}
	// ================================================================================ //

	/**
	 * Descripcion: Obtiene la informacion de los likes de cada usuario
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Int $id_usuario -> Recibe el identificador del usuario
	 * @param: String $tipo -> Recibe el tipo de like que desea obtener (Actividad, Destino)
	 * @return: Array
	 */
		function obtenerLikesUsuario($id_usuario, $tipo){
			$this->db->where('id_usuario', $id_usuario);
			if ($tipo != '-1') {
				$this->db->where('tipo_like', $tipo);
			}
			$this->db->from('usuario_like');

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
	 * Descripcion: Agrega un nuevo suscriptor
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Array $data -> Recibe un arreglo con la informacion del nuevo suscriptor
	 * @return: Int
	 */ 
		function agregarSuscriptor($data){
			$this->db->insert('suscriptores', $data);
			return $this->db->insert_id();
		}
	// ================================================================================ //

	/**
	 * Descripcion: Verifica que exista o no un email en la lista de suscriptores
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: String $email -> Recibe el email que se desea consultar
	 * @return: Boolean
	 */
		function obtenerSuscriptor($email){
			$this->db->from('suscriptores');
			$this->db->where('email_suscripcion', $email);
			$resultado = $this->db->get();
			return $resultado->num_rows();
		}
	// ================================================================================ //
}


