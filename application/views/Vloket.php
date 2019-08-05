<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$idantri = $btnpanggil = $btnskip = $btncurrent ='';

if ($current) {
  $currnum = $current->urut;
  $idantri = $current->id;
  $btnpanggil = "disabled";
  $btnskip ="disabled";
} else {
  $currnum = "X";
  $btncurrent = "disabled";
}

?>

<div class="container-fluid p-5">
  <div class="row">
    <div class="col-md-4">
      <!-- Search Widget -->
      <div class="card my-4 mh-100" style="min-height: 300px">
        <h5 class="card-header">Antrian</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 px-1 py-4 my-auto">
              <div class="card bg-warning m-auto mh-100 display-3 text-white text-center" >
                <?=$antrian ? $antrian:'0';?>
              </div>
            </div>
            <div class="col-md-6 px-1 py-4 my-auto">      
              <div class="card bg-success m-auto mh-100 display-3 text-white text-center">
                <?=$sisa ? $sisa:'0';?>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <form action="<?=base_url('Loket/panggil');?>" method="POST">
            <button name="call" type="submit" class="btn btn-primary" <?=$btnpanggil;?>><i class="fas fa-volume-up"></i> Panggil Selanjutnya</button>
          </form>
        </div>
      </div>
    </div>  
    <div class="col-md-4">
      <!-- Categories Widget -->
      <div class="card my-4 mh-100" style="min-height: 300px">
        <h5 class="card-header">Dipanggil</h5>
        <div class="card-body">
          <div class="row d-flex justify-content-center">
           <div class="col-md-10 px-1 py-4 ">      
              <div class="card bg-info m-auto mh-100 display-3 text-white text-center">
                <?=$currnum ? $currnum:'';?>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <form action="<?=base_url('Loket/callopt');?>" method="POST">
            <input type="hidden" name="id" value="<?=$idantri;?>">
            <input type="button" name="recall" class="btn btn-primary" <?=$btncurrent;?> value="Ulangi">
            <input type="submit" name="skip" class="btn btn-warning" <?=$btncurrent;?> value="Lompati">
            <input type="submit" name="done" class="btn btn-danger" <?=$btncurrent;?> value="Selesai">
          </form>
        </div>
      </div>
    </div>  
      <!-- Side Widget -->
    <div class="col-md-4">
      <div class="card my-4 mh-100" style="height:300px">
        <h5 class="card-header">Dilewati</h5>
        <div class="card-body table-responsive">
          <table class="table table-striped">
            <tbody>
              <?php
              foreach ($skip as $row) { ?>
              <tr>
                <td class="display-4 text-center">
                  <?=$row->urut;?>
                </td>
                <td class="" style="width:50%">
                  <button class="btn btn-info btn-sm m-1"><i class="fas fa-retweet"></i> Ulangi</button>
                  <button class="btn btn-danger btn-sm m-1"><i class="fas fa-door-open"></i> Selesai</button>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        
      </div>
    </div>
  </div>
    <!-- /.row -->

</div>

