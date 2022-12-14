<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>

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

  <section class="dashboard">

    <h1 class="heading">dashboard</h1>

    <div class="box-container">

      <div class="box">
        <h3>welcome!</h3>
        <p><?= $admin['name']; ?></p>
        <a href="<?=base_url('Admin/update_profile')?>" class="btn">update profile</a>
      </div>

      <div class="box">
        <h3><span>Rp </span><?= number_format($total_pending['total']) ; ?><span>,-</span></h3>
        <p>total pendings</p>
        <a href="<?=base_url('Admin/orders')?>" class="btn">see orders</a>
      </div>

      <div class="box">
        <h3><span>Rp </span><?= number_format($total_completes['total']) ; ?><span>,-</span></h3>
        <p>completed orders</p>
        <a href="<?=base_url('Admin/orders')?>" class="btn">see orders</a>
      </div>

      <div class="box">
        <h3><?= $total_placed['total']; ?></h3>
        <p>orders placed</p>
        <a href="<?=base_url('Admin/orders')?>" class="btn">see orders</a>
      </div>

      <div class="box">
        <h3><?= $total_product['total']; ?></h3>
        <p>products added</p>
        <a href="<?=base_url('Admin/products')?>" class="btn">see products</a>
      </div>

      <div class="box">
        <h3><?= $total_user['total']; ?></h3>
        <p>normal users</p>
        <a href="<?=base_url('Admin/users')?>" class="btn">see users</a>
      </div>

      <div class="box">
        <h3><?= $total_admin['total']; ?></h3>
        <p>admin users</p>
        <a href="<?=base_url('Admin/accounts')?>" class="btn">see admins</a>
      </div>

      <div class="box">
        <h3><?= $total_message['total']; ?></h3>
        <p>new messages</p>
        <a href="<?=base_url('Admin/messages')?>" class="btn">see messages</a>
      </div>

    </div>

  </section>

  <script src="<?=base_url('public/')?>js/admin_script.js"></script>

</body>

</html>