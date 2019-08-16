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
    <div class="col-lg-3 col-xl-3 mx-xl-auto">
      <div class="card">
        <h3 class="card-header bg-warning text-center" ><strong><?=$loket[0]->nmloket;?></strong></h3>
        <div class="card-body">
          <h1 id="loket1" class="text-center font-weight-bold">0</h1>         
        </div>
      </div>
      <div class="card my-4">
        <h3 class="card-header bg-warning text-center" ><strong><?=$loket[1]->nmloket;?></strong></h3>
        <div class="card-body">
          <h1 id="loket2" class="text-center font-weight-bold">0</h1>
        </div>
      </div>
      <div class="card my-4">
        <h3 class="card-header bg-warning text-center" ><strong><?=$loket[2]->nmloket;?></strong></h3>
        <div class="card-body">
          <h1 id="loket3" class="text-center font-weight-bold">0</h1>          
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-xl-6 mb-lg-2 mx-xl-auto text-center">
       <div class="card bg-danger text-white">
        <div class="card-body">          
          <h2 class="text-center">Informasi Antrian RSOS</h2>
        <?php //echo date('l').' '.date('d F Y').' '.date('H:m:i');?>
        </div>
      </div>
      <div class="card text-center bg-white">
        <div class="card-body my-5 p-0">
      <video id="myvideo" src="<?php echo base_url();?>assets/video/Profil-1.mp4" width="100%" muted controls></video>
      </div>
      </div>
    </div>
    <div class="col-lg-3 col-xl-3 mx-xl-auto">
      <div class="card">
        <h3 class="card-header bg-warning text-center" ><strong><?=$loket[3]->nmloket;?></strong></h3>
        <div class="card-body">
          <h1 id="loket4" class="text-center font-weight-bold">0</h1>          
        </div>
      </div>
      <div class="card my-4">
        <h3 class="card-header bg-warning text-center" ><strong><?=$loket[4]->nmloket;?></strong></h3>
        <div class="card-body">
          <h1 id="loket5" class="text-center font-weight-bold">0</h1>          
        </div>
      </div>
      <div class="card my-4">
        <h3 class="card-header bg-warning text-center" ><strong><?=$loket[5]->nmloket;?></strong></h3>
        <div class="card-body">
          <h1 id="loket6" class="text-center font-weight-bold">0</h1>          
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