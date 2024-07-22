
<?php require_once APPROOT . '/views/inc/user/header.php' ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php' ?>

<main class="main">

  <div class="container">
    <h1>Your Cart</h1>
    <?php if (!empty($data['carts'])) : ?>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $totalAmount = 0;
          foreach ($data['carts'] as $item) :
            //   $itemTotal = $item['price'] * $item['quantity'];
            $totalAmount += $item['total_amount'];
          ?>
            <tr>
              <td><?php echo htmlspecialchars($item['menu_name']); ?></td>
              <td><?php echo htmlspecialchars($item['description']); ?></td>
              <td><?php echo htmlspecialchars($item['quantity']); ?></td>
              <td><?php echo htmlspecialchars($item['sale_price']); ?> MMK</td>
              <td><?php echo htmlspecialchars($item['total_amount']); ?> MMK</td>
            </tr>
          <?php endforeach; ?>
          <tr>
            <td colspan="4" class="text-right"><strong>Total Amount</strong></td>
            <td><strong><?php echo htmlspecialchars($totalAmount); ?> MMK</strong></td>
          </tr>
        </tbody>
      </table>
    <?php else : ?>
      <p>Your cart is empty.</p>
    <?php endif; ?>
  </div>





</main>

<?php require_once APPROOT . '/views/inc/user/footer.php' ?>

  