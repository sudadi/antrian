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
<audio src="<?=base_url('assets/audio/');?>awal.MP3" id="sound-1" controls></audio>
<audio src="<?=base_url('assets/audio/');?>tiga.MP3" controls id="sound-2"></audio>
<script>
  $(function() {
      var audioarr = new Array();
    
      $.ajax({
      url : "<?php echo site_url('display/xdispnum/')?>",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        if (data.loket === 1) {
          $("#loket1").html(data.urut);
        } else {
          $("#loket2").html(data.urut);
        }
        
        var textarr = data.terbilang.split(" ");
        console.log(textarr);
        for(var i=0; i < textarr.length; i++) {
          
          audioarr[i] = new Audio("<?=base_url('assets/audio/');?>"+textarr[i]+".MP3");   
          
        };
        audioarr[1].play();
        
        
        
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          
      }
    });
    
    function playSnd() {
    var i=0;
    i++;
    if (i == audioarr.length) return;
    audioarr[i].addEventListener('ended', playSnd);
    audioarr[i].play();
    }
  });
//  $(function(){
//		var tmp_loket=0;
//		setInterval(function() {
//			$.post("../apps/monitoring-daemon.php", function( data ){
//				if(tmp_loket!=data['jumlah_loket']){
//					$(".col-md-3").remove();
//					tmp_loket=0;
//				}
//				if (tmp_loket==0) {
//					for (var i = 1; i<= data['jumlah_loket']; i++) {
//						loket = '<div class="col-md-3">'+
//									'<div class="'+ i +
//									 ' jumbotron" style="padding-top:20px;padding-bottom:20px;">'+
//										'<h1> '+data["init_counter"][i]+' </h1>'+
//										'<button class="btn btn-danger" type="button"><span class="glyphicon glyphicon-credit-card">&nbsp;</span>LOKET '+ i +'</button>'+
//									'</div>'+
//								'</div>';
//						$(".loket").append(loket);
//					}
//
//					tmp_loket = data['jumlah_loket'];
//				}
//				for (var i = 1; i <= data['jumlah_loket']; i++) { 					
//					if (data["counter"]==i) {
//						$("."+i+" h1").html(data["next"]);
//					}
//				}
//				if (data["next"]) {
//					var angka = data["next"];
//					for (var i = 0 ; i < angka.toString().length; i++) {
//						$(".audio").append('<audio id="suarabel'+i+'" src="../audio/new/'+angka.toString().substr(i,1)+'.MP3" ></audio>');
//					};
//					mulai(data["next"],data["counter"]);
//				}else{
//					for (var i = 1; i <= data['jumlah_loket']; i++) { 					
//						if (data["counter"]==i) {
//							$("."+i+" h1").html(data["next"]);
//						}
//					}
//				};
//
//			}, "json"); 
//		}, 5000);
//		//change
//	});
</script>