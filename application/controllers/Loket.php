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
    $this->load->model('Mantrian');
  }
  
	public function index()
	{
      $data['page'] = 'Vloket';
      $data['nav'] = true;
      $data['content']['jmlantri']= $this->Mantrian->getantrijml()->jml;
      $data['content']['sisa']= $this->Mantrian->getantrijml(['tgl'=>date('Y-m-d'),'status'=> 0])->jml;
      if($this->Mantrian->getnumber('asc', "tgl=date('now', 'localtime') and (status=2 or status=1)")){
        $current = $this->Mantrian->getnumber('asc', "tgl=date('now', 'localtime') and (status=2 or status=1)");
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
      $this->Mantrian->updnumber(['status'=>1],['tgl'=>date('Y-m-d'),'urut'=>$urut]);
    }
    redirect('Loket');
  }
  
  public function callopt() {
    //$id = $this->input->post('id');
    if ($id = $this->input->post('recall')) {
      $status = 1;
    } else if ($id = $this->input->post('skip')) {
      $status = 3;
    } else if ($id = $this->input->post('done')) {
      $status = 4;
    }
    $this->Mantrian->updnumber(['status'=>$status],['id'=>$id]);
    //echo $this->db->last_query(); die();
    redirect('Loket');
  }
}
