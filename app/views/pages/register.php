<?php require APPROOT . '/views/inc/header.php'; ?>

<main class="__REGISTER__MAIN vh-100 w-100" style="background: linear-gradient(rgba(0, 0, 0, 0.575), rgba(0,0,0,0.3)), url(<?php echo URLROOT ?>/imgs/bg.jpg); background-repeat: no-repeat; background-size: cover;">
    <div class="container d-flex align-center justify-center h-100">
        <form action="<?php echo URLROOT ?>/register" method="POST" class="__REGISTER__FORM w-100 bg-white d-flex br-4 of-hidden" style="max-width:1075px;">
            <div class="__REGISTER__LEFT left p-5 w-50">
                <h1 class="text-primary fw-5 mb-5">Personal Information</h1>
                <div class="input-fields flex-column d-flex gap-4">
                    <div class="double d-flex  align-center gap-4 ">
                        <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                            <?php echo $data['register_data']['first_name_err'] ? '<p class="text-danger">'.$data['register_data']['first_name_err'].'</p>' : '' ?>
                            <input class=" border-none" type="text" style="padding: 1rem 1rem;" value="<?php echo $data['register_data']['first_name'] ?>" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                            <?php echo $data['register_data']['last_name_err'] ? '<p class="text-danger">'.$data['register_data']['last_name_err'].'</p>' : '' ?>
                            <input class=" border-none" type="text" style="padding: 1rem 1rem;" value="<?php echo $data['register_data']['last_name'] ?>" name="last_name" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                        <?php echo $data['register_data']['email_err'] ? '<p class="text-danger">'.$data['register_data']['email_err'].'</p>' : '' ?>
                        <input class=" border-none" type="email" style="padding: 1rem 1rem;" value="<?php echo $data['register_data']['email'] ?>" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                        <?php echo $data['register_data']['password_err'] ? '<p class="text-danger">'.$data['register_data']['password_err'].'</p>' : '' ?>
                        <?php if(!$data['register_data']['password_err']) { echo $data['register_data']['password_verify_err'] ? '<p class="text-danger">'.$data['register_data']['password_verify_err'].'</p>' : ''; } ?>
                        <input class=" border-none" type="password" style="padding: 1rem 1rem;" value="<?php echo $data['register_data']['password'] ?>" name="password" placeholder="Password" required>
                    </div>
                    <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                        <?php echo $data['register_data']['password_verify_err'] ? '<p class="text-danger">'.$data['register_data']['password_verify_err'].'</p>' : '' ?>
                        <input class=" border-none" type="password" style="padding: 1rem 1rem;" value="<?php echo $data['register_data']['password_verify'] ?>" name="password_verify" placeholder="Password Verify" required>
                    </div>
                    <div class="input-field">
                    <?php echo $data['register_data']['tos_err'] ? '<p class="text-danger">'.$data['register_data']['tos_err'].'</p>' : '' ?>
                        <div class="tos d-flex align-center gap-2 mt-3">
                            <input class="border-none w-fit" style="transform:scale(1.2);" id="tos-agree" name="tos" type="checkbox" required>
                            <label for="tos-agree" class="text-muted">I do accept the Terms and Conditions of your site.</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="__REGISTER__RIGHT right p-5 w-50 bg-primary" style="box-shadow: 0px 4px 12px 7px rgba(0, 0, 0, 0.25);">
                <h1 class="text-white fw-5 mb-5">Address Details</h1>
                <div class="input-fields flex-column d-flex gap-4">
                    <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                        <?php echo $data['register_data']['street_err'] ? '<p class="text-danger">'.$data['register_data']['street_err'].'</p>' : '' ?>
                        <input class=" border-none bg-primary text-white place-holder-white" type="text" style="padding: 1rem 1rem;" value="<?php echo $data['register_data']['street'] ?>"  name="street" placeholder="Street" required>
                    </div>
                    <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                        <input class=" border-none bg-primary text-white place-holder-white" type="text" style="padding: 1rem 1rem;" value="<?php echo $data['register_data']['additional_information'] ?>" name="additional_information" placeholder="Additional Information (Optional)" >
                    </div>
                    <div class="double d-flex align-center gap-4">
                        <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                        <?php echo $data['register_data']['zip_code_err'] ? '<p class="text-danger">'.$data['register_data']['zip_code_err'].'</p>' : '' ?>
                            <input class="border-none bg-primary text-white place-holder-white" type="text" style="padding: 1rem 1rem;" value="<?php echo $data['register_data']['zip_code'] ?>" name="zip_code" placeholder="Zip Code" required>
                        </div>
                        <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                        <?php echo $data['register_data']['city_err'] ? '<p class="text-danger">'.$data['register_data']['city_err'].'</p>' : '' ?>
                            <input class="border-none bg-primary text-white place-holder-white" type="text" style="padding: 1rem 1rem;" value="<?php echo $data['register_data']['city'] ?>" name="city" placeholder="City" required>
                        </div>
                    </div>
                    <div class="input-field" style="border-bottom: 1px solid #ced4da;">
                        <?php echo $data['register_data']['phone_err'] ? '<p class="text-danger">'.$data['register_data']['phone_err'].'</p>' : '' ?>
                        <input class="border-none bg-primary text-white place-holder-white" type="text" style="padding: 1rem 1rem;" value="<?php echo $data['register_data']['phone'] ?>" name="phone" placeholder="Phone" required>
                    </div>
                    <div class="input-field text-right mt-5">
                        <input style="width: 152px; padding:.4rem 1rem; box-shadow: 0px 0px 3px 3px rgba(0, 0, 0, 0.1);" class="btn btn-white br-5" name="register" type="submit" value="Register" required>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<?php require APPROOT . '/views/inc/footer.php'; ?>