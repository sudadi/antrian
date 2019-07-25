<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="container-fluid mx-5 mx-lg-0">
  <div class="row">
    <div class="d-none d-xl-block col-xl-1"></div>
    <div class="col-8 col-xl-7">
      <h2 class="text-white text-center">Informasi Antrian RSOS</h2>
      <video src="<?php echo base_url();?>video/videoplayback.mp4" width="100%" muted loop controls autoplay class="img-fluid rounded"></video>
      <div class="card">
        <div class="card-body">
        <?php echo date('l').' '.date('d F Y').' '.date('H:m:i');?>
        </div>
      </div>
    </div>
    <div class="col-4 col-xl-3">
      <div class="card my-5">
        <h3 class="card-header bg-warning text-center" style="font-size: 50px;font-weight: bold;width: 100%;">ANTRIAN</h3>
        <div class="card-body bg-transparent">
          <div class="row">
            <div id="loket1" class="text-lg-center" style="font-size: 80px;font-weight: bold;width: 100%;">0</div>
          </div>
        </div>
        <div class="card-footer text-center" style="font-size: 50px;font-weight: bold;width: 100%;">
            LOKET 1
        </div>
      </div>
      <div class="card">
        <h3 class="card-header bg-warning text-center" style="font-size: 50px;font-weight: bold;width: 100%;">ANTRIAN</h3>
        <div class="card-body bg-transparent">
          <div class="row">
            <div id="loket2" class="text-lg-center" style="font-size: 80px;font-weight: bold;width: 100%;">0</div>
          </div>
        </div>
        <div class="card-footer text-center" style="font-size: 50px;font-weight: bold;width: 100%;">
            LOKET 2
        </div>
      </div>
    </div>
  </div>
</div>
