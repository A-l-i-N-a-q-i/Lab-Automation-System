<?php
include "code.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Lab Automation</title>
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

<body class="min-h-screen bg-cover bg-center font-sans flex items-center justify-center px-4 relative text-white"
  style="background-image: url('images/pexels-pixabay-209251.jpg');">

  <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>

  <div
    class="relative z-10 w-full max-w-5xl bg-transparent flex flex-col lg:flex-row rounded-2xl overflow-hidden shadow-[0_12px_30px_rgba(0,0,0,0.6)] backdrop-blur-md border border-white/20">

    <div class="w-full lg:w-1/2 p-10 bg-white/10 backdrop-blur-sm text-white">
      <h2 class="text-2xl font-semibold text-center mb-6">Welcome Back</h2>
      <form method="post" action="./code.php" class="flex flex-col gap-4">

        <input type="text" name="username" placeholder="Username" required
          class="w-full px-4 py-[14px] rounded-full border border-gray-300 bg-transparent text-white placeholder-white text-[15px] focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200" />

        <input type="password" name="password" id="loginPassword" placeholder="Password" required
          class="w-full px-4 py-[14px] rounded-full border border-gray-300 bg-transparent text-white placeholder-white text-[15px] focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition duration-200" />

        <div class="flex items-center gap-2 text-sm mt-1">
          <input type="checkbox" id="showLoginPassword" class="accent-blue-500 w-4 h-4">
          <label for="showLoginPassword">Show Password</label>
        </div>

        <button type="submit" name="login"
          class="bg-blue-500 hover:bg-blue-700 py-[14px] rounded-full font-semibold transition-all">
          Login
        </button>
      </form>

      <div class="text-center text-sm mt-4">
        <p>Don't have an account? <a href="signup.php" class="text-blue-300 underline hover:text-white">Sign Up</a></p>
      </div>
    </div>

    <div
      class="w-full lg:w-1/2 p-10 flex flex-col items-center justify-center bg-transparent text-white backdrop-blur-sm text-center border-t lg:border-t-0 lg:border-l border-white/20">
      <i class="fas fa-flask text-5xl mb-4"></i>
      <h3 class="text-xl font-semibold mb-2">Lab Automation System</h3>
      <p class="text-sm mb-4">New here?</p>
      <a href="signup.php"
        class="border border-white/40 text-white  py-2 px-6 rounded-full text-sm hover:scale-105 transition-all duration-300 backdrop-blur">
        Sign Up
      </a>
    </div>
  </div>

  <script>
    const showLoginCheckbox = document.getElementById('showLoginPassword');
    const loginPasswordField = document.getElementById('loginPassword');

    showLoginCheckbox.addEventListener('change', function () {
      loginPasswordField.type = this.checked ? 'text' : 'password';
    });
  </script>

</body>

</html>
