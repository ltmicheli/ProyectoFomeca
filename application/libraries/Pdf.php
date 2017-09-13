<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    require_once APPPATH."/third_party/fpdf/fpdf.php";

    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {
        public function __construct() {
            parent::__construct();
        }
        // Cabecera de página
  function Header()
  {
      //Logo
  //    $this->Image('fomeca.png',null,null,190,50); // file, x, y, weight, height
      // Arial bold 15
      $this->SetFont('Arial','B',15);
      // Movernos a la derecha
    //  $this->Cell(65);
      // Título
    //  $this->Cell(60,10,'FOMECA - LINEAS',1,0,'C');
      // Salto de línea
      $this->Ln(10);
  }
  // Pie de página
  function Footer()
  {
      // Posición: a 1,5 cm del final
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Número de página
      $this->Cell(0,10,'Pag '.$this->PageNo(),0,0,'C');
  }
  //Tabla simple
function BasicTable2col($header, $data, $total)
{
    $w = array(146, 44);
    // Header
    $this->SetFont('Arial', 'B', TAMANO_DATOS);
    for($i=0;$i<count($header);$i++)
          $this->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C');
      $this->Ln();
    // Data
    $this->SetFont('Arial', 'I', TAMANO_DATOS);
    foreach($data as $row)
    {
        $i = 0;
        foreach($row as $col)
        {
          if($i === 0){
            $this->Cell($w[$i],6,utf8_decode($col),1);
          }else{
            $this->Cell($w[$i],6,utf8_decode($col),1,0,'C');
          }
          $i++;
        }
        $this->Ln();
    }
    //total
    $this->SetFont('Arial', 'B', TAMANO_DATOS);
    $this->Cell(146,7,"TOTAL",1,0,'C');
    $this->SetFont('Arial', 'I', TAMANO_DATOS);
    $this->Cell(44,7,$total,1,0,'C');
    $this->Ln();
}
function BasicTable3col($header, $data, $total)
{
    $w = array(120, 25, 45);
    // Header
    $this->SetFont('Arial', 'B', TAMANO_DATOS);
    for($i=0;$i<count($header);$i++)
          $this->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C');
      $this->Ln();
    // Data
    $this->SetFont('Arial', 'I', TAMANO_DATOS);
    foreach($data as $row)
    {
        $i = 0;
        foreach($row as $col)
        {
          if($i === 0){
            $this->Cell($w[$i],6,utf8_decode($col),1);
          }else{
            $this->Cell($w[$i],6,utf8_decode($col),1,0,'C');
          }
          $i++;
        }
        $this->Ln();
    }
    //total
    $this->SetFont('Arial', 'B', TAMANO_DATOS);
    $this->Cell(145,7,"TOTAL",1,0,'C');
    $this->SetFont('Arial', 'I', TAMANO_DATOS);
    $this->Cell(45,7,$total,1,0,'C');
    $this->Ln();
}
function BasicTable4col($header, $data, $total)
{
  $w = array(70,43,33,44);
  // Header
  $this->SetFont('Arial', 'B', TAMANO_DATOS);
  for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C');
    $this->Ln();
  // Data
  $this->SetFont('Arial', 'I', TAMANO_DATOS);
  foreach($data as $row)
  {
      $i = 0;
      foreach($row as $col)
      {
        if($i === 0){
          $this->Cell($w[$i],6,utf8_decode($col),1);
        }else{
          $this->Cell($w[$i],6,utf8_decode($col),1,0,'C');
        }
        $i++;
      }
      $this->Ln();
  }
  //total
  $this->SetFont('Arial', 'B', TAMANO_DATOS);
  $this->Cell(146,7,"TOTAL",1,0,'C');
  $this->SetFont('Arial', 'I', TAMANO_DATOS);
  $this->Cell(44,7,$total,1,0,'C');
  $this->Ln();
}
function BasicTable5col($header, $data, $total)
{
  $w = array(59,17,47,26,41);
  // Header
  $this->SetFont('Arial', 'B', TAMANO_DATOS);
  for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,utf8_decode($header[$i]),1,0,'C');
    $this->Ln();
    // Data
    $this->SetFont('Arial', 'I', TAMANO_DATOS);
    foreach($data as $row)
    {
        $i = 0;
        foreach($row as $col)
        {
          if($i === 0 || $i === 2){
            $this->Cell($w[$i],6,utf8_decode($col),1);
          }else{
            $this->Cell($w[$i],6,utf8_decode($col),1,0,'C');
          }
          $i++;
        }
        $this->Ln();
    }
    //total
    $this->SetFont('Arial', 'B', TAMANO_DATOS);
    $this->Cell(149,7,"TOTAL",1,0,'C');
    $this->SetFont('Arial', 'I', TAMANO_DATOS);
    $this->Cell(41,7,$total,1,0,'C');
    $this->Ln();
  }

}
?>
