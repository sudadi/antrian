<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="container-fluid mt-0 mx-lg-0">
  <div class="row">
    <div class="col-lg-9 col-xl-9 mb-lg-2 mx-xl-auto text-center">
       <div class="card bg-success text-white">
        <div class="card-body">          
          <h2 class="text-center">Informasi Antrian RSOS</h2>
        <?php //echo date('l').' '.date('d F Y').' '.date('H:m:i');?>
        </div>
      </div>
      <div class="card text-center bg-dark">
        <div class="card-body">
      <video id="myvideo" src="<?php echo base_url();?>assets/video/Profil-1.mp4" width="90%" muted controls></video>
      </div>
      </div>
    </div>
    <div class="col-lg-3 col-xl-3 mx-xl-auto">
      <div class="card">
        <h3 class="card-header bg-warning text-center" ><strong>Cutomer Service</strong></h3>
        <div class="card-body">
          <div id="loket0" class="text-center" style="font-size: 60px;width: 100%;"><strong>0</strong></div>          
        </div>
      </div>
      <div class="card my-5">
        <h3 class="card-header bg-warning text-center" ><strong>LOKET 1</strong></h3>
        <div class="card-body">
          <div id="loket1" class="text-center" style="font-size: 60px;width: 100%;"><strong>0</strong></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-xl-3 mx-xl-auto">
      <div class="card">
        <h3 class="card-header bg-warning text-center" ><strong>LOKET 2</strong></h3>
        <div class="card-body">
          <div id="loket2" class="text-center" style="font-size: 60px;width: 100%;"><strong>0</strong></div>          
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-xl-3 mx-xl-auto">
      <div class="card">
        <h3 class="card-header bg-warning text-center" ><strong>LOKET 3</strong></h3>
        <div class="card-body">
          <div id="loket3" class="text-center" style="font-size: 60px;width: 100%;"><strong>0</strong></div>          
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-xl-3 mx-xl-auto">
      <div class="card">
        <h3 class="card-header bg-warning text-center" ><strong>LOKET 4</strong></h3>
        <div class="card-body">
          <div id="loket4" class="text-center" style="font-size: 60px;width: 100%;"><strong>0</strong></div>          
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-xl-3 mx-xl-auto">
      <div class="card">
        <h3 class="card-header bg-warning text-center" ><strong>LOKET 5</strong></h3>
        <div class="card-body">
          <div id="loket5" class="text-center" style="font-size: 60px;width: 100%;"><strong>0</strong></div>          
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
          $("#loket"+data.loket).html(data.urut);
          
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