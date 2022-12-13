<?php require APPROOT . '/views/admin/inc/admin-header.php'; ?>


<div class="overlay pos-absolute vw-100 vh-100 d-none d-flex align-center justify-center __ITEMS__OVERLAY__" style="background:rgba(0, 0, 0, 0.75); ;z-index: 1000; transition:.3s ease-in-out;">
    
    <div class="__DELETE__CONFIRM d-none confirmation bg-white w-100 br-2 of-hidden" style="max-width: 400px;">
        <div class="top w-100 bg-primary p-2 align-center d-flex justify-between">
            <p class="text-white text-center">Confirmation</p>
            <button onclick="closeMenu()" class="btn btn-danger">X</button>
        </div>
        <div class="content p-2">
            <p class="text-center text-dark">Are you sure you want to delete this item?</p>
            <div class="">
                <form id="__DELETE__FORM__" method="POST"  action="<?php echo URLROOT ?>/categories/delete/" class="w-100">
                    <!-- check box -->
                    <div class="checkbox d-flex align-center mt-2 gap-2 mb-2">
                        <input type="checkbox" name="delete_all" class="w-fit ml-4" id="delete_all">
                        <label for="delete_all" class="text-danger">Delete all items in this category</label>
                    </div>
                    <input type="submit" name="delete" class="btn btn-danger w-100" value="Yes">
                </form>
                <button onclick="closeMenu()" class="btn btn-primary mt-1 w-100">No</button>
            </div>
        </div>
    </div>

    <!-- Products Edit -->
    <div class="__UPDATE__CONFIRM confirmation d-none bg-white w-100 br-2 ofy-scroll scroll-bar" style="max-width: 400px; max-height:80vh;">
        <div class="top w-100 bg-primary p-2 align-center d-flex justify-between">
            <p class="text-white text-center">Edit</p>
            <button onclick="closeMenu()" class="btn btn-danger">X</button>
        </div>
        <div class="content p-2 ">
            <form id="__EDIT__FORM__" method="POST"  action="<?php echo URLROOT ?>/categories/edit/">
                <div class="input-form mb-3">
                    <label class="text-dark" for="name">Name</label>
                    <input class="mt-1" type="text" placeholder="Name" name="name" id="name" class="form-control">
                </div>
                <div class="input-form mb-3">
                    <label class="text-dark" for="description">Description</label>
                    <input class="mt-1" type="text" placeholder="Description" name="description" id="description" class="form-control">
                </div>
                <div class="input-form mb-1">
                    <input type="submit" value="Update" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>

</div>

<div class="ofy-scroll p-5" style="flex: 1;">
    <div class="content">
        <div class="gallery">
            <h1 class="text-primary text-center mb-5">Category</h1>
            <div class="controls card mb-5">

                <form action="<?php echo URLROOT ?>/categories/add" method="POST">
                    <div class="inputs d-flex gap-5 align-center flex-wrap">
                            
                        <div class="input-group" style="max-width: 220px;">
                            <span class="text-muted p-1">Name</span>
                            <?php echo $data['name_err'] ? "<p class='text-danger'>".$data['name_err']."</p>" : ''  ?>
                            <input type="text" value="<?php echo $data['name'] ?>"  name="name" <?php echo $data['name_err'] ? "style='border:1px solid var(--color-danger)'" : ''  ?> class="mt-1 w-100" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group" style="max-width: 220px;">
                            <span class="text-muted p-1">Description</span>
                            <?php echo $data['description_err'] ? "<p class='text-danger'>".$data['description_err']."</p>" : ''  ?>
                            <input type="text" name="description" value="<?php echo $data['description'] ?>"  <?php echo $data['description_err'] ? "style='border:1px solid var(--color-danger)'" : ''  ?> class="w-100 mt-1" placeholder="Description" aria-label="Username" aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group w-100 d-flex align-end" style="max-width: 150px; height:61px;" style="min-width: 220px;">
                            <input type="submit" name="add" class="mt-1 btn btn-success w-100 text-dark" style="padding: 0.38rem" value="Add" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </form>
            </div>
            <div class="products-list d-flex flex-column card align-center">
                <div class="products-control-container w-fit">
                    <?php flash('category_message'); ?>
                </div>

                <div class="table-container w-100 mt-5 br-3" style="overflow-x: auto;">

                    <table class="w-100 __PRODUCTS__TABLE">
                        <tr>
                            <th class="text-dark">id</th>
                            <th class="text-dark">Name</th>
                            <th class="text-dark">Description</th>
                            <th class="text-dark">Edit</th>
                            <th class="text-dark">Delete</th>
                        </tr>
                        <?php foreach($data['categories'] as $category) : ?>
                            <tr>
                                <td class="text-muted" ><?php echo $category->id ?></td>
                                <td class="text-muted" ><?php echo $category->name ?></td>
                                <td class="text-muted"><?php echo $category->description ?></td>
                                <td class="text-muted text-center"><button onclick="openEditCategory(<?php echo $category->id ?>)" class="mt-1 btn btn-primary w-50" style="min-width:200px; padding: 0.38rem 2rem">Edit</button></td>
                                <td class="text-muted text-center"><button onclick="deleteVerification(<?php echo $category->id ?>)" class="mt-1 btn btn-danger w-50" style="min-width:200px; padding: 0.38rem 2rem;">Delete</button></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/inc/admin-footer.php'; ?>