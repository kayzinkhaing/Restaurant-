<?php require_once APPROOT . '/views/inc/user/header.php'; ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php'; ?>

<body>

<main id="main">
    <div class="parallax" onclick="remove_class()">
        <div class="parallax_head text-center">
            <h2>Reserve</h2>
            <h3>Table Space</h3>
        </div>
    </div>

    <div class="content" onclick="remove_class()">
        <div class="inner_content">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="hr_book_form">
                <h2 class="form_head"><span class="book_icon">BOOK A TABLE</span></h2>
                <p class="form_slg">We offer you the best reservation services</p>

                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>No of Guest</label>
                            <input type="number" class="form-control" placeholder="How many guests" min="1" name="guest" id="guest" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" placeholder="Enter your phone number" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date_res" placeholder="Select date for booking" required>
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <input type="time" class="form-control" name="time" placeholder="Select time for booking" required>
                        </div>
                        <div class="form-group">
                            <label>Suggestions <small><b>(E.g No of Plates, How you want the setup to be)</b></small></label>
                            <textarea name="suggestions" class="form-control" placeholder="Your suggestions" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" name="submit" value="MAKE YOUR BOOKING" />
                </div>
            </form>
        </div>
    </div>
</main>

<?php require_once APPROOT . '/views/inc/user/footer.php'; ?>
