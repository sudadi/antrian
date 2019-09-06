<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default con  troller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
  
  function __construct() {
    parent:: __construct();
    $this->load->model('Mantrian');
  }
  
  public function index($tipe=null)
	{
    $this->load->model('Msetting');
    $data['content']['tiket'] = $this->Msetting->gettiket('1=1');
    $data['page'] = 'Vtiket';
    if ($tipe === 'cs') {
      $data['page'] = 'Vtiketcs';
    }
    $data['nav']= 'dsp';
    for ($i=1; $i<7; $i++) {
      if (!($number = $this->Mantrian->getnumber('desc',['tgl'=>date('Y-m-d'),'tiket'=>$i]))) {
        $number = new ArrayObject();
        $number->urut = 0;
      } 
      $data['content']['nomer'][$i] = $number;
    }
    //echo $data['content']['nomor']; die();
    $this->load->view('Vmain', $data);
  }
  
      
  public function xgetnomor($tiket) {
    if ($this->Mantrian->addnumber($tiket) && $this->input->is_ajax_request()) {
      echo json_encode($this->Mantrian->getnumber('desc',['tgl'=>date('Y-m-d'),'tiket'=>$tiket]));
    } else {
      return FALSE;
    }
  }
    
  
}
