<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="vh-100 w-100" style="background: linear-gradient(rgba(0, 0, 0, 0.575), rgba(0,0,0,0.3)), url(<?php echo URLROOT ?>/imgs/bg.jpg); background-repeat: no-repeat; background-size: cover;">
    <div class="container d-flex align-center h-100" >
        <div class="introduction d-flex flex-column gap-2">
            <h1 class="fs-13">Exclusive Deals Of</h1>
            <h4 class="fs-13 text-primary">Pools</h4>
            <p class="fs-5 text-light">Explore Different Categories. Find the best deals.</p>
            <div class="mt-5">
                <button style="padding: 1rem 2rem;" class="btn btn-primary">Shop Now</button>
            </div>
        </div>
    </div>
</main>

<!--######################### CATEGORIES #########################-->

<section>
    <div class="container mb-5">
        <h1 class="text-primary-low fs-10 text-center">Explore By Category</h1>
    </div>

    <div class="container d-flex gap-5 mt-10">
        <div class="w-25 h-100 p-2">
            <div class="search">
                <h5 class="fs-5 fw-3 mb-2 text-muted">Search</h5>
                <form action="" class="d-flex align-center gap-2">
                    <input style="height: 100%;" type="text" class="form-control bg-gray" placeholder="I'm looking for...">
                    <button style="height: 100%;" class="btn btn-primary mt-1">Search</button>
                </form>

                <div class="categories mt-5">
                    <ul style="height: 350px;" class="d-flex flex-column gap-5 ofy-scroll">
                        <li><a href="#" class="text-dark ">Category 1</a></li>
                        <li><a href="#" class="text-dark">Category 2</a></li>
                        <li><a href="#" class="text-dark">Category 3</a></li>
                        <li><a href="#" class="text-dark">Category 4</a></li>
                        <li><a href="#" class="text-dark">Category 5</a></li>
                        <li><a href="#" class="text-dark">Category 6</a></li>
                        <li><a href="#" class="text-dark">Category 7</a></li>
                        <li><a href="#" class="text-dark">Category 7</a></li>
                        <li><a href="#" class="text-dark">Category 7</a></li>
                        <li><a href="#" class="text-dark">Category 7</a></li>
                    </ul>

                    <div class="d-flex flex-column mt-5">
                        <button style="padding: .7rem 1rem" class="btn btn-primary w-100">All Categories</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-75 h-100 p-2">
            <ul class="d-flex flex-wrap justify-center align-center gap-5">
                <li class="bg-success d-flex align-center justify-center br-3" style="width:450px; height:345px; background: linear-gradient(rgba(0, 0, 0, 0.575), rgba(0,0,0,0.3)), url(<?php echo URLROOT ?>/imgs/bg.jpg); background-repeat: no-repeat; background-size: cover;">
                    <div class="category-info text-center">
                        <h1 class="fs-10 fw-5 mb-2 text-light">Category 1</h1>
                        <button style="padding: .4rem 1.5rem ;" class="btn btn-light mt-3">EXPLORE</button>
                    </div>
                </li>
                <li class="bg-success d-flex align-center justify-center br-3" style="width:450px; height:345px; background: linear-gradient(rgba(0, 0, 0, 0.575), rgba(0,0,0,0.3)), url(<?php echo URLROOT ?>/imgs/bg.jpg); background-repeat: no-repeat; background-size: cover;">
                    <div class="category-info text-center">
                        <h1 class="fs-10 fw-5 mb-2 text-light">Category 1</h1>
                        <button style="padding: .4rem 1.5rem ;" class="btn btn-light mt-3">EXPLORE</button>
                    </div>
                </li>
                <li class="bg-success d-flex align-center justify-center br-3" style="width:450px; height:345px; background: linear-gradient(rgba(0, 0, 0, 0.575), rgba(0,0,0,0.3)), url(<?php echo URLROOT ?>/imgs/bg.jpg); background-repeat: no-repeat; background-size: cover;">
                    <div class="category-info text-center">
                        <h1 class="fs-10 fw-5 mb-2 text-light">Category 1</h1>
                        <button style="padding: .4rem 1.5rem ;" class="btn btn-light mt-3">EXPLORE</button>
                    </div>
                </li>
                <li class="bg-success d-flex align-center justify-center br-3" style="width:450px; height:345px; background: linear-gradient(rgba(0, 0, 0, 0.575), rgba(0,0,0,0.3)), url(<?php echo URLROOT ?>/imgs/bg.jpg); background-repeat: no-repeat; background-size: cover;">
                    <div class="category-info text-center">
                        <h1 class="fs-10 fw-5 mb-2 text-light">Category 1</h1>
                        <button style="padding: .4rem 1.5rem ;" class="btn btn-light mt-3">EXPLORE</button>
                    </div>
                </li>
                <li class="bg-success d-flex align-center justify-center br-3" style="width:450px;height:345px; background: linear-gradient(rgba(0, 0, 0, 0.575), rgba(0,0,0,0.3)), url(<?php echo URLROOT ?>/imgs/bg.jpg); background-repeat: no-repeat; background-size: cover;">
                    <div class="category-info text-center">
                        <h1 class="fs-10 fw-5 mb-2 text-light">Category 1</h1>
                        <button style="padding: .4rem 1.5rem ;" class="btn btn-light mt-3">EXPLORE</button>
                    </div>
                </li>
                <li class="bg-success d-flex align-center justify-center br-3" style="width:450px; height:345px; background: linear-gradient(rgba(0, 0, 0, 0.575), rgba(0,0,0,0.3)), url(<?php echo URLROOT ?>/imgs/bg.jpg); background-repeat: no-repeat; background-size: cover;">
                    <div class="category-info text-center">
                        <h1 class="fs-10 fw-5 mb-2 text-light">Category 1</h1>
                        <button style="padding: .4rem 1.5rem ;" class="btn btn-light mt-3">EXPLORE</button>
                    </div>
                </li>
            </ul>
        </div>

    </div>
