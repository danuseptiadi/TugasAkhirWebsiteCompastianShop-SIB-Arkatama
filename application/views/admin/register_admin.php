<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>register admin</title>

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

    <form action="<?=base_url('Admin/register')?>" method="post">
      <h3>register now</h3>
      <input type="text" name="addadm[name]" required placeholder="enter your username" maxlength="20" class="box"
        oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="email" name="addadm[email]" required placeholder="enter your Email" maxlength="20" class="box"
        oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="addadm[password]" required placeholder="enter your password" maxlength="20" class="box"
        oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" required placeholder="confirm your password" maxlength="20" class="box"
        oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="register now" class="btn" name="admadd">
    </form>

  </section>


  <script src="<?=base_url('public/')?>js/admin_script.js"></script>

</body>

</html>