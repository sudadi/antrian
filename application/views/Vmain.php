<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('Vhead');?>
  <body class="d-flex flex-column">
    <?php ($nav) ? $this->load->view('Vnav'):'';?>
    <!-- Page Content -->
    <div id="page-content">
        <?php $this->load->view($page, $content);?>
    </div>
    <?php $this->load->view('Vfooter');?>
  </body>
</html>