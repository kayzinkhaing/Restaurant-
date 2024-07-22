
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
         <form action='<?php echo URLROOT; ?>/employeeController/store' method='post'>
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
                      <div class="col-4 text-right">
                        <button type="submit" class="btn btn-add-to-cart">
                            <i class="fas fa-cart-plus"></i> 
                        </button>
                    </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        </form>
      </div>
    </div>
  </div>
</section><!-- /Menu Section -->

    <!-- Gallery Section -->
    <section id="gallery" class="gallery section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <p><span>Check</span> <span class="description-title">Our Gallery</span></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 0
                },
                "768": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                },
                "1200": {
                  "slidesPerView": 5,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="<?php echo URLROOT;?>/images/gallery/gallery-1.jpg"><img src="<?php echo URLROOT;?>/images/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="<?php echo URLROOT;?>/images/gallery/gallery-2.jpg"><img src="<?php echo URLROOT;?>/images/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="<?php echo URLROOT;?>/images/gallery/gallery-3.jpg"><img src="<?php echo URLROOT;?>/images/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="<?php echo URLROOT;?>/images/gallery/gallery-4.jpg"><img src="<?php echo URLROOT;?>/images/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="<?php echo URLROOT;?>/images/gallery/gallery-5.jpg"><img src="<?php echo URLROOT;?>/images/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="<?php echo URLROOT;?>/images/gallery/gallery-6.jpg"><img src="<?php echo URLROOT;?>/images/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="<?php echo URLROOT;?>/images/gallery/gallery-7.jpg"><img src="<?php echo URLROOT;?>/images/gallery/gallery-7.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="<?php echo URLROOT;?>/images/gallery/gallery-8.jpg"><img src="<?php echo URLROOT;?>/images/gallery/gallery-8.jpg" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

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
  
  <?php require_once APPROOT . '/views/inc/user/footer.php' ?>

  