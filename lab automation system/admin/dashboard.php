<?php
include "../code.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard - Lab Automation</title>
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
    <h1 class="text-4xl font-bold text-center mb-12 text-white drop-shadow-lg">
      Company Overview
    </h1>

    <div class="grid gap-10 grid-cols-1 sm:grid-cols-1 md:grid-cols-1 xl:grid-cols-2 max-w-7xl mx-auto">
      <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl shadow-lg p-6 text-center hover:scale-105 transition-transform duration-300">
        <h2 class="text-xl sm:text-lg font-semibold mb-2">Total Products</h2>
        <p class="text-4xl sm:text-3xl font-bold"><?= count($products) ?></p>
      </div>

      <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl shadow-lg p-6 text-center hover:scale-105 transition-transform duration-300">
        <h2 class="text-xl sm:text-lg font-semibold mb-2">Total Testers</h2>
        <p class="text-4xl sm:text-3xl font-bold"><?= count($testers) ?></p>
      </div>

      <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl shadow-lg p-6 text-center hover:scale-105 transition-transform duration-300">
  <h2 class="text-lg sm:text-base md:text-lg lg:text-xl font-semibold mb-2">
    Total Manufacturers
  </h2>
  <p class="text-3xl sm:text-2xl md:text-3xl lg:text-4xl font-bold">
    <?= count($manufacturers) ?>
  </p>
</div>

      <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl shadow-lg p-6 text-center hover:scale-105 transition-transform duration-300">
        <h2 class="text-xl sm:text-lg font-semibold mb-2">Approved Projects</h2>
        <p class="text-4xl sm:text-3xl font-bold"><?= $approved ?></p>
      </div>

      <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl shadow-lg p-6 text-center hover:scale-105 transition-transform duration-300">
        <h2 class="text-xl sm:text-lg font-semibold mb-2">Rejected Projects</h2>
        <p class="text-4xl sm:text-3xl font-bold"><?= $rejected ?></p>
      </div>

      <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl shadow-lg p-6 text-center hover:scale-105 transition-transform duration-300">
        <h2 class="text-xl sm:text-lg font-semibold mb-2">In-Process Projects</h2>
        <p class="text-4xl sm:text-3xl font-bold"><?= $inprocess ?></p>
      </div>

      <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl shadow-lg p-6 text-center hover:scale-105 transition-transform duration-300">
        <h2 class="text-xl sm:text-lg font-semibold mb-2">Fresh Projects</h2>
        <p class="text-4xl sm:text-3xl font-bold"><?= $fresh ?></p>
      </div>
    </div>
  </main>

  <footer class="relative z-10">
    <?php include "./footer.php"; ?>
  </footer>
</body>
</html>
