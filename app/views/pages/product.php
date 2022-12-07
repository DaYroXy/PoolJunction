<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="mt-10">
    <div class="container d-flex">
        <div class="content-wrapper d-flex flex justify-center gap-5">
            <div class="image-preview d-flex justify-center w-50 h-fit">
            <img class="brtr-3 brbr-3 brbl-3 brtl-3" style=" object-fit: cover; width:100%; height:100%; min-height:356px;" src="<?php echo URLROOT ?>/content/products/88f910dcbc69f2c1269b4d864b272b7e.jpg" alt="">

            </div>
            <div class="product-details w-50">
                <h1 class="text-dark fs-12 pos-relative far-underline w-fit"><?php echo $data['product']->name ?></h1>
                <div class="prices mt-5">
                    <div class="old d-flex gap-1 mb-1">
                        <p class="fs-4 fw-7 text-dark">Old Price:</p>
                        <p class="fs-4 fw-5 text-danger pos-relative text-scratch">₪2,399.99</p>
                    </div>
                    <div class="old d-flex gap-1">
                        <p class="fs-5 fw-7 text-dark">New Price:</p>
                        <p class="fs-5 fw-5 text-info ">₪<?php echo $data['product']->price ?> <small class="text-info">(7%)</small></p>
                    </div>
                </div>
                <h2 class="text-dark mt-5 fw-4 mb-1">About this item:</h2>
                <p class="text-muted mb-5 "><?php echo $data['product']->description ?></p>
                <div class="purchase d-flex gap-5">
                    <button style="padding: .7rem 2rem;" class="btn btn-primary border-box">ADD TO CART</button>
                    <button style="padding: .7rem 2rem; border: 2px solid var(--color-dark); color:#000;" class="btn fw-5 border-box bg-none border">BUY IT NOW</button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
