<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php'; ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>

<?php 
    $database = new Database();
?>

<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header" style="background-color: #8de38d;">
            <h4 class="text-primary" style="color: black;">Edit Table</h4>
        </div>
        <div class="card-body">
            <form action='<?php echo URLROOT; ?>/tableController/update' method='post'>
                <input type="hidden" name="id" value="<?php echo $data['table']['id']; ?>"
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Table Number</label>
                                <input type="text" name="table_number" class="form-control" value="<?php echo $data['table']['table_number']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Capacity</label>
                                <input type="number" name="capacity" class="form-control" value="<?php echo $data['table']['capacity']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="available" <?php echo $data['table']['status'] == 'available' ? 'selected' : ''; ?>>Available</option>
                                    <option value="occupied" <?php echo $data['table']['status'] == 'occupied' ? 'selected' : ''; ?>>Occupied</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Created At</label>
                                <input type="text" class="form-control" value="<?php echo date('Y-m-d', strtotime($data['table']['created_at'])); ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Updated At</label>
                                <input type="text" class="form-control" value="<?php echo date('Y-m-d', strtotime($data['table']['updated_at'])); ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" name="submit" class="btn btn-success" value="Update">
                        <!-- <a href="<?php //echo URLROOT; ?>/tableController/index" class="btn btn-inverse">Cancel</a> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>
