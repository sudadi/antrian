<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {

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
  
  function __construct() {
    parent:: __construct();
    $this->load->helper('Terbilang');
    $this->load->model('Mantrian');
    $this->load->model('Msetting');
  }
  
  public function index()
	{
	  $data['page'] = 'Vdisplay';
      $data['nav']= 'dsp';
      $data['content']['loket'] = $this->Msetting->getloket('1=1');
      $data['content']['antrian'] = $this->Mantrian->getantrian(['status'=>2]);
      $this->load->view('Vmain', $data);
  }
    
  public function xdispnum() {
    if ($antrian = $this->Mantrian->getnumber('asc', ['tgl'=> date('Y-m-d'), 'status'=>1])) {
      $terbilang = trim(penyebut($antrian->urut));
      $loket = $this->Msetting->getloket(['id'=>$antrian->loket])[0]->sound;
      $huruf = $this->Msetting->gettiket(['id'=>$antrian->tiket])[0]->kdhuruf;      
      if ($this->Mantrian->updnumber(['status'=>2],['id'=>$antrian->id]) > 0) {
        $antrian->terbilang = 'alertin1 nomor '.$huruf.' '.$terbilang.' '.$loket.' alertout1';
        $antrian->huruf = $huruf;
        echo json_encode($antrian);
      }
    } 
    
  }
  
  public function xgetvideo() {
    
  }
}
