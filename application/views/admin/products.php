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

    <?= form_open_multipart(base_url('Admin/products'));?>
      <div class="flex">
        <div class="inputBox">
          <span>product name (required)</span>
          <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="addproduct[name]">
        </div>
        <div class="inputBox">
          <span>produsen name (required)</span>
          <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="addproduct[produsen]">
        </div>
        <div class="inputBox">
          <span>product price before (required)</span>
          <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price"
            onkeypress="if(this.value.length == 10) return false;" name="addproduct[price_before]">
        </div>
        <div class="inputBox">
          <span>product price after (required)</span>
          <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price"
            onkeypress="if(this.value.length == 10) return false;" name="addproduct[price]">
        </div>
        <div class="inputBox">
          <span>image 01 (required)</span>
          <input type="file" name="productimage_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
          <span>image 02 (required)</span>
          <input type="file" name="productimage_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
          <span>image 03 (required)</span>
          <input type="file" name="productimage_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
        </div>
        <div class="inputBox">
          <span>product details (required)</span>
          <textarea name="addproduct[details]" placeholder="enter product details" class="box" required maxlength="500" cols="30"
            rows="10"></textarea>
        </div>
      </div>

      <input type="submit" value="add product" class="btn" name="add_product">
    <?= form_close();?>

  </section>

  <section class="show-products">

    <h1 class="heading">products added</h1>

    <div class="box-container">

      <?php
      foreach ($products as $product):
   ?>
      <div class="box">
        <img src="<?=base_url('public/')?>uploaded_img/<?= $product['image_01']; ?>" alt="">
        <div class="name"><?= $product['name']; ?></div>
        <div class="produsen">by : <?= $product['produsen']; ?></div>
        <div class="price-before" style="text-decoration: line-through;"> Rp
          <span><?= number_format($product['price_before']) ; ?></span>,-
        </div>
        <div class="price"> Rp <span><?= number_format($product['price']) ; ?></span>,-</div>
        <div class="details"><textarea name="details" id="" cols="30"
            rows="5"><?= $product['details']; ?></textarea></div>
        <div class="flex-btn">
          <a href="<?=base_url('Admin/update_product/'.$product['id']); ?>" class="option-btn">update</a>
          <a href="<?=base_url('Admin/products/'.$product['id']); ?>" class="delete-btn"
            onclick="return confirm('delete this product?');">delete</a>
        </div>
      </div>
      <?php endforeach;?>

    </div>

  </section>








  <script src="<?=base_url('public/')?>js/admin_script.js"></script>

</body>

</html>