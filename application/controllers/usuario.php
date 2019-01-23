<?php

class Usuario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('usuarios');
		$this->load->model('ubicaciones');
		
	}

/////////////////////////////////////////////////////////////////////////////////////////////////
//Solo para el usuario administrador
/////////////////////////////////////////////////////////////////////////////////////////////////
 
	public function ingresar() 
	{

		if ($this->input->post('usuario') != "" && $this->input->post('pass') != "") 
		{
			
			$flag = $this->usuarios->validarUsuario(trim($this -> input -> post('usuario')), trim($this -> input -> post('pass')));

			
			if($flag != false )
			{
				session_start();
				$_SESSION['data_user'] = $flag; 
				$this->session->set_userdata($flag);
				
				die('success');
			}
			else	
				die('failed');
			

		} else 
		{
			die('failed');
		}
	
	}


/////////////////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////////////////


	function agregar()
	{

			$response = $this->usuarios->agregar($this->input->post('usr'),$this->input->post('perfil'));
			
			$cookie=$this->session->set_userdata('id_usuario',$response);
			
			print_r($response);		
			
			//redirect('usuario/panel');
		
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	function validarNombreUsuario()
	{
	
		if($this->input->post('email'))
		{
			$flag = $this->usuarios->validarNombreUsuario($this->input->post('email'));
			
			if($flag)
				echo 'false';
			else	
				echo 'true';
		}

	}
		

/////////////////////////////////////////////////////////////////////////////////////////////////


	public function login() 
	{

		if ($this -> input -> post('usuario') != "" && $this -> input -> post('pass') != "") 
		{
			
			$flag = $this->usuarios->validarUsuario(trim($this -> input -> post('usuario')), trim($this -> input -> post('pass')));
			
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

		if($this->session->userdata('id_usuario')) {
			
			
			$this->load->view('site/panel_usuario');
		}
		else{
			
			 redirect('main/registro');
		}
	}	
		
	

/////////////////////////////////////////////////////////////////////////////////////////////////

	function salir()
	{
		
		$this -> session -> sess_destroy();
		redirect('panel');
	}

/////////////////////////////////////////////////////////////////////////////////////////////////

	function editar($id_usuario){

		if ($this->session->userdata('id_usuario')) {

			if ($this->input->post('info')) {

				$data = $this->input->post('info');


				//Datos de contraseña nueva
				if ($this->input->post('info_pass')) {
					
					$info_pass = $this->input->post('info_pass');

					//Si la contraseña actual no coincide con la especificada
					if(($info_pass['new_password'] != $info_pass['rnew_password']) && !empty($info_pass['new_password'])){

						$this->session->set_flashdata('error', 'Las contraseñas no coinciden');

					}else if(($info_pass['new_password'] == $info_pass['rnew_password']) && !empty($info_pass['new_password'])){

						if ($info_pass['current_password'] == md5($info_pass['password'])) {

							$data_pass['password_usuarios'] = md5($info_pass['new_password']);

							$this->usuarios->modificarContrasenia($data['id_usuarios'], $data_pass);

						}else{

							$this->session->set_flashdata('error', 'La contraseña actual es incorrecta');

							redirect('usuario/editar/' . $data['id_usuarios']);

						}

					}

					if ($this->usuarios->modificarUsuario($data['id_usuarios'], $data)){

						$this->session->set_flashdata('success', 'Modificacion exitosa');

					}

				}			
				

				redirect('usuario/editar/' . $data['id_usuarios']);

			}else{

				$data['usuario'] = $this->usuarios->obtenerDatosUsuario($id_usuario);
				$data['departamentos'] = $this->ubicaciones->obtenerDepartamentos();
				$this->load->view('panel/editar_usuario', $data);

			}

			
			
		}else{

			redirect('panel');

		}

	}

}
