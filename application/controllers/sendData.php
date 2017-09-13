<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SendData extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
  }

 public function guardar() {
  
  echo json_encode ($status) ;
 }
}
