<?php include "code.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up - Lab Automation</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <style>
    input:-webkit-autofill,
    input:-webkit-autofill:focus {
      box-shadow: 0 0 0px 1000px rgba(255, 255, 255, 0.1) inset !important;
      -webkit-text-fill-color: white !important;
      transition: background-color 9999s ease-in-out 0s;
    }
  </style>
</head>

<body class="min-h-screen bg-cover bg-center font-sans flex items-center justify-center px-4 sm:px-6 lg:px-8 relative text-white"
  style="background-image: url('images/pexels-pixabay-209251.jpg');">

  <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>

  <div class="relative z-10 w-full max-w-5xl mx-auto bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl shadow-2xl overflow-hidden flex flex-col lg:flex-row">

    <div class="w-full lg:w-1/2 p-8 sm:p-10 bg-white/10">
      <h2 class="text-2xl sm:text-3xl font-semibold text-center mb-6">Create an Account</h2>
      <form method="post" action="" class="flex flex-col gap-4">
        <input type="text" name="username" placeholder="Full Name" required
          class="w-full px-4 py-[14px] rounded-full border border-white/30 bg-white/5 text-white placeholder-white text-[15px] focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />

        <input type="email" name="email" placeholder="Email Address" required
          class="w-full px-4 py-[14px] rounded-full border border-white/30 bg-white/5 text-white placeholder-white text-[15px] focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />

        <input type="password" name="password" id="password" placeholder="Password" required
          class="w-full px-4 py-[14px] rounded-full border border-white/30 bg-white/5 text-white placeholder-white text-[15px] focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />

        <input type="password" name="confirmpassword" id="confirmPassword" placeholder="Confirm Password" required
          class="w-full px-4 py-[14px] rounded-full border border-white/30 bg-white/5 text-white placeholder-white text-[15px] focus:outline-none focus:ring-2 focus:ring-blue-400 transition" />

        <div class="flex items-center gap-2 text-sm mt-1">
          <input type="checkbox" id="showPassword" class="accent-blue-500 w-4 h-4">
          <label for="showPassword">Show Password</label>
        </div>

        <button type="submit" name="register"
          class="bg-blue-600 hover:bg-blue-700 py-[14px] rounded-full font-semibold transition-all shadow-md">
          Sign Up
        </button>
      </form>

      <div class="text-center text-sm mt-4">
        <p>Already have an account? <a href="login.php" class="text-blue-300 underline hover:text-white">Login</a></p>
      </div>
    </div>

    <div class="w-full lg:w-1/2 p-10 flex flex-col items-center justify-center text-center bg-white/5 border-t lg:border-t-0 lg:border-l border-white/20">
      <i class="fas fa-flask text-5xl mb-4"></i>
      <h3 class="text-xl font-semibold mb-2">Lab Automation System</h3>
      <p class="text-sm mb-4">Already have an account?</p>
      <a href="login.php"
         class="border border-white/30 text-white py-2 px-6 rounded-full text-sm hover:scale-105 transition duration-300 backdrop-blur-xl">
        Login
      </a>
    </div>
  </div>

  <script>
    const showPasswordCheckbox = document.getElementById('showPassword');
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirmPassword');
    showPasswordCheckbox.addEventListener('change', function () {
      const type = this.checked ? 'text' : 'password';
      passwordField.type = type;
      confirmPasswordField.type = type;
    });
  </script>

</body>
</html>
