<?php
include "../code.php";  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Products - Lab Automation</title>
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

<body class="flex flex-col min-h-screen text-white relative z-0">
  <div class="absolute inset-0 bg-black bg-opacity-50 z-0"></div>

  <?php include "./header.php"; ?>

  <main class="flex-grow relative z-10 pt-32 pb-16 px-4 sm:px-6 lg:px-8 sm:ml-56">
    <h1 class="text-3xl font-extrabold mb-10 text-center text-white drop-shadow">Product Catalog</h1>

    <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 max-w-7xl mx-auto">
      <?php foreach ($products as $p): ?>
        <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl shadow-lg p-6 hover:scale-105 transition-transform duration-300">
          <h2 class="text-xl sm:text-lg font-bold mb-3 text-white"><?= htmlspecialchars($p['name']) ?></h2>
          <p class="text-white/80 mb-2 text-sm sm:text-base"><?= htmlspecialchars($p['description']) ?></p>
          <p class="text-sm text-white/60">Category: <?= htmlspecialchars($p['category']) ?></p>
          <p class="text-sm text-white/60">Date: <?= htmlspecialchars($p['date']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </main>

  <?php include "./footer.php"; ?>
</body>
</html>
