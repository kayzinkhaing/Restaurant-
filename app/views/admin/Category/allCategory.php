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
                                <label for="" class="text-primary">All category</label>
                            </h3>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
                                <thead>                                     
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Date</th>  
                                    <th>Action</th>  
                                </thead>
                                <?php 
                                $number=1;
                                foreach ($data['category'] as $category) { ?>
                                    <tr>
                                        <td><?php echo $number++; ?></td>
                                        <td><?php echo $category['name']; ?></td>
                                        <td><?php echo $category['date']; ?></td>
                                        <td>
                                                <a href="<?php echo URLROOT; ?>/categoryController/edit/<?php echo $category['id']; ?>" class="text-primary">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal_<?php echo $category['id']; ?>" class="text-danger ml-2">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </a>
                                            </td>



                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($data['category'] as $category): ?>
    <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal_<?php echo $category['id']; ?>">
        Delete
    </button> -->

    <div class="modal fade" id="deleteModal_<?php echo $category['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel_<?php echo $category['id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-white" id="deleteModalLabel_<?php echo $category['id']; ?>">Warning!</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <?php echo "Name = " . $category['name']; ?>?
                </div>
                <div class="modal-footer">
                    <a href="<?php echo URLROOT; ?>/categoryController/destroy/<?php echo $category['id']; ?>" class="btn btn-danger">Delete</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a></button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>
