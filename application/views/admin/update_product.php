<?php

// include '../components/connect.php';

// session_start();

// $admin_id = $_SESSION['admin_id'];

// if(!isset($admin_id)){
//    header('location:admin_login.php');
// }

// if(isset($_POST['update'])){

//    $pid = $_POST['pid'];
//    $name = $_POST['name'];
//    $name = filter_var($name, FILTER_SANITIZE_STRING);
//    $produsen = $_POST['produsen'];
//    $produsen = filter_var($produsen, FILTER_SANITIZE_STRING);
//    $price_before = $_POST['price_before'];
//    $price_before = filter_var($price_before, FILTER_SANITIZE_STRING);
//    $price = $_POST['price'];
//    $price = filter_var($price, FILTER_SANITIZE_STRING);
//    $details = $_POST['details'];
//    $details = filter_var($details, FILTER_SANITIZE_STRING);

//    $time = date('d-M-Y h:i:sa');

//    $update_product = $conn->prepare("UPDATE `products` SET name = ?, produsen = ?, price_before = ?, price = ?, details = ?, tgl_waktu = ? WHERE id = ?");
//    $update_product->execute([$name, $produsen, $price_before, $price, $details, $time, $pid]);

//    $message[] = 'product updated successfully!';

//    $old_image_01 = $_POST['old_image_01'];
//    $image_01 = $_FILES['image_01']['name'];
//    $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
//    $image_size_01 = $_FILES['image_01']['size'];
//    $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
//    $image_folder_01 = '../uploaded_img/'.$image_01;

//    if(!empty($image_01)){
//       if($image_size_01 > 2000000){
//          $message[] = 'image size is too large!';
//       }else{
//          $update_image_01 = $conn->prepare("UPDATE `products` SET image_01 = ? WHERE id = ?");
//          $update_image_01->execute([$image_01, $pid]);
//          move_uploaded_file($image_tmp_name_01, $image_folder_01);
//          unlink('../uploaded_img/'.$old_image_01);
//          $message[] = 'image 01 updated successfully!';
//       }
//    }

//    $old_image_02 = $_POST['old_image_02'];
//    $image_02 = $_FILES['image_02']['name'];
//    $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
//    $image_size_02 = $_FILES['image_02']['size'];
//    $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
//    $image_folder_02 = '../uploaded_img/'.$image_02;

//    if(!empty($image_02)){
//       if($image_size_02 > 2000000){
//          $message[] = 'image size is too large!';
//       }else{
//          $update_image_02 = $conn->prepare("UPDATE `products` SET image_02 = ? WHERE id = ?");
//          $update_image_02->execute([$image_02, $pid]);
//          move_uploaded_file($image_tmp_name_02, $image_folder_02);
//          unlink('../uploaded_img/'.$old_image_02);
//          $message[] = 'image 02 updated successfully!';
//       }
//    }

//    $old_image_03 = $_POST['old_image_03'];
//    $image_03 = $_FILES['image_03']['name'];
//    $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
//    $image_size_03 = $_FILES['image_03']['size'];
//    $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
//    $image_folder_03 = '../uploaded_img/'.$image_03;

//    if(!empty($image_03)){
//       if($image_size_03 > 2000000){
//          $message[] = 'image size is too large!';
//       }else{
//          $update_image_03 = $conn->prepare("UPDATE `products` SET image_03 = ? WHERE id = ?");
//          $update_image_03->execute([$image_03, $pid]);
//          move_uploaded_file($image_tmp_name_03, $image_folder_03);
//          unlink('../uploaded_img/'.$old_image_03);
//          $message[] = 'image 03 updated successfully!';
//       }
//    }

// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>update product</title>

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

  <section class="update-product">

    <h1 class="heading">update product</h1>
    <?= form_open_multipart(base_url('Admin/update_product/'.$product['id']));?>
      <input type="hidden" name="pid" value="<?= $product['id']; ?>">
      <input type="hidden" name="old_image_01" value="<?= $product['image_01']; ?>">
      <input type="hidden" name="old_image_02" value="<?= $product['image_02']; ?>">
      <input type="hidden" name="old_image_03" value="<?= $product['image_03']; ?>">
      <div class="image-container">
        <div class="main-image">
          <img src="<?=base_url('public/')?>uploaded_img/<?= $product['image_01']; ?>" alt="">
        </div>
        <div class="sub-image">
          <img src="<?=base_url('public/')?>uploaded_img/<?= $product['image_01']; ?>" alt="">
          <img src="<?=base_url('public/')?>uploaded_img/<?= $product['image_02']; ?>" alt="">
          <img src="<?=base_url('public/')?>uploaded_img/<?= $product['image_03']; ?>" alt="">
        </div>
      </div>
      <span>update name</span>
      <input type="text" name="updateproduct[name]" required class="box" maxlength="100" placeholder="enter product name"
        value="<?= $product['name']; ?>">
      <span>update produsen</span>
      <input type="text" name="updateproduct[produsen]" required class="box" maxlength="100" placeholder="enter product name"
        value="<?= $product['produsen']; ?>">
      <span>update price before</span>
      <input type="number" name="updateproduct[price_before]" required class="box" min="0" max="9999999999"
        placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;"
        value="<?= $product['price_before']; ?>">
      <span>update price</span>
      <input type="number" name="updateproduct[price]" required class="box" min="0" max="9999999999" placeholder="enter product price"
        onkeypress="if(this.value.length == 10) return false;" value="<?= $product['price']; ?>">
      <span>update details</span>
      <textarea name="updateproduct[details]" class="box" required cols="30" rows="10"><?= $product['details']; ?></textarea>
      <span>update image 01</span>
      <input type="file" name="updateproductimage_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <span>update image 02</span>
      <input type="file" name="updateproductimage_02" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <span>update image 03</span>
      <input type="file" name="updateproductimage_03" accept="image/jpg, image/jpeg, image/png, image/webp" class="box">
      <div class="flex-btn">
        <button type="submit" name="updateproduct[id]" class="btn" value="<?=$product['id']?>">Update</button>
        <a href="<?=base_url('Admin/products')?>" class="option-btn">go back</a>
      </div>
    </form>

  </section>












  <script src="<?=base_url('public/')?>js/admin_script.js"></script>

</body>

</html>