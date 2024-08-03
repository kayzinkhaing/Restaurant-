<?php require_once APPROOT . '/views/inc/user/header.php'; ?>
<?php require_once APPROOT . '/views/inc/user/navbar.php'; ?>


  <style>
    body {
    background-color: #f8f9fa;
}

.card {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card .checkmark {
    font-size: 50px;
    color: #28a745;
}

.card h1 {
    font-size: 24px;
    margin: 20px 0;
}

.card p {
    font-size: 16px;
    color: #555;
}

  </style>
  <main>
    <div class="card">
      <div>
        <i class="checkmark">✓</i>
      </div>
      <h1>Success</h1>
      <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
    </div>
  </main>

<?php require_once APPROOT . '/views/inc/user/footer.php'; ?>
