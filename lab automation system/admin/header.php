<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include '../code.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel - Lab Automation</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
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
<body class="min-h-screen text-white relative">

  <div class="absolute inset-0 bg-black bg-opacity-50 -z-10"></div>

  <div class="fixed top-0 left-0 right-0 h-20 bg-white/10 backdrop-blur-md border-b border-white/10 z-50 flex items-center justify-between px-4 md:px-10">
    <h1 class="text-lg md:text-2xl font-bold tracking-wide flex items-center gap-2">
      <i class="fas fa-flask"></i> Lab Automation System - Admin Panel
    </h1>

    <div class="flex items-center gap-4">
      <div class="hidden md:flex items-center gap-4">
        <?php if (isset($_SESSION['admin'])): ?>
          <a href="../logout.php" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-full">Logout</a>
          <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-lg font-bold border border-white/30">
            <?= strtoupper(substr($_SESSION['admin'], 0, 1)) ?>
          </div>
        <?php else: ?>
          <a href="../login.php" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-full">
            <i class="fas fa-sign-in-alt mr-2"></i>Login
          </a>
        <?php endif; ?>
      </div>

      <button id="sidebarToggle" class="md:hidden text-white text-2xl">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </div>

  <nav id="sidebar" class="fixed top-20 left-0 h-[calc(100vh-5rem)] w-56 bg-white/10 backdrop-blur-md border-r border-white/10 z-40 flex-col justify-between py-6 transform -translate-x-full md:translate-x-0 md:flex transition-transform duration-300 ease-in-out">
    <div class="px-4">
      <h2 class="text-lg font-bold mb-6"><i class="fas fa-user-shield mr-2"></i>Admin Panel</h2>
      <ul class="space-y-4 text-sm">
        <li><a href="./dashboard.php" class="flex items-center gap-2 hover:text-blue-400"><i class="fas fa-chart-line"></i> Dashboard</a></li>
        <li><a href="./viewtesters.php" class="flex items-center gap-2 hover:text-blue-400"><i class="fas fa-vials"></i> Tester Details</a></li>
        <li><a href="./viewproducer.php" class="flex items-center gap-2 hover:text-blue-400"><i class="fas fa-industry"></i> Producer Details</a></li>
        <li><a href="./approvedproducts.php" class="flex items-center gap-2 hover:text-blue-400"><i class="fas fa-check-circle"></i> Approved Products</a></li>
        <li><a href="./freshproducts.php" class="flex items-center gap-2 hover:text-blue-400"><i class="fas fa-box-open"></i> Fresh Products</a></li>
        <li><a href="./rejectedproducts.php" class="flex items-center gap-2 hover:text-blue-400"><i class="fas fa-times-circle"></i> Rejected Products</a></li>
        <li><a href="./incprocessproducts.php" class="flex items-center gap-2 hover:text-blue-400"><i class="fas fa-spinner"></i> Inprocess Products</a></li>
      </ul>
    </div>

    <div class="mt-10 px-4 md:hidden">
      <?php if (isset($_SESSION['admin'])): ?>
        <div class="flex items-center justify-between">
          <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center font-bold border border-white/30">
            <?= strtoupper(substr($_SESSION['admin'], 0, 1)) ?>
          </div>
          <a href="../logout.php" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-full text-sm">Logout</a>
        </div>
      <?php else: ?>
        <a href="../login.php" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full block text-center mt-2">Login</a>
      <?php endif; ?>
    </div>
  </nav>

 

  <script>
    const toggleBtn = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
    });
  </script>
</body>
</html>
