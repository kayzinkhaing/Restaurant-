<?php require_once APPROOT . '/views/inc/user/header.php'; ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php'; ?>

<style>
    html, body {
        height: 100%;
        margin: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        font-family: Arial, sans-serif;
        background-color: #f3f4f6;
    }

    main.main {
        flex: 1;
        padding: 20px 0;
    }

    .invoice {
        max-width: 800px;
        margin: 0 auto;
    }

    .invoice header {
        margin-bottom: 20px;
    }

    .invoice table {
        margin-top: 20px;
        width: 100%;
        border-collapse: collapse;
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

    .total-row {
        font-size: 0.9em;
        font-weight: bold;
        color: #333;
        padding: 10px;
        background-color: #f9f9f9;
        border-top: 2px solid #ddd;
    }

    .text-right {
        text-align: right;
    }

    .font-weight-bold {
        font-weight: bold;
        color: #000;
    }

    td {
        border: 1px solid #ddd;
        padding: 8px;
    }
</style>

<main class="main">
    <div class="container invoice">
        <header class="text-center mb-4">
            <h1>Your Order Cart</h1>
            <?php if (!empty($data['carts'])): 
                $firstItem = $data['carts'][0]; ?>
                <p><strong>Name:</strong> <?= htmlspecialchars($firstItem['user_name']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($firstItem['user_email']) ?></p>
            <?php else: ?>
                <p>No items in your cart.</p>
            <?php endif; ?>
        </header>

        <?php if (!empty($data['carts'])): ?>
            <?php
                $totalAmount = 0;
                $totalQty = 0;
                $number = 1;
            ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Menu Name</th>
                            <th>Quantity</th>
                            <th>Price (MMK)</th>
                            <th>Total (MMK)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['carts'] as $item): 
                            $totalAmount += $item['total_amount'];
                            $totalQty += $item['quantity'];
                        ?>
                            <tr>
                                <td><?= $number++ ?></td>
                                <td><?= htmlspecialchars($item['menu_name']) ?></td>
                                <td><?= htmlspecialchars($item['quantity']) ?></td>
                                <td><?= htmlspecialchars($item['sale_price']) ?></td>
                                <td><?= htmlspecialchars($item['total_amount']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2" class="text-right total-row">Total Quantity</td>
                            <td class="total-row"><?= htmlspecialchars($totalQty) ?></td>
                            <td class="text-right font-weight-bold">Total Amount</td>
                            <td class="font-weight-bold"><?= htmlspecialchars($totalAmount) ?> MMK</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row justify-content-center mt-4">
                <div class="col-md-6">
                    <form method="post" class="text-center" id="orderForm">
                        <input type="hidden" name="carts" value='<?= json_encode($data['carts'], JSON_HEX_APOS | JSON_HEX_QUOT) ?>'>
                        <input type="hidden" name="totalQty" value="<?= $totalQty ?>">
                        <input type="hidden" name="user_id" value="<?= htmlspecialchars($_SESSION['user_id'], ENT_QUOTES, 'UTF-8') ?>">
                        <input type="hidden" name="totalAmount" value="<?= $totalAmount ?>">
                        <button type="submit" class="btn btn-primary btn-checkout">Order</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require_once APPROOT . '/views/inc/user/footer.php'; ?>

<script>
document.getElementById('orderForm').addEventListener('submit', function (event) {
    event.preventDefault();

    const form = this;
    const formData = new FormData(form);

    const formDataObj = {};
    formData.forEach((value, key) => {
        formDataObj[key] = value;
    });

    $.ajax({
        url: "http://localhost/restaurant/orderController/store",
        method: 'POST',
        data: formDataObj,
        success: function (response) {
            window.location.href = "<?= URLROOT ?>/orderController/success";
        },
        error: function (xhr, status, error) {
            alert("Failed to place order: " + error);
            console.error(xhr.responseText);
        }
    });
});
</script>
