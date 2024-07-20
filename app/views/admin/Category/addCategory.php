<?php require_once APPROOT . '/views/inc/admin/header.php' ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php' ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php' ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>

<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="text-primary">Add Category</h4>
        </div>
        <div class="card-body">
            <?php if (!empty($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            <form action='<?php echo URLROOT; ?>/categoryController/store' method='post'>
                <div class="form-body">                    
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                        </div>
                        <div class="form-actions float-right">
                            <div class="form-actions">
                                <input type="submit" name="submit" class="btn btn-success" value="Create" required> 
                                <a href="add_menu.php" class="btn btn-inverse">Cancel</a>
                            </div>
                        </div>
                    </div>        
                </div>
            </form> 
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php' ?>