</section>

<!--######################### POPULAR PRODUCTS #########################-->

<section>
    <div class="container">
        <h1 class="text-primary-low fs-10 text-center">Popular Products</h1>
        <div class="popular-products mt-10 ofx-scroll">
            <ul style="width:fit-content;" class="d-flex gap-5 p-1 pb-5">
                <?php for($i = 0; $i < 20; $i++) : ?>
                    <li style="width: 250px; min-height:400px;" class="card">
                        <img class="w-100" style=" height:250px; object-fit: scale-down;" src="<?php echo URLROOT ?>/imgs/product.png" alt="">
                        <div class="card-text mt-4">
                            <p class="text-dark fs-5 mb-1">Water Pipe</p>
                            <small class="text-muted fs-4">Holds the pressure</small>
                            <div class="price-buy mt-3 d-flex align-center justify-between">
                                <p class="text-dark fs-5">₪144.99</p>
                                <button class="btn btn-primary w-50">Buy</button>
                            </div>
                        </div>
                    </li>
                <?php endfor ?>
            </ul>
        </div>
        <div class="explore-more mt-10 text-center">
            <button class="btn btn-primary fs-5" style="padding: .6rem 1.2rem">Explore More <svg class="ml-2" width="21" height="13" viewBox="0 0 21 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5553 12.7274C13.4689 12.6411 13.4003 12.5387 13.3535 12.4259C13.3067 12.3131 13.2826 12.1922 13.2826 12.0701C13.2826 11.948 13.3067 11.8271 13.3535 11.7143C13.4003 11.6015 13.4689 11.499 13.5553 11.4128L18.4701 6.49988L13.5553 1.58695C13.381 1.41263 13.2831 1.17619 13.2831 0.929664C13.2831 0.683134 13.381 0.446701 13.5553 0.272378C13.7297 0.0980549 13.9661 0.00012204 14.2126 0.00012203C14.4592 0.000122019 14.6956 0.0980548 14.8699 0.272378L20.4401 5.84259C20.5266 5.92883 20.5952 6.03128 20.642 6.14407C20.6888 6.25685 20.7129 6.37777 20.7129 6.49988C20.7129 6.62199 20.6888 6.7429 20.642 6.85569C20.5952 6.96848 20.5266 7.07093 20.4401 7.15716L14.8699 12.7274C14.7837 12.8138 14.6812 12.8824 14.5684 12.9292C14.4556 12.976 14.3347 13.0001 14.2126 13.0001C14.0905 13.0001 13.9696 12.976 13.8568 12.9292C13.744 12.8824 13.6416 12.8138 13.5553 12.7274Z" fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.287109 6.49998C0.287109 6.25376 0.38492 6.01762 0.559023 5.84352C0.733126 5.66942 0.96926 5.57161 1.21548 5.57161L17.9261 5.57161C18.1723 5.57161 18.4085 5.66941 18.5826 5.84352C18.7567 6.01762 18.8545 6.25376 18.8545 6.49997C18.8545 6.74619 18.7567 6.98233 18.5826 7.15643C18.4085 7.33053 18.1723 7.42834 17.9261 7.42834L1.21548 7.42834C0.96926 7.42834 0.733126 7.33053 0.559023 7.15643C0.38492 6.98233 0.287109 6.74619 0.287109 6.49998Z" fill="white"/>
                </svg>
            </button>
        </div>
    </div>
