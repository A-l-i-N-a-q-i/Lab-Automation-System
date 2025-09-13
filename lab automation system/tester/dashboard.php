<?php
session_start();
include "../connection.php";

if (!isset($_SESSION['tester'])) {
  echo "<script>alert('Access Denied'); window.location.href='../login.php';</script>";
  exit;
}

$testerName = $_SESSION['tester'];

$productCount = 0;
$statusCounts = [
  'Approved' => 0,
  'inprocess' => 0,
  'Fresh' => 0,
  'Rejected' => 0
];

if ($result = $conn->query("SELECT COUNT(*) as total FROM product")) {
  $row = $result->fetch_assoc();
  $productCount = (int)$row['total'];
}

if ($result = $conn->query("SELECT status, COUNT(*) as total FROM product GROUP BY status")) {
  while ($row = $result->fetch_assoc()) {
    $status = trim($row['status']);
    if (isset($statusCounts[$status])) {
      $statusCounts[$status] = (int)$row['total'];
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tester Dashboard - Lab Automation</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-image: url('../images/pexels-pavel-danilyuk-8438865.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>
</head>
<body class="relative text-white min-h-screen">
  <div class="absolute inset-0 bg-black bg-opacity-60 z-0"></div>

  <?php include "./header.php"; ?>

  <main class="relative z-10 px-4 py-20 max-w-7xl mx-auto flex flex-col items-center text-center">
    <h1 class="text-3xl sm:text-4xl font-bold drop-shadow-lg mb-10">
      Welcome, <?= htmlspecialchars($testerName) ?>
    </h1>

    <div class="w-full max-w-md mb-10">
      <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl shadow-lg p-6 min-h-[200px] flex flex-col justify-center hover:scale-105 transition-transform duration-300">
        <h2 class="text-xl font-semibold mb-2">Total Products Tested</h2>
        <p class="text-4xl font-bold"><?= $productCount ?></p>
      </div>
    </div>

    <div class="w-full max-w-6xl">
      <h2 class="text-2xl font-semibold mb-6">Status Overview</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($statusCounts as $status => $count): ?>
          <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-xl shadow-lg p-5 min-h-[180px] flex flex-col justify-center text-center hover:scale-105 transition-transform duration-300">
            <h3 class="text-lg font-semibold mb-2"><?= ucfirst($status) ?></h3>
            <p class="text-3xl font-bold"><?= $count ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main>

  <?php include "./footer.php"; ?>
</body>
</html>
