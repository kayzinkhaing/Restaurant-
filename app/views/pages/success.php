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
        display: flex;
        align-items: center;
        justify-content: center;
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

    .card {
        background: white;
        padding: 60px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .checkmark-container {
        border-radius: 200px;
        height: 200px;
        width: 200px;
        background: #F8FAF5;
        margin: 0 auto 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .checkmark {
        font-size: 100px;
        color: #9abc66;
    }
</style>

<main class="main">
    <div class="container invoice">
        <div class="card">
            <div class="checkmark-container">
                <i class="checkmark">✓</i>
            </div>
            <h1>Success</h1>
            <p>We received your purchase request;<br>we'll be in touch shortly!</p>
        </div>
    </div>
</main>

<?php require_once APPROOT . '/views/inc/user/footer.php'; ?>
