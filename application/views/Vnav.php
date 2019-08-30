<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Antrian (<?=$this->session->userdata('nmloket');?>)</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('loket');?>"><i class="fas fa-tachometer-alt"></i> Dashboard
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php if($this->session->userdata('tipe')==0) { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('loket/setting');?>"><i class="fas fa-user-cog"></i> Setting</a>
          </li>
          <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('loket/antrian');?>"><i class="fas fa-list-ol"></i> Antrian</a>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('Auth/logout');?>"><i class="fas fa-user-lock"></i> Log-Out ( <?=$this->session->userdata('username');?> )</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
