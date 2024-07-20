<?php require_once APPROOT . '/views/inc/admin/header.php' ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php' ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php' ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>

<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="text-primary">Update Category</h4>
        </div>
        <div class="card-body">
            <form action='<?php echo URLROOT; ?>/categoryController/update' method='post'>
                <input type="hidden" name="id" value="<?php echo $data['category']['id'] ?>">
                <input type="hidden" name="date" value="<?php echo $data['category']['date'] ?>">

                <div class="form-body">                    
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $data['category']['name'] ?>" >
                            </div>
                        </div>
                        <div class="form-actions float-right">
                    <!-- <button type="submit"  class="btn btn-primary">Create</button> -->
                    <div class="form-actions">
                                        <input type="submit" name="submit" class="btn btn-success" value="Update" required> 
                                        <a href="<?php echo URLROOT; ?>/categoryController/index" class="btn btn-inverse">Cancel</a>
                                    </div>
                    <!-- <button type="submit"  class="btn btn-info">Cancel</button> -->
                </div>
                    </div>        
                </div>
                    
                
            </form> 
        </div>
    </div>
 </div>
                            
<?php require_once APPROOT . '/views/inc/admin/footer.php' ?>