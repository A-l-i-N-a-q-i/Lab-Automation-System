<footer class="print:hidden bg-white/5 backdrop-blur-md border-t border-white/10 text-white px-6 py-10 mt-auto">
  <div class="max-w-[1600px] xl:max-w-[1800px] 2xl:max-w-[2000px] mx-auto flex flex-col lg:flex-row justify-between gap-12">
    <div class="flex-1">
      <h2 class="text-2xl font-semibold mb-2">Lab Automation</h2>
      <p class="text-sm text-gray-300 max-w-sm leading-relaxed">
        Streamlining lab processes with modern automation.
      </p>
    </div>

    <div class="flex-1 flex flex-col sm:flex-row gap-10">
      <div>
        <h4 class="text-lg font-medium mb-3">Quick Links</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="index.php" class="hover:text-blue-400 transition">Home</a></li>
          <li><a href="features.html" class="hover:text-blue-400 transition">Features</a></li>
          <?php if (isset($_SESSION['user'])): ?>
            <li><a href="logout.php" class="hover:text-blue-400 transition">Logout</a></li>
          <?php else: ?>
            <li><a href="login.php" class="hover:text-blue-400 transition">Login</a></li>
            <li><a href="signup.php" class="hover:text-blue-400 transition">Sign Up</a></li>
          <?php endif; ?>
        </ul>
      </div>

      <div>
        <h4 class="text-lg font-medium mb-3">Contact</h4>
        <ul class="space-y-2 text-sm text-gray-300">
          <li><span class="block sm:inline">Email:</span> info@labautomation.com</li>
          <li><span class="block sm:inline">Phone:</span> +92 300 1234567</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="text-center text-xs text-gray-400 mt-10 border-t border-white/10 pt-4">
    &copy; 2025 Lab Automation. All rights reserved.
  </div>
</footer>
</body>
</html>
