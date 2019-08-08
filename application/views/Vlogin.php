<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="row">
  <div class="col-sm-10 col-md-6 col-lg-4 mx-auto">
    <div class="card card-signin my-5">
      <div class="card-body">
        <h5 class="card-title text-center">Sign In</h5>
        <form name="frmlogin" id="frmlogin" action="<?=base_url('Auth/login');?>" method="POST" class="form-signin">
          <div class="form-label-group">
            <input type="text" name="username" id="username" class="form-control" placeholder="ID Pengguna" required autofocus>
            <label for="username">ID Pengguna</label>
          </div>

          <div class="form-label-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <label for="password">Password</label>
          </div>          
          <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>          
        </form>
      </div>
    </div>
  </div>
</div>