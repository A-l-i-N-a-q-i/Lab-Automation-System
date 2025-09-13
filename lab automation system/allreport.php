<?php
include "./code.php";
include "header.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<main class="min-h-screen px-4 py-10 sm:px-6 lg:px-8 bg-transparent text-white">

  <h1 class="text-3xl sm:text-4xl font-bold text-center mb-10 drop-shadow-lg">
    Approved Product Report
  </h1>

  <div class="flex flex-col items-center gap-8">
    <?php
    if (!$conn) {
        echo "<p class='text-red-500'>Database connection failed: " . mysqli_connect_error() . "</p>";
    } else {
        $select = mysqli_query($conn, "SELECT * FROM product WHERE status = 'Approved'");

        if (!$select) {
            echo "<p class='text-red-400'>Query failed: " . mysqli_error($conn) . "</p>";
        } elseif (mysqli_num_rows($select) === 0) {
            echo "<p class='text-yellow-300 text-lg'>No approved products found.</p>";
        } else {
            while ($row = mysqli_fetch_assoc($select)) {
    ?>
    <div class="w-full max-w-2xl px-6 py-6 bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl shadow-md transition text-center space-y-4">
      <div class="space-y-1 text-sm sm:text-base">
        <div><span class="font-semibold text-white/90">Name:</span> <?= htmlspecialchars($row['Product Name']) ?></div>
        <div><span class="font-semibold text-white/90">Category:</span> <?= htmlspecialchars($row['Category']) ?></div>
        <div><span class="font-semibold text-white/90">Status:</span> <?= htmlspecialchars($row['status']) ?></div>
      </div>
      <a href="./report.php?proid=<?= $row['id'] ?>"
         class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full shadow transition w-full sm:w-auto">
        View Report
      </a>
    </div>
    <?php
            }
        }
    }
    ?>
  </div>

</main>

<?php include "footer.php"; ?>
