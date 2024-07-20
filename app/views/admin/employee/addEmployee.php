<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php'; ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>


<?php $database = new Database(); ?>
<?php $position = $database->readAll("position"); ?>

<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="text-primary">Add Employee</h4>
        </div>
        <div class="card-body">
            <form action='<?php echo URLROOT; ?>/employeeController/store' method='post'>
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Position</label>
                                <select name="position" class="form-control" required>
                                    <?php foreach ($position as $positions): ?>
                                        <option value="<?php echo $positions['id']; ?>">
                                            <?php echo $positions['position']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">Phone No</label>
                            <input type="text" name="phone_no" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">Hire Date</label>
                            <input type="date" name="hire_date" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label class="control-label">Hire Date</label>
                                <input type="date" name="hire_date" class="form-control" required> -->
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <input type="submit" name="submit" class="btn btn-success" value="Save">
                        <a href="<?php echo URLROOT; ?>/employeeController/index" class="btn btn-inverse">Cancel</a>
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>
