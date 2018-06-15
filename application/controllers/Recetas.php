<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recetas extends CI_Controller {

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
		$this->load->model('Recetas_model');
		$this->load->model('Ingredientes_model');		
		$rol = $this->session->userdata('Usu_Rol');
		if (!isset($rol)) {
			redirect('index');
		}elseif($rol != 3){
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
		$vars['misrecetas'] = $this->Recetas_model->getRecetasPropias();		
		$vars['recetas'] = $this->Recetas_model->getRecetas();		
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('recetas', $vars);
		$this->load->view('footer');
	}	

	public function borrar($id)
	{
		/*$this->Ingredientes_model->deleteIngredientesPorId($id);*/
		echo 1;
		return true;
	}

	public function borrarIngrediente($id)
	{
		$this->Recetas_model->borrarIngrediente($id);
		echo $id;
		return true;
	}
	
	public function getIngredientesParaMostrar($id)
	{
		$vars['ingredientes'] = $this->Ingredientes_model->getIngredientesParaMostrar();
		$divId = explode("-", $id);
		$vars['id'] = $divId[1];
		$this->load->view('nuevo_select_ingrediente', $vars);
	}

	public function getIngredientesParaMostrarCrear($id)
	{
		$vars['ingredientes'] = $this->Ingredientes_model->getIngredientesParaMostrar();
		$divId = explode("-", $id);
		$vars['id'] = $divId[1];
		$this->load->view('nuevo_select_ingrediente_crear', $vars);
	}

	public function updateReceta()
	{
		//Información de la receta
		$datosReceta = array
		(
			'Rec_Nombre' => $this->security->xss_clean($this->input->post('Rec_Nombre')), 
			'Rec_comentario' => $this->security->xss_clean($this->input->post('Rec_comentario')),
			'Rec_Id' => $this->security->xss_clean($this->input->post('Rec_Id'))
		);

		//Ingredientes de la receta
		$ingredientes = $_POST['Cat_Id'];
		$cantidad = $_POST['RIng_Cantidad'];
		for ($i=0; $i < count($ingredientes) ; $i++) { 
			$datosIngredientes['Ing-'.$i] = $ingredientes[$i];
			$datosIngredientes['Cantidad'.$i] = $cantidad[$i];
		}
		$Rec_Id = $this->security->xss_clean($this->input->post('Rec_Id'));
		//Actualizo los ingredientes o creo los nuevos
		$this->Ingredientes_model->createRecetaIngredientes($datosIngredientes, $Rec_Id);
		//Seteo configuraciones para carga de imagen
		$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'] ."/misrecetas/application/views/public/img/recetas"; //Eliminar "misrecetas" si es un servidor en producción
		$config['file_name']         	= $datosReceta['Rec_Nombre'];
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10240;
		
		$this->upload->initialize($config);//inicializo las configuraciones 

		if ( ! $this->upload->do_upload('Rec_Imagen'))//Si cargar la imagen da error
		{
				$error = array('error' => $this->upload->display_errors());
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());				
				$datosReceta['Rec_Imagen'] = $data['upload_data']['file_name'];//Agrego al array que contiene los datos del formulario el nombre del archivo
		}
		
		$this->Recetas_model->updateReceta($datosReceta);
		$this->load->model('Recetas_model');
		redirect('/Recetas/listar');
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

		if ( ! $this->upload->do_upload('Rec_Imagen'))//Si cargar la imagen da error
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

	public function createReceta()
	{
		//Información de la receta
		$datosReceta = array
		(
			'Rec_Nombre' => $this->security->xss_clean($this->input->post('Rec_Nombre')), 
			'Rec_comentario' => $this->security->xss_clean($this->input->post('Rec_comentario'))
		);
		var_dump($datosReceta);
		//Ingredientes de la receta
		$ingredientes = $_POST['Cat_Id'];
		$cantidad = $_POST['RIng_Cantidad'];
		for ($i=0; $i < count($ingredientes) ; $i++) { 
			$datosIngredientes['Ing-'.$i] = $ingredientes[$i];
			$datosIngredientes['Cantidad'.$i] = $cantidad[$i];
		}
		var_dump($datosIngredientes);

		//Seteo configuraciones para carga de imagen
		$config['upload_path']          = $_SERVER['DOCUMENT_ROOT'] ."/misrecetas/application/views/public/img/recetas"; //Eliminar "misrecetas" si es un servidor en producción
		$config['file_name']         	= $datosReceta['Rec_Nombre'];
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10240;
		
		$this->upload->initialize($config);//inicializo las configuraciones 

		if ( ! $this->upload->do_upload('Rec_Imagen'))//Si cargar la imagen da error
		{
				$error = array('error' => $this->upload->display_errors());
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());				
				$datosReceta['Rec_Imagen'] = $data['upload_data']['file_name'];//Agrego al array que contiene los datos del formulario el nombre del archivo
		}
		$Rec_Id = $this->Recetas_model->createReceta($datosReceta);
		//Actualizo los ingredientes o creo los nuevos
		$this->Ingredientes_model->createRecetaIngredientes($datosIngredientes, $Rec_Id);
		$this->load->model('Recetas_model');
		redirect('/Recetas/listar');
	}

}
