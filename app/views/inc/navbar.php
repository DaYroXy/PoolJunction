<nav class="__NAV__  align-center pos-fixed vw-100 bg-secondary-blur nav-bar <?php echo $data['scroll-color'] ? 'nav-bar-scroll-change' : '' ?> <?php echo strtolower($data['theme']) === 'white' ? 'bg-dark' : '' ?>" style=" z-index:999999;">
  <div class="__NAV__CONTAINER container d-flex align-center justify-between">
    <div class="___NAV__LOGO__SECTION logo" >
      <a href="<?php echo URLROOT ?>/"><img width=100px" src="<?php echo URLROOT ?>/imgs/Logo.png" alt=""></a>
      <div class="__HAMBURGER__ hidden">
        <i class="fa-solid fa-bars fa-xl pointer"></i>
      </div>
    </div>


    <!-- Pages -->
    <ul class="__NAV__ITEMS d-flex align-center gap-5">
      <li class="p-1 fw-3 ls-1 uselected-primary pos-relative <?php echo strtolower($data['title']) === 'home' ? 'uselected fw-6' : '' ?> "><a class="<?php echo strtolower($data['title']) !== 'home' ? ' fw-4' : '' ?>" href="<?php echo URLROOT ?>/">Home</a></li>
      <li class="p-1 fw-3 ls-1 uselected-primary pos-relative <?php echo strtolower($data['title']) === 'shop' ? 'uselected fw-6' : '' ?>"><a class="<?php echo strtolower($data['title']) !== 'shop' ? ' fw-4' : '' ?>" href="<?php echo URLROOT ?>/shop">Shop</a></li>
      <li class="p-1 fw-3 ls-1 uselected-primary pos-relative <?php echo strtolower($data['title']) === 'about' ? 'uselected fw-6' : '' ?>"><a class="<?php echo strtolower($data['title']) !== 'about' ? ' fw-4' : '' ?>" href="<?php echo URLROOT ?>/about">About</a></li>
      <li class="p-1 fw-3 ls-1 uselected-primary pos-relative <?php echo strtolower($data['title']) === 'gallery' ? 'uselected fw-6' : '' ?>"><a class="<?php echo strtolower($data['title']) !== 'gallery' ? ' fw-4' : '' ?>" href="<?php echo URLROOT ?>/gallery">Gallery</a></li>
      <li class="p-1 fw-3 ls-1 uselected-primary pos-relative <?php echo strtolower($data['title']) === 'contact' ? 'uselected fw-6' : '' ?>"><a class="<?php echo strtolower($data['title']) !== 'contact' ? ' fw-4' : '' ?>" href="<?php echo URLROOT ?>/contact">Contact</a></li>
    </ul>

    

    <!-- User -->
    
    <ul class="__NAV__ICONS d-flex align-center gap-5">
      <li class="p-1 mr-2"><a href="<?php echo URLROOT ?>/#search"><i class="__NAV__MAGNIFYING fa-solid fa-magnifying-glass fa-lg text-white"></i></a></li>
      <li class="p-1"><a href="<?php echo URLROOT ?>/login"><i class="fa-solid fa-user fa-lg text-white"></i></a></li>
      <div class="cart d-flex pos-relative">
        <li class="p-1 mr-2"><a href="<?php echo URLROOT ?>/cart"><i class="fa-solid fa-cart-shopping fa-lg text-white"></i></a></li>
        <span class="ml-5 br-1 pl-1 pr-1 h-fit pos-absolute" style="background:Tomato"><?php echo isLoggedIn() ? $_SESSION['cart'] : 0 ?></span>
      </div>
      <?php if(isLoggedIn()) {
        echo '<li class="p-1"><a href="'.URLROOT.'/logout"><i class="fa-solid fa-right-from-bracket fa-lg text-white"></i></a></li>';
      } ?>
    </ul>
    
  </div>
</nav>
