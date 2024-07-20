<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Yummy</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 
</head>
<body class="starter-page-page">
  <header id="header" class="header d-flex align-items-center sticky-top" style="background-color: white;">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0" style="text-decoration: none;">
        <h1 class="sitename">Yummy</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo URLROOT;?>/pages/home" style="text-decoration: none;">Home<br></a></li>
          <li><a href="<?php echo URLROOT;?>/pages/menu" style="text-decoration: none;">Menu</a></li>
          <li><a href="<?php echo URLROOT;?>/pages/about" style="text-decoration: none;">About us</a></li>
          <li><a href="<?php echo URLROOT;?>/pages/contact" style="text-decoration: none;">Contact Us</a></li>
          <li>
            <div class="icons">
                  <a href="<?php echo URLROOT; ?>/cartController/index" style="text-decoration: none; position: relative;">
                      <i class="fas fa-shopping-cart"></i>
                      <span id="cart-count" class="cart-count">0</span>
                  </a>
              <a href="#" style="text-decoration: none;"><i class="fas fa-search"></i></a>

            </div>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="header-buttons">
            <?php if (isset($_SESSION['user_id'])): ?>
                <a class="nav-link" href="<?php echo URLROOT; ?>/auth/logout">Logout</a>
                <li class="nav-item">
            </li>
            <?php else: ?>
                <a class="btn" href="<?php echo URLROOT; ?>/auth/login">Login</a>
            <?php endif; ?>
      </div>          
    </div>
  </header>
</body>
</html>