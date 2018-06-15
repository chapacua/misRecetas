<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ingredientes extends CI_Controller {

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
		$this->load->model('Ingredientes_model');
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
		
		$vars['ingredientes'] = $this->Ingredientes_model->getIngredientes();
		$this->load->model('Categorias_model');
		$vars['categorias'] = $this->Categorias_model->getCategorias();		
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('ingredientes', $vars);
		$this->load->view('footer');		
	}	

	public function borrar($id)
	{
		$this->Ingredientes_model->deleteIngredientesPorId($id);
		echo 1;
		return true;
	}
	
	public function updateIngrediente()
	{
		$datosFormulario = array
		(
			'Ing_Nombre' => $this->security->xss_clean($this->input->post('Ing_Nombre')), 
			'Cat_Id' => $this->security->xss_clean($this->input->post('Cat_Id')),
			'Ing_comentario' => $this->security->xss_clean($this->input->post('Ing_comentario')),
			'Ing_Id' => $this->security->xss_clean($this->input->post('Ing_Id')),
		);

		//Seteo configuraciones para carga de imagen
		$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'] ."/misrecetas/application/views/public/img/ingredientes"; //Eliminar "misrecetas" si es un servidor en producción
		$config['file_name']         	= $datosFormulario['Ing_Nombre'];
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10240;
		
		$this->upload->initialize($config);//inicializo las configuraciones 

		if ( ! $this->upload->do_upload('Ing_Imagen'))//Si cargar la imagen da error
		{
				$error = array('error' => $this->upload->display_errors());
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());				
				$datosFormulario['Ing_Imagen'] = $data['upload_data']['file_name'];//Agrego al array que contiene los datos del formulario el nombre del archivo
		}
		
		$vars['nuevoIngrediente'] = $this->Ingredientes_model->updateIngrediente($datosFormulario);
		$this->load->model('Categorias_model');
		$vars['categorias'] = $this->Categorias_model->getCategorias();	
		redirect('/Ingredientes/listar');
	}

	public function createIngrediente()
	{
		$datosFormulario = array
		(
			'Ing_Nombre' => $this->security->xss_clean($this->input->post('Ing_Nombre')), 
			'Cat_Id' => $this->security->xss_clean($this->input->post('Cat_Id')),
			'Ing_comentario' => $this->security->xss_clean($this->input->post('Ing_comentario')),
		);

		//Seteo configuraciones para carga de imagen
		$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'] ."/misrecetas/application/views/public/img/ingredientes"; //Eliminar "misrecetas" si es un servidor en producción
		$config['file_name']         	= $datosFormulario['Ing_Nombre'];
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10240;
		
		$this->upload->initialize($config);//inicializo las configuraciones 

		if ( ! $this->upload->do_upload('Ing_Imagen'))//Si cargar la imagen da error
		{
				$error = array('error' => $this->upload->display_errors());

				var_dump($error);
				echo $config['upload_path'];
				die();
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());				
				$datosFormulario['Ing_Imagen'] = $data['upload_data']['file_name'];//Agrego al array que contiene los datos del formulario el nombre del archivo
		}
		
		$vars['nuevoIngrediente'] = $this->Ingredientes_model->createIngrediente($datosFormulario);
		$this->load->model('Categorias_model');
		$vars['categorias'] = $this->Categorias_model->getCategorias();	

		$this->load->view("nuevo_ingrediente", $vars);		
	}
}
