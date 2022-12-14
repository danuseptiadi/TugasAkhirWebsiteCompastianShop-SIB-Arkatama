<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wishlist</title>

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

  <section class="products">

    <h1 class="heading"><span> Wishlist </span></h1>

    <div class="box-container">

      <?php
      $grand_total = 0;
      foreach ($wishlist as $wish):
      $grand_total += $wish['price']; ?>
      <form action="" method="post" class="box">
        <input type="hidden" name="addwc[pid]" value="<?= $wish['pid']; ?>">
        <input type="hidden" name="wish_id" value="<?= $wish['id']; ?>">
        <input type="hidden" name="addwc[name]" value="<?= $wish['name']; ?>">
        <input type="hidden" name="addwc[price_before]" value="<?= $wish['price_before']; ?>">
        <input type="hidden" name="addwc[price]" value="<?= $wish['price']; ?>">
        <input type="hidden" name="addwc[image]" value="<?= $wish['image']; ?>">
        <input type="hidden" name="quantity" value="1">
        <a href="<?= base_url('Landing_page/quick_view/'.$wish['pid']);?> ?>" class="fas fa-eye"></a>
        <img src="<?=base_url('public/')?>uploaded_img/<?= $wish['image']; ?>" alt="">
        <div class="name"><?= $wish['name']; ?></div>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <div class="flex">
          <div class="price-before"><span>Rp
            </span><?= number_format($wish['price_before']) ; ?><span>,-</span></div>
          <div class="price">Rp <?= number_format($wish['price']) ; ?>/-</div>
          <!-- <input type="number" name="addwc[qty]" class="qty" min="1" max="99"
            onkeypress="if(this.value.length == 2) return false;" value="1"> -->
        </div>
        <input type="submit" value="Tambah ke Keranjang" class="btn" name="addcart">
        <a href="<?=base_url('Landing_page/wishlist/'.$wish['id'])?>" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>"
        onclick="return confirm('Hapus barang dari wishlist?');">Hapus</a>
      </form>
      <?php endforeach; ?>
    </div>

    <div class="wishlist-total">
      <p>Total Biaya : <span>Rp <?= number_format($grand_total) ; ?>,-</span></p>
      <a href="<?=base_url('Landing_page/shop')?>" class="option-btn">Lanjut Belanja</a>
      <a href="<?=base_url('Landing_page/wishlist/all')?>" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>"
        onclick="return confirm('Hapus semua barang dari wishlist?');">Hapus Semua</a>
    </div>

  </section>


  <?php $this->load->view('template/footer',$footer=null); ?>
  <script src="<?=base_url('public/')?>js/script.js"></script>

</body>

</html>