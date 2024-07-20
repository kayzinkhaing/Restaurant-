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
                                <label for="" class="text-primary">Add New Position</label>
                            </h3>
                        </div>

                        <div class="card-body">
                            <form action="<?php echo URLROOT; ?>/positionController/store" method="POST">
                                <div class="form-group">
                                    <label for="title">Position Title</label>
                                    <input type="text" name="title" id="title" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="salary">Salary</label>
                                    <input type="number" name="salary" id="salary" class="form-control" required>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Add Position</button>
                                    <a href="<?php echo URLROOT; ?>/positionController/index" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>
