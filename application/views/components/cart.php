<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="<?=base_url('public/css/')?>style.css">

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
  $userheader = ['cart' => $carts,'wistlist' => $wishlist, 'user' => $user];
  $this->load->view('template/user_header',$userheader); ?>

  <section class="products shopping-cart">

    <h1 class="heading"><span>Keranjang Belanja</span></h1>

    <div class="box-container">

      <?php
      $grand_total = 0;
      foreach ($carts as $cart):
      ?>
      <form action="" method="post" class="box">
        <input type="hidden" name="cart_id" value="<?= $cart['id']; ?>">
        <a href="<?= base_url('Landing_page/quick_view/'.$cart['pid']); ?>" class="fas fa-eye"></a>
        <img src="<?=base_url('public/')?>uploaded_img/<?= $cart['image']; ?>" alt="">
        <div class="name"><?= $cart['name']; ?></div>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <div class="flex">
          <div class="price-before" style="text-decoration: line-through;"> Rp
            <span><?= number_format($cart['price_before']) ; ?></span>,-
          </div>
          <div class="price">Rp <?= number_format($cart['price']) ; ?>,-
          </div>

        </div>
        <div class="flex">

          <div class="quality">
            <h3>QTY : </h3>
            <input type="number" name="quantity" class="qty" min="1" max="99"
              onkeypress="if(this.value.length == 2) return false;" value="<?= $cart['quantity']; ?>">

          </div>
          <button type="submit" class="fas fa-edit" value="upqty" name="update_qty"></button>
        </div>
        <div class="sub-total"> sub total :
          <span>Rp
            <?= number_format($sub_total = ( $cart['price']  * $cart['quantity'] )) ; ?>,-</span>
        </div>
        <a href="<?=base_url('Landing_page/cart/'.$cart['id'])?>" class="delete-btn"
        onclick="return confirm('hapus barang dari cart?');">Hapus Barang</a>
      </form>
      <?php
   $grand_total += $sub_total;
      endforeach;
   ?>
    </div>

    <div class="cart-total">
      <p>Total Biaya : <span>Rp <?= number_format($grand_total) ; ?>,-</span></p>
      <a href="<?=base_url('Landing_page/shop')?>" class="option-btn">Lanjut Belanja</a>
      <a href="<?=base_url('Landing_page/cart/all')?>" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>"
        onclick="return confirm('delete all from cart?');">Hapus Semua Barang</a>
      <a href="<?=base_url('Landing_page/checkout')?>" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Lanjut Pembayaran</a>
    </div>

  </section>



  <?php $this->load->view('template/footer',$footer=null); ?>
  <script src="<?=base_url('public/')?>js/script.js"></script>

</body>

</html>