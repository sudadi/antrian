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
  
  function getantrian($where=null) {
    return $this->db->get_where('antrian', $where)->result();
  }
  
  function getantrijml($where=null) {
    $this->db->select('count(id) as jml');
    return $this->db->get_where('antrian', $where)->row();
  }
    
  function getnumber($order='desc', $where=null) {
    $this->db->order_by('urut', $order);
    return $this->db->get_where("antrian", $where, 1)->row();
  }
  
  function addnumber($tiket) {
    if(!$this->getnumber('desc',['tgl'=>date('Y-m-d'), 'tiket'=>$tiket])){
      $newnumber = 1;
    } else {
      $newnumber = $this->getnumber('desc',['tgl'=>date('Y-m-d'),'tiket'=>$tiket])->urut+1;
    }
    return $this->db->insert('antrian', ['tgl'=> date('Y-m-d'),'urut'=>$newnumber,'status'=>0,'tiket'=>$tiket]);
  }
  
  function updnumber($set, $where) {
    $this->db->update('antrian', $set, $where);
    return $this->db->affected_rows();
  }
}