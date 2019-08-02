<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="container my-auto d-print-none">
  <div class="row">
    <div class="col-sm-9 col-md-6 col-lg-5 col-xl-5 mx-auto">
      <div class="card card-signin my-2">
        <div class="card-header text-center display-4" style="font-size: 30px;font-weight: bold;width: 100%;">Tiket Antrian RSOS</div>
        <div class="card-body">          
          <div id="tiket" class="text-center nomor" style="font-size: 150px;font-weight: bold;width: 100%;"><?=$urut;?></div>
        </div>
        <div class="card-footer">
          <button id="ambil" class="btn btn-lg btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-3x"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tiket d-none d-print-block">
  <table style="width:9cm;  border: 2px solid black;">   
    <tr style="text-align: center; background-color: black; color: white;">
      <td style="font-size: 25px;">
        <strong>RS ORTOPEDI PROF.DR.R.SOEHARSO SURAKARTA</strong>
      </td>
    </tr>
    <tr style="text-align: center; background-color: grey; color: white;">
      <td>
        <b>ANTRIAN VERIFIKASI BERKAS</b>
      </td>
    </tr>
    <tr>
        <td style="font-size:20px; text-align: center"><strong>Nomor Urut</strong></td>
    </tr>
    <tr>
      <td class="nomor" style="font-size:150px; text-align: center"><?=$urut;?></td>
    </tr>
    <tr style="border: 2px solid black;">
      <td style="font-size:20px; text-align: center"><?php echo date("d-m-Y").", ".date("H:i:s"); ?></td>
    </tr>
  </table> 
</div>

<script>
  $('#ambil').on("click", function () {
    $.ajax({
      url : "<?php echo site_url('tiket/xgetnomor/')?>",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $(".nomor").html(data.urut);
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
  });
</script>