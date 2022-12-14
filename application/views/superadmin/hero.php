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

      <?php foreach ($hero as $hr):?>
      <div class="box">
      <img src="<?=base_url('public/')?>uploaded_img/<?= $hr['img']; ?>" width="250px" height="250px" alt="">
        <p> judul : <span><?= $hr['judul']; ?></span> </p>
        <p> caption : <span><?= $hr['caption']; ?></span> </p>
        <p> link : <span><?= $hr['link']; ?></span> </p>
        <form action="" method="post">
          <input type="hidden" name="herosuper[id]" value="<?= $hr['id']; ?>">
          <select name="herosuper[status]" class="select">
            <option selected disabled><?= $hr['status']; ?></option>
            <option value="ditolak">ditolak</option>
            <option value="disetujui">disetujui</option>
          </select>
          <div class="flex-btn">
            <button type="submit" value="update" class="option-btn" name="update_hero_status">Update</button>
            <a href="<?= base_url('Admin/herosuper/'.$hr['id']) ?>" class="delete-btn"
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