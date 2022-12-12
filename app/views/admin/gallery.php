<?php require APPROOT . '/views/admin/inc/admin-header.php'; ?>

<div class="ofy-scroll p-5" style="flex: 1;">
    <div class="content">
        <div class="gallery">
            <h1 class="text-primary text-center mb-5">Gallery Controls</h1>
            <div class="controls card mb-5">

                <form action="<?php echo URLROOT ?>/photos/upload" enctype="multipart/form-data" method="POST" class="d-flex flex-column gap-3 p-2">
                    <div class="upload-img-container d-flex align-center justify-around mb-3">
                        <div class="upload-content d-flex flex-column align-center justify-center gap-2">
                            <img id="img-preview" class="brtr-3 brbr-3 brbl-3 brtl-3 w-100 mb-3 " style="object-fit: cover; max-width:330px; max-height:210px;" src="" alt="">                        
                            <div class="d-flex flex-column align-center justify-center __ADMIN__UPLOAD__IMAGE__TEXT">
                                <h3 class="text-dark">Image upload</h3>
                                <p class="text-muted mb-3">Click on the button below</p>
                                <i class="text-dark fs-15 fa-solid fa-cloud-arrow-down mb-2"></i>
                            </div>
                            <input type="file" name="img" id="img-upload" accept="image/png, image/gif, image/jpeg" class="d-none">
                            <label for="img-upload" class="btn btn-primary" style="padding: .6rem 4rem">Select File</label>
                            <?php
                                echo isset($data['delete_err']) ? '<p class="text-danger">' . $data['delete_err'] . '</p>' : '';
                                echo isset($data['img_err']) ? '<p class="text-danger">' . $data['img_err'] . '</p>' : '';
                                flash('image_flash');
                            ?>
                        </div>
                    </div>
                    <div class="buttons d-flex gap-5" style="height: 50px;" >
                        <input type="submit" value="Add Image"class="btn btn-success w-100 text-dark">
                        <label for="deleteAll" class="btn btn-danger w-100 " style="line-height: 40px;">Delete All</label>
                    </div>
                </form>
                <form action="<?php echo URLROOT ?>/photos/deleteAll" method="POST">
                    <input type="submit" class="d-none" name="DeleteAll" value="Delete All" id="deleteAll">
                </form>
            </div>
            <ul class="d-flex gap-3 flex-wrap justify-center">
                <?php foreach($data['images'] as $image): ?>
                    <li class="gap-3 w-fit card p-3 br-3">
                        <img class="brtr-3 brbr-3 brbl-3 brtl-3 w-100" style="object-fit: cover; max-width:330px; max-height:210px;" src="<?php echo URLROOT ?>/content/gallery/<?php echo $image->img; ?>" alt="">                        
                        <form method="POST" action="<?php echo URLROOT ?>/photos/delete/<?php echo $image->id ?>" class="img-control d-flex gap-5" style="margin-top: auto;">
                            <input type="submit" name="deleteOne" value="Delete" class="btn btn-danger w-100 text-dark">
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/inc/admin-footer.php'; ?>