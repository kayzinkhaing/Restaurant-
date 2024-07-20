
<?php require_once APPROOT . '/views/inc/user/header.php' ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php' ?>


<main class="main">


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
      <a href="#" class="btn-add-to-cart"><i class="fas fa-plus"></i></a>
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




<!-- Gallery Section -->
<section id="gallery" class="gallery section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Gallery</h2>
    <p><span>Check</span> <span class="description-title">Our Gallery</span></p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
      <?php
      // Define gallery images array (replace with actual fetching logic)
      $galleryImages = array(
        'gallery-1.jpg',
        'gallery-2.jpg',
        'gallery-2.jpg',
        'gallery-3.jpg',
        'gallery-4.jpg',
        'gallery-5.jpg',
        'gallery-6.jpg',
        'gallery-7.jpg',
        'gallery-7.jpg',
        'gallery-7.jpg',
        'gallery-7.jpg',
        'gallery-8.jpg'
      );

      // Loop through each gallery image
      foreach ($galleryImages as $image):
      ?>
        <div class="col-md-2">
          <a class="glightbox" data-gallery="images-gallery" href="<?php echo URLROOT; ?>/public/images/gallery/<?php echo $image; ?>">
            <img src="<?php echo URLROOT; ?>/public/images/gallery/<?php echo $image; ?>" class="img-fluid" alt="">
          </a>
        </div>
        
      <?php endforeach; ?>
      <div class="swiper-pagination"></div>
    </div>
  </div>

</section><!-- /Gallery Section -->


<!-- JavaScript for Gallery Navigation -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const galleryContainer = document.querySelector('.gallery-container');
  const galleryImages = document.querySelector('.gallery-images');

  let scrollAmount = 0;

  // Left arrow key
  document.addEventListener('keydown', function(event) {
    if (event.key === 'ArrowLeft') {
      scrollAmount = Math.max(scrollAmount - 300, 0);
      galleryContainer.scrollTo({
        top: 0,
        left: scrollAmount,
        behavior: 'smooth'
      });
    }
  });

  // Right arrow key
  document.addEventListener('keydown', function(event) {
    if (event.key === 'ArrowRight') {
      scrollAmount = Math.min(scrollAmount + 300, galleryImages.scrollWidth - galleryContainer.clientWidth);
      galleryContainer.scrollTo({
        top: 0,
        left: scrollAmount,
        behavior: 'smooth'
      });
    }
  });
});
</script>



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
            <h4>Corporis voluptates officia eiusmod</h4>
            <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
          </div>
        </div><!-- End Icon Box -->

        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
          <div class="icon-box d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-gem"></i>
            <h4>Ullamco laboris ladore lore pan</h4>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
          </div>
        </div><!-- End Icon Box -->

        <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
          <div class="icon-box d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-inboxes"></i>
            <h4>Labore consequatur incidid dolore</h4>
            <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
          </div>
        </div><!-- End Icon Box -->

      </div>
    </div>

  </div>

</div>

</section><!-- /Why Us Section -->

  </main>
  
  <?php require_once APPROOT . '/views/inc/user/footer.php' ?>

  