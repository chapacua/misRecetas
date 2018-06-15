<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function  __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_model');
		$rol = $this->session->userdata('Usu_Rol');
		if (!isset($rol)) {
			redirect('index');
		}elseif($rol != 1 AND $rol != 2){
			redirect('inicio');
		}
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('usuarios');
		$this->load->view('footer');		
	}

	public function listar()
	{	
		$vars['usuarios'] = $this->Usuarios_model->getUsuarios();
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('usuarios', $vars);
		$this->load->view('footer');		
	}	

	public function borrar($id)
	{
		$this->Usuarios_model->deleteUsuarioPorId($id);
		echo 1;
		return true;
	}

	public function volverAdmin($id)
	{
		$this->Usuarios_model->updateUsuarioRol($id);
		echo 1;
		return true;
	}

	public function restablecerPassword($id)
	{
		$this->Usuarios_model->updateUsuarioPassword($id);
		echo 1;
		return true;
	}
}
