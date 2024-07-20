<?php require_once APPROOT . '/views/inc/user/header.php'; ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php'; ?>
<?php $database = new Database(); ?>
<?php $categories = $database->readAll("category"); ?>
<main class="main">
  <section id="menu" class="">
    <!-- Section Title -->
    <div class="container section-title " data-aos="fade-up">
    <h1><b>Welcome To My Restaurant</b></h1>
    <div class="d-flex align-items-center">
    <div class="container section-title" data-aos="fade-up">
        <div class="d-flex align-items-center">
            <!-- <button class="btn custom-btn mr-2"><h2><a href="<?php echo URLROOT;?>/pages/menu">All Menus</a></h2></button> -->
            <select class="btn custom-btn mr-2" id="category_id">
                <option>Choose our menus</option>
                <option value="0">All menus</option>
                                 <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>">
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
            </select>
        </div>
    </div>
            <style>
                    .custom-btn {
            background-color: #ffcc00; /* Replace with your desired background color */
            color: #000; /* Text color for the button */
            border: none; /* Remove default border */
        }

        .custom-select {
            background-color: #ffcc00; /* Replace with your desired background color */
            color: #000; /* Text color for the select */
            border: none; /* Remove default border */
            padding: 0.375rem 1.75rem; /* Adjust padding to match button size */
            height: calc(1.5em + 0.75rem + 2px); /* Adjust height to match button size */
        }

        .custom-input {
            margin-left: 10px; /* Add space between select and input */
        }
        .btn-add-to-cart {
    background-color: transparent;
    border: none; /* Optional: If you also want to remove the border */
    color: #000;  /* Set the text color */
    cursor: pointer; /* Add a pointer cursor on hover */
    padding: 0; /* Optional: Adjust padding as needed */
}

.btn-add-to-cart:hover {
    background-color: rgba(0, 0, 0, 0.1); /* Optional: Add hover effect */
}
            </style>
    </div>
</div>  
</div>
</div>

</style>
<!-- End Section Title -->
    <div class="container">
      <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
        <div class="tab-pane fade active show" id="menu-starters">
          <div class="row">
            <?php 
               // Initialize the database object and read all menu items
               $database = new Database(); 
               $menus = $database->readAll('view_menu'); 
              if (!empty($menus)): ?>
              <div id="allmenu" class="row">
                  <?php foreach ($menus as $menu): ?>
                <div class="col-md-3">
                  <div class="card mb-4 shadow-sm border-0" style="background-color: white;">
                    <img class="card-img-top" src="<?php echo URLROOT; ?>/public/food_images/<?php echo htmlspecialchars($menu['image']); ?>" alt="Food Image" style="height: 300px; width: 300px;">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-8">
                          <h5 class="card-title"><?php echo htmlspecialchars($menu['name']); ?></h5>
                          <h5 class="card-title"><?php echo htmlspecialchars($menu['description']); ?></h5>
                          <p class="card-text"><?php echo htmlspecialchars($menu['price']) . " MMK"; ?></p>
                        </div>
                        <div class="col-4 text-right">
                              <button class="btn btn-primary btn-add-to-cart">
                                  <i class="fas fa-cart-plus"></i>
                              </button>
                </div>


                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
              </div>
            <?php else: ?>
              <p>No menu items available.</p>
            <?php endif; ?>
            <div id="name" class="row"></div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- /Menu Section -->
</main>
<?php require_once APPROOT . '/views/inc/user/footer.php'; ?>
<script type="text/javascript">

$(document).ready(function(){

    $('#category_id').on('change', function(){
      $('#allmenu').hide();
        var categoryId = $(this).val();
        //alert(categoryId);  // This line is just for debugging, you can remove it later.
        var form_url = '<?php echo URLROOT; ?>/menuController/menu';

        $.ajax({
            url: form_url,
            type: 'GET',
            data: { category_id: categoryId },  // Pass category_id directly
            success: function(response) {
             
              if (response.length > 0) {
                  $('#name').empty();
                    $.each(response, function(index, menu) {
                     
                        var menuItem = `
                            <div class="col-md-3">
                                <div class="card mb-4 shadow-sm border-0">
                                    <img class="card-img-top" src="<?php echo URLROOT; ?>/public/food_images/${menu.image}" alt="${menu.name}" style="height: 300px; width: 300px;">
                                    <div class="card-body">
                                    <div class="row">
                                       <div class="col-8">
                                            <h5 class="card-title">${menu.name}</h5>
                                            <p class="card-text">${menu.description}</p>
                                            <p class="card-text">${menu.price} MMK</p>
                                       </div>
                                         <div class="col-4 text-right">
                              <button class="btn btn-primary btn-add-to-cart">
                                  <i class="fas fa-cart-plus"></i>
                              </button>
                               </div>

                                    </div>
                                    </div>`;
                        $('#name').append(menuItem);
                    });
                } 
            }
        });
    });
});


document.addEventListener('DOMContentLoaded', () => {
    let cartCount = 0;
    const cartCountElement = document.getElementById('cart-count');
    const addToCartButtons = document.querySelectorAll('.btn-add-to-cart');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            var form_url = '<?php echo URLROOT; ?>/menuController/menu';

            $.ajax({
                url: form_url,
                type: 'GET',
                data: { category_id: categoryId },  // Pass category_id directly
                success: function(response) {
                
                 
                }
            });
            //cartCountElement.textContent = cartCount;
        });
    });
});


</script>

