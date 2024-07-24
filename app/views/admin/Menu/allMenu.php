<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php'; ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>

<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h3>
                                <label for="" class="text-primary">All Menu</label>
                            </h3>
                        </div>

                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Available Qty</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $number=1;
                                foreach ($data['menus'] as $menu): ?>
                                    <tr>
                                        <td><?php echo $number++; ?></td>
                                        <td>
                                            <img src="<?php echo URLROOT; ?>/public/food_images/<?php echo $menu['image']; ?>" alt="food image" width="70px">
                                        </td>
                                        <td><?php echo $menu['name']; ?></td>
                                        <td><?php echo $menu['quantity']; ?></td>
                                        <td><?php echo $menu['category_name']; ?></td>
                                        <td><?php echo $menu['price']; ?> MMK</td>
                                        <td><?php echo $menu['description']; ?></td>
                                        <td>
                                            <a href="<?php echo URLROOT; ?>/menuController/edit/<?php echo $menu['id']; ?>" class="text-primary">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>
                                            <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal_<?php echo $menu['id']; ?>">
                                                <i class="fas fa-trash-alt fa-lg"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($data['menus'] as $menu): ?>
<div class="modal fade" id="deleteModal_<?php echo $menu['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel_<?php echo $menu['id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white" id="deleteModalLabel_<?php echo $menu['id']; ?>">Warning!</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <?php echo "Name = " . $menu['name']; ?>?
            </div>
            <div class="modal-footer">
                <a href="<?php echo URLROOT; ?>/menuController/destroy/<?php echo $menu['id']; ?>" class="btn btn-danger">Delete</a>
                <a href="<?php echo URLROOT; ?>/menuController/index ?>"button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>
