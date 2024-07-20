<?php require_once APPROOT . '/views/inc/user/header.php' ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php' ?>
<div class="row d-flex align-items-center justify-content-center">
    <h1 class="text-center mt-5">Register</h1>


    <div class="col-md-2 col-lg-6 col-xl-6 d-flex align-items-center justify-content-center">
        <img src="<?php echo URLROOT; ?>/public/images/register.jpg" alt="image" class="reg_img ">
    </div>

    <div class="col-md-6 mb-4 d-flex align-items-center justify-content-center">
        <form action="<?php echo URLROOT; ?>/auth/register" method="post" class="border mt-3 w-75 p-4 bg-light">

            <?php require_once APPROOT . '/views/components/auth_message.php' ?>
            <?php if (!empty($data)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($data as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="form-outline mb-4">
                <label for="">Name</label>
                <input type="text" name="name" id="admin_name" placeholder="Name" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="">Password</label>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <label for="">Confirm Password</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control">
            </div>
            <div class="form-outline mb-4">
                <input type="submit" value="Register" name="register" class="btn btn-primary">
            </div>
            <p class="small fw-bold">Already have an account? <a href="<?php echo URLROOT; ?>/pages/login" class="text-danger">Login</a></p>
        </form>
    </div>
</div>

<?php require_once APPROOT . '/views/inc/user/footer.php' ?>