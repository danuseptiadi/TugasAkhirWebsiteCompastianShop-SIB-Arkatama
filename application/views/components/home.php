<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

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
  $userheader = ['cart' => $cart,'wishlist' => $wishlist, 'user' => $user];
  $this->load->view('template/user_header',$userheader); ?>

<div class="home-bg">

    <section class="home">

      <div class="swiper home-slider">

        <div class="swiper-wrapper">
          <?php foreach ($hero as $hr) :?>
          <div class="swiper-slide slide">
            <div class="image">
              <img src="<?=base_url('public/uploaded_img/'.$hr['img'])?>" alt="">
            </div>
            <div class="content">
              <span><?=$hr['caption']?></span>
              <h3><?=$hr['judul']?></h3>
              <a href="<?=$hr['link']?>" class="btn">Belanja</a>
            </div>
          </div>
          <?php endforeach; ?>

        </div>

        <div class="swiper-pagination"></div>

      </div>


    </section>

  </div>

  <section class="category">

    <h1 class="heading"><span>Kategori Produk</span></h1>

    <div class="swiper category-slider">

      <div class="swiper-wrapper">

        <a href="<?=base_url('Landing_page/category/')?>accecoris" class="swiper-slide slide">
          <img src="<?=base_url('public/')?>images/game-controller.png" alt="">
          <h3>Game Accecoris</h3>
        </a>

        <a href="<?=base_url('Landing_page/category/')?>game-account" class="swiper-slide slide">
          <img src="<?=base_url('public/')?>images/game-btn.png" alt="">
          <h3>Game Account</h3>
        </a>

        <a href="<?=base_url('Landing_page/category/')?>account" class="swiper-slide slide">
          <img src="<?=base_url('public/')?>images/user-solid.svg" alt="">
          <h3>Account</h3>
        </a>

        <a href="<?=base_url('Landing_page/category/')?>social" class="swiper-slide slide">
          <img src="<?=base_url('public/')?>images/add-user.png" alt="">
          <h3>social item</h3>
        </a>

      </div>

      <div class="swiper-pagination"></div>

    </div>

  </section>

  <section class="products">

    <h1 class="heading"><span>Produk Terbaru</span></h1>

    <div class="box-container">

      <?php foreach ($all_product as $product):?>
      <form action="" method="post" class="box">
        <input type="hidden" name="addwc[pid]" value="<?= $product['id']; ?>">
        <input type="hidden" name="addwc[name]" value="<?= $product['name']; ?>">
        <input type="hidden" name="addwc[price_before]" value="<?= $product['price_before']; ?>">
        <input type="hidden" name="addwc[price]" value="<?= $product['price']; ?>">
        <input type="hidden" name="addwc[image]" value="<?= $product['image_01']; ?>">
        <input type="hidden" name="quantity" value="1">
        <button class="fas fa-heart" type="submit" value="1" name="addwish"></button>
        <a href="<?= base_url('Landing_page/quick_view/'.$product['id']);?>" class="fas fa-eye"></a>
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
          <div class="price-before"><span>Rp
            </span><?= number_format($product['price_before']) ; ?><span>,-</span></div>
          <div class="price"><span>Rp </span><?= number_format($product['price']) ; ?><span>,-</span></div>
          <!-- <input type="number" name="add[qty" class="qty" min="1" max="99"
            onkeypress="if(this.value.length == 2) return false;" value="1"> -->
        </div>
        <input type="submit" value="Tambah ke Keranjang" class="btn" name="addcart">
      </form>
      <?php endforeach; ?>

    </div>

    <div class="load-more" style=" margin-top: 2rem;">
      <a href="<?=base_url('Landing_page/shop')?>" class="option-btn">Lihat Semua</a>
    </div>

  </section>

  <section class="deal" id="deal">
    <h1 class="heading"><span>Penawaran Terbaik</span></h1>

    <div class="icons-container">
      <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <h3>Pengiriman Cepat</h3>
        <p>Pengiriman dilakukan di hari yang sama setelah barang dicheckout</p>
      </div>

      <div class="icons">
        <i class="fas fa-user-clock"></i>
        <h3>Pelayanan 24 Jam</h3>
        <p>Melayani customer selama 24 jam non stop</p>
      </div>

      <div class="icons">
        <i class="fas fa-money-check-alt"></i>
        <h3>Pembayaran Mudah</h3>
        <p>Didukung pembayaran antar bank dan berbagai macam e-wallet</p>
      </div>

      <div class="icons">
        <i class="fas fa-box"></i>
        <h3>Garansi Pengembalian</h3>
        <p>Garansi 10 hari setelah barang tiba. Syarat dan ketentuan berlaku</p>
      </div>
    </div>
  </section>


  <section class="home-contact">
    <div class="content">
      <h3>Ada Pertanyaan?</h3>
      <p>
        Silahkan tulis pertanyaan maupun masukan anda pada halaman Contact agar website kami dapat berkembang menjadi
        lebih
        baik dalam melayani customer
      </p>
      <a href="<?=base_url('Landing_page/contact')?>" class="btn">Hubungi Kami</a>
    </div>
  </section>



  
  <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  
  <?php $this->load->view('template/footer',$footer=null); ?>
  <script src="<?=base_url('public/')?>js/script.js"></script>

  <script>
  var swiper = new Swiper(".home-slider", {
    loop: true,
    spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  var swiper = new Swiper(".category-slider", {
    loop: false,
    spaceBetween: 20,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 2,
      },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 6,
      },
    },
  });

  // var swiper = new Swiper(".products-slider", {
  //   loop: true,
  //   spaceBetween: 20,
  //   pagination: {
  //     el: ".swiper-pagination",
  //     clickable: true,
  //   },
  //   breakpoints: {
  //     550: {
  //       slidesPerView: 2,
  //     },
  //     768: {
  //       slidesPerView: 2,
  //     },
  //     1024: {
  //       slidesPerView: 3,
  //     },
  //   },
  // });
  </script>



</body>

</html>