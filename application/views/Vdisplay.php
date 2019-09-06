<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if ($antrian) {
  foreach ($antrian as $row) {
    
  }
}
?>

<div class="container-fluid mt-4 pt-4 x-lg-0">
  <div class="row">
    <div class="col-lg-3 col-xl-3 mx-xl-auto">
      <div class="info-box bg-dark text-white">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><h1 class="display-4 text-center mt-1" id="loket1" >0</h1</span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
            <span class="progress-description text-center">
              <h3><strong><?=$loket[0]->nmloket;?></strong></h3>
            </span>
        </div>
      </div>
      <div class="info-box bg-secondary  text-white">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><h1 class="display-4 text-center mt-1" id="loket2" >0</h1></span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
            <span class="progress-description text-center">
              <h3><strong><?=$loket[1]->nmloket;?></strong></h3>
            </span>
        </div>
      </div>
      <div class="info-box bg-dark text-white">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><h1 class="display-4 text-center mt-1" id="loket3" >0</h1></span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
            <span class="progress-description text-center">
              <h3><strong><?=$loket[2]->nmloket;?></strong></h3>
            </span>
        </div>
      </div>
      <div class="info-box bg-secondary text-white">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><h1 class="display-4 text-center mt-1" id="loket4" >0</h1></span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
            <span class="progress-description text-center">
              <h3><strong><?=$loket[3]->nmloket;?></strong></h3>
            </span>
        </div>
      </div>
      <div class="info-box bg-dark text-white">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><h1 class="display-4 text-center mt-1" id="loket5" >0</h1></span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
            <span class="progress-description text-center">
              <h3><strong><?=$loket[4]->nmloket;?></strong></h3>
            </span>
        </div>
      </div>
      <div class="info-box bg-secondary text-white">
        <span class="info-box-icon"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text"><h1 class="display-4 text-center mt-1" id="loket6" >0</h1></span>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
            <span class="progress-description text-center">
              <h3><strong><?=$loket[5]->nmloket;?></strong></h3>
            </span>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-xl-8 mb-lg-2 mx-xl-auto text-center">
       <div class="card bg-warning">
        <div class="card-body">          
          <h2 class="text-center">Informasi Antrian RSOS</h2>
        <?php //echo date('l').' '.date('d F Y').' '.date('H:m:i');?>
        </div>
      </div>
      <div class="card text-center bg-white">
        <div class="card-body mt-4 mb-5 p-0">
      <video id="myvideo" src="<?php echo base_url();?>assets/video/Profil-1.mp4" width="100%" muted controls></video>
      </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(function() {
    var audioarr = new Array();
    var x = -1;
    
    function playSnd() {
      x++;
      if (x == audioarr.length) {
        loopdata();
        return;
      }
      //on ended play next sampai semua audio di putar
      audioarr[x].addEventListener('ended', playSnd);
      audioarr[x].play();
    }
    
    function loopdata(){
      audioarr = new Array();
      $.ajax({
        url : "<?php echo site_url('display/xdispnum/')?>",
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {          
          x = -1;
          $("#loket"+data.loket).html(data.huruf+data.urut);
          
          var textarr = data.terbilang.split(" ");
          console.log(textarr);
          for(var i=0; i < textarr.length; i++) {
            audioarr[i] = new Audio("<?=base_url('assets/audio/');?>"+textarr[i]+".ogg");               
          };     
          //jika success mainkan audio dan set loop interval lebih lama
          playSnd();          
          //setTimeout(loopdata, 13000);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          //jika tidak ada dat set interval lebih cepat
          setTimeout(loopdata, 1000);
        }
      });
      
    };
    
    loopdata();
    
    var myvid = document.getElementById('myvideo');
    var myvids = [
      "<?php echo base_url();?>assets/video/Profil-1.mp4", 
      "<?php echo base_url();?>assets/video/Profil-2.mp4"
      ];
    var activeVideo = 0;
    myvid.play();
    
    myvid.addEventListener('ended', function(e) {
      // update the active video index
      activeVideo = (++activeVideo) % myvids.length;

      // update the video source and play
      myvid.src = myvids[activeVideo];
      myvid.play();
    });
    
  });
</script>