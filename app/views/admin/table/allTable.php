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
                                <label for="" class="text-primary">All Tables</label>
                            </h3>
                        </div>

                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Table Number</th>
                                        <th>Capacity</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data['seat'] as $table): ?>
                                    <tr>
                                        <td><?php echo $table['table_number']; ?></td>
                                        <td><?php echo $table['capacity']; ?></td>
                                        <td><?php echo $table['status']; ?></td>
                                        <td><?php echo date('Y-m-d', strtotime($table['created_at'])); ?></td>
                                        <td><?php echo date('Y-m-d', strtotime($table['updated_at'])); ?></td>
                                        <td>
                                            <a href="<?php echo URLROOT; ?>/tableController/edit/<?php echo $table['id']; ?>" class="text-primary">
                                                <i class="fas fa-edit fa-lg"></i>
                                            </a>
                                            <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteModal_<?php echo $table['id']; ?>">
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

<?php foreach ($data['seat'] as $table): ?>
<div class="modal fade" id="deleteModal_<?php echo $table['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel_<?php echo $table['id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white" id="deleteModalLabel_<?php echo $table['id']; ?>">Warning!</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete Table Number <?php echo $table['table_number']; ?>?
            </div>
            <div class="modal-footer">
                <a href="<?php echo URLROOT; ?>/tableController/destroy/<?php echo $table['id']; ?>" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>
