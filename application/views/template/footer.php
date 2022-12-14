<footer class="footer">

  <div class="grid">

    <div class="box-1">
      <h3>quick links</h3>
      <a href="home.php">home</a>
      <a href="about.php">about</a>
      <a href="shop.php">shop</a>
      <a href="contact.php">contact</a>
    </div>

    <div class="box-1">
      <h3>extra links</h3>
      <a href="<?=base_url('Auth')?>">login</a>
      <a href="<?=base_url('Auth/register')?>">register</a>
      <a href="<?=base_url('Landing_page/cart')?>">cart</a>
      <a href="<?=base_url('Landing_page/orders')?>">orders</a>
    </div>

    <div class="box">
      <h3>contact us</h3>
      <a href=""><i class="fas fa-phone"></i> +031002561</a>
      <a href="https://api.whatsapp.com/send/?phone=%2B6289612815852&text&type=phone_number&app_absent=0"><i class="fab fa-whatsapp"></i> +6289612815852</a>
      <a href="mailto:danuseptiadi13@gmail.com"><i class="fas fa-envelope"></i>danuseptiadi13@gmail.com</a>
      <a href="https://www.google.com/maps/place/Surabaya"><i class="fas fa-map-marker-alt"></i> Surabaya, Jawa Timur </a>
    </div>

    <div class="box" id="medsos">
      <h3>follow us</h3>
      <a href="#"><i class="fab fa-facebook-f"></i>facebook</a>
      <a href="#"><i class="fab fa-instagram"></i>instagram</a>
      <a href="#"><i class="fab fa-tiktok"></i>Tiktok</a>
      <a href="#"><i class="fab fa-youtube"></i>Youtube</a>
    </div>

  </div>

  <div class="credit">Created by <span>Danu Septi Adi</span> @<?= date('Y'); ?> | all rights reserved!</div>

</footer>