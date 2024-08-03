<?php require_once APPROOT . '/views/inc/user/header.php'; ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php'; ?>

<main class="main">
    <style>
        .btn-custom-small {
            padding: 0.2rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 0.2rem;
        }
        .cart-container {
            margin-top: 30px;
            font-size: 14px;
        }
        .table img {
            width: 50px;
            height: auto;
        }
        .table td, .table th {
            padding: 0.5rem;
        }
        .input-group .form-control {
            width: 60px;
        }
        .input-group-prepend, .input-group-append {
            padding: 0;
        }
        .input-group-text, .btn {
            padding: 0.25rem 0.5rem;
        }
        .total-row {
            font-weight: bold;
            text-align: right;
        }
        .summary {
            border: 1px solid #dee2e6;
            padding: 15px;
            margin-top: 30px;
            background-color: #f8f9fa;
            color: #000;
        }
        .summary.custom-bg {
            background-color: #e3e370;
            color: #fff;
        }
        .btn-yellow {
            background-color: #f3c300;
            border-color: #f3c300;
            color: #000;
        }
        .btn-yellow:hover {
            background-color: #afb61e;
            border-color: #e2b600;
        }
    </style>

    <div class="container cart-container">
    
        <div class="row">
            <div class="col-md-8">
                <h4>Your Cart</h4>
                <?php if (!empty($data['carts'])) : ?>
                    <table class="table table-sm table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>
                                    <a href="<?php echo URLROOT; ?>/cartController/deleteCart/<?php echo $_SESSION['user_id']; ?>" 
                                    class="badge-danger badge p-1" 
                                    style="color: red;" 
                                    onclick="return confirm('Are you sure you want to clear your cart?');">
                                    <i class="uil uil-trash-alt"></i>&nbsp;&nbsp;Clear Cart
                                    </a>
                                </tr>
                        </thead>
                        <tbody>
                            <?php
                            $totalAmount = 0;
                            $totalQty = 0;

                            foreach ($data['carts'] as $item) :
                                $totalAmount += $item['total_amount'];
                                $totalQty += $item['quantity']; // Sum the quantities
                            ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo URLROOT; ?>/public/food_images/<?php echo htmlspecialchars($item['image']); ?>" alt="food image">
                                    </td>
                                    <td><?php echo htmlspecialchars($item['menu_name']); ?></td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary btn-decrease btn-custom-small btn-add-to-cart" type="button" data-user-id="<?= $_SESSION['user_id'] ?>" data-item-id="<?= $item['menu_id'] ?>" data-price="<?= $item['sale_price'] ?>">-</button>
                                            </div>
                                            <input type="text" class="form-control text-center" value="<?php echo htmlspecialchars($item['quantity']); ?>" readonly>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary btn-increase" type="button" data-user-id="<?= $_SESSION['user_id'] ?>" data-item-id="<?= $item['menu_id'] ?>" data-price="<?= $item['sale_price'] ?>">+</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo htmlspecialchars($item['sale_price']); ?> MMK</td>
                                    <td><?php echo htmlspecialchars($item['total_amount']); ?> MMK</td>
                                    <td>
                                        <a href="<?php echo URLROOT; ?>/cartController/destroy/<?php echo htmlspecialchars($item['cart_id']); ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="uil uil-trash-alt"></i>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="2" class="total-row">Total Quantity</td>
                                <td class="total-row"><?php echo htmlspecialchars($totalQty); ?></td>
                            
                                <td colspan="1" class="total-row">Total Amount</td>
                                <td class="total-row"><?php echo htmlspecialchars($totalAmount); ?> MMK</td>
                            </tr>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Your cart is empty.</p>
                <?php endif; ?>
            </div>

            <div class="col-md-4">
                <div class="summary custom-bg">
                    <h2>Summary</h2>
                    <p><strong>ITEMS <?php echo count($data['carts']); ?></strong></p>
                    <?php if (empty($data['carts'])): ?>
                        <p>Your cart is empty.</p>
                    <?php else: ?>
                        <p>Total Price: <strong><?php echo htmlspecialchars($totalAmount); ?> MMK</strong></p>
                    <?php endif; ?>
                    <button type="button" class="btn btn-yellow mt-3" data-toggle="modal" data-target="#checkoutModal"><a href="<?php echo URLROOT;?>/cartController/payMent">CHECKOUT</a></button>
                    
                </div>
                <a href="<?php echo URLROOT; ?>/pages/menu" class="back-to-shop">&larr;<i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Back to Shopping</a>
            </div>
        </div>
    </div>
</main>

<?php require_once APPROOT . '/views/inc/user/footer.php'; ?>

<script>
    $(document).ready(function() {
        $('.btn-decrease').click(function() {
            var button = $(this);
            var input = button.closest('.input-group').find('input');
            var currentQuantity = parseInt(input.val());
            var menuId = button.data('item-id');
            var userId = button.data('user-id');
            var price = button.data('price');

            if (currentQuantity > 1) {
                $.ajax({
                    url: '<?php echo URLROOT; ?>/cartController/decreaseQuantity',
                    method: 'POST',
                    data: {
                        user_id: userId,
                        item_id: menuId,
                        price: price
                    },
                    success: function(response) {
                        input.val(currentQuantity - 1);
                        $('#cart-count').text(response);
                    },
                    error: function() {
                        alert('Error updating quantity.');
                    }
                });
            }
        });

        $('.btn-increase').click(function() {
            var button = $(this);
            var input = button.closest('.input-group').find('input');
            var currentQuantity = parseInt(input.val());
            var menuId = button.data('item-id');
            var userId = button.data('user-id');
            var price = button.data('price');

            $.ajax({
                url: '<?php echo URLROOT; ?>/cartController/increaseQuantity',
                method: 'POST',
                data: {
                    user_id: userId,
                    item_id: menuId,
                    price: price
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.canIncrease) {
                        input.val(currentQuantity + 1);
                    }
                    $('#cart-count').text(data.cartCount);

                    if (!data.canIncrease) {
                        button.prop('disabled', true);
                    }
                },
                error: function() {
                    alert('Error updating quantity.');
                }
            });
        });
    });
</script>
