<?php
session_start();
include "connection.php";
include "header.php";

$sql = "SELECT id,`Product ID`, `Product Name` AS product_name, Category AS category, remarks AS fault, date 
        FROM product WHERE status='Rejected'";
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

<div class="relative z-10 flex items-center justify-center px-4 py-12">
  <div class="w-full max-w-7xl bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 shadow-[0_8px_24px_rgba(0,0,0,0.4)] p-4 sm:p-6">

    <h2 class="text-2xl sm:text-3xl font-bold text-white text-center mb-6">Rejected Products</h2>

    <div class="overflow-x-auto">
      <table class="w-full text-sm text-white border-separate border-spacing-y-3">
        <thead class="bg-white/10 backdrop-blur-sm text-xs uppercase tracking-wider text-gray-300">
          <tr>
            <th class="py-3 px-4 text-left">ID</th>
            <th class="py-3 px-4 text-left">Product Name</th>
            <th class="py-3 px-4 text-left">Category</th>
            <th class="py-3 px-4 text-left">Fault</th>
            <th class="py-3 px-4 text-left">Date</th>
            <th class="py-3 px-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (isset($_SESSION['user'])): ?>
            <?php foreach ($products as $product): ?>
              <tr class="bg-white/5 hover:bg-white/10 border border-white/10 transition duration-150 rounded-md">
                <td class="py-2 px-4 font-semibold"><?= htmlspecialchars($product['Product ID']) ?></td>
                <td class="py-2 px-4"><?= htmlspecialchars($product['product_name']) ?></td>
                <td class="py-2 px-4"><?= htmlspecialchars($product['category']) ?></td>
                <td class="py-2 px-4 whitespace-pre-line"><?= htmlspecialchars($product['fault']) ?></td>
                <td class="py-2 px-4"><?= date('Y-m-d H:i', strtotime($product['date'])) ?></td>
                <td class="py-2 px-4 text-right">
                  <a href="code.php?delete=<?= $product['id'] ?>"
                     class="bg-red-600 hover:bg-red-800 transition text-white px-4 py-1.5 rounded-full text-sm font-semibold shadow-md">
                    Delete
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
</div>

<?php include "footer.php"; ?>
