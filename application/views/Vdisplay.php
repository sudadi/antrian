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
      <video src="<?php echo base_url();?>assets/video/Profil-1.mp4" width="100%" muted loop controls autoplay class="img-fluid rounded"></video>
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
          if (data.loket === 2) {
            $("#loket2").html(data.urut);
          } else {
            $("#loket1").html(data.urut);
          }

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
  });
</script>