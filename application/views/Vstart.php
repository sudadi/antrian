<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('Vhead');?>
  <body class="d-flex flex-column">
    <div id="page-content">
      <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Antrian RSOS</h5>
            <a href="<?=base_url('display');?>" class="btn btn-lg btn-primary btn-block text-uppercase" ><i class="fas fa-tv mr-2"></i> DISPLAY</a>
            <a href="<?=base_url('tiket');?>" class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fas fa-ticket-alt mr-2"></i> Tiket Antrian</a>
            <a href="<?=base_url('loket');?>" class="btn btn-lg btn-facebook btn-block text-uppercase" ><i class="fas fa-store mr-2"></i> Loket</a>
            </div>
        </div>
      </div>
    </div>
  </div>
    </div>
    <?php $this->load->view('Vfooter');?>
  </body>
</html>