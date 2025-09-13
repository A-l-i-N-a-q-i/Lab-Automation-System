<?php include "../connection.php"; ?>
<?php include "../code.php"; ?>

<?php
$approved_products = [];
$query = "SELECT * FROM product WHERE status = 'Approved'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $approved_products[] = $row;
    }
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Approved Products - Lab Automation</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-image: url('../images/pexels-natri-792194.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>
</head>

<body class="flex flex-col text-white relative z-0">
  <div class="absolute inset-0 bg-black bg-opacity-50 z-0"></div>

  <?php include "./header.php"; ?>

  <main class="relative z-10 pt-24 pb-10 px-4 sm:px-6 lg:px-8 md:ml-56 flex">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-3xl font-extrabold mb-10 text-center text-white drop-shadow">Approved Products</h2>

      <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        <?php if (!empty($approved_products)): ?>
          <?php foreach ($approved_products as $product): ?>
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-5 shadow-md hover:scale-105 transition-transform duration-300">
              <h3 class="text-lg font-semibold mb-2"><?= htmlspecialchars($product['Product Name']) ?></h3>
              <p class="text-white/80 mb-1"><strong>ID:</strong> <?= htmlspecialchars($product['Product ID']) ?></p>
              <p class="text-white/80 mb-1"><strong>Category:</strong> <?= htmlspecialchars($product['Category']) ?></p>
              <p class="text-white/80 mb-1"><strong>Details:</strong> <?= htmlspecialchars($product['details']) ?></p>
              <p class="text-white/80 mb-1"><strong>Remarks:</strong> <?= htmlspecialchars($product['remarks']) ?></p>
              <p class="text-sm text-white/60"><strong>Date:</strong> <?= htmlspecialchars($product['Date']) ?></p>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-center text-gray-300 col-span-full">No approved products found.</p>
        <?php endif; ?>
      </div>
    </div>
  </main>

  <footer class="relative z-10 mt-auto">
    <?php include "./footer.php"; ?>
  </footer>
</body>
</html>
