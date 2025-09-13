    <?php
    session_start();
    include "header.php";
    ?>
    <main class="flex-grow px-4 py-10 max-w-6xl mx-auto text-center">
        <h1 class="text-3xl sm:text-4xl font-bold text-white mb-6 drop-shadow-md">
            Welcome to the Automated Lab System
        </h1>
        <p class="text-base sm:text-lg text-gray-200 mb-10 max-w-2xl mx-auto leading-relaxed">
            Our Lab Automation System helps streamline your lab operations—track products, manage test data, log faults, and improve productivity—all in one place.
        </p>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-2 text-center">
            <div class="rounded-2xl bg-white/20 backdrop-blur-md border border-white/30 shadow-lg p-6 sm:p-8 text-white hover:shadow-2xl transition">
                <h2 class="text-lg sm:text-xl font-semibold mb-2">Product Tracking</h2>
                <p class="text-gray-100 text-sm sm:text-base">Easily manage and monitor product entries, updates, and fault history using our intuitive dashboard.</p>
            </div>
            <div class="rounded-2xl bg-white/20 backdrop-blur-md border border-white/30 shadow-lg p-6 sm:p-8 text-white hover:shadow-2xl transition">
                <h2 class="text-lg sm:text-xl font-semibold mb-2">Fault Logging</h2>
                <p class="text-gray-100 text-sm sm:text-base">Record and view faults efficiently with detailed timestamps and category filters.</p>
            </div>
            <div class="rounded-2xl bg-white/20 backdrop-blur-md border border-white/30 shadow-lg p-6 sm:p-8 text-white hover:shadow-2xl transition">
                <h2 class="text-lg sm:text-xl font-semibold mb-2">Report Generation</h2>
                <p class="text-gray-100 text-sm sm:text-base">Generate organized reports to analyze lab performance, identify issues, and plan improvements.</p>
            </div>
            <div class="rounded-2xl bg-white/20 backdrop-blur-md border border-white/30 shadow-lg p-6 sm:p-8 text-white hover:shadow-2xl transition">
                <h2 class="text-lg sm:text-xl font-semibold mb-2">Secure Access</h2>
                <p class="text-gray-100 text-sm sm:text-base">User authentication and access control to ensure data privacy and secure operations.</p>
            </div>
        </div>

        <?php if (!isset($_SESSION['user'])): ?>
            <a href="login.php" class="inline-block mt-10 px-6 py-3 bg-blue-700/80 backdrop-blur-sm text-white rounded-xl font-semibold hover:bg-blue-800 transition text-sm sm:text-base">
                Get Started
            </a>
        <?php endif; ?>
    </main>
    <?php
    include "footer.php";
    ?>
