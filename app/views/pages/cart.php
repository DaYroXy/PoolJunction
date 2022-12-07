<?php require APPROOT . '/views/inc/header.php'; ?>

<section>
    <div  class="__CART__MAIN container mt-10 d-flex justify-between gap-5">
        <div style="max-height: 76vh;" class="scroll-bar h-100 pr-5  pb-1 pl-1 <?php echo (count($data['cart']) === 0) ? '' : 'ofy-scroll'  ?> cart-items w-100">
            <ul>
                <?php if(count($data['cart']) === 0) {
                    echo '<h1 class="text-center text-dark">Your cart is empty</h1>';
                } ?>
                <?php foreach($data['cart'] as $product) : ?>
                <li style="min-height:230px;" class="__CART__PRODUCT mb-not-last card-simple align-center d-flex bg-dark">
                    <img style="height:200px; width:200px; object-fit: scale-down;" src="<?php echo URLROOT ?>/content/products/<?php echo $product->img ?>" alt="">
                    <div class="product-info h-100 ml-5 pt-5" style="max-width:350px;">
                        <h1 class="text-dark mb-2"><?php echo $product->name ?></h1>
                        <p class="text-muted"><?php echo $product->description ?></p>
                    </div>
                    <form action="<?php echo URLROOT ?>/cart/update/<?php echo $product->id ?>" method="POST" class="__CART__UPDATE d-flex pr-5 gap-5 justify-around" style="flex:1;">
                        <div class="d-flex flex-column align-center">
                            <div class="d-flex align-center ml-5 gap-1">
                                <input type="submit" name="method" value="-" class="btn btn-primary btn-sm">
                                <input style="width: 70px;" class=" text-center" name="set_amount" type="text" value="<?php echo $product->quantity ?>" disabled>
                                <input type="submit" name="method" value="+" class="btn btn-primary btn-sm">
                            </div>
                        </div>
                    </form>
                    <form action="<?php echo URLROOT ?>/cart/delete/<?php echo $product->id ?>" method="POST" class="__CART__DELETE d-flex pr-5 gap-5 justify-around" style="flex:1;">
                        <input  name="delete"  type="submit" value="Delete" class="__CART__DETELE__BUTTON btn btn-danger btn-sm">
                    </form>
                </li>
                <?php endforeach ?>
            </ul>
        </div>



        <div class="total-proceed">
            <div class="card-simple __CART__PAYMENT__DETAILS">
                    <?php echo flash('cart_message') ?>
                <h3 class="text-primary-low p-2 text-center">Payment Details</h3>
                
                <ul class="d-flex flex-column gap-2 p-3">
                    <li class="d-flex justify-between">
                        <p class="text-muted">Items: </p>
                        <p class="text-muted">₪4,695.99</p>
                    </li>
                    <li class="d-flex justify-between">
                        <p class="text-muted">Shipping: </p>
                        <p class="text-muted">₪149.99</p>
                    </li>
                    <li class="d-flex justify-between">
                        <p class="text-muted">Total: </p>
                        <p class="text-muted">₪4,845.99</p>
                    </li>
                    <div class="purchase">
                        <button style="height: 41px" class="btn btn-success-light br-4 w-100 mt-3">PROCEED CHECKOUT</button>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
