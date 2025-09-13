<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Remarks Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    :root {
      --bg-gradient-start: #0f172a;
      --bg-gradient-end: #1e293b;
    }
    body {
      background: linear-gradient(145deg, var(--bg-gradient-start), var(--bg-gradient-end));
    }
  </style>
</head>
<body class="min-h-screen text-white font-sans relative">
  <div class="absolute inset-0 bg-black bg-opacity-40 -z-10"></div>
  <?php include 'header.php'; ?>
  <div class="h-24"></div>
  <div class="flex items-center justify-center min-h-[70vh] px-4">
    <?php
      $id = isset($_GET['reject']) ? intval($_GET['reject']) : 0;
    ?>

    <div class="w-full max-w-md bg-white/10 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-white/20">
      <h2 class="text-2xl font-bold mb-6 text-center">Submit Your Remarks</h2>
      <form method="POST">
        <label for="remarks" class="block text-sm font-semibold mb-2">Remarks</label>
        <textarea id="remarks" name="remarks" placeholder="Enter your remarks..."
          class="w-full h-32 p-3 rounded-lg border border-white/20 bg-white/10 text-white placeholder-white/70 resize-none focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>

      <button type="submit" name="submit"
  class="mt-6 w-full bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200">
submit
</button>
      </form>
    </div>
  </div>
  <?php include 'footer.php'; ?>
<?php
  if (isset($_POST['submit'])) {
    $remarks = $_POST['remarks'];
    $query = "UPDATE product SET status='Rejected', remarks='$remarks' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
   
      echo "<script> window.open('listofproducts.php','_self') </script>";
    } else {
      echo "<script>alert('Failed to save remarks');</script>";
    }
  }
?>
