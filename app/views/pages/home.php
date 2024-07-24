
<?php require_once APPROOT . '/views/inc/user/header.php' ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php' ?>


<main class="main">

<!-- Hero Section -->
<section id="hero" class="hero section light-background">
  <div class="container">
    <div class="row gy-4 justify-content-center justify-content-lg-between">
      <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">Enjoy Your Healthy Delicious Food</h1>
        <p data-aos="fade-up" data-aos-delay="100">What do you want to eat today ?.</p>
        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
          <!-- <a href="<?php //echo URLROOT;?>/Pages/book" class="btn-get-started">Booka a Table</a> -->
          <a href="https://youtu.be/7EdpBH81XIY?si=NJKWrCVd14Gjys8I" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>
      </div>
      <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
        <img src="<?php echo URLROOT;?>/images/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- /Hero Section -->

<section id="menu" class="menu section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Menu</h2>
    <p><span>Check Our</span> <span class="description-title">Yummy Menu</span></p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
      <div class="tab-pane fade active show" id="menu-starters">
        <?php 
        // Initialize the database object and read all menu items
        $database = new Database(); 
        $menus = $database->readAll('view_menu'); 
        // Shuffle the menus array to get random items
        shuffle($menus);
        // Slice the array to get only the first six items
        $menus = array_slice($menus, 0, 8);
        ?>
         <!-- <form action='<?php //echo URLROOT; ?>/employeeController/store' method='post'> -->
        <div class="row">
          
          <?php foreach ($menus as $menu): ?>
            <div class="col-md-3">

              <div class="card mb-4 shadow-sm border-0" style="background-color: white;">
                <img class="card-img-top" src="<?php echo URLROOT; ?>/public/food_images/<?php echo $menu['image']; ?>" alt="Food Image" style="height: 300px;width:300px;">
                <div class="card-body">
                    <div class="row">
                      <div class="col-8">
                        <h5 class="card-title"><?php echo $menu['name']; ?></h5>
                        <h5 class="card-title"><?php echo $menu['description']; ?></h5>
                        <p class="card-text"><?php echo $menu['price']." MMK"; ?></p>
                      </div>
                      <div class="col-4 text-right">
                              <button class="btn btn-primary btn-add-to-cart" 
                              data-user-id="<?= $_SESSION['user_id'] ?? 0 ?>" data-item-id="<?= $menu['id'] ?>" data-price="<?= $menu['price'] ?>">
                                  <i class="fas fa-cart-plus"></i>
                              </button>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Menu Section -->
<style>
  .image-row-container {
  display: flex;
  align-items: center;
  position: relative;
}

.image-row {
  display: flex;
  overflow-x: auto; /* Allows horizontal scrolling */
  scroll-behavior: smooth; /* Smooth scrolling when using buttons */
  white-space: nowrap; /* Prevents wrapping of images */
  width: calc(100% - 80px); /* Adjust based on arrow button width */
  margin: 0 10px; /* Space around image row */
}

.image-item {
  display: inline-block;
  margin-right: 20px; /* Space between images */
  transition: transform 0.5s ease; /* Smooth transformation on hover */
}

.image-item:hover {
  animation: shake 0.5s ease; /* Shaking effect on hover */
}

.image-item img {
  border-radius: 50%; /* Makes the image circular */
  width: 100px; /* Set your desired size */
  height: 100px; /* Set your desired size */
  object-fit: cover; /* Ensures the image covers the circle without distortion */
  border: 2px solid #fff; /* Optional: adds a border around the circle */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: adds a subtle shadow */
  transition: transform 0.3s ease; /* Smooth transition for hover effect */
}

.image-item img:hover {
  transform: scale(1.1); /* Zoom effect on hover */
}

.arrow-button {
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
  border: none;
  color: white;
  font-size: 20px;
  padding: 10px;
  cursor: pointer;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  z-index: 10;
  display: flex;
  align-items: center;
  justify-content: center;
}

.left-arrow {
  left: 0;
}

.right-arrow {
  right: 0;
}

.arrow-button:focus {
  outline: none; /* Removes outline on focus */
}

.arrow-button:hover {
  background-color: rgba(0, 0, 0, 0.7); /* Darker background on hover */
}

@keyframes shake {
  0% { transform: translateX(0); }
  25% { transform: translateX(-5px); }
  50% { transform: translateX(5px); }
  75% { transform: translateX(-5px); }
  100% { transform: translateX(0); }
}

</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const imageRow = document.getElementById('imageRow');
    const leftArrow = document.getElementById('leftArrow');
    const rightArrow = document.getElementById('rightArrow');

    leftArrow.addEventListener('click', function () {
      imageRow.scrollBy({ left: -150, behavior: 'smooth' });
    });

    rightArrow.addEventListener('click', function () {
      imageRow.scrollBy({ left: 150, behavior: 'smooth' });
    });
  });
</script>

<!-- Gallery Section -->
<section id="gallery" class="gallery section light-background">

  <!-- Section Title -->
  <div class="container section-title">
    <h2>Gallery</h2>
    <p><span>Check</span> <span class="description-title">Our Gallery</span></p>
  </div><!-- End Section Title -->

  <div class="container">
    
        <?php
        $images = [
            "gallery-1.jpg",
            "gallery-2.jpg",
            "gallery-3.jpg",
            "gallery-4.jpg",
            "gallery-5.jpg",
            "gallery-6.jpg",
            "gallery-7.jpg",
            "gallery-8.jpg"
        ];
        foreach ($images as $image): ?>
        <div class="image-item">
          <a href="<?php echo URLROOT . '/images/gallery/' . $image; ?>">
            <img src="<?php echo URLROOT . '/images/gallery/' . $image; ?>" class="img-fluid" alt="">
          </a>
        </div>
        <?php endforeach; ?>
    
  </div>

