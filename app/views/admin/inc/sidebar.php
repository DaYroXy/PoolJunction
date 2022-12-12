<nav class="bg-dark h-100 vw-15 d-flex flex-column align-center ofy-scroll hidden-scrollbar" style="min-width: 310px;">

    <div class="logo">
        <a href="<?php echo URLROOT .'/dashboard'; ?>">
            <img style="width: 125px;" src="<?php echo URLROOT ?>/imgs/Logo.png" alt="Logo">
        </a>
    </div>

    <ul class="w-100 mt-5 ">
        <a href="<?php echo URLROOT ?>/dashboard" class="d-flex align-center p-5 list-hover gap-4 <?php echo $data['page'] === 'Dashboard' ? "active" : '' ?> ">
            <i class="fa-solid fa-house"></i>
            <h4 class="w-100 fw-4">Dashboard</h4>
        </a>
        
        <a href="<?php echo URLROOT ?>/dashboard" class="d-flex align-center p-5 list-hover gap-4 <?php echo $data['page'] === 'Category' ? "active" : '' ?> ">
        <i class="fa-solid fa-layer-group"></i>
            <h4 class="w-100 fw-4">Category</h4>
        </a>
        
        <a href="<?php echo URLROOT ?>/items" class="d-flex align-center p-5 list-hover gap-4 <?php echo $data['page'] === 'Products' ? "active" : '' ?> ">
            <i class="fa-solid fa-cubes"></i>
            <h4 class="w-100 fw-4">Products</h4>
        </a>
        
        <a href="<?php echo URLROOT ?>/dashboard" class="d-flex align-center p-5 list-hover gap-4 <?php echo $data['page'] === 'Orders' ? "active" : '' ?> ">
            <i class="fa-solid fa-cart-shopping"></i>
            <h4 class="w-100 fw-4">Orders</h4>
        </a>
        
        <a href="<?php echo URLROOT ?>/dashboard" class="d-flex align-center p-5 list-hover gap-4 <?php echo $data['page'] === 'Customers' ? "active" : '' ?> ">
            <i class="fa-solid fa-users"></i>
            <h4 class="w-100 fw-4">Customers</h4>
        </a>
        
        <a href="<?php echo URLROOT ?>/photos" class="d-flex align-center p-5 list-hover gap-4 <?php echo $data['page'] === 'Photos' ? "active" : '' ?> ">
            <i class="fa-solid fa-images"></i>
            <h4 class="w-100 fw-4">Gallery</h4>
        </a>
        <a href="<?php echo URLROOT ?>/photos" class="d-flex align-center p-5 list-hover gap-4 <?php echo $data['page'] === 'Contact' ? "active" : '' ?> ">
            <i class="fa-solid fa-message"></i>
            <h4 class="w-100 fw-4">Contact</h4>
        </a>
    </ul>

    <a href="<?php echo URLROOT ?>/dashboard" style="margin-top: auto;" class="d-flex justify-center align-center w-100 p-3 list-hover gap-4 mb-5">
        <h4 class="fw-5 fs-5 text-danger">Logout</h4>
        <i class="fa-solid fs-5 fa-right-from-bracket text-danger"></i>
    </a>
</nav>