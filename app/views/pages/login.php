<?php require_once APPROOT . '/views/inc/user/navbar.php' ?>
<?php require_once APPROOT . '/views/inc/user/header.php' ?>
<div class="row d-flex align-items-center justify-content-center">
        <h3 class="text-center mt-5">Login</h3>
        

        <div class="col-lg-6 col-xl-5 d-flex align-items-center justify-content-center">
            <img src="<?php echo URLROOT; ?>/public/images/login.jpg" alt="image" class="reg_img ">
        </div>

        <div class="col-md-6 mb-4 d-flex align-items-center justify-content-center">
            <form action="<?php echo URLROOT; ?>/Auth/login" method="post" class="border mt-3 w-75 p-4 bg-light">
                <div class="form-outline mb-4">
                    <input type="email" name="email" id="admin_name"  placeholder="Email" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <input type="password" name="password" id="admin_password"  placeholder="Password" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <input type="submit" value="Login" name="login" class="btn btn-success">
                </div>
                <p class="small fw-bold">Don't have an account? <a href="<?php echo URLROOT; ?>/pages/register" class="text-danger">Register</a></p>
            </form>
        </div>
    </div>
<?php require_once APPROOT . '/views/inc/user/footer.php' ?>
