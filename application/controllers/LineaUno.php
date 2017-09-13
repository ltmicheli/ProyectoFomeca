<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LineaUno extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('pdf_modelo');
  //  $this->load->library('pdf');
		$this->load->model('persona');
		$this->load->model('subsidio');
		$this->load->model('capital');
		$this->load->model('corriente');
		$this->load->model('contraparte');
		$this->load->model('adecuacionEdilicia');
		$this->load->model('equipamientoTecnologico');
		$this->load->model('descripcionAdecuacion');
		$this->load->model('descripcionEquipamiento');
		$this->load->model('rrhhNoPermanentes');
		$this->load->model('viaticos');
		$this->load->model('rrhhPermanentes');
		$this->load->model('servicios');
		$this->load->model('otros');
		$this->load->model('presupuestos');
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
		$this->load->view('lineaUno/index', $view);
		$this->load->view('lineaUno/formulario');
		$this->load->view('layout/footer', $footer);
	}

 public function guardar()
 {
	 $res = $this->persona->set();
	 $res = $this->subsidio->setLinea(1);
	 $resSubsidio = $this->subsidio->set();
	 $resCapital = $this->capital->set($resSubsidio);
   $resCorriente = $this->corriente->set($resSubsidio);
   $resContraparte = $this->contraparte->set($resSubsidio);
	 $resAdecuacion = $this->adecuacionEdilicia->set($resCapital);
	 $resEquipamiento = $this->equipamientoTecnologico->set($resCapital);
	 $resDescripcionAdecuacion = $this->descripcionAdecuacion->set($resAdecuacion);
	 $resDescripcionEquipamiento = $this->descripcionEquipamiento->set($resEquipamiento);
	 $resRrhhNoPermanentes = $this->rrhhNoPermanentes->set($resCorriente);
	 $resViaticos = $this->viaticos->set($resCorriente);
	 $resRrhhPermanentes = $this->rrhhPermanentes->set($resContraparte);
	 $resServicios = $this->servicios->set($resContraparte);
	 $resOtros = $this->otros->set($resContraparte);
	 $resPresupuestos = $this->presupuestos->set($resSubsidio);
	//  echo $resSubsidio;
	//  echo $res."\n";
	 exit();
	 echo json_encode($res);
 }

	public function pdf()
	{

	}
}
