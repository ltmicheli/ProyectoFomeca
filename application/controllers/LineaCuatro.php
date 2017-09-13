<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LineaCuatro extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$header = [
			'title' => 'FOMECA - Linea 1'
		];

		$view = [
			'titulo' => 'Linea 1'
		];

		$footer = [
			'copy' => '&copy Copyright 2017'
		];

		$this->load->view('layout/header', $header);
		$this->load->view('lineaCuatro/index', $view);
		$this->load->view('layout/footer', $footer);
	}
}