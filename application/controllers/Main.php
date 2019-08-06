<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
      parent::__construct();
      $this->load->model('Msetting');
    }
  
	public function index()
	{
      $data['page'] = 'Vstart';
      $data['nav'] = FALSE;
      $data['content'] = '';
      $this->load->view('Vmain', $data);
	}
    
    public function login() 
    {
      $this->form_validation->set_rules('username', 'username', 'required|trim');
      $this->form_validation->set_rules('password', 'password', 'required|trim');
      if ($this->form_validation->run() == TRUE) {
          $username=$this->input->post('username');
          $password=$this->input->post('password');
          $this->load->model('moduser');
          $result=$this->moduser->login($username, $password);
          if ($result) {
              $this->session->set_userdata('usrmsk', 'TRUE');
              $this->session->set_userdata('iduser', $result->iduser);
              $this->session->set_userdata('username', $result->username);
              $this->session->set_userdata('realname', $result->nama);
              $this->session->set_userdata('passupd', $result->updpass);
              $unit = $this->modref->getunit($result->idunit);
              if ($unit) {
                  foreach ($unit as $row){
                  $this->session->set_userdata('namaunit', $row->nama_unit_kerja);
                  $this->session->set_userdata('idunit', $row->id_unit_kerja);
                  $this->session->set_flashdata('success', 'Selamat datang '.$result->nama);
                  }
              } else {
                  $this->session->set_flashdata('warning', 'Satker Tidak Ditemukan!!');
              }
              $this->db->update('tuser', array('lastlog'=>date('Y/m/d h:i:s')), array('username'=>$result->username));
              redirect('main');	
          } else {			
              $this->session->set_flashdata('error', 'Your username or password are incorrect');
          }
      }   

      $data['banner'] = false;
      $data['page'] = 'loginpage';
      $data['judul'] = 'Login';
      $data['content']['action'] = base_url('main/login');
      $this->load->view('mainview', $data);
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
