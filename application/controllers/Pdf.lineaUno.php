<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf.lineaUno extends CI_Controller {

  public function __construct()
	{
		parent::__construct();
    $this->load->model('pdf_modelo');
    $this->load->library('pdf');
	}

  public function pdf()
  {

    $this->load->view('lineaUno/pdf');
    $post = $this->pdf_modelo->obtenerListaPost();

    define("TAMANO_TITULOS", 15);
    define("TAMANO_NOMBRES", 11);
    define("TAMANO_SANGRIA", 5);
    define("TAMANO_DATOS", 10);

    $pdf = new PDF('P','mm','A4');
    $pdf->AddPage();
    //////Titulo DATOS PERSONALES//////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, "Datos personales", 0, 1, 'L');
    /////CONTENIDO DATOS PERSONALES//////
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(TAMANO_SANGRIA);//sangria
    $pdf->Cell(50,15, utf8_decode("Razón social/Comunidad:"), 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, utf8_decode("{$post->razonSocial}"), 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(39,15, utf8_decode("Nombre de fantasía:"), 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, utf8_decode("{$post->nombreFantasia}"), 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(10,15, "Cuit:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "{$post->cuit}", 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(33,15, utf8_decode("Tipo de persona:"), 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, utf8_decode("{$post->tipoPersona}"), 0, 1);
    //////TITULOS RESUMENES GENERALES////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, utf8_decode("A) Resumen del destino de los fondos (Plan de inversión)"), 0, 1, 'L');
    ///////CONTENIDO RESUMENES/////////
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(31,15, "Total proyecto:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "$"."{$post->proyectoResumen}", 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(35,15, "Total contraparte:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "$"."{$post->gastosContraparteResumenGeneral}", 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(30,15, "Total subsidio:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "$"."{$post->gastosSubsidioResumenGeneral}", 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(35,15, "Gastos de capital:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "$"."{$post->gastosCapitalResumenGeneral}", 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(36,15, "Gastos corrientes:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "$"."{$post->gastosCorrientesResumenGeneral}", 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(16,15, "Totales:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "$"."{$post->totalesResumenGeneral}", 0, 1);
    /////TITULOS GASTOS CAPITAL Y CORRIENTES/////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, "B) Destino de los fondos del subsidio", 0, 1, 'L');
    $pdf->Cell(0,10, "B)1. Resumen del destino de los fondos del subsidio", 0, 1, 'L');
    /////CONTENIDO DE GASTOS CAPITAL Y CORRIENTES////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, "Gastos de capital", 0, 1, 'C');

    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(40,15, utf8_decode("Adecuación edilicia:"), 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, utf8_decode("$"."{$post->totalGastosAdecuacionEdilicia}"), 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(52,15, utf8_decode("Equipamiento tecnológico:"), 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, utf8_decode("$"."{$post->totalGastosEquipamientoTecnologico}"), 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(45,15, "Total gastos de capital:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "{$post->totalGastosCapitalSubsidio}", 0, 1);

    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, "Gastos corrientes", 0, 1, 'C');

    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(71,15, "Recursos humanos no permanentes:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "$"."{$post->totalGastosRrhhNoPermanentes}", 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(122,15, utf8_decode("Viáticos del Personal y Traslado de Equipamiento y/o Materiales:"), 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, utf8_decode("$"."{$post->totalGastosViaticos}"), 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(63,15, "Total gastos corrientes subsidio:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "{$post->totalGastosCorrientesSubsidio}", 0, 1);

    ///////Titulos adecuacion edicilia///////////

    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, "B)2. Detalle del destino de los fondos del subsidio", 0, 1, 'L');
    $pdf->Cell(0,15, utf8_decode("B)2.1 Gastos de Capital (Equipamiento tecnológico y Adecuación edilicia)"), 0, 1, 'L');
    $pdf->Cell(0,15, utf8_decode("B)2.1.1 Adecuación edilicia"), 0, 1, 'L');
    ///////TITILOS TRANSMISION/////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, utf8_decode("Adecuación edilicia para transmisión"), 0, 1, 'C');

    $pdf->BasicTable3col($headerAdecuacion, $post->adecuacionTransmision, $post->totalAdecuacionTransmision);

    ///////TITILOS PRODUCCION/////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, utf8_decode("Adecuación edilicia para produción"), 0, 1, 'C');
    $pdf->BasicTable3col($headerAdecuacion, $post->adecuacionProduccion, $post->totalAdecuacionProduccion);
    ///////TITILOS INFRAESTRUCTURA/////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, utf8_decode("Adecuación edilicia para infraestructura general"), 0, 1, 'C');
    $pdf->BasicTable3col($headerAdecuacion, $post->adecuacionInfra, $post->totalAdecuacionInfraestructura);

    //////TITULOS EQUIPAMIENTO TECNOLOGICO////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, utf8_decode("B)2.1.2 Equipamiento tecnológico"), 0, 1, 'L');
    /////TITULO PRODUCCION/////////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, utf8_decode("Equipamiento tecnológico para producción"), 0, 1, 'C');
    $pdf->BasicTable5col($headerEquipamiento, $post->equipamientoProduccion, $post->totalEquipamientoProduccion);
    /////TITULO TRANSMISION/////////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, utf8_decode("Equipamiento tecnológico para transmisión"), 0, 1, 'C');
    $pdf->BasicTable5col($headerEquipamiento, $post->equipamientoTransmision, $post->totalEquipamientoTransmision);
    /////TITULO TRANSMISION/////////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, utf8_decode("Equipamiento tecnológico para infraestructura general"), 0, 1, 'C');
    $pdf->BasicTable5col($headerEquipamiento, $post->equipamientoInfra, $post->totalEquipamientoInfra);
    //////////////GASTOS CORRIENTES/////////////////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,20, utf8_decode("B)2.2 Gastos corrientes"), 0, 1, 'L');
    $pdf->Cell(0,15, utf8_decode("B)2.2.1 Recursos humanos no permanentes"), 0, 1, 'C');
    $pdf->BasicTable4col($headerNoPermanentes, $post->rrhhNoPermanentes, $post->totalRrhhNoPermanentes);

    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, utf8_decode("B)2.2.2 Viáticos del personal y traslado de equipamiento y/o materiales"), 0, 1, 'C');
    $pdf->BasicTable2col($headerViaticos, $post->viaticosPersonal, $post->totalViaticosPersonal);

    ////////////////CONTRAPARTE//////////////////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, utf8_decode("C) Destino de los fondos correspondientes a la contraparte"), 0, 1, 'L');
    $pdf->Cell(0,5, utf8_decode("C)1. Resumen del destino de los fondos correspondientes a la contraparte"), 0, 1, 'L');


    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(64,15, "Recursos humanos permanentes:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "$"."{$post->totalRrhhPermanentesContraparteResumen}", 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(20,15, "Servicios:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "$"."{$post->serviciosContraparteResumen}", 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(13,15, "Otros:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "$"."{$post->otrosContraparteResumen}", 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(12,15, "Total:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "{$post->totalContraparteResumen}", 0, 1);

    /////////DETALLE CONTRAPARTE/////////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, utf8_decode("C)1. Resumen del destino de los fondos correspondientes a la contraparte"), 0, 1, 'L');
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, "Recursos humanos permanentes", 0, 1, 'C');
    $pdf->BasicTable2col($headerContraparte, $post->rrhhPermanentesContraparte, $post->totalRrhhPermanentesContraparteDetalle);
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, "Servicios", 0, 1, 'C');
    $pdf->BasicTable2col($headerContraparte, $post->serviciosContraparte, $post->totalServicioContraparteDetalle);
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, "Otras erogaciones", 0, 1, 'C');
    $pdf->BasicTable2col($headerContraparte, $post->otrasErogacionesContraparte, $post->totalOtrasErogacionesContraparteDetalle);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(49,15, "Total gastos contraparte:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "{$post->totalFinalContraparte}", 0, 1);

    ///////////PRESUPUESTOS//////////////
    $pdf->SetFont('Arial', 'B', TAMANO_TITULOS);
    $pdf->Cell(0,15, "Presupuestos", 0, 1, 'L');

    $pdf->BasicTable2col($headerPresupuestos, $post->presupuestos, $post->totalRespaldadoPresupuestos);//tabla
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(51,15, utf8_decode("Monto mínimo a respaldar:"), 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, utf8_decode("$"."{$post->minimoARespaldarPresupuestos}"), 0, 1);
    $pdf->Cell(TAMANO_SANGRIA);
    $pdf->SetFont('Arial', 'B', TAMANO_NOMBRES);
    $pdf->Cell(46,15, "Monto total respaldado:", 0, 0);
    $pdf->SetFont('Arial', 'I', TAMANO_DATOS);
    $pdf->Cell(0,15, "$"."{$post->totalRespaldadoPresupuestos}", 0, 1);

    $pdf->Output("D",utf8_decode("Estimación presupuestaria - Fomeca Linea 1.pdf"));

  }
  }
}
