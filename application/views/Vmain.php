<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<!DOCTYPE html>
<html lang="en">
  <?php $this->load->view('Vhead'); 
  if ($nav) { ?>
    <body class="d-flex flex-column withnav">
    <?php  
    if ($nav === 'dsp') {
      $this->load->view('Vstickyhead');
    } else {    
      $this->load->view('Vnav');
    }
  } else { ?>
    <body class="d-flex flex-column nonav">
  <?php } ?>
    <!-- Page Content -->
    <div id="page-content" class="py-0">
        <?php $this->load->view($page, $content);?>
    </div>
    <?php $this->load->view('Vfooter');?>
  </body>
</html>