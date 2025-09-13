<?php include "./header.php"; ?>
<?php include "./connection.php"; ?>
<?php
if (isset($_GET['proid'])) {
  $id = $_GET['proid'];
  $select = mysqli_query($conn, "SELECT * FROM product WHERE id=$id");
  $row = mysqli_fetch_assoc($select);
  $tester = mysqli_query($conn, "SELECT * FROM signup WHERE role='tester' ORDER BY rand() ");
  $rows = mysqli_fetch_assoc($tester);
}
?>

<main class="relative z-10 flex-grow w-[90%] max-w-[1100px] mx-auto p-10 my-12 bg-white/10 text-white backdrop-blur-md rounded-2xl shadow-xl print:bg-white print:text-black print:shadow-none print:border-none print:p-0 print:m-0">
  <h1 class="text-4xl font-bold text-center mb-10">Product Fault Report</h1>

  <form class="space-y-10" onsubmit="return false">

    <section class="break-inside-avoid" style="page-break-inside: avoid;">
      <h2 class="text-2xl font-semibold mb-4 border-b border-white/30 pb-2 print:border-black">Product Details</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6">
        <div>
          <label class="block text-sm font-medium mb-1">Product ID</label>
          <div class="bg-white/10 border border-white/30 rounded-lg px-4 py-2 print:border print:text-black print:bg-transparent">
            <?php echo $row['Product ID']; ?>
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Product Name</label>
          <div class="bg-white/10 border border-white/30 rounded-lg px-4 py-2 print:border print:text-black print:bg-transparent">
            <?php echo $row['Product Name']; ?>
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Category</label>
          <div class="bg-white/10 border border-white/30 rounded-lg px-4 py-2 print:border print:text-black print:bg-transparent">
            <?php echo $row['Category']; ?>
          </div>
        </div>
        <div class="md:col-span-2">
          <label class="block text-sm font-medium mb-1">Description</label>
          <div class="bg-white/10 border border-white/30 rounded-lg px-4 py-2 print:border print:text-black print:bg-transparent">
            <?php echo $row['details']; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="break-inside-avoid" style="page-break-inside: avoid;">
      <h2 class="text-2xl font-semibold mb-4 border-b border-white/30 pb-2 print:border-black">Tester Details</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6">
        <div>
          <label class="block text-sm font-medium mb-1">Tester Name</label>
          <div class="bg-white/10 border border-white/30 rounded-lg px-4 py-2 print:border print:text-black print:bg-transparent">
            <?php echo $rows['Username']; ?>
          </div>
        </div>
        <div>
          <label class="block text-sm font-medium mb-1">Email</label>
          <div class="bg-white/10 border border-white/30 rounded-lg px-4 py-2 print:border print:text-black print:bg-transparent">
            <?php echo $rows['Email']; ?>
          </div>
        </div>
      </div>
    </section>

    <div class="flex justify-center gap-4 mt-10 print:hidden">
      <button type="button" onclick="window.print()" class="bg-gray-600 hover:bg-gray-800 text-white px-6 py-3 rounded-full transition-all">
        Print Report
      </button>
    </div>
  </form>
</main>

<?php include "./footer.php"; ?>
