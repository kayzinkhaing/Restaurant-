          
          
<?php $database = new Database(); ?>
          <?php $menus = $database->readAll('view_menu') ?>
          
          <div class="row">
                  <?php foreach($menus as $menu){ ?>
                      <div class="col-md-3">
                          <div class="card mb-4 custom-card">
                              <img src="<?php echo URLROOT; ?>/public/food_images/<?php echo $menu['imagefile'] ?>" class="card-img-top custom-img" alt="Food Image">
                              <div class="card-body">
                                  <h5 class="card-title"><?php echo $menu['name'] ?></h5>
                                  <p class="card-text custom-text"><?php echo $menu['price'] ?></p>
                              </div>
                          </div>
                      </div>
                  <?php } ?>
              </div>