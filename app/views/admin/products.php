<?php require APPROOT . '/views/admin/inc/admin-header.php'; ?>


<div class="overlay pos-absolute vw-100 vh-100 d-none d-flex align-center justify-center __ITEMS__OVERLAY__" style="background:rgba(0, 0, 0, 0.75); ;z-index: 1000; transition:.3s ease-in-out;">
    
    <div class="__DELETE__CONFIRM d-none confirmation bg-white w-100 br-2 of-hidden" style="max-width: 400px;">
        <div class="top w-100 bg-primary p-2 align-center d-flex justify-between">
            <p class="text-white text-center">Confirmation</p>
            <button onclick="closeMenu()" class="btn btn-danger">X</button>
        </div>
        <div class="content p-2">
            <p class="text-center text-dark">Are you sure you want to delete this item?</p>
            <div class="d-flex justify-center gap-5 mt-4">
                <form id="__DELETE__FORM__" method="POST"  action="<?php echo URLROOT ?>/items/delete/" class="w-100">
                    <input type="submit" name="delete" class="btn btn-danger w-100" value="Yes">

                </form>
                <button onclick="closeMenu()" class="btn btn-primary w-100">No</button>
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
            <form id="__EDIT__FORM__" method="POST"  action="<?php echo URLROOT ?>/items/edit/">
                <div class="input-form mb-3">
                    <label class="text-dark" for="name">Name</label>
                    <input class="mt-1" type="text" placeholder="Name" name="name" id="name" class="form-control">
                </div>
                <div class="input-form mb-3">
                    <label class="text-dark" for="description">Description</label>
                    <input class="mt-1" type="text" placeholder="Description" name="description" id="description" class="form-control">
                </div>
                <div class="input-form mb-3">
                    <label class="text-dark" for="description">Category</label>
                    <select class="text-muted h-100 w-100 input mt-1" style="height: 38px;" name="category">
                        <option id="DefaultEditCategory" value="None">Category</option>
                        <?php foreach($data['categories'] as $category): ?>
                            <option value="<?php echo $category->id ?>"><?php echo $category->name;?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="input-form mb-3">
                    <label class="text-dark" for="price">Pirce</label>
                    <input class="mt-1" placeholder="Price" type="text" name="price" id="price" class="form-control">
                </div>
                <div class="input-form mb-3">
                    <label class="text-dark" for="sold">Sold</label>
                    <input class="mt-1" placeholder="Sold" type="text" name="sold" id="sold" class="form-control">
                </div>
                <div class="input-form mb-3">
                    <label class="text-dark" for="quantity">Quantity</label>
                    <input class="mt-1" type="text" placeholder="Quantity" name="quantity" id="quantity" class="form-control">
                </div>
                <!-- <div class="input-form mb-3">
                    <label class="text-dark" for="img">Img</label>
                    <input class="mt-1" type="file" placeholder="img" name="img" id="img" class="form-control">
                </div> -->
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
            <h1 class="text-primary text-center mb-5">Products</h1>
            <div class="controls card mb-5">

                <form action="<?php echo URLROOT ?>/items/add" enctype="multipart/form-data" method="POST">
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
                        <div class="input-group" style="max-width: 220px;">
                            <span class="text-muted p-1">Category</span>
                            <?php echo $data['description_err'] ? "<p class='text-danger'>".$data['category_err']."</p>" : ''  ?>
                            <select class="text-muted w-100 input mt-1" <?php echo $data['category_err'] ? "style='border:1px solid var(--color-danger)'" : ''  ?> name="category">
                                <option value="None">Category</option>
                                <?php foreach($data['categories'] as $category): ?>
                                    <option value="<?php echo $category->id ?>"><?php echo $category->name;?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="input-group" style="max-width: 220px;">
                            <span class="text-muted p-1">Price</span>
                            <?php echo $data['price_err'] ? "<p class='text-danger'>".$data['price_err']."</p>" : ''  ?>
                            <input type="text" value="<?php echo $data['price'] ?>" name="price" class="mt-1 w-100" <?php echo $data['price_err'] ? "style='border:1px solid var(--color-danger)'" : ''  ?> placeholder="Price" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group" style="max-width: 220px;">
                            <span class="text-muted p-1">Sold</span>
                            <?php echo $data['sold_err'] ? "<p class='text-danger'>".$data['sold_err']."</p>" : ''  ?>
                            <input type="text" value="<?php echo $data['sold'] ?>"  name="sold" class="mt-1 w-100" <?php echo $data['sold_err'] ? "style='border:1px solid var(--color-danger)'" : ''  ?> placeholder="Sold" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group" style="max-width: 220px;">
                            <span class="text-muted p-1">Quantity</span>
                            <?php echo $data['quantity_err'] ? "<p class='text-danger'>".$data['quantity_err']."</p>" : ''  ?>
                            <input type="text" value="<?php echo $data['quantity'] ?>"  name="quantity" <?php echo $data['quantity_err'] ? "style='border:1px solid var(--color-danger)'" : ''  ?> class="mt-1 w-100" placeholder="Quantity" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group">
                            <span class="text-muted p-1" id="basic-addon1">Img</span>
                            <?php echo $data['img_err'] ? "<p class='text-danger'>".$data['img_err']."</p>" : ''  ?>
                            <input type="file" name="img" <?php echo $data['img_err'] ? "style='border:1px solid var(--color-danger)'" : ''  ?> class="mt-1 w-100 " placeholder="Img">
                        </div>

                        <div class="input-group w-100 d-flex align-end" style="max-width: 150px; height:61px;" style="min-width: 220px;">
                            <input type="submit" name="add" class="mt-1 btn btn-success w-100 text-dark" style="padding: 0.38rem" value="Add" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </form>
            </div>
            <div class="products-list d-flex flex-column card align-center">
                <div class="products-control-container w-fit">
                    <?php flash('product_message'); ?>
                    <div class="controls d-flex gap-5 flex-row pl-2 pr-2 w-100">
                        <div class="input-group" style="max-width: 220px;">
                            <span class="text-muted p-1">Id</span>
                            <input type="text" name="price" class="mt-1 w-100" placeholder="Id" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group" style="max-width: 220px;">
                            <span class="text-muted p-1">Name</span>
                            <input type="text" name="tags" class="mt-1 w-100" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group" style="max-width: 220px;">
                            <span class="text-muted p-1">Price</span>
                            <input type="text" name="price" class="mt-1 w-100" placeholder="Price" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group w-100 d-flex align-end" style="max-width: 150px; height:61px;" style="min-width: 220px;">
                            <input type="submit" name="discount" class="mt-1 btn btn-primary w-100 text-dark" style="padding: 0.38rem" value="Search" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>

                <div class="table-container w-100 mt-5 br-3" style="overflow-x: auto;">

                    <table class="w-100 __PRODUCTS__TABLE">
                        <tr>
                            <th class="text-dark">id</th>
                            <th class="text-dark">Img</th>
                            <th class="text-dark">Name</th>
                            <th class="text-dark">Description</th>
                            <th class="text-dark">Category</th>
                            <th class="text-dark">Price</th>
                            <th class="text-dark">Sold</th>
                            <th class="text-dark">Quantity</th>
                            <th class="text-dark">Created</th>
                            <th class="text-dark">Updated</th>
                            <th class="text-dark">Edit</th>
                            <th class="text-dark">Delete</th>
                        </tr>
                        <?php foreach($data['products'] as $product) : ?>
                            <tr>
                                <td class="text-muted" ><?php echo $product->id ?></td>
                                <td class="text-muted" style="width: 70px;"><img style="width:100%; height:50px; object-fit: scale-down;" src="<?php echo URLROOT ?>/content/products/<?php echo $product->img ?>" alt=""></td>
                                <td class="text-muted" ><?php echo $product->name ?></td>
                                <td class="text-muted"><?php echo $product->description ?></td>
                                <td class="text-muted"><?php echo $product->categoryName ?></td>
                                <td class="text-muted"><?php echo convertCurrency($product->price) ?></td>
                                <td class="text-muted"><?php echo $product->sold ?></td>
                                <td class="text-muted"><?php echo $product->quantity ?></td>
                                <td class="text-muted"><?php echo $product->created_at ?></td>
                                <td class="text-muted"><?php echo $product->updated_at ?></td>
                                <td class="text-muted"><button onclick="openEdit(<?php echo $product->id ?>)" class="mt-1 btn btn-primary w-100" style="padding: 0.38rem 2rem">Edit</button></td>
                                <td class="text-muted"><button onclick="deleteVerification(<?php echo $product->id ?>)" class="mt-1 btn btn-danger w-100" style="padding: 0.38rem 2rem">Delete</button></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/inc/admin-footer.php'; ?>