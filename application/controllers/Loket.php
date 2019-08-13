<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loket extends CI_Controller {

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
    
      if ($this->session->userdata('usrmsk')==NULL) {
        redirect('Auth/login');
      } 
    $this->load->library('form_validation');  
    $this->load->model('Mantrian');
    $this->load->model('Msetting');
  }
  
  public function index()
  {
    $data['page'] = 'Vdashboard';
    $data['nav'] = true;
    $data['content'] = '';
    $this->load->view('Vmain', $data);
  }
  
  public function antrian()
  {
    $data['page'] = 'Vloket';
    $data['nav'] = true;
    $data['content']['jmlantri']= $this->Mantrian->getantrijml(['tgl'=>date('Y-m-d')])->jml;
    $data['content']['sisa']= $this->Mantrian->getantrijml(['tgl'=>date('Y-m-d'),'status'=> 0])->jml;
    if($this->Mantrian->getnumber('asc', "tgl='".date('Y-m-d')."' and (status=2 or status=1) and loket={$this->session->userdata('loket')}")){
      $current = $this->Mantrian->getnumber('asc', "tgl='".date('Y-m-d')."' and (status=2 or status=1) and loket={$this->session->userdata('loket')}");
    } else {
      $current = '';
    }
    $data['content']['current']= $current;
    $data['content']['skip']= $this->Mantrian->getantrian(['tgl'=> date('Y-m-d'), 'status'=>3]);
    $data['content']['selesai']= $this->Mantrian->getantrijml(['tgl'=>date('Y-m-d'),'status'=>4])->jml;
    $this->load->view('Vmain', $data);
  }
  
  public function panggil($ulang=null) {
    if($ulang){
      $this->Mantrian->updnumber(['status'=>1],['id'=>$ulang]);
    } else {
      $urut = $this->Mantrian->getnumber('asc',['tgl'=>date('Y-m-d'),'status'=>0])->urut;
      $this->Mantrian->updnumber(['status'=>1,'loket'=>$this->session->userdata('loket')],['tgl'=>date('Y-m-d'),'urut'=>$urut]);
    }
    redirect('Loket/antrian');
  }
  
  public function callopt() {
    if ($this->input->post()){
      if ($id = $this->input->post('recall')) {
        $status = 1;
      } else if ($id = $this->input->post('skip')) {
        $status = 3;
      } else if ($id = $this->input->post('done')) {
        $status = 4;
      } else if ($id = $this->input->post('cancel')) {
        $status = 5;
      }
      $this->Mantrian->updnumber(['status'=>$status,'loket'=>$this->session->userdata('loket')],['id'=>$id]);
    }
    
    redirect('Loket/antrian');
  }
  
  public function setting()
  {
    $data['page'] = 'Vsetting';
    $data['nav'] = true;
    $data['content']['users'] = $this->Msetting->getalluser('1=1');
    $this->load->view('Vmain', $data);
  }
  
  public function setuser() {
    if ($this->input->post('edit') == '0') {
      $this->Msetting->adduser(0);
    } else {
      $this->Msetting->adduser($this->input->post('edit'));
    }
    redirect('Loket/setting');
  }
  
  public function xgetalluser($id=null) {
    if ($id) {
      echo json_encode($this->Msetting->getalluser(['id'=>$id]));
    }
  }
}
