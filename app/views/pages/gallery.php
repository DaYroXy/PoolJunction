<?php require APPROOT . '/views/inc/header.php'; ?>

<section>
    <div class="container">
        <h1 class="mt-5 mb-5 text-center text-dark fw-8 serif fs-15">Gallery</h1>
        <ul class="d-flex gap-5 flex-wrap justify-center">
            <?php foreach($data['images'] as $img) : ?>
            <li style="max-width: 350px; max-height:350px" class="pos-relative of-hidden br-5">
                <img style="object-fit: cover; width:100%; height:100%;" src="<?php echo URLROOT ?>/content/gallery/<?php echo $img->img ?>" alt="">
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