</section>

<!--######################### Our Creation #########################-->

<section>
    <div class="our-creation bg-primary brbr-3 brtr-3 d-flex flex-column align-center justify-center" style="height: 503px; width:45%;">
        <div class="text-area">
            <div class="title">
                <h1 class="fw-5 fs-15">Our</h1>
                <h1 class="fw-5 fs-15">Own Creation</h1>
                <p class="mt-4 fs-5">Designed in our studio</p>
            </div>

            <div class="controls mt-4 d-flex align-center">
                <p class="fs-5">More</p>
                <div class="buttons ml-5 d-flex align-center gap-3">
                    <button class="btn btn-light border-rounded pos-relative" style="width: 40px; height:40px;">
                        <svg style="top: 50%; left:50%; transform: translate(-50%,-50%); position:absolute;" width="15" height="13" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.979126 4.0001C0.979126 3.8816 1.0262 3.76795 1.10999 3.68416C1.19379 3.60037 1.30743 3.55329 1.42594 3.55329L9.46853 3.55329C9.58703 3.55329 9.70068 3.60037 9.78447 3.68416C9.86826 3.76795 9.91534 3.8816 9.91534 4.0001C9.91534 4.1186 9.86826 4.23225 9.78447 4.31604C9.70068 4.39984 9.58703 4.44691 9.46853 4.44691L1.42594 4.44691C1.30743 4.44691 1.19379 4.39984 1.10999 4.31605C1.0262 4.23225 0.979126 4.11861 0.979126 4.0001V4.0001Z" fill="#07484A"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.215984 4.31634C0.174374 4.27483 0.141361 4.22553 0.118836 4.17124C0.0963107 4.11696 0.0847161 4.05877 0.0847161 4C0.0847161 3.94123 0.0963107 3.88303 0.118836 3.82875C0.141361 3.77447 0.174374 3.72516 0.215983 3.68365L2.89685 1.00279C2.98075 0.918892 3.09454 0.871758 3.21319 0.871758C3.33184 0.871758 3.44563 0.918892 3.52953 1.00279C3.61343 1.08669 3.66056 1.20048 3.66056 1.31913C3.66056 1.43778 3.61343 1.55158 3.52953 1.63547L1.16412 4L3.52953 6.36452C3.61343 6.44842 3.66056 6.56221 3.66056 6.68086C3.66056 6.79951 3.61343 6.9133 3.52953 6.9972C3.44563 7.0811 3.33184 7.12823 3.21319 7.12823C3.09454 7.12823 2.98075 7.0811 2.89685 6.9972L0.215984 4.31634Z" fill="#07484A"/>
                        </svg>
                    </button>
                    <button class="btn btn-light border-rounded pos-relative" style="width: 40px; height:40px;">
                        <svg style="top: 50%; left:50%; transform: translate(-50%,-50%); position:absolute;" width="15" height="13" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.02087 3.9999C9.02087 4.1184 8.9738 4.23205 8.89001 4.31584C8.80621 4.39963 8.69257 4.44671 8.57406 4.44671L0.531474 4.44671C0.412973 4.44671 0.299324 4.39963 0.21553 4.31584C0.131738 4.23205 0.0846635 4.1184 0.0846634 3.9999C0.0846634 3.8814 0.131738 3.76775 0.21553 3.68395C0.299324 3.60016 0.412972 3.55309 0.531474 3.55309L8.57406 3.55309C8.69256 3.55309 8.80621 3.60016 8.89001 3.68395C8.9738 3.76775 9.02087 3.88139 9.02087 3.9999Z" fill="#07484A"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.78402 3.68366C9.82563 3.72517 9.85864 3.77447 9.88116 3.82876C9.90369 3.88304 9.91528 3.94123 9.91528 4C9.91528 4.05877 9.90369 4.11697 9.88116 4.17125C9.85864 4.22553 9.82563 4.27484 9.78402 4.31635L7.10315 6.99721C7.01925 7.08111 6.90546 7.12824 6.78681 7.12824C6.66816 7.12824 6.55437 7.08111 6.47047 6.99721C6.38657 6.91331 6.33944 6.79952 6.33944 6.68087C6.33944 6.56222 6.38657 6.44842 6.47047 6.36452L8.83588 4L6.47047 1.63548C6.38657 1.55158 6.33944 1.43779 6.33944 1.31914C6.33944 1.20049 6.38657 1.0867 6.47047 1.0028C6.55437 0.9189 6.66816 0.871766 6.78681 0.871766C6.90546 0.871766 7.01925 0.9189 7.10315 1.0028L9.78402 3.68366Z" fill="#07484A"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>


    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php'; ?>
