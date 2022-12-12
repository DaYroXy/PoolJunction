<?php require APPROOT . '/views/admin/inc/admin-header.php'; ?>

<div class="ofy-scroll p-5" style="flex: 1;">
    <h1 class="text-primary">Dashboard</h1>
    <div class="content mt-5 d-flex justify-around">

        <div class="card d-flex align-center justify-center w-100 h-100" style="padding: 2rem 2rem; max-width:250px; max-height:160px" >
            <i class="text-dark fs-8 fa-solid fa-user mb-2"></i>
            <h1 class="text-dark"><?php echo $data['usersCount']; ?></h1>    
            <p class="text-muted text-center">Total Users</p>
        </div>
        <div class="card d-flex align-center justify-center w-100 h-100" style="padding: 2rem 2rem; max-width:250px; max-height:160px" >
            <i class="text-dark fs-8 fa-solid fa-cart-shopping mb-2"></i>
            <h1 class="text-dark">24</h1>    
            <p class="text-muted text-center">Total Orders</p>
        </div>
        <div class="card d-flex align-center justify-center w-100 h-100" style="padding: 2rem 2rem; max-width:250px; max-height:160px" >
            <i class="text-dark fs-8 fa-solid fa-boxes-packing mb-2"></i>
            <h1 class="text-dark">24</h1>    
            <p class="text-muted text-center">Total Sold</p>
        </div>
        <div class="card d-flex align-center justify-center w-100 h-100" style="padding: 2rem 2rem; max-width:250px; max-height:160px" >
            <i class="text-dark fs-8 fa-solid fa-message mb-2"></i>
            <h1 class="text-dark"><?php echo $data['contactCount']; ?></h1>    
            <p class="text-muted text-center">Total Contact</p>
        </div>
        

    </div>
</div>

<?php require APPROOT . '/views/admin/inc/admin-footer.php'; ?>