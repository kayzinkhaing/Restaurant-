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
                                <label for="" class="text-primary">All Contacts</label>
                                <!-- <a href="<?php echo URLROOT; ?>/contactController/create" class="btn btn-primary float-right">Add Contact</a> -->
                            </h3>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered text-center" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <!-- <th>ID</th> -->
                                        <th>Address</th>
                                        <th>Call Us</th>
                                        <th>Email Us</th>
                                        <th>Opening Hours</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // $number=1;
                                    foreach ($data['contacts'] as $contact) { ?>
                                        <tr>
                                            <!-- <td><?php echo $number++; ?></td> -->
                                            <td><?php echo $contact['address']; ?></td>
                                            <td><?php echo $contact['call_us']; ?></td>
                                            <td><?php echo $contact['email_us']; ?></td>
                                            <td><?php echo $contact['opening_hours']; ?></td>
                                            <td>
                                                <a href="<?php echo URLROOT; ?>/contactController/edit/<?php echo $contact['id']; ?>" class="text-primary">
                                                    <i class="fas fa-edit fa-lg"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal_<?php echo $contact['id']; ?>" class="text-danger ml-2">
                                                    <i class="fas fa-trash-alt fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($data['contacts'] as $contact): ?>
    <div class="modal fade" id="deleteModal_<?php echo $contact['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel_<?php echo $contact['id']; ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-white" id="deleteModalLabel_<?php echo $contact['id']; ?>">Warning!</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this contact: <?php echo "ID = " . $contact['id']; ?>?
                </div>
                <div class="modal-footer">
                    <a href="<?php echo URLROOT; ?>/contactController/destroy/<?php echo $contact['id']; ?>" class="btn btn-danger">Delete</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>
