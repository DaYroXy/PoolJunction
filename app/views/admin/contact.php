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
            <h1 class="text-primary text-center mb-5">Contact</h1>

            <div class="products-list d-flex flex-column card align-center">
                <div class="products-control-container w-fit">
                    <?php flash('category_message'); ?>
                </div>

                <div class="table-container w-100 br-3" style="overflow-x: auto;">

                    <table class="w-100 __PRODUCTS__TABLE">
                        <tr>
                            <th class="text-dark">id</th>
                            <th class="text-dark">Name</th>
                            <th class="text-dark">Email</th>
                            <th class="text-dark">Message</th>
                            <th class="text-dark">Date</th>
                            <th class="text-dark" style="width: 50px;">Completed</th>
                        </tr>
                        <?php foreach($data['contacts'] as $contact) : ?>
                            <tr>
                                <td class="<?php echo $contact->completed ? "text-dark" : "text-muted" ?>" ><?php echo $contact->id ?></td>
                                <td class="<?php echo $contact->completed ? "text-dark" : "text-muted" ?>"><?php echo $contact->name ?></td>
                                <td class="<?php echo $contact->completed ? "text-dark" : "text-muted" ?>"><?php echo $contact->email ?></td>
                                <td class="<?php echo $contact->completed ? "text-dark" : "text-muted" ?>"><?php echo $contact->message ?></td>
                                <td class="<?php echo $contact->completed ? "text-dark" : "text-muted" ?>"><?php echo $contact->created_at ?></td>
                                <?php if($contact->completed) : ?>
                                    <td class="text-center"><form action="<?php echo URLROOT ?>/messages/uncompleted/<?php echo $contact->id ?>" method="POST" id="uncompleteForm"><i onclick="document.getElementById('uncompleteForm').submit();" class="fa-solid w-fit fa-square-minus text-warning fs-8 pointer"></form></td>
                                <?php else : ?>
                                    <td class="text-center"><form action="<?php echo URLROOT ?>/messages/completed/<?php echo $contact->id ?>" method="POST" id="completeForm"><i onclick="document.getElementById('completeForm').submit();" class="fa-solid pointer w-fit fa-square-check text-success fs-8"></form></td>
                                <?php endif ?>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/admin/inc/admin-footer.php'; ?>