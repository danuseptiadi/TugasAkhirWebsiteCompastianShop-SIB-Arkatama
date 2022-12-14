<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="addorder[viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>

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
  $userheader = ['cart' => $cart,'wistlist' => $wishlist, 'user' => $user];
  $this->load->view('template/user_header',$userheader); ?>

  <section class="checkout-orders">

    <form action="<?=base_url('Landing_page/checkout')?>" method="POST">

      <h3>Pesanan Anda</h3>

      <div class="display-orders">
        <?php
         $grand_total = 0;
         $cart_items[] = '';
         foreach ($cart as $crt):
               $cart_items[] = $crt['name'].' ('.$crt['price'].' x '. $crt['quantity'].') - ';
               $total_products = implode($cart_items);
               $grand_total += ($crt['price'] * $crt['quantity']);
      ?>
        <p> <?= $crt['name']; ?>
          <span>(<?= 'Rp '. number_format($crt['price']) .',- x '. $crt['quantity']; ?>)</span>
        </p>
        <?php endforeach; ?>
        <input type="hidden" name="addorder[total_products]" value="<?= $total_products; ?>">
        <input type="hidden" name="addorder[total_price]" value="<?= $grand_total; ?>" value="">
        <div class="grand-total">total biaya : <span>Rp <?= number_format($grand_total) ; ?>,-</span></div>
      </div>

      <h3>Informasi Pengiriman</h3>

      <div class="flex">
        <div class="inputBox">
          <span>nama :</span>
          <input type="text" name="addorder[name]" placeholder="" class="box" maxlength="20" required>
        </div>
        <div class="inputBox">
          <span>nomor hp :</span>
          <input type="number" name="addorder[number]" placeholder="" class="box"
            onkeypress="if(this.value.length == 10) return false;" required>
        </div>
        <div class="inputBox">
          <span>email :</span>
          <input type="email" name="addorder[email]" placeholder="" class="box" maxlength="50" required>
        </div>
        <div class="inputBox">
          <span>metode pembayaran :</span>
          <select name="addorder[method]" class="box" required>
            <option value="cash on delivery">cash on delivery</option>
            <option value="credit card">credit card</option>
            <option value="paytm">paytm</option>
            <option value="paypal">paypal</option>
          </select>
        </div>
        <div class="inputBox">
          <span>Alamat :</span>
          <input type="text" name="street" placeholder="" class="box" maxlength="500" required>
        </div>
        <div class="inputBox">
          <span>Kecamatan :</span>
          <input type="text" name="flat" placeholder="" class="box" maxlength="50" required>
        </div>

        <div class="inputBox">
          <span>kota / kabupaten :</span>
          <input type="text" name="city" placeholder="" class="box" maxlength="50" required>
        </div>
        <div class="inputBox">
          <span>provinsi :</span>
          <input type="text" name="state" placeholder="" class="box" maxlength="50" required>
        </div>
        <div class="inputBox">
          <span>negara :</span>
          <input type="text" name="country" placeholder="" class="box" maxlength="50" required>
        </div>
        <div class="inputBox">
          <span>kode pos :</span>
          <input type="number" min="0" name="pin_code" placeholder="" min="0" max="999999"
            onkeypress="if(this.value.length == 6) return false;" class="box" required>
        </div>
      </div>

      <input type="submit" name="order" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="Checkout Pesanan">

    </form>

  </section>


  <?php $this->load->view('template/footer',$footer=null); ?>
  <script src="<?=base_url('public/')?>js/script.js"></script>

</body>

</html>