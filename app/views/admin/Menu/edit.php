<?php require_once APPROOT . '/views/inc/admin/header.php' ?>
<?php require_once APPROOT . '/views/inc/admin/sidebar.php' ?>
<?php require_once APPROOT . '/views/inc/admin/navbar.php' ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>

<?php 
    $database = new Database();
    $categories = $database->readAll("category");
?>

<div class="col-lg-12">
    <div class="card card-outline-primary">
        <div class="card-header" style="background-color: #8de38d;">
            <h4 class="text-primary" style="color: black;">Edit Menu</h4>
        </div>
        <div class="card-body">
            <form action='<?php echo URLROOT; ?>/menuController/update' method='post' enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['menus']['id']; ?>">
                <div class="form-body">
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $data['menus']['name']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Category</label>
                                <select name="category_id" class="form-control">
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>" <?php echo $category['id'] == $data['menus']['category_id'] ? 'selected' : ''; ?>>
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
                                <input type="text" name="price" class="form-control" placeholder="MMK" value="<?php echo $data['menus']['price']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-danger">
                                <label class="control-label">Image</label>
                                <input type="file" name="image" class="form-control" >
                                <input type="text" name="imagepath" id="filePath" class="form-control" value="<?php echo $data['menus']['image']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row p-t-20">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Description</label>
                                <textarea name="description" id="description" class="form-control"><?php echo $data['menus']['description']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" name="submit" class="btn btn-success" value="Update">
                        <a href="<?php echo URLROOT; ?>/menuController/index" class="btn btn-inverse">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/admin/footer.php' ?>
