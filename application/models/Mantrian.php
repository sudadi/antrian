<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mantrian extends CI_Model {

  function __construct() {
    parent::__construct();
    
  }
  
  function getnumber() {
    $this->db->select('urut');
    $this->db->order_by('urut', 'desc');
    return $this->db->get_where("antrian", "tgl = date('now')", 1)->row();
  }
  
  function addnumber() {
    $newnumber = $this->getnumber()->urut +1;
    return $this->db->insert('antrian', ['tgl'=> date('Y-m-d'),'urut'=>$newnumber,'status'=>0]);
  }
}