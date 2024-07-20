<?php require_once APPROOT . '/views/inc/admin/header.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php'; ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php'; ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>

<?php $database = new Database(); ?>
<?php $categories = $database->readAll("category"); ?>

<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header">
            <h4 class="text-primary">Add Menu</h4>
        </div>
        <div class="card-body">
            <form action='<?php echo URLROOT; ?>/menuController/store' method='post' enctype="multipart/form-data">
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Category</label>
                                <select name="category_id" class="form-control" >
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>">
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Price</label>
                                <input type="number" name="price" class="form-control" placeholder="MMK" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*" >
                            </div>
                        </div> 
                    </div>

                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea name="description" id="description" class="form-control" ></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <input type="submit" name="submit" class="btn btn-success" value="Save">
                        <a href="<?php echo URLROOT; ?>/menuController/index" class="btn btn-inverse">Cancel</a>
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php'; ?>
