<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lab Automation System</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    .dropdown-transition {
      transition: max-height 0.4s ease, opacity 0.3s ease;
      overflow: hidden;
    }
  </style>
</head>

<!-- ✅ FLEX LAYOUT for Sticky Footer -->
<body class="flex flex-col min-h-screen bg-cover bg-center text-white font-sans" style="background-image: url('./images/pexels-pixabay-209251.jpg');">
  <!-- Background overlay -->
  <div class="absolute inset-0 bg-black bg-opacity-40 -z-10"></div>

  <!-- Header content -->
  <header class="fixed top-5 left-1/2 transform -translate-x-1/2 w-[90%] max-w-[1600px] xl:max-w-[1800px] 2xl:max-w-[2000px] z-50">
    <div class="bg-white/5 backdrop-blur-md border border-white/10 shadow-lg rounded-full px-6 py-3 flex justify-between items-center">
      <div class="text-lg font-bold">Lab Automation</div>

      <nav class="hidden md:flex gap-6 font-medium text-sm sm:text-xs">
        <a href="index.php" class="hover:text-blue-400 transition">Home</a>
        <?php if (isset($_SESSION['user'])): ?>
          <a href="fault-product.php" class="hover:text-blue-400 transition">Add Product</a>
          <a href="productdetails.php" class="hover:text-blue-400 transition">View Product</a>
          <a href="remanufacter.php" class="hover:text-blue-400 transition">Remanufacter</a>
          <a href="allreport.php" class="hover:text-blue-400 transition">Report</a>
          <a href="logout.php" class="hover:text-blue-400 transition">Logout</a>
        <?php else: ?>
          <a href="login.php" class="hover:text-blue-400 transition">Login</a>
          <a href="signup.php" class="hover:text-blue-400 transition">Signup</a>
        <?php endif; ?>
      </nav>

      <div class="flex items-center gap-4">
        <?php if (isset($_SESSION['user'])): ?>
        <div class="w-9 h-9 bg-white/10 rounded-full flex items-center justify-center text-sm font-bold uppercase border border-white/10">
          <?= strtoupper(substr($_SESSION['user'], 0, 1)) ?>
        </div>
        <?php endif; ?>
        <button id="menuToggle" class="text-white text-xl md:hidden focus:outline-none">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>

    <div id="mobileMenu" class="dropdown-transition max-h-0 opacity-0 bg-white/10 backdrop-blur-md rounded-xl shadow-md mt-2 overflow-hidden md:hidden">
      <nav class="flex flex-col gap-3 px-6 py-4 text-sm sm:text-xs font-medium border border-white/10 rounded-xl">
        <a href="index.php" class="hover:text-blue-400 transition">Home</a>
        <?php if (isset($_SESSION['user'])): ?>
          <a href="fault-product.php" class="hover:text-blue-400 transition">Add Product</a>
          <a href="productdetails.php" class="hover:text-blue-400 transition">View Product</a>
          <a href="remanufacter.php" class="hover:text-blue-400 transition">Remanufacter</a>
          <a href="allreport.php" class="hover:text-blue-400 transition">Report</a>
          <a href="logout.php" class="hover:text-blue-400 transition">Logout</a>
        <?php else: ?>
          <a href="login.php" class="hover:text-blue-400 transition">Login</a>
          <a href="signup.php" class="hover:text-blue-400 transition">Signup</a>
        <?php endif; ?>
      </nav>
    </div>
  </header>

  <!-- To avoid overlap with fixed header -->
  <div class="h-[110px] print:hidden"></div>

  <!-- ✅ DO NOT CLOSE <body> OR <html> HERE -->
  <!-- Content continues in the page, then footer.php closes it -->

  <script>
    const toggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    let isOpen = false;

    toggle.addEventListener('click', () => {
      isOpen = !isOpen;
      if (isOpen) {
        mobileMenu.classList.remove('max-h-0', 'opacity-0');
        mobileMenu.classList.add('max-h-[500px]', 'opacity-100');
      } else {
        mobileMenu.classList.add('max-h-0', 'opacity-0');
        mobileMenu.classList.remove('max-h-[500px]', 'opacity-100');
      }
    });
  </script>
