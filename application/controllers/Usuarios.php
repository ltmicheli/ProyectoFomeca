<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario');
	}
	
	public function index()
	{
		$header = [
			'title' => 'Usuarios - Index'
		];

		$view = [
			'titulo' => 'ABM Usuarios',
			'usuarios' => $this->usuario->getAll()
		];

		$footer = [
			'copy' => '&copy Copyright 2017'
		];

		$this->load->view('layout/header', $header);
		$this->load->view('usuarios/index', $view);
		$this->load->view('layout/footer', $footer);
	}

	public function agregar()
	{
		$header = [
			'title' => 'Usuarios - Agregar'
		];

		$view = [
			'titulo' => 'Agregar Usuarios',
		];

		$footer = [
			'copy' => '&copy Copyright 2017'
		];

		$this->load->view('layout/header', $header);

		// Validation Rules
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('documento', 'Documento', 'required');

		if($this->form_validation->run() == false)
		{
			$this->load->view('usuarios/agregar', $view);
		}
		else
		{
			$this->usuario->set();
			redirect('usuarios/index','refresh');
		}
		
		$this->load->view('layout/footer', $footer);
	}

	public function editar($id)
	{
		$header = [
			'title' => 'Usuarios - Agregar'
		];

		$view = [
			'titulo' => 'Agregar Usuarios',
			'usuario' => $this->usuario->get($id)
		];

		$footer = [
			'copy' => '&copy Copyright 2017'
		];

		$this->load->view('layout/header', $header);

		// Validation Rules
		$this->form_validation->set_rules('nombre', 'Nombre', 'required');
		$this->form_validation->set_rules('apellido', 'Apellido', 'required');
		$this->form_validation->set_rules('documento', 'Documento', 'required');

		if($this->form_validation->run() == false)
		{
			$this->load->view('usuarios/editar', $view);
		}
		else
		{
			$this->usuario->update();
			redirect('usuarios/index','refresh');
		}
		
		$this->load->view('layout/footer', $footer);
	}

	public function eliminar($id)
	{
		$this->usuario->delete($id);
		
		redirect('usuarios/index','refresh');
	}

}