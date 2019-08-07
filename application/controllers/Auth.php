<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Auth extends CI_Controller {

  function __construct() {
    parent::__construct();
    
    $this->load->library('form_validation');
  }
  
  public function login()  {
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
    $data['page'] = 'Vlogin';
    $data['judul'] = 'Login';
    $data['nav'] = false;
    $data['content']['action'] = base_url('Loket/login');
    $this->load->view('Vmain', $data);
  }

  public function logout() {
      $this->session->sess_destroy();
      redirect(base_url());
  }

}