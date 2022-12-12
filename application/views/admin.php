<!-- Modal AddProduct -->
<div class="modal addProduct">
    <div class="modal-content">
    <div class="modal-title">Add Product</div>
    <?= form_open_multipart(base_url('Home/admin'));?>
    <div class="form-input">
        <label for="add_product_name">Nama :</label>
        <input id="add_product_name" name="addProduct[product_name]" type="text">
    </div>
    <div class="form-input">
        <label for="add_product_varian">Varian :</label>
        <input id="add_product_varian" name="addProduct[product_varian]" type="text">
    </div>
    <div class="form-input">
        <label for="add_product_price">Harga :</label>
        <input id="add_product_price" name="addProduct[product_price]" type="number" min="100">
    </div>
    <div class="form-input">
        <label for="add_product_stock">Stock :</label>
        <input id="add_product_stock" name="addProduct[product_stock]" type="number">
    </div>
    <div class="form-input">
        <label for="add_product_description">Description :</label>
        <textarea id="add_product_description" name="addProduct[product_description]" cols="30" rows="10"></textarea>
    </div>
    <div class="form-input">
        <label for="add_product_category">Kategori :</label>
        <select name="addProduct[product_category]" id="add_product_category">
            <option value="">--Pilih Kategori--</option>
            <option value="Account">Account</option>
            <option value="Item Aplikasi">Item Aplikasi</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>
    <div class="form-input">
        <label for="addproductimg">Gambar Product </label>
        <input type="file" name="addproductimg" id="addproductimg">
    </div>
    <button type="submit">Tambahkan</button>
    <?= form_close(); ?>
    <button onclick="hideModal();" type="close">Tutup</button>
    </div>
</div>
<!-- End Modal AddProduct -->

<!-- Modal updateProduct -->
<?php foreach ($all_product as $product):?>
<div class="modal updateProduct<?=$product['product_id']?>">
    <div class="modal-content">
    <div class="modal-title">Add Product</div>
    <?= form_open_multipart(base_url('Home/admin'));?>
        <input style="visibility: hidden;"  id="update_product_id" value="<?=$product['product_id']?>" name="updateProduct[product_id]" type="text">
    <div class="form-input">
        <label for="update_product_name">Nama :</label>
        <input id="update_product_name" value="<?=$product['product_name']?>" name="updateProduct[product_name]" type="text">
    </div>
    <div class="form-input">
        <label for="update_product_varian">Varian :</label>
        <input id="update_product_varian" value="<?=$product['product_varian']?>" name="updateProduct[product_varian]" type="text">
    </div>
    <div class="form-input">
        <label for="update_product_price">Harga :</label>
        <input id="update_product_price" value="<?=$product['product_price']?>" name="updateProduct[product_price]" type="number" min="100">
    </div>
    <div class="form-input">
        <label for="update_product_stock">Stock :</label>
        <input id="update_product_stock" value="<?=$product['product_stock']?>" name="updateProduct[product_stock]" type="number">
    </div>
    <div class="form-input">
        <label for="update_product_description">Description :</label>
        <textarea id="update_product_description" name="updateProduct[product_description]" cols="30" rows="10"><?=$product['product_description']?></textarea>
    </div>
    <div class="form-input">
        <label for="update_product_category">Kategori :</label>
        <select name="updateProduct[product_category]" id="update_product_category">
            <option value="<?=$product['product_category']?>"><?=$product['product_category']?></option>
            <option value="Account">Account</option>
            <option value="Item Aplikasi">Item Aplikasi</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>
    <div class="form-input">
        <label for="updateProductimg">Gambar Product </label>
        <img src="<?=base_url('public/assets/product-img/'.$product['product_image'])?>" alt="" width="100px" height="100px">
        <input style="visibility: hidden;" name="upimg" value='true'>
        <input type="file" value="<?=$product['product_image']?>" name="updateProductimg" id="updateProductimg">
    </div>
    <button type="submit">Tambahkan</button>
    <?= form_close(); ?>
    <button onclick="hideModal();" type="close">Tutup</button>
    </div>
</div>
<!-- End Modal updateProduct -->
<?php endforeach; ?>

<!-- Modal AddHero -->
<div class="modal addHero">
    <div class="modal-content">
    <div class="modal-title">Add Product</div>
    <?= form_open_multipart(base_url('Home/admin'));?>
    <input style="visibility: hidden;" name="opt" value='hero'>
    <div class="form-input">
        <label for="add_hero_title">Title :</label>
        <input id="add_hero_title" name="addHero[hero_title]" type="text">
    </div>
    <div class="form-input">
        <label for="addHeroimg">Gambar Product </label>
        <input type="file" name="addHeroimg" id="addHeroimg">
    </div>
    <button type="submit">Tambahkan</button>
    <?= form_close(); ?>
    <button onclick="hideModal();" type="close">Tutup</button>
    </div>
</div>
<!-- End Modal AddHero -->

<!-- head-content -->
<div id="head">
    
    <!-- navbar -->
<nav>
    <div id="logo">
        <div id="text-logo">CompastianShop</div>
    </div>
    <div id="profile">
        <img src="" alt="" id="avatar">
        <?php if ($this->session->login == null){?>
            <a href="<?=base_url('Auth')?>" class="name">Login</a>
            <?php }else{?>
            <a href="<?=base_url('Home/'.$this->session->login['user_role'].'/'.$opt.'?logout=true')?>" class="name">Logout</a>
        <?php }?>


    </div>
</nav>
<!-- end navbar -->

<!-- Menu -->
<div id="menu">
    <div id="select-menu">
        <?php if ($opt == 'hero'){?>
            <form action="<?=base_url('Home/admin/')?>" method="post">
            <label for="option">Pilih Menu:</label>
            <select name='opt' id="option" onchange="this.form.submit()">
                <option value="hero">Hero</option>
            <option value="product">Product</option>
        </select>
    </form>
    <?php  }else{?>
        <form action="<?=base_url('Home/admin/')?>" method="post">
        <label for="option">Pilih Menu:</label>
        <select name='opt' id="option" onchange="this.form.submit()">
            <option value="product">Product</option>
            <option value="hero">Hero</option>
        </select>
    </form>
    <?php } ?>
    </div>
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
    <?php if ($opt == 'hero'){?>
        <div id="hero-content">
        <p class="title">Hero</p>
        <button onclick="showModal('addHero')" id="addHero">AddHero</button>
        <div id="list-hero">
            <?php foreach ($all_hero as $hero):?>
                <div class="card">
                    <img src="<?=base_url('public/assets/hero-img/'.$hero['hero_image'])?>" alt="">
                    <div class="hero-title"><?=$hero['hero_title']?></div>
                    <div class="hero-status"><?=$hero['hero_status']?></div>
                    <form action="<?=base_url('Home/admin')?>" method="post">
                    <input style="visibility: hidden;" name="opt" value='hero'>
                        <button name="deleteHero" value="<?=$hero['hero_id']?>">Delete</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
        
    <?php }else{?>
        <div id="Product-content">
    <p class="title">Product</p>
    <button id="addProduct" onclick="showModal('addProduct');">Add Product</button>
    <div id="list-product">
        <?php foreach ($all_product as $product):?>
                <div class="card">
                    <img src="<?=base_url('public/assets/product-img/'.$product['product_image'])?>" alt="">
                    <div class="detail">
                        <div class="product-name">Name : <br><?=$product['product_name']?></div>
                        <div class="product-varian">Varian : <br><?=$product['product_varian']?></div>
                        <div class="product-price">Price : <br>Rp.<?=$product['product_price']?></div>
                        <div class="product-stock">Stock : <br><?=$product['product_stock']?></div>
                        <div class="product-category">Category : <br><?=$product['product_category']?></div>
                        <div class="product-description">Description : <br><?=$product['product_description']?></div>
                    </div>
                    <div class="action">
                        <form action="<?=base_url('Home/admin')?>" method="post">
                            <button name="deleteProduct" value="<?=$product['product_id']?>">Delete</button>
                        </form>
                            <button onclick="showModal('updateProduct<?=$product['product_id']?>')">update</button>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
    </div> 
    <?php }?>
    </div> 
</div>
<!-- end Main content -->