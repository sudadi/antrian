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
        <div class="card-header text-center display-4" style="font-size: 30px;font-weight: bold;width: 100%;">Tiket Antrian <br>CS</div>
        <div class="card-body">          
          <div id="tiket0" class="text-center nomor" style="font-size: 100px;font-weight: bold;width: 100%;"><?=$nomer[0]->urut;?></div>
        </div>
        <div class="card-footer">
          <button id="ambil" onclick="ambiltiket(0);" class="btn btn-lg btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-3x"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-md-6 col-lg-4 col-xl-4 mx-auto">
      <div class="card card-signin my-2">
        <div class="card-header text-center display-4" style="font-size: 30px;font-weight: bold;width: 100%;">Tiket Antrian <br>Loket 1</div>
        <div class="card-body">          
          <div id="tiket1" class="text-center nomor" style="font-size: 100px;font-weight: bold;width: 100%;"><?=$nomer[1]->urut;?></div>
        </div>
        <div class="card-footer">
          <button id="ambil" onclick="ambiltiket(1);" class="btn btn-lg btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-3x"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-md-6 col-lg-4 col-xl-4 mx-auto">
      <div class="card card-signin my-2">
        <div class="card-header text-center display-4" style="font-size: 30px;font-weight: bold;width: 100%;">Tiket Antrian <br>Loket 2</div>
        <div class="card-body">          
          <div id="tiket2" class="text-center nomor" style="font-size: 100px;font-weight: bold;width: 100%;"><?=$nomer[2]->urut;?></div>
        </div>
        <div class="card-footer">
          <button id="ambil" onclick="ambiltiket(2);" class="btn btn-lg btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-3x"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-md-6 col-lg-4 col-xl-4 mx-auto">
      <div class="card card-signin my-2">
        <div class="card-header text-center display-4" style="font-size: 30px;font-weight: bold;width: 100%;">Tiket Antrian <br>Loket 3</div>
        <div class="card-body">          
          <div id="tiket3" class="text-center nomor" style="font-size: 100px;font-weight: bold;width: 100%;"><?=$nomer[3]->urut;?></div>
        </div>
        <div class="card-footer">
          <button id="ambil" onclick="ambiltiket(3);" class="btn btn-lg btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-3x"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-md-6 col-lg-4 col-xl-4 mx-auto">
      <div class="card card-signin my-2">
        <div class="card-header text-center display-4" style="font-size: 30px;font-weight: bold;width: 100%;">Tiket Antrian <br>Loket 4</div>
        <div class="card-body">          
          <div id="tiket4" class="text-center nomor" style="font-size: 100px;font-weight: bold;width: 100%;"><?=$nomer[4]->urut;?></div>
        </div>
        <div class="card-footer">
          <button id="ambil" onclick="ambiltiket(4);" class="btn btn-lg btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-3x"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
    <div class="col-sm-9 col-md-6 col-lg-4 col-xl-4 mx-auto">
      <div class="card card-signin my-2">
        <div class="card-header text-center display-4" style="font-size: 30px;font-weight: bold;width: 100%;">Tiket Antrian <br>Loket 5</div>
        <div class="card-body">          
          <div id="tiket5" class="text-center nomor" style="font-size: 100px;font-weight: bold;width: 100%;"><?=$nomer[5]->urut;?></div>
        </div>
        <div class="card-footer">
          <button id="ambil" onclick="ambiltiket(5);" class="btn btn-lg btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-3x"></i><br> Ambil Tiket</button>
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