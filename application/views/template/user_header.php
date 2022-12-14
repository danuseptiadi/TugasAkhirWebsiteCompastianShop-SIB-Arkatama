<header class="header">

  <section class="flex">
    <div id="menu-btn" class="fas fa-bars"></div>

    <a href="<?=base_url('Landing_page')?>" class="logo"><img height="70px" src="<?=base_url('public/images/logo.png')?>"></a>

    <nav class="navbar">
      <a href="<?=base_url('Landing_page')?>">home</a>
      <a href="<?=base_url('Landing_page/shop')?>">shop</a>
      <a href="<?=base_url('Landing_page/orders')?>">orders</a>
      <a href="<?=base_url('Landing_page/contact')?>">contact</a>
      <a href="<?=base_url('Landing_page/about')?>">about</a>
      <div class="wish">
        <a href="<?=base_url('Landing_page/wishlist')?>">wishlist</a>
      </div>
      <div class="wish">
        <a href="<?=base_url('Landing_page/cart')?>">cart</a>
      </div>
      <div class="wish">
        <a href="<?=base_url('Landing_page/update_user')?>">profile</a>
      </div>
    </nav>

    <div class="icons">
      <?php
      if ($wishlist != null) {
        $wishlist_items = $wishlist;
        $total_wishlist_counts = count($wishlist);
      }else{
        $total_wishlist_counts = 0;
      }

      if ($cart != null) {
        $cart_items = $cart;
        $total_cart_counts = count($cart);
      }else{
        $total_cart_counts = 0;
      }
         ?>

      <a href="<?=base_url('Landing_page/search_page')?>"><i class="fas fa-search"></i></a>
      <a id="w" href="<?=base_url('Landing_page/wishlist')?>"><i class="fas fa-heart"></i><span>(<?= $total_wishlist_counts; ?>)</span></a>
      <a id="w" href="<?=base_url('Landing_page/cart')?>"><i class="fas fa-shopping-cart"></i><span>(<?=$total_cart_counts; ?>)</span></a>
      <div id="user-btn" class="fas fa-user"></div>
    </div>

    <div class="profile">
      <?php if ($user != null) { ?>
      <img src="<?=base_url('public/')?>images/profil.png" alt="">
      <p><?= $user["name"]; ?></p>
      <a href="<?=base_url('Landing_page/update_user')?>" class="btn">update profil</a>
      <a href="<?=base_url('Auth/logout/')?>" class="delete-btn"
        onclick="return confirm('logout from the website?');">Keluar</a>
      <?php
            }else{
         ?>
      <p>Silahkan masuk terlebih dahulu..!</p>
      <div class="flex-btn">
        <a href="<?=base_url('Auth/register')?>" class="option-btn">Daftar</a>
        <a href="<?=base_url('Auth')?>" class="option-btn">Masuk</a>
      </div>
      <?php
            }
         ?>


    </div>

  </section>

</header>