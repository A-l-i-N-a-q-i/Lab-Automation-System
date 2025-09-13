<?php
session_start();
include "connection.php";
include "header.php";

$sql = "SELECT id, `Product ID`, `Product Name` AS product_name, Category AS category, details AS fault, date 
        FROM product WHERE status='Fresh'";
$result = $conn->query($sql);
$products = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "Query failed: " . $conn->error;
}
$conn->close();
?>

<main class="flex-grow">
  <div class="flex justify-center px-4 py-12">
    <div class="w-full max-w-7xl bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 shadow p-6 overflow-x-auto">

      <h2 class="text-2xl sm:text-3xl font-bold text-white text-center mb-8">Product Table</h2>

      <form action="./searchproduct.php" class="mb-4">
        <div class="flex justify-end gap-2">
          <input name="search" type="text" placeholder="Search"
            class="w-44 px-3 py-1.5 text-sm rounded-md bg-white/20 text-white placeholder-gray-300 border border-white/30 focus:outline-none focus:ring-2 focus:ring-blue-500" />
          <button type="submit" name="s-btn"
            class="text-sm bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-1.5 rounded-md shadow">
            Search
          </button>
        </div>
      </form>

      <table class="min-w-full text-sm text-white border-separate border-spacing-y-2">
        <thead class="sticky top-0 bg-white/10 backdrop-blur-sm">
          <tr class="text-xs uppercase tracking-wider text-gray-300">
            <th class="py-3 px-4 text-left rounded-l-lg">ID</th>
            <th class="py-3 px-4 text-left">Product Name</th>
            <th class="py-3 px-4 text-left">Category</th>
            <th class="py-3 px-4 text-left">Details</th>
            <th class="py-3 px-4 text-left">Date</th>
            <th class="py-3 px-4 text-left rounded-r-lg">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (isset($_SESSION['user'])): ?>
            <?php foreach ($products as $product): ?>
              <tr class="bg-white/5 hover:bg-white/10 border border-white/10 rounded shadow">
                <td class="py-3 px-4 rounded-l-lg"><?= htmlspecialchars($product['Product ID']) ?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($product['product_name']) ?></td>
                <td class="py-3 px-4"><?= htmlspecialchars($product['category']) ?></td>
                <td class="py-3 px-4 whitespace-pre-line"><?= htmlspecialchars($product['fault']) ?></td>
                <td class="py-3 px-4"><?= date('Y-m-d H:i', strtotime($product['date'])) ?></td>
                <td class="py-3 px-4 text-right rounded-r-lg">
                  <a href="code.php?proid=<?= $product['id'] ?>"
                    class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-1.5 rounded-full text-sm font-semibold shadow">
                    Send
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="text-center py-6 text-red-400 font-semibold">
                Please login to view product details.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

    </div>
  </div>
</main>

<?php include "footer.php"; ?>
