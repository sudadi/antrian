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
  
  public function index()
	{
      $data['page'] = 'Vtiket';
      $data['nav']= false;
      for ($i=0; $i<6; $i++) {
        if (!($number = $this->Mantrian->getnumber('desc',['tgl'=>date('Y-m-d'),'loket'=>$i]))) {
          $number = new ArrayObject();
          $number->urut = 0;
        } 
        $data['content']['nomer'][$i] = $number;
      }
      //echo $data['content']['nomor']; die();
      $this->load->view('Vmain', $data);
	}
    
  public function xgetnomor($loket) {
    if ($this->Mantrian->addnumber($loket) && $this->input->is_ajax_request()) {
      echo json_encode($this->Mantrian->getnumber('desc',['tgl'=>date('Y-m-d'),'loket'=>$loket]));
    } else {
      return FALSE;
    }
  }
    
  
}
