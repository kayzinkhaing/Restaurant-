<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php'; ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>

<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header" style="background-color: #8de38d;">
            <h4 class="text-primary" style="color: black;">Edit Position</h4>
        </div>
        <div class="card-body">
            <form action='<?php echo URLROOT; ?>/positionController/update' method='post'>
                <input type="hidden" name="id" value="<?php echo $data['position']['id']; ?>">
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Position Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($data['position']['position']); ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Salary</label>
                                <input type="number" name="salary" class="form-control" value="<?php echo $data['position']['salary']; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <input type="submit" name="submit" class="btn btn-success" value="Update">
                        <a href="<?php echo URLROOT; ?>/positionController/index" class="btn btn-inverse">Cancel</a>
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>
