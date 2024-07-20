<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php'; ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>

<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="text-primary">Add Table</h4>
        </div>
        <div class="card-body">
            <form action='<?php echo URLROOT; ?>/tableController/store' method='post'>
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Table Number</label>
                                <input type="text" name="table_number" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Capacity</label>
                                <input type="number" name="capacity" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="available">Available</option>
                                    <option value="occupied">Occupied</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Created At</label>
                                <input type="datetime-local" name="created_at" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Updated At</label>
                                <input type="datetime-local" name="updated_at" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <input type="submit" name="submit" class="btn btn-success" value="Save">
                        <!-- <a href="<?php //echo URLROOT; ?>/tableController/index" class="btn btn-inverse">Cancel</a> -->
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>
