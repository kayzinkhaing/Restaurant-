<?php require_once APPROOT . '/views/inc/user/header.php'; ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php'; ?>

<style>
    .invoice {
        max-width: 800px;
        margin: 0 auto;
    }

    .invoice header {
        margin-bottom: 20px;
    }

    .invoice table {
        margin-top: 20px;
    }

    .invoice .btn-checkout {
        width: 100%;
        background-color: #007bff;
        border-color: #007bff;
    }

    .invoice .btn-checkout:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    /* Styles for the total-row class */
.total-row {
    font-size: 0.9em; /* Slightly larger font size for emphasis */
    font-weight: bold; /* Bold text */
    color: #333; /* Darker text color for better contrast */
    padding: 10px; /* Padding for better spacing */
    background-color: #f9f9f9; /* Light background color for distinction */
    border-top: 2px solid #ddd; /* Top border to separate from the rest */
}

/* Align text to the right */
.text-right {
    text-align: right;
}

/* Font weight bold for total amount */
.font-weight-bold {
    font-weight: bold;
    color: #000; /* Darker color for more emphasis */
}

/* Optional: Styling for the table itself */
table {
    width: 100%; /* Full width */
    border-collapse: collapse; /* Remove gaps between cells */
}

/* Styling table cells */
td {
    border: 1px solid #ddd; /* Light border for cells */
    padding: 8px; /* Padding inside cells */
}

</style>

<main class="main">
    <div class="container invoice">
        <header class="text-center mb-4">
            <h1>Your Order Cart</h1>
            <?php if (!empty($data['carts'])): ?>
                <?php $firstItem = $data['carts'][0]; ?>
                <p><strong>Name:</strong> <?php echo htmlspecialchars($firstItem['user_name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($firstItem['user_email']); ?></p>
            <?php else: ?>
                <p>No items in your cart.</p>
            <?php endif; ?>
        </header>

        <?php if (!empty($data['carts'])): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Menu Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price (MMK)</th>
                        <th scope="col">Total (MMK)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalAmount = 0;
                    $totalQty = 0;
                    $number = 1;
                    foreach ($data['carts'] as $item) :
                        $totalAmount += $item['total_amount'];
                        $totalQty += $item['quantity']; 
                    ?>
                        <tr>
                            <td><?php echo $number++; ?></td>
                            <td><?php echo htmlspecialchars($item['menu_name']); ?></td>
                            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($item['sale_price']); ?></td>
                            <td><?php echo htmlspecialchars($item['total_amount']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                    <td colspan="2" class="text-right total-row">Total Quantity</td>
                                <td class="total-row"><?php echo htmlspecialchars($totalQty); ?></td>
                            
                        <td colspan="1" class="text-right font-weight-bold">Total Amount</td>
                        <td class="font-weight-bold"><?php echo htmlspecialchars($totalAmount); ?> MMK</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php endif; ?>

        <div class="row justify-content-center mt-4">
    <div class="col-md-6">
        <form method="post" class="text-center" id="orderForm">
            <input type="hidden" name="carts" value='<?php echo json_encode($data['carts'], JSON_HEX_APOS | JSON_HEX_QUOT); ?>'>
            <input type="hidden" name="totalQty" value="<?php echo $totalQty ?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
            <input type="hidden" name="totalAmount" value="<?php echo $totalAmount ?>">
            <button type="submit" class="btn btn-primary btn-checkout">Order</button>
        </form>
    </div>
</div>
</main>

<?php require_once APPROOT . '/views/inc/user/footer.php'; ?>

<script>
    const orderForm = document.getElementById('orderForm');
    orderForm.addEventListener('submit', function (event) {
        event.preventDefault();
        
        // Create FormData object
        const formData = new FormData(orderForm);
        const formDataObj = {};
        formData.forEach((value, key) => (formDataObj[key] = value));
        
        // Send the form data via AJAX
        $.ajax({
            url: "http://localhost/restaurant/orderController/store",
            type: 'POST',
            data: formDataObj,
            success: function (response) {
                window.location.href = "<?= URLROOT ?>/pages/success";
            },
            error: function (xhr, status, error) {
                alert(error);
                console.error(xhr.responseText); // Log any errors
            }
        });
    });
</script>
