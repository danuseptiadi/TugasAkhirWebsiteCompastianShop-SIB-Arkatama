<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin accounts</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <link rel="stylesheet" href="<?=base_url('public/')?>css/admin_style.css">

  <!-- clear confirm form resubmission -->
  <script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  </script>



</head>

<body>



<?php
  $admin_header['admin'] = $admin;
  $this->load->view('template/admin_header',$admin_header) ?>

  <section class="accounts">

    <h1 class="heading">admin accounts</h1>

    <div class="box-container">

      <div class="box">
        <p>add new admin</p>
        <a href="<?=base_url('Admin/register')?>" class="option-btn">register admin</a>
      </div>

      <?php
      if ($admins != null) {
      foreach ($admins as $adm):  
   ?>
      <div class="box">
        <p> admin id : <span><?= $adm['id']; ?></span> </p>
        <p> admin name : <span><?= $adm['name']; ?></span> </p>
        <div class="flex-btn">
          <a href="<?= base_url('Admin/accounts/'. $adm['id']); ?>"
            onclick="return confirm('delete this account?')" class="delete-btn">delete</a>
          <?php
            if($adm['id'] == $admin['id']){
              $link = base_url('Admin/update_profile');
               echo "<a href='$link' class='option-btn'>update</a>";
            }
         ?>
        </div>
      </div>
      <?php endforeach; }else{
        echo '<p class="empty">no accounts available!</p>';
      }?>

    </div>

  </section>


  <script src="<?=base_url('public/')?>js/admin_script.js"></script>

</body>

</html>