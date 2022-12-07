<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="__CONTACT_MAIN vh-100 w-100" style="background: linear-gradient(rgba(0, 0, 0, 0.575), rgba(0,0,0,0.3)), url(<?php echo URLROOT ?>/imgs/bg.jpg); background-repeat: no-repeat; background-size: cover;">
    <div class="container d-flex align-center justify-center h-100" >
        <div class="w-100 __CONTACT__FORM" style="max-width:538px;">
        <?php echo flash('contact_register'); ?>
            <form method="POST" class=" w-100 login-container bg-white br-3 p-5">
                <h1 class="text-primary fs-9 fw-5 text-center mb-5">Contact</h1>
                <div class="input-fields d-flex flex-column gap-3 mt-8">
                    <div class="input-field " style="border-bottom: 1px solid #ced4da;">
                        <?php echo $data['name_err'] ? '<p class="text-danger">'.$data['name_err'].'</p>' : '' ?>
                        <?php if(isLoggedIn()) { ?>
                            <input name="name" class="input border-none" type="text" style="padding: 1rem 1rem;" value="<?php echo $data['name'] ? $data['name'] : $_SESSION['user']['first_name'] . " " . $_SESSION['user']['last_name']  ?>" placeholder="Name" required>
                        <?php } else { ?>
                            <input name="name" class="input border-none" type="text" style="padding: 1rem 1rem;" value="<?php echo $data['name']  ?>" placeholder="Name" required>
                        <?php } ?>
                    </div>
                    <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                        <?php echo $data['email_err'] ? '<p class="text-danger">'.$data['email_err'].'</p>' : '' ?>
                        <?php if(isLoggedIn()) { ?>
                            <input name="email" class="input border-none" type="email" style="padding: 1rem 1rem;" value="<?php echo $data['email'] ? $data['email'] : $_SESSION['user']['email'] ?>" placeholder="Email" required>
                        <?php } else { ?>
                            <input name="email" class="input border-none" type="email" style="padding: 1rem 1rem;" value="<?php echo $data['email'] ?> " placeholder="Email" required>
                        <?php } ?>
                    </div>
                    <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                    <?php echo $data['message_err'] ? '<p class="text-danger">'.$data['message_err'].'</p>' : '' ?>
                        <textarea name="message" class="input border-none w-100 non-resizable input" style="padding: 1rem 1rem; height:180px;" value="<?php echo $data['message'] ? $data['message'] : ''  ?>"  placeholder="Your Message" required></textarea>
                    </div>

                    <div class="text-center align-center mt-3">
                        <input style="width: 200px; padding:.4rem .7rem;" class="btn btn-primary fs-4 br-5 mb-3" type="submit" value="Submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>
