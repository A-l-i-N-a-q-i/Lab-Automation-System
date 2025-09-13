<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tester Panel - Lab Automation System</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="min-h-screen bg-cover bg-center text-white relative" style="background-image: url('../images/pexels-pavel-danilyuk-8438865.jpg');">

  <div class="absolute inset-0 bg-black bg-opacity-50 -z-10"></div>

  <header class="fixed top-0 left-0 w-full z-50 bg-white/10 backdrop-blur-md shadow border-b border-white/10">
    <div class="flex items-center justify-between px-6 py-4">
      <div class="text-lg font-bold">Lab Automation - Tester Panel</div>

      <nav class="hidden md:flex gap-6 text-sm font-medium">
        <a href="./dashboard.php" class="hover:text-blue-400 transition">Dashboard</a>
        <a href="./listofproducts.php" class="hover:text-blue-400 transition">Products Inspection

        </a>
 
      </nav>

      <div class="flex items-center gap-4">
        <?php if (isset($_SESSION['tester'])): ?>
          <a href="../logout.php" class="hidden md:inline-block bg-red-500 hover:bg-red-700 px-4 py-1.5 rounded-full text-sm font-semibold">Logout</a>
          <div class="hidden md:flex w-9 h-9 rounded-full bg-white/20 border border-white/30 items-center justify-center font-bold uppercase">
            <?= strtoupper(substr($_SESSION['tester'], 0, 1)) ?>
          </div>
        <?php else: ?>
          <a href="../login.php" class="hidden md:inline-block bg-blue-500 hover:bg-blue-700 px-4 py-1.5 rounded-full text-sm font-semibold">Login</a>
        <?php endif; ?>

        <button id="menuToggle" class="text-white text-2xl md:hidden focus:outline-none">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>

    <div id="mobileMenu" class="hidden md:hidden flex flex-col gap-3 px-6 pb-4 text-sm">
      <nav class="flex flex-col gap-3">
        <a href="./dashboard.php" class="hover:text-blue-400">Dashboard</a>
        <a href="./listofproducts.php" class="hover:text-blue-400">Products</a>
    
      </nav>

      <div class="mt-4 flex items-center gap-4">
        <?php if (isset($_SESSION['tester'])): ?>
          <a href="../logout.php" class="bg-red-500 hover:bg-red-700 px-4 py-1.5 rounded-full text-sm font-semibold">Logout</a>
          <div class="w-9 h-9 rounded-full bg-white/20 border border-white/30 flex items-center justify-center font-bold uppercase">
            <?= strtoupper(substr($_SESSION['tester'], 0, 1)) ?>
          </div>
        <?php else: ?>
          <a href="../login.php" class="bg-blue-500 hover:bg-blue-700 px-4 py-1.5 rounded-full text-sm font-semibold">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <div class="h-20"></div>

  <script>
    document.getElementById('menuToggle').addEventListener('click', () => {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('hidden');
    });
  </script>
</body>
</html>
 