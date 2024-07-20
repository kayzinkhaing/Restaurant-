<?php require_once APPROOT . '/views/inc/admin/header.php' ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php' ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php' ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>

<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header" style="background-color: #8de38d;">
            <h4 class="text-primary" style="color: black;">Edit Employee</h4>
        </div>
        <div class="card-body">
            <form action='<?php echo URLROOT; ?>/employeeController/update' method='post'>
                <input type="hidden" name="id" value="<?php echo $data['employees']['id']; ?>">
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $data['employees']['name']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Position</label>
                                <input type="text" name="position" class="form-control" value="<?php echo $data['employees']['position']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Salary</label>
                                <input type="number" name="salary" class="form-control" value="<?php echo $data['employees']['salary']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $data['employees']['email']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Phone No</label>
                                <input type="text" name="phone_no" class="form-control" value="<?php echo $data['employees']['phone_no']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Hire Date</label>
                                <input type="date" name="hire_date" class="form-control" value="<?php echo $data['employees']['hire_date']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" name="submit" class="btn btn-success" value="Update">
                        <a href="<?php echo URLROOT; ?>/employeeController/index" class="btn btn-inverse">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php' ?>
