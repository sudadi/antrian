<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="container mt-5">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-6 col-xl-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-header text-center" style="font-size: 40px;font-weight: bold;width: 100%;">Tiket Antrian RSOS</div>
        <div class="card-body">          
          <div id="loket1" class="text-center nomor" style="font-size: 200px;font-weight: bold;width: 100%;"><?=$urut;?></div>
        </div>
        <div class="card-footer">
          <button id="ambil" class="btn btn-lg btn-warning btn-block text-uppercase"><i class="fas fa-ticket-alt fa-4x mr-2"></i><br> Ambil Tiket</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="tiket d-none d-print-block">
  <div class="row m-5 p-5">
    <table class="table table-bordered text-center border-dark">
      <thead class="" >
        <tr>
          <th>
            <h4>
              <strong>RS ORTOPEDI PROF.DR.R.SOEHARSO SURAKARTA<br>
                ANTRIAN VERIFIKASI BERKAS</strong>
            </h4>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>NOMOR ANTRIAN</strong></td>
        </tr>
        <tr>
          <td class="nomor" style="font-size: 100px;"><?=$urut;?></td>          
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td>
            <strong>
            <?=date("d-m-Y").", ".date("H:i:s"); ?>
            </strong>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
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
        $('.tiket').printThis();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
          $("#spinner").hide();
          alert('Error : Tidak bisa ambil nomor..!');
      }
    });
  });
</script>