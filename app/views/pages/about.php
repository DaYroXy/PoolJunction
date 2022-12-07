<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="w-100 d-flex justify-center" style="background: linear-gradient(rgba(0, 0, 0, 0.575), rgba(0,0,0,0.3)), url(<?php echo URLROOT ?>/imgs/about.jpg); background-repeat: no-repeat; background-size: cover; min-height: 35vh;">
    <div class="container text-center d-flex align-center justify-center">
        <div class="__ABOUT__TITLE titles pt-5">
            <h1 class="serif fs-13 mb-3">About Us</h1>
            <p class="fs-4">Telling our inspiring story from the very beginning to our days</p>
        </div>
    </div>
</main>

<section>
    <div class="container">
        <div class="__ABOUT__INFO content d-flex justify-around align-center">
            <div class="text-area w-100" style="max-width: 550px;">
                <h1 class="serif text-primary fw-7 fs-12 mb-4 pos-relative far-underline-primary">About Pool Junction</h1>
                <p class="fs-5 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem eligendi neque dolor eveniet quam alias recusandae distinctio in enim voluptatem harum nisi tempora nulla, illo rerum obcaecati repudiandae nostrum beatae?</p>
            </div>
            
            <div class="text-area w-100" style="max-width: 550px;">
                <div class="ceo d-flex flex-column align-center">
                    <h1 class="text-primary-low mb-2">Anas Abu Shanab</h1>
                    <p class="text-primary text-center fw-5 fs-4 mb-5">CEO & Founder</p>
                    <div class="avatar border-rounded of-hidden" style="min-width:250px; min-height:250px; max-width: 250px; max-height:250px;">
                        <img class="w-100 h-100" style="" src="<?php echo URLROOT ?>/imgs/ceo.jpg" alt="CEO">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>