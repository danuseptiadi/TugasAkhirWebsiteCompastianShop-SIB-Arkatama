<header class="header">

   <section class="flex">

      <a href="
      <?=base_url('Admin')?>" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="
         <?=base_url('Admin')?>">home</a>
         <a href="<?=base_url('Admin/products')?>">products</a>
         <a href="<?=base_url('Admin/hero')?>">hero</a>
         <a href="<?=base_url('Admin/herosuper')?>">hero(super_admin)</a>
         <a href="<?=base_url('Admin/orders')?>">orders</a>
         <a href="<?=base_url('Admin/accounts')?>">admins</a>
         <a href="<?=base_url('Admin/users')?>">users</a>
         <a href="<?=base_url('Admin/messages')?>">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
         <p><?= $admin['name']; ?></p>
         <a href="<?=base_url('Admin/update_profile')?>" class="btn">update profile</a>
         <div class="flex-btn">
            <a href="<?=base_url('Admin/register')?>" class="option-btn">register</a>
         </div>
         <a href="<?=base_url('Auth/logout')?>" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
      </div>

   </section>

</header>