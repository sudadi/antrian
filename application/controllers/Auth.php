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
      $this->load->model('Msetting');
      $result=$this->Msetting->login($username, $password);
      //echo $this->db->last_query(); die();
      if ($result) {
        $nmloket = $this->Msetting->getloket(['id'=>$result->loket])[0]->nmloket;
        $this->session->set_userdata('usrmsk', 'TRUE');
        $this->session->set_userdata('iduser', $result->id);
        $this->session->set_userdata('username', $result->username);
        $this->session->set_userdata('realname', $result->nama);
        $this->session->set_userdata('tipe', $result->tipe);
        $this->session->set_userdata('loket', $result->loket);
        $this->session->set_userdata('nmloket', $nmloket);
        $this->session->set_userdata('piltiket', $result->tiket);
        $this->db->update('users', array('lastlog'=>date('Y/m/d h:i:s')), array('id'=>$result->id));
        redirect('Loket');	
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