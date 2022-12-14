<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>products</title>
  <link rel="shortcut icon" href="logo.png" type="image/x-icon">

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

  <section class="add-products">

    <h1 class="heading">add product</h1>

    <?= form_open_multipart(base_url('Admin/hero'));?>
      <div class="flex">
        <div class="inputBox">
          <span>Judul Hero</span>
          <input type="text" class="box" required maxlength="100" placeholder="enter hero title" name="addhero[judul]">
        </div>
        <div class="inputBox">
          <span>Link Hero</span>
          <input type="text" class="box" required maxlength="100" placeholder="enter hero link" name="addhero[link]">
        </div>
        <div class="inputBox">
          <span>Caption Hero</span>
          <input type="text" class="box" required maxlength="100" placeholder="enter caption" name="addhero[caption]">
        </div>
        <div class="inputBox">
          <span>Gambar Hero</span>
          <input type="file" name="heroimg" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
      </div>

      <input type="submit" value="add hero" class="btn" name="add_hero">
    <?= form_close();?>

  </section>

  <section class="show-products">

    <h1 class="heading">products added</h1>

    <div class="box-container">

      <?php
      foreach ($hero as $hr):
   ?>
      <div class="box">
        <img src="<?=base_url('public/')?>uploaded_img/<?= $hr['img']; ?>" alt="">
        <div class="name"><?= $hr['judul']; ?></div>
        <div class="price"><?= $hr['status']; ?></div>
        <div class="details"><textarea name="details" id="" cols="30"
            rows="5"><?= $hr['caption']; ?></textarea></div>
        <div class="flex-btn">
          <a href="<?=base_url('Admin/hero/'.$hr['id']); ?>" class="delete-btn"
            onclick="return confirm('delete this product?');">delete</a>
        </div>
      </div>
      <?php endforeach;?>

    </div>

  </section>








  <script src="<?=base_url('public/')?>js/admin_script.js"></script>

</body>

</html>