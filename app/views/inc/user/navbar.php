<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

  <header id="header" class="header d-flex align-items-center sticky-top" style="background-color: white;">
  <script src="<?php echo URLROOT; ?>/js/admin/jquery.min.js"></script>
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0" style="text-decoration: none;">
        <h1 class="sitename">Yummy</h1>
        <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <input id="userId" type="hidden" value="<?= $_SESSION['user_id'] ?? 0?>"/>
          <li><a href="<?php echo URLROOT;?>/pages/home" style="text-decoration: none;">Home<br></a></li>
          <li><a href="<?php echo URLROOT;?>/pages/menu" style="text-decoration: none;">Menu</a></li>
          <li><a href="<?php echo URLROOT;?>/pages/about" style="text-decoration: none;">About us</a></li>
          <li><a href="<?php echo URLROOT;?>/pages/contact" style="text-decoration: none;">Contact Us</a></li>
          <li>
            <div class="icons">
                  <a href="<?php echo URLROOT; ?>/cartController/index" style="text-decoration: none; position: relative;">
                      <i class="uil uil-shopping-cart-alt"></i>
                      <span id="cart-count" class="cart-count">0</span>
                  </a>
              <a href="#" style="text-decoration: none;"><i class="fas fa-search"></i></a>

            </div>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      
            <?php if (isset($_SESSION['user_id'])): ?>
                <a class="btn-getstarted" href="<?php echo URLROOT; ?>/auth/logout">Logout</a>
                
            
            <?php else: ?>
                <a class="btn-getstarted" href="<?php echo URLROOT; ?>/auth/login">Login</a>
            <?php endif; ?>
    </div>
  </header>
</body>
</html>
<style>.cart-count {
    color: red; /* Sets the color of the text to red */
}
</style>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var cartCount = document.getElementById('cart-count');
    if (cartCount.textContent === '0') {
        cartCount.style.color = 'red';
    }
});

</script>
<script type="text/javascript">
  $(document).ready(function() { 
    const cartCountElement = document.getElementById('cart-count');
    const userId = $('#userId').val();
    var form_url = '<?php echo URLROOT; ?>/cartController/getCartCount';
    $.ajax({
        url: form_url,
        type: 'GET',
        data: { user_id: userId },
        success: function(response) { 
          cartCountElement.textContent = response;
        },
        error: function(xhr, status, error) {
          console.error('Error fetching cart count:', status, error);
        }
      });

  });

</script>