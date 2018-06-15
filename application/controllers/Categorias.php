<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller {

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
		$this->load->model('Categorias_model');
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
		$this->load->view('categorias');
		$this->load->view('footer');		
	}

	public function listar()
	{	
		$vars['categorias'] = $this->Categorias_model->getCategorias();
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('categorias', $vars);
		$this->load->view('footer');		
	}	

	public function borrar($id)
	{
		$this->Categorias_model->deleteCategoriasPorId($id);
		echo 1;
		return true;
	}

	public function updateCategoria()
	{
		$data = array
		(
			'Cat_Id' => $this->security->xss_clean($this->input->post('Cat_Id')), 
			'Cat_Nombre' => $this->security->xss_clean($this->input->post('Cat_Nombre'))
		);
		$this->Categorias_model->updateCategoria($data);
		$this->listar();
		return true;
	}

	public function createCategoria()
	{
		$data = array
		(
			'Cat_Nombre' => $this->security->xss_clean($this->input->post('Cat_Nombre'))
		);
		$this->Categorias_model->createCategoria($data);
		echo 1;
		return true;
	}
}
