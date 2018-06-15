<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_model');
	}

	public function index($vars="")
	{
		$this->load->view('header');
		$this->load->view('index', $vars);
		$this->load->view('footer');		
	}

	public function ingreso()
	{
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Contraseña', 'required');
		
		if ($this->form_validation->run() == FALSE):
			echo false;
		else:
			//Seteo las variables
			$usuario = $this->security->xss_clean($this->input->post('usuario'));
			$password =sha1(md5($this->security->xss_clean($this->input->post('password'))));
			//Llamo la función que validará
			$validacion = $this->Usuarios_model->valLogin($usuario, $password);
			if ($validacion == false):
				echo false;
			else:
				echo true;
			endif;
		endif;	
	}

	public function registro()
	{
		$this->form_validation->set_rules('cedula', 'cedula', 'required|numeric');
		$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|callback_alpha_dash_space');
		$this->form_validation->set_rules('usuario', 'usuario', 'required|is_unique[Usuarios.Usu_Usuario]');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[Usuarios.Usu_Correo]');
		$this->form_validation->set_rules('password', 'contraseña', 'required|min_length[8]');
		
		if ($this->form_validation->run() == FALSE):
			$vars['active']="active";
			$this->index($vars);
		else:
			//Seteo las variables
			$datos = array(
				'Usu_Cedula' => $this->security->xss_clean($this->input->post('cedula')),
				'Usu_Nombre' => $this->security->xss_clean($this->input->post('nombre')),
				'Usu_Usuario' => $this->security->xss_clean($this->input->post('usuario')),
				'Usu_Correo' => $this->security->xss_clean($this->input->post('email')),
				'Usu_Password' => sha1(md5($this->security->xss_clean($this->input->post('password'))))
			);
			$this->Usuarios_model->saveUsuario($datos);
			redirect('/index?success=true');
		endif;	
	}	

	static function alpha_dash_space($str)
	{
		return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
	}

	public function inicio()
	{
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('inicio');
		$this->load->view('footer');
	}

	public function salir()
	{
		session_start(); 
		session_destroy();
		unset($_SESSION);
		redirect('/index');
	}
}
