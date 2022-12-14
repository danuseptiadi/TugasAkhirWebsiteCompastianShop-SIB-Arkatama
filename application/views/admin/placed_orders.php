<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>placed orders</title>

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

  <section class="orders">

    <h1 class="heading">placed orders</h1>

    <div class="box-container">

      <?php foreach ($orders as $order):?>
      <div class="box">
        <p> placed on : <span><?= $order['placed_on']; ?></span> </p>
        <p> name : <span><?= $order['name']; ?></span> </p>
        <p> number : <span><?= $order['number']; ?></span> </p>
        <p> address : <span><?= $order['address']; ?></span> </p>
        <p> total products : <span><?= $order['total_products']; ?></span> </p>
        <p> total price : <span>Rp <?= number_format($order['total_price']) ; ?>/-</span> </p>
        <p> payment method : <span><?= $order['method']; ?></span> </p>
        <form action="" method="post">
          <input type="hidden" name="updateorder[id]" value="<?= $order['id']; ?>">
          <select name="updateorder[payment_status]" class="select">
            <option selected disabled><?= $order['payment_status']; ?></option>
            <option value="pending">pending</option>
            <option value="completed">completed</option>
          </select>
          <div class="flex-btn">
            <button type="submit" value="update" class="option-btn" name="update_payment">Update</button>
            <a href="orders/<?= $order['id']; ?>" class="delete-btn"
              onclick="return confirm('delete this order?');">delete</a>
          </div>
        </form>
      </div>
      <?php endforeach; ?>

    </div>

  </section>

  </section>



  <script src="<?=base_url('public/')?>js/admin_script.js"></script>

</body>

</html>