<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php'; ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>

<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="text-primary">Add Contact</h4>
        </div>
        <div class="card-body">
            <form action='<?php echo URLROOT; ?>/contactController/store' method='post'>
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Address</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Call Us</label>
                                <input type="number" name="call_us" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email Us</label>
                                <input type="email" name="email_us" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Opening Hours</label>
                                <input type="time" name="opening_hours" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <input type="submit" name="submit" class="btn btn-success" value="Save">
                        <a href="<?php echo URLROOT; ?>/contactController/index" class="btn btn-inverse">Cancel</a>
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>
