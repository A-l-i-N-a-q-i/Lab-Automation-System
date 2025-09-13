<?php
include "header.php";
include "code.php";
?>

<body class="flex flex-col min-h-screen text-white bg-gray-900">

<main class="flex-grow relative z-10 px-4 py-12 flex items-center justify-center">
  <div class="w-full max-w-2xl sm:max-w-3xl bg-white/10 text-white backdrop-blur rounded-2xl shadow-xl p-6 sm:p-10">
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center mb-6">Product Entry</h1>

    <form method="post" action="code.php" class="space-y-6">
      <div>
        <label class="block text-sm mb-1">Product ID</label>
        <input type="hidden" name="product_id" value="<?php echo mt_rand(1000000000,9999999999) ?>" required>
        <input type="text" value="<?php echo mt_rand(1000000000,9999999999) ?>" disabled
               class="w-full h-10 px-4 rounded-lg bg-white/10 border border-white/30 text-white text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block text-sm mb-1">Product Name</label>
        <input type="text" name="product_name" required
               class="w-full h-10 px-4 rounded-lg bg-white/10 border border-white/30 text-white text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block text-sm mb-1">Category</label>
        <input type="text" name="category" required
               class="w-full h-10 px-4 rounded-lg bg-white/10 border border-white/30 text-white text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-blue-400">
      </div>

      <div>
        <label class="block text-sm mb-1">Details</label>
        <textarea name="fault" rows="4" required
                  class="w-full px-4 py-2 rounded-lg bg-white/10 border border-white/30 text-white text-sm sm:text-base resize-none focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
      </div>

      <button type="submit" name="addproduct"
              class="w-full bg-blue-500 hover:bg-blue-700 text-white font-semibold px-6 py-3 text-sm sm:text-base rounded-full transition-all">
        Submit
      </button>
    </form>
  </div>
</main>

<?php include "footer.php"; ?>
</body>
