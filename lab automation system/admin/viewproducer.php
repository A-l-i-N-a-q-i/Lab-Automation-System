<?php include "../code.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Manufacturers - Lab Automation</title>
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
    <h2 class="text-3xl font-extrabold mb-10 text-center text-white drop-shadow">Registered Manufacturers</h2>

    <div class="grid gap-6 grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 max-w-6xl mx-auto">
      <?php foreach ($manufacturers as $m): ?>
        <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl p-5 shadow-md hover:scale-105 transition-transform duration-300">
          <h3 class="text-lg font-semibold text-white"><?= htmlspecialchars($m['name']) ?></h3>
          <p class="text-white/80">Email: <?= htmlspecialchars($m['email']) ?></p>
          <p class="text-sm text-white/60">Role: <?= htmlspecialchars($m['role']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </main>

  <?php include "./footer.php"; ?>

</body>
</html>
