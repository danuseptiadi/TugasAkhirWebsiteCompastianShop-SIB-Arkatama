<!-- head-content -->
<div id="head">
    
    <!-- navbar -->
<nav>
    <div id="logo">
        <div id="text-logo">CompastianShop</div>
    </div>
    <div id="profile">
        <h1 class="cart"><i class="bi bi-cart-fill"></i></h1>
        <img src="" alt="" id="avatar">
        <?php if ($this->session->login == null){?>
            <a href="<?=base_url('Auth')?>" class="name">Login</a>
            <?php }else{?>
            <a href="<?=base_url('Home/'.$this->session->login['user_role'].'?logout=true')?>" class="name">Logout</a>
        <?php }?>


    </div>
</nav>
<!-- end navbar -->

<!-- Hiro -->
<div id="hiro">
    hiro
</div>
<!-- end hiro -->

<!-- Menu -->
<div id="menu">
        <ul id="categories">
            <li class="category">Kategori 1</li>
            <li class="category active">Kategori 2</li>
            <li class="category">Kategori 3</li>
        </ul>
    <div id="search">
        <input type="text" placeholder="Search..." name="search" id="searchf">
        <button><i class="bi bi-search"></i></button>
    </div>
</div>
<!-- end menu -->

</div>
<!-- end top-content -->

<!-- Main Content -->
<div id="content">
    <p class="title">Product</p>
    
    <!-- list Product -->
    <div class="list-product">
            <div class="product">
                <?php foreach ($all_product as $product):
                    ?>
            <div class="card">
                    <img src="" alt="">
                    <div class="card-title"><?=$product['product_name']?></div>
                                            <div class="card-action">
                        <span class="harga">Rp.<?=$product['product_price']?></span>
                        <button>View Detail</button>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
    </div>
    <!-- end list product -->
</div>
<!-- end Main content -->
</body>
</html>