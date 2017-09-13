<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$header = [
			'title' => 'Home'
		];

		$view = [
			'titulo' => 'Codeigniter Example',
		];

		$footer = [
			'copy' => '&copy Copyright 2017'
		];

		$this->load->view('layout/header', $header);
		$this->load->view('home', $view);
		$this->load->view('layout/footer', $footer);
	}
}
