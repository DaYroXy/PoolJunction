<?php require APPROOT . '/views/inc/header.php'; ?>

<section>
    <div class="container mt-10">
        <div class="search-content d-flex align-center justify-center">
            <form class="search-seciton w-fit d-flex flex-wrap p-4 gap-4" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; ">
                <div class="input-field">
                    <label class="text-dark fw-5" for="category">Category</label>
                    <select class="input mt-1"  name="category" id="category" style="height: 38px; width:220px;">
                        <?php 
                            echo $data['category'] ? '<option  value="'.$data['category'].'">'.$data['category'].'</option>' : '';
                        ?>
                        <option  value="">All</option>
                        <?php foreach($data['products_category'] as $category_select) : if($data['category'] === $category_select->name) continue; ?>
                            
                            <option  value="<?php echo $category_select->name; ?>"><?php echo $category_select->name; ?></option>    
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="input-field">
                    <label class="text-dark fw-5" for="min-price">Price</label>
                    <div class="fields d-flex mt-1">
                        <input type="text" name="min" id="min-price" value="<?php echo $data['min'] ?>" placeholder="Min" style="width: 85px;">
                        <input type="text" name="max" id="max-price" value="<?php echo $data['max'] ?>" placeholder="Max" style="width: 85px;">
                    </div>
                </div>
                <div class="input-field">
                    <label class="text-dark fw-5" for="search">Search</label>
                    <input class="mt-1" type="text" name="name" value="<?php echo $data['name'] ?>" id="search" placeholder="Search" style="height: 38px; width:220px;">
                </div>
                <div class="__STORE__SEARCH__BUTTON input-field d-flex align-end">
                    <input type="submit" class="btn btn-primary" value="Search" style="height: 38px; padding:0rem 2.5rem; ">
                </div>
            </form>        
        </div>
    </div>
    <!-- CONTENT RESULTS -->
    <div class="items-list d-flex justify-center" style="width: 85%; margin:auto;">
        <ul class="d-flex justify-center flex-wrap gap-5 mt-5">
            <?php if(count($data['products']) === 0) {
                    echo '<h1 class="text-primary-low mt-5 text-center">No products found</h1>';
                }

                foreach($data['products'] as $product) : ?>
                <li style="width: 250px; min-height:400px;" class="card">
                    <a href="<?php echo URLROOT ?>/products/show/<?php echo $product->productId ?>"><img class="w-100" style=" height:250px; object-fit: scale-down;" src="<?php echo URLROOT ?>/content/products/<?php echo $product->img ?>" alt=""></a>
                    <div class="card-text h-100 mt-4 d-flex flex-column">
                        <a class="mb-1" href="<?php echo URLROOT ?>/products/show/<?php echo $product->productId ?>"><p class="text-dark fs-5"><?php echo $product->productName ?></p></a>
                        <a class="mb-3" href="<?php echo URLROOT ?>/products/show/<?php echo $product->productId ?>"><small class="text-muted fs-4"><?php echo $product->productDescription ?></small></a>
                        <form action="<?php echo URLROOT ?>/cart/add/<?php echo $product->productId ?>" method="POST" style="margin-top: auto;" class="price-buy d-flex align-center justify-between">
                            <p class="text-dark fs-5"><?php echo convertCurrency($product->price) ?></p>
                            <button type="submit" class="btn btn-primary w-50">Buy</button>
                        </form>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </div>

</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
