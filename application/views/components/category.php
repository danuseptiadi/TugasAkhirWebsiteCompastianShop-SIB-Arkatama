<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Category</title>

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

    <h1 class="heading"><span>Kategori <?=$page?></span></h1>

    <div class="box-container">

    <?php foreach ($all_product as $product):?>
      <form action="" method="post" class="box">
        <input type="hidden" name="addwc[pid]" value="<?= $product['id']; ?>">
        <input type="hidden" name="addwc[name]" value="<?= $product['name']; ?>">
        <input type="hidden" name="addwc[price_before]" value="<?= $product['price_before']; ?>">
        <input type="hidden" name="addwc[price]" value="<?= $product['price']; ?>">
        <input type="hidden" name="addwc[image]" value="<?= $product['image_01']; ?>">
        <input type="hidden" name="quantity" value="1">
        <button class="fas fa-heart" type="submit" value="wish" name="addwish"></button>
        <a href="<?=base_url('Landing_page/quick_view/'.$product['id']); ?>" class="fas fa-eye"></a>
        <img src="<?=base_url('public/')?>uploaded_img/<?= $product['image_01']; ?>" alt="">
        <div class="name"><?= $product['name']; ?></div>
        <div class="stars">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <div class="flex">
          <div class="price"><span>Rp </span><?= number_format($product['price']) ; ?><span>,-</span></div>
          <!-- <input type="number" name="qty" class="qty" min="1" max="99"
            onkeypress="if(this.value.length == 2) return false;" value="1"> -->
        </div>
        <input type="submit" value="Tambah ke Keranjang" class="btn" name="addcart">
      </form>
      <?php endforeach;?>

    </div>

  </section>


  <?php $this->load->view('template/footer',$footer=null); ?>
  <script src="<?=base_url('public/')?>js/script.js"></script>

</body>

</html>