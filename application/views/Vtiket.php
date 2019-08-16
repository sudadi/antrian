<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="container my-auto d-print-none">
  <div class="row">
    <div class="col-sm-9 col-md-6 col-lg-4 col-xl-4 mx-auto">
      <div class="card card-signin my-2">
        <div class="card-header text-center"><h2 class="font-weight-bold"><?=$tiket[0]->nmtiket;?></h2></div>
        <div class="card-body">          
          <div id="tiket1" class="text-center nomor display-4 font-weight-bold"><?=$nomer[1]->urut;?></div>
        </div>
        <div class="card-footer">
          <button onclick="ambiltiket(1);" class="btn btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-2x"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-md-6 col-lg-4 col-xl-4 mx-auto">
      <div class="card card-signin my-2">
        <div class="card-header text-center"><h2 class="font-weight-bold"><?=$tiket[1]->nmtiket;?></h2></div>
        <div class="card-body">          
          <div id="tiket2" class="text-center nomor display-4 font-weight-bold"><?=$nomer[2]->urut;?></div>
        </div>
        <div class="card-footer">
          <button onclick="ambiltiket(2);" class="btn btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-2x"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-md-6 col-lg-4 col-xl-4 mx-auto">
      <div class="card card-signin my-2">
        <div class="card-header text-center"><h2 class="font-weight-bold"><?=$tiket[2]->nmtiket;?></h2></div>
        <div class="card-body">          
          <div id="tiket3" class="text-center nomor display-4 font-weight-bold" ><?=$nomer[3]->urut;?></div>
        </div>
        <div class="card-footer">
          <button onclick="ambiltiket(3);" class="btn btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-2x"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-md-6 col-lg-4 col-xl-4 mx-auto">
      <div class="card card-signin my-2">
        <div class="card-header text-center"><h2 class="font-weight-bold"><?=$tiket[3]->nmtiket;?></h2></div>
        <div class="card-body">          
          <div id="tiket4" class="text-center nomor display-4 font-weight-bold"><?=$nomer[4]->urut;?></div>
        </div>
        <div class="card-footer">
          <button onclick="ambiltiket(4);" class="btn btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-2x"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-md-6 col-lg-4 col-xl-4 mx-auto">
      <div class="card card-signin my-2">
        <div class="card-header text-center"><h2 class="font-weight-bold"><?=$tiket[4]->nmtiket;?></h2></div>
        <div class="card-body">          
          <div id="tiket5" class="text-center display-4 font-weight-bold"><?=$nomer[5]->urut;?></div>
        </div>
        <div class="card-footer">
          <button onclick="ambiltiket(5);" class="btn btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-2x"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-md-6 col-lg-4 col-xl-4 mx-auto">
      <div class="card card-signin my-2">
        <div class="card-header text-center"><h2 class="font-weight-bold"><?=$tiket[5]->nmtiket;?></h2></div>
        <div class="card-body">          
          <div id="tiket6" class="text-center display-4 font-weight-bold""><?=$nomer[6]->urut;?></div>
        </div>
        <div class="card-footer">
          <button onclick="ambiltiket(6);" class="btn btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-2x"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tiket d-none d-print-block" style="width:7.5cm;">
  <table style="width:7.5cm;  border: 2px solid black;">   
    <tr style="text-align: center; background-color: black; color: white;">
      <td style="font-size: 25px;">
        <strong>RS ORTOPEDI PROF.DR.R.SOEHARSO SURAKARTA</strong>
      </td>
    </tr>
    <tr style="text-align: center; background-color: grey; color: white;">
      <td>
        <b id="nmtiket">ANTRIAN </b>
      </td>
    </tr>
    <tr>
        <td style="font-size:20px; text-align: center"><strong>Nomor Urut</strong></td>
    </tr>
    <tr>
      <td id="tiket" class="nomor" style="font-size:150px; text-align: center"><?=$urut;?></td>
    </tr>
    <tr style="">
      <td style="font-size:20px; border: 2px solid black; text-align: center"><?php echo date("d-m-Y").", ".date("H:i:s"); ?></td>
    </tr>
  </table>
  <div style="text-align: center;">
    <br/>Untuk Reservasi Online
    <br/>Kunjungi http://pendaftaran.rso.go.id
  </div>
</div>

<script>
  function ambiltiket(loket) {
    $.ajax({
      url : "<?php echo site_url('tiket/xgetnomor/')?>"+loket,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $("#tiket"+loket).html(data.urut);
        $("#tiket").html(data.urut);
        $('.tiket').printThis({
          printDelay: 500,
          importCSS: false,
          loadCSS: "<?=base_url();?>/assets/css/tiketprint.css",
        });
        //window.print();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          $("#spinner").hide();
          alert('Error : Tidak bisa ambil nomor..!');
      }
    });
  };
</script>