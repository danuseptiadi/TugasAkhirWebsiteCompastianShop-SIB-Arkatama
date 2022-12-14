<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="<?=base_url('public/')?>css/style.css">

  <!-- clear confirm form resubmission -->
  <script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  </script>

  <!-- google analytics -->
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-PXX7TGT9XK"></script>
  <script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'G-PXX7TGT9XK');
  </script>

  <!-- google tag -->
  <!-- Google Tag Manager -->
  <script>
  (function(w, d, s, l, i) {
    w[l] = w[l] || [];
    w[l].push({
      'gtm.start': new Date().getTime(),
      event: 'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
      j = d.createElement(s),
      dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;
    j.src =
      'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
  })(window, document, 'script', 'dataLayer', 'GTM-W8ZMTQK');
  </script>
  <!-- End Google Tag Manager -->

</head>

<body>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8ZMTQK" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <?php 
  $userheader = ['cart' => $cart,'wistlist' => $wishlist, 'user' => $user];
  $this->load->view('template/user_header',$userheader); ?>

  <section class="orders">

    <h1 class="heading"><span> Daftar Pesanan </span></h1>

    <div class="box-container">

      <?php
      if($this->session->user_id == ''){
         echo '<p class="empty">please login to see your orders</p>';
      }else{ if ($orders == null) {
      }else{
        foreach ($orders as $order) {
   ?> 
      <div class="box">
        <p>Tanggal Pesan : <span><?= $order['placed_on']; ?></span></p>
        <p>Nama : <span><?= $order['name']; ?></span></p>
        <p>Email : <span><?= $order['email']; ?></span></p>
        <p>Nomor Hp : <span><?= $order['number']; ?></span></p>
        <p>Alamat : <span><?= $order['address']; ?></span></p>
        <p>Metode Pembayaran : <span><?= $order['method']; ?></span></p>
        <p>Pesanan Anda : <span><?= $order['total_products']; ?></span></p>
        <p>Total Biaya : <span>Rp <?= number_format($order['total_price']) ; ?>,-</span></p>
        <p> Status Pembayaran : <span
            style="color:<?php if($order['payment_status'] == 'pending'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $order['payment_status']; ?></span>
        </p>
      </div>
      <?php
        }
      }
      }
   ?>

    </div>

  </section>


  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

  <script src="<?=base_url('public/')?>js/script.js"></script>

</body>

</html>