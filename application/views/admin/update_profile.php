<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>update profile</title>

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

  <section class="form-container">

    <form action="<?=base_url('Admin/update_profile')?>" method="post">
      <h3>update profile</h3>
      <input type="text" name="updateadm[name]" value="<?= $admin['name']; ?>" required placeholder="enter your username"
        maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="email" name="updateadm[email]" value="<?= $admin['email']; ?>" required placeholder="enter your Email"
        maxlength="70" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="updateadm[old_pass]" placeholder="enter old password" maxlength="20" class="box"
        oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="updateadm[new_pass]" placeholder="enter new password" maxlength="20" class="box"
        oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="updateadm[confirm_pass]" placeholder="confirm new password" maxlength="20" class="box"
        oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="update now" class="btn" name="upadm">
    </form>

  </section>


  <script src="<?=base_url('public/')?>js/admin_script.js"></script>

</body>

</html>