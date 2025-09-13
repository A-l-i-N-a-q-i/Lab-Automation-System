<?php
  include "./code.php"; 
  include "./header.php";    
?>
<main class="  flex-grow flex items-center justify-center px-4 py-16   bg-center">
  
  <!-- Dark overlay over background image -->
  <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>

  <!-- Feedback Form Container -->
  <div class="relative z-10 w-full max-w-xl bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl shadow-[0_12px_30px_rgba(0,0,0,0.6)] p-8 sm:p-10">
    <h2 class="text-2xl sm:text-3xl font-semibold text-center mb-6 text-white">Feedback</h2>

    <!-- Feedback Form -->
    <form method="POST" action="./feedback.php" class="flex flex-col gap-5">
      <input
        type="text"
        name="name"
        placeholder="Your Name"
        required
        class="px-4 py-3 rounded-full border border-white/30 bg-white/5 text-white placeholder-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200"
      />

      <input
        type="email"
        name="email"
        placeholder="Your Email"
        required
        class="px-4 py-3 rounded-full border border-white/30 bg-white/5 text-white placeholder-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200"
      />

      <input
        type="text"
        name="subject"
        placeholder="Subject"
        required
        class="px-4 py-3 rounded-full border border-white/30 bg-white/5 text-white placeholder-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200"
      />

      <textarea
        name="message"
        rows="4"
        placeholder="Your Message"
        required
        class="px-4 py-3 rounded-2xl border border-white/30 bg-white/5 text-white placeholder-white text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200 resize-none"
      ></textarea>

      <button
        type="submit"
        name="feedbackregister"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-full transition-all shadow-md"
      >
        Submit Feedback
      </button>
    </form>
  </div>
</main>

<?php include "./footer.php"; ?>
