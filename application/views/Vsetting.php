<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="container-fluid">
  <div class="row my-2">
    <div class="col-md-6 my-2">
      <div class="card">
        <div class="card-header">
          <h3>Setting Pengguna</h3>
        </div>
        <div class="card-body table-responsive">
          <div class="btn-group mb-2">
            <button type="button" name="adduser" id="adduser" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
          </div>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Pengguna</th>
                <th>Loket</th>
                <th>Log</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if ($users){
                foreach ($users as $row) { ?>
                <tr>
                  <td><?=$row->id;?></td>
                  <td><?=$row->nama;?></td>
                  <td><?=$row->username;?></td>
                  <td><?=$row->loket;?></td>
                  <td><?=$row->lastlog;?></td>
                  <td>
                    <button id="btnedit" class="btn btn-sm btn-warning" onclick="edit(<?=$row->id;?>);">Edit</button>
                  </td>
                </tr>
                <?php }
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6  my-2">
      <div class="card">
        <div class="card-header">
          <h3>Setting Video Display</h3>
        </div>
        <div class="card-body table-responsive">
          <div class="btn-group mb-2">
            <button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah</button>
          </div>
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>File Video</th>
                <th>Keterangan</th>
                <th>Publikasi</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="UserModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form name="frmlogin" id="frmlogin" action="<?=base_url('Loket/setuser');?>" method="POST" >
        <div class="modal-header">
          <h5 class="modal-title" id="usertitle">Tambah/Edit Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-label-group">
            <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama" required autofocus>
            <label for="nama">Nama</label>
          </div>
          <div class="form-label-group">
            <input name="username" type="text" id="username" class="form-control" placeholder="ID Pengguna" required>
            <label for="username">Pengguna</label>
          </div>
          <div class="form-label-group">
            <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
            <label for="password">Password</label>
          </div>
          <div class="form-label-group">
            <select id="loket" name="loket" class="form-control" required>
              <option value="1">Loket-1</option>
              <option value="2">Loket-2</option>
            </select>
          </div>           
        </div>
        <div class="modal-footer">
          <input type="hidden" name="edit" id="edit" value="0">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal"> Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function edit(id) {
    $.ajax({
      url : "<?php echo site_url('loket/xgetalluser/')?>"+id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {
        console.log(data[0].nama);
        $("#nama").val(data[0].nama);
        $("#username").val(data[0].username);
        $("#loket").val(data[0].loket);
        $("#edit").val(data[0].id);
      }
    })
    $("#UserModal").modal("show");
  }
  
  $("#adduser").click(function(){
    $("#nama").val('');
    $("#username").val('');
    $("#password").val('');
    $("#loket").val(1);
    $("#edit").val(0);
    $("#UserModal").modal("show");
  });
</script>