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
      if (!($number = $this->Mantrian->getnumber('desc',['tgl'=>date('Y-m-d')]))) {
        $number =['urut'=>0];
      } 
      $data['content'] = $number;
      //echo $data['content']['nomor']; die();
      $this->load->view('Vmain', $data);
	}
    
    public function xgetnomor() {
      if ($this->Mantrian->addnumber()){
        echo json_encode($this->Mantrian->getnumber('desc',['tgl'=>date('Y-m-d')]));
      } else {
        return FALSE;
      }
    }
}
