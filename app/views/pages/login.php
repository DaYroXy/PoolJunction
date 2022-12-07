<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="__LOGIN_MAIN vh-100 w-100" style="background: linear-gradient(rgba(0, 0, 0, 0.575), rgba(0,0,0,0.3)), url(<?php echo URLROOT ?>/imgs/bg.jpg); background-repeat: no-repeat; background-size: cover;">
    <div class="container  d-flex align-center justify-center h-100" >
        <div class="w-100 __LOGIN__FORM" style="max-width:538px;">
            <?php flash('logout_success'); ?>
            <?php flash('register_success'); ?>
            <form method="POST" class="w-100 login-container bg-white br-3 p-5">
                <h1 class="text-primary fs-9 fw-5 text-center mb-5">Login</h1>
                <div class="input-fields d-flex flex-column gap-3 mt-8">
                    <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                        <?php echo $data['login_data']['email_err'] ? '<p class="text-danger">'.$data['login_data']['email_err'].'</p>' : '' ?>
                        <div class="email-field d-flex align-center">
                            <i style="color: #495057;" class="fa-solid fa-user fa-lg ml-3"></i>
                            <input class="input border-none" type="email" style="padding: 1rem 1rem;" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                        <?php echo $data['login_data']['password_err'] ? '<p class="text-danger mt-2">'.$data['login_data']['password_err'].'</p>' : '' ?>
                        <div class="pwd-field d-flex align-center">
                            <i style="color: #495057;" class="fa-solid fa-lock fa-lg ml-3"></i>
                            <input class="input border-none" type="password" style="padding: 1rem 1rem;" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="forgt-pwd text-center mb-5 mt-2">
                        <a class="text-muted" href="#">Forgot your password?</a>
                    </div>
                    <div class="text-center mb-5 d-flex flex-column align-center">

                        <input style="width: 240px; padding:.5rem 1.5rem;" class="btn btn-primary fs-5 br-5 mb-3" type="submit" value="Login">
                        <a class="text-muted text-center" href="<?php echo URLROOT ?>/register">Create Account</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>
