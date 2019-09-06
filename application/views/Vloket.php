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

<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-lg-6 mt-2">
      <div class="info-box bg-light" style="min-height: 90px">
        <div class="info-box-content">
          <div class="row my-3">
            <form action="<?=base_url('Loket/pilihtiket');?>" class="form-inline" method="POST">
              <div class="form-group">
                <label for="ipiltiket" class="control-label">Pilih Antrian</label>
                <div class="col-6">
                  <?php
                    unset($option);
                    $option[''] = 'Pilih Antrian';
                    foreach ($tiket as $row) {
                      $option[$row->id] = $row->nmtiket;                      
                    }
                    echo form_dropdown('ipiltiket', $option, $piltiket, 'class="form-control" id="ddseleq" required');
                  ?>
                </div>
                <div class="col-2">
                  <button name="savepil" class="btn btn-primary">Simpan</button>
                </div>
              </div>        
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3 mt-2">
      <div class="info-box bg-warning">
        <span class="info-box-icon text-white"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">TOTAL ANTRIAN</span>
          <span class="info-box-number"><?=$allque ? $allque:'0';?></span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
            <span class="progress-description">
              <?=date("Y-m-d");?>
            </span>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3 mt-2">
      <div class="info-box bg-green">
        <span class="info-box-icon text-white"><i class="fas fa-user-check"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">DILAYANI</span>
          <span class="info-box-number"><?=$alldone ? $alldone:'0';?></span>

          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
            <span class="progress-description">
              <?=date("Y-m-d");?>
            </span>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-lg-4">
      <!-- Search Widget -->
      <div class="card my-4 mh-100" style="min-height: 300px">
        <h5 class="card-header">Antrian</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 px-1 py-4 my-auto">
              <div class="card bg-warning m-auto mh-100 display-3 text-white text-center" >
                <?=$queue ? $queue:'0';?>
              </div>
            </div>
            <div class="col-md-6 px-1 py-4 my-auto">      
              <div class="card bg-success m-auto mh-100 display-3 text-white text-center">
                <?=$done ? $done:'0';?>
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
    <div class="col-md-6 col-lg-4">
      <!-- Categories Widget -->
      <div class="card my-4 mh-100" style="min-height: 300px">
        <h5 class="card-header">Dipanggil</h5>
        <div class="card-body">
          <div class="row d-flex justify-content-center">
           <div class="col-md-10 px-1 py-4 ">      
              <div class="card bg-info m-auto mh-100 display-3 text-white text-center">
                <?=$currnum ? $kdhuruf.$currnum : 'X';?>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center px-2">
          <form action="<?=base_url('Loket/callopt');?>" method="POST">
            <button type="submit" name="recall" class="btn btn-primary" <?=$btncurrent;?> value="<?=$idantri;?>"><i class="fas fa-retweet"></i> Ulangi</button> 
            <button type="submit" name="skip" class="btn btn-warning" <?=$btncurrent;?> value="<?=$idantri;?>"><i class="fas fa-share-square"></i> Lewati</button>
            <button type="submit" name="done" class="btn btn-danger" <?=$btncurrent;?> value="<?=$idantri;?>"><i class="fas fa-door-open"></i> Selesai</button>
          </form>
        </div>
      </div>
    </div>  
      <!-- Side Widget -->
    <div class="col-md-6 col-lg-4">
      <div class="card my-4 mh-100" style="height:300px">
        <h5 class="card-header">Dilewati</h5>
        <div class="card-body table-responsive">
          <table class="table table-striped">
            <tbody>
              <?php
              foreach ($skip as $row) { ?>
              <tr>
                <td class="text-center">
                  <h2><?=$kdhuruf.$row->urut;?></h2>
                </td>
                <td class="" style="width:50%">
                  <form action="<?=base_url('Loket/callopt');?>" method="POST">
                    <button name="recall" class="btn btn-info btn-sm m-1" <?=$btnpanggil;?> value="<?=$row->id;?>"><i class="fas fa-retweet"></i> Ulangi</button>
                    <button name="cancel" class="btn btn-danger btn-sm m-1" <?=$btnpanggil;?> value="<?=$row->id;?>"><i class="fas fa-sign-out-alt"></i> Batal</button>
                  </form>
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

<script>
//  setTimeout(function(){
//   window.location.reload(1);
//}, 5000);
</script>