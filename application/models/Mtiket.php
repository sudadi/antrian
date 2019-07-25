<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mtiket extends CI_Model {

  function __construct() {
    parent::__construct();
    
  }
  
  function getnumber() {
    return $this->db->get_where("antrian", "tgl = date('now')")->num_rows();
  }
}