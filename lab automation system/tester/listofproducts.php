<?php
include 'header.php';
include '../connection.php';
?>
<script src="https://cdn.tailwindcss.com"></script>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
</style>
</head>

<body class="flex flex-col min-h-screen text-white relative">
  <!-- Background -->
  <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('../images/pexels-pavel-danilyuk-8438865.jpg');"></div>
  <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>

  <!-- Main Content -->
  <main class="relative z-20 flex-grow max-w-3xl w-full mx-auto px-4 pt-32 pb-16">
    <h2 class="text-center text-4xl font-bold mb-12 text-white drop-shadow">Pending Product Checks</h2>

    <div class="space-y-8">
      <?php
      if (isset($_SESSION['testerid'])) {
        $testerid = $_SESSION['testerid'];
        $select = mysqli_query($conn, "SELECT * FROM product WHERE status='inprocess' ORDER BY id DESC");
        $sno = 1;

        if (mysqli_num_rows($select) > 0) {
          while ($row = mysqli_fetch_assoc($select)) {
            $id = $row['id'];
            $product_id = $row['Product ID'];
            $name = $row['Product Name'];
            $category = $row['Category'];
            $fault = $row['details'];
      ?>
            <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 border border-white/20 shadow-md transition hover:scale-[1.01] duration-200">
              <div class="text-lg font-semibold mb-4">Product #<?= $sno ?></div>
              <div class="border-t border-white/30 pt-4 space-y-2 text-sm text-white/90">
                <p><span class="font-medium text-white">Product ID:</span> <?= htmlspecialchars($product_id) ?></p>
                <p><span class="font-medium text-white">Name:</span> <?= htmlspecialchars($name) ?></p>
                <p><span class="font-medium text-white">Category:</span> <?= htmlspecialchars($category) ?></p>
                <p><span class="font-medium text-white">Fault:</span> <?= htmlspecialchars($fault ?: "None") ?></p>
              </div>

              <div class="mt-6 flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
                <a href="../code.php?approve=<?= $id ?>" class="px-4 py-2 rounded-md border border-green-400 text-green-300 hover:bg-green-600/30 transition duration-150 text-center">Accept</a>
                <a href="./rejection.php?reject=<?= $id ?>" class="px-4 py-2 rounded-md border border-red-400 text-red-300 hover:bg-red-600/30 transition duration-150 text-center">Reject</a>
              </div>
            </div>
      <?php
            $sno++;
          }
        } else {
          echo '<p class="text-center text-lg text-white/80">No pending products found.</p>';
        }
      } else {
        echo '<p class="text-center text-lg text-white/80">No tester session found.</p>';
      }
      ?>
    </div>
  </main>

  <?php include './footer.php'; ?>
</body>
</html>
