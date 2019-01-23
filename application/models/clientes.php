<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////

    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }


////////////////////////////////////////////////////////////////////////////////////////

	function validarNombreCliente($username)
	{
		$this->db->from('clientes');
		$this->db->where('_username',$username);
		$this->db->where('estado','Activo');
		$result = $this->db->get();
		$num = $result->num_rows();
		return $num;
	}

////////////////////////////////////////////////////////////////////////////////////////
	
	function validarCliente($username, $pass)
	{

		$pass = md5($pass);
		$this->db->from('clientes');
		$this->db->join('clientes_perfil','clientes.id_cliente = clientes_perfil.id_cliente');
		$this->db->where('_username',$username);
		$this->db->where('_password',$pass);
		$this->db->where('estado','Activo');
		$result = $this->db->get();
	
		if($result->num_rows())
		{ 
			
			$usr = $result->row();
			$dat['id_cliente'] = $usr->id_cliente;
			$dat['nombres'] = $usr->nombres;
			
			return $dat;
			
		}else
			return false;
	}
	

//////////////////////////////////////////////////////////////////////////////////////////////////////////

	function obtenerDatosCliente($id_cliente)
	{
		
		$this->db->from('clientes_perfil cp');
		
		$this->db->join('ubicacion_departamentos ud', 'ud.id_departamento = cp.id_departamento');
		$this->db->join('ubicacion_municipios um', 'um.id_municipio = cp.id_municipio');
		$this -> db -> where('cp.id_cliente',$id_cliente);
		$result = $this -> db ->get();
		return $result -> row_array();
	}
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////	
	
	function agregar($usr, $perfil)
	{
		$dat = array();
		$dat['error']  = false;
		$insert = array(
		'id_cliente' => 'null',
		'_username' => $usr['_username'],
		'_password' =>  md5($usr['_password']),
		'estado' => 'Activo',
		);

		

		$perfil['email'] = $insert['_username'];

		$response = $this ->db -> insert('clientes',$insert);

		

		if(!$response)
		{
			return $dat['error'] = false;
		}

		$perfil['id_cliente'] = $this->db->insert_id();
		
		$response = $this -> db -> insert('clientes_perfil',$perfil);
		
		if($response != 1){
			return $dat['error'] = false;
		}

		return $perfil['id_cliente'];

	}

////////////////////////////////////////////////////////////////////////////////////////
	
	function eliminarCliente($id_cliente)
	{

		$this->db->where('id_cliente',$id_cliente);
		return $this->db->delete('clientes');
	}


////////////////////////////////////////////////////////////////////////////////////////

	function listarClientes()
	{

		$this->db->from('clientes_perfil');
		$this->db->join('clientes','clientes.id_cliente = clientes_perfil.id_cliente');
		$this->db->join('ubicacion_municipios','clientes_perfil.id_municipio = ubicacion_municipios.id_municipio');
		$this->db->order_by("clientes.id_cliente", "desc");			
		$result = $this->db->get();
		return $result -> result_array();
	}

////////////////////////////////////////////////////////////////////////////////////////

	
	function cambiarEstado($id_cliente, $estado)
	{

		$this->db->where('id_cliente',$id_cliente);
		return $this->db->update('clientes', $estado);
	}

////////////////////////////////////////////////////////////////////////////////////////

	
	function editar($id_cliente, $data)
	{

		$this->db->where('id_cliente',$id_cliente);
		return $this->db->update('clientes', $data);

	}

	function editarClientePerfil($id_cliente, $data_perfil, $data_cliente)
	{

		$this->db->where('id_cliente',$id_cliente);
		if ($this->db->update('clientes_perfil', $data_perfil)){
			$this->editar($id_cliente, $data_cliente);
		}
		else{
			return false;
		}


	}
	
////////////////////////////////////////////////////////////////////////////////////////
	

	
}