</section><!-- /Gallery Section -->






      <!-- Why Us Section -->
<section id="why-us" class="why-us section light-background">

<div class="container">

  <div class="row gy-4">

    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
      <div class="why-box">
        <h3>Why Choose Yummy</h3>
        <p>
        Delicious and Healthy Food,
        Talented Culinary Team,
        Fresh Ingredients,
        Warm Atmosphere,
        Excellent Service,
        Community Engagement,
        Innovative Menu Offerings
        </p>
        <div class="text-center">
          <a href="#" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
        </div>
      </div>
    </div><!-- End Why Box -->

    <div class="col-lg-8 d-flex align-items-stretch">
      <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

        <div class="col-xl-4">
          <div class="icon-box d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-clipboard-data"></i>
            <h4>Exceptional Quality</h4>
            <p>We are committed to providing the highest quality ingredients and dishes, ensuring that every meal is a culinary delight.</p>
          </div>
        </div><!-- End Icon Box -->

        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
          <div class="icon-box d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-gem"></i>
            <h4>Outstanding Service</h4>
              <p>Our friendly and attentive staff are dedicated to making your dining experience memorable and enjoyable from start to finish.</p>
          </div>
        </div><!-- End Icon Box -->

        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
          <div class="icon-box d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-inboxes"></i>
            <h4>Comfortable Ambiance</h4>
                <p>We offer a warm and inviting atmosphere that is perfect for both casual dining and special occasions, making you feel right at home.</p>
          </div>
        </div><!-- End Icon Box -->

      </div>
    </div>

  </div>

</div>

</section><!-- /Why Us Section -->

  </main>
<style>
    .btn-add-to-cart {
    background-color: transparent;
    border: none; /* Optional: If you also want to remove the border */
    color: #000;  /* Set the text color */
    cursor: pointer; /* Add a pointer cursor on hover */
    padding: 0;}
</style>
  
  <?php require_once APPROOT . '/views/inc/user/footer.php' ?>
  
  <script type="text/javascript">
  $(document).ready(function() {
    const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
    addToCartButtons.forEach(button => { 
      var itemId = button.getAttribute('data-item-id');
      $.ajax({
            url: '<?php echo URLROOT; ?>/cartController/getQtyForEachItem', // Adjust the URL to your cartController's endpoint
            type: 'POST',
            data: {
              item_id: itemId
            },
            success: function(response) { 
              if (response.trim() === "disabled") {
                    button.disabled = true;
                }
              //  $('#cart-count').text(response);
            },
            error: function(xhr, status, error) {
                // Handle any errors
                alert('An error occurred while adding the item to the cart.');
            }
        });
    });
    $(document).on('click', '.btn-add-to-cart', function() {
        var itemId = $(this).data('item-id');
        var userId = $(this).data('user-id');
        var price = $(this).data('price');
        var qty = 1; 
        var url = '<?php echo URLROOT; ?>/cartController/addToCart';
        
        if (userId == 0) {
            // Redirect to login page if the user is not logged in
            window.location.href = '<?php echo URLROOT; ?>/Auth/login';
            return; // Exit the function
        }
        // You can now send an AJAX request to add this item to the cart
        $.ajax({
            url: url,
            type: 'POST',
            data: {
              item_id: itemId,
              qty: qty,
              price: price
            },
            success: function(response) {
               $('#cart-count').text(response);
            },
            error: function(xhr, status, error) {
                // Handle any errors
                alert('An error occurred while adding the item to the cart.');
            }
        });
    });


    $('#category_id').on('change', function() {
      $('#allmenu').hide();
      var categoryId = $(this).val();
      //alert(categoryId);  // This line is just for debugging, you can remove it later.
      var form_url = '<?php echo URLROOT; ?>/menuController/menu';

      $.ajax({
        url: form_url,
        type: 'GET',
        data: {
          category_id: categoryId
        }, // Pass category_id directly
        success: function(response) {

          $('#name').empty();
          $('#name').append(response);
        }
      });
    });
  });

  //   alert("hello");
  //   let cartCount = 0;
  //   const cartCountElement = document.getElementById('cart-count');
  //   const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');
  //   alert(addToCartButtons);
  //   addToCartButtons.forEach(button => {
  //     button.addEventListener('click', (event) => {
  //       event.preventDefault();
  //       alert("hello");
  //       var form_url = '<?php echo URLROOT; ?>/menuController/menu';

  //       const itemId = button.getAttribute('data-item-id');
  //       const price = button.getAttribute('data-price');
  //       // Add your cart functionality here
  //       console.log('Item added to cart:', itemId, price);

  //       var qty = 1; 

  //       $.ajax({
  //         url: '<?php echo URLROOT; ?>/cartController/addToCart',
  //         method: 'POST',
  //         data: {
  //           item_id: itemId,
  //           qty: qty,
  //           price: price
  //         },
  //         success: function(response) {
  //           cartCountElement.textContent = response;
  //           // $('#cart-count').text(response);
  //         }
  //       });

  //       //cartCountElement.textContent = cartCount;
  //     });
  //   });
  // });
</script>