<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Msetting extends CI_Model {

  function __construct() {
    parent::__construct();
    
  }
  
  function login($username, $password){
    $this->db->from('users');
    $this->db->where('username', $username);
//    $this->db->where('status', 1);
    $qry = $this->db->get();
    if ($qry->num_rows() == 1) { 
      if (password_verify($password, trim($qry->row()->password))) {
        return $qry->row(); 
      }
    }
  }
  
  function adduser($edit) {
    $passhash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    $record = [
        'nama'=> $this->input->post('nama'),
        'username'=> $this->input->post('username'),
        'password'=>$passhash,
        'loket'=>$this->input->post('loket')];
    if (!$edit){
      $this->db->insert('users',$record);
    } else {      
      $this->db->update('users',$record,['id'=>$edit]);
    }
    return $this->db->affected_rows();
  }
  
  function getalluser($where) {
    return $this->db->get_where('users', $where)->result();
  }
  
  function getloket($where) {
    return $this->db->get_where('loket', $where)->result();
  }
  
  function gettiket($where) {
    return $this->db->get_where('tiket', $where)->result();
  }
  
}