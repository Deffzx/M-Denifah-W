<?php
// includes/header.php
require_once __DIR__ . '/../config.php';

$pageTitle = $pageTitle ?? 'M. Denifah Wirayudha - Portfolio';
$currentPage = $currentPage ?? 'home';
$isAuthPage = in_array($currentPage, ['login', 'register']);
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    
    <!-- Favicon & Logo -->
    <link rel="icon" href="images/Logo.png" type="image/png">
    
    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts & Local Fonts -->
    <link rel="stylesheet" href="assets/fonts-DMOSjcMr.css">

    <!-- Tailwind CSS (Compiled) -->
    <link rel="stylesheet" href="assets/app-BJiLA5iJ.css">
</head>
<body class="m-0 bg-gray-900 text-gray-100 font-sans antialiased selection:bg-indigo-500 selection:text-white">

    <!-- HEADER / NAVBAR -->
    <header x-data="{ mobileMenuOpen: false }" class="absolute inset-x-0 top-0 z-50">
        <?php if (!$isAuthPage): ?>
        <nav aria-label="Global" class="flex items-center justify-between p-6 lg:px-8">
            <div class="flex lg:flex-1">
                <a href="index.php" class="-m-1.5 p-1.5 flex items-center gap-2">
                    <span class="sr-only">M. Denifah Wirayudha</span>
                    <img src="images/Logo.png" alt="Logo M. Denifah Wirayudha" class="h-9 w-auto object-contain" />
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="flex lg:hidden">
                <button @click="mobileMenuOpen = true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-200">
                    <span class="sr-only">Open main menu</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6">
                        <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="about.php" class="rounded-md px-2 py-1 text-sm/6 font-semibold transition <?= $currentPage === 'about' ? 'bg-indigo-400/10 text-indigo-300 ring-1 ring-indigo-400/30' : 'text-white hover:text-indigo-400' ?>">About</a>
                <a href="portofolio.php" class="rounded-md px-2 py-1 text-sm/6 font-semibold transition <?= $currentPage === 'portofolio' ? 'bg-indigo-400/10 text-indigo-300 ring-1 ring-indigo-400/30' : 'text-white hover:text-indigo-400' ?>">Portfolio</a>
                <a href="experience.php" class="rounded-md px-2 py-1 text-sm/6 font-semibold transition <?= $currentPage === 'experience' ? 'bg-indigo-400/10 text-indigo-300 ring-1 ring-indigo-400/30' : 'text-white hover:text-indigo-400' ?>">Experience</a>
                <a href="contact.php" class="rounded-md px-2 py-1 text-sm/6 font-semibold transition <?= $currentPage === 'contact' ? 'bg-indigo-400/10 text-indigo-300 ring-1 ring-indigo-400/30' : 'text-white hover:text-indigo-400' ?>">Contact</a>
            </div>

            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <?php if (is_logged_in()): ?>
                <form action="logout.php" method="POST">
                    <button type="submit" class="rounded-md bg-gray-700 px-4 py-2 text-sm font-semibold text-white shadow-xs transition hover:bg-gray-600">
                        Log out
                    </button>
                </form>
                <?php else: ?>
                <a href="login.php" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 transition">
                    Log in <span aria-hidden="true">&rarr;</span>
                </a>
                <?php endif; ?>
            </div>
        </nav>

        <!-- Mobile menu Modal -->
        <div x-show="mobileMenuOpen" class="lg:hidden" x-ref="dialog" aria-modal="true" style="display: none;">
            <div class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm"></div>
            <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 p-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
                <div class="flex items-center justify-between">
                    <a href="index.php" class="-m-1.5 p-1.5 font-bold text-xl text-white">
                        DENIFAH<span class="text-indigo-500">.DEV</span>
                    </a>
                    <button @click="mobileMenuOpen = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-200">
                        <span class="sr-only">Close menu</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-white/10">
                        <div class="space-y-2 py-6">
                            <a @click="mobileMenuOpen = false" href="index.php" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-white hover:bg-white/5">Home</a>
                            <a @click="mobileMenuOpen = false" href="about.php" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold <?= $currentPage === 'about' ? 'bg-indigo-400/10 text-indigo-300' : 'text-white hover:bg-white/5' ?>">About</a>
                            <a @click="mobileMenuOpen = false" href="portofolio.php" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold <?= $currentPage === 'portofolio' ? 'bg-indigo-400/10 text-indigo-300' : 'text-white hover:bg-white/5' ?>">Portfolio</a>
                            <a @click="mobileMenuOpen = false" href="experience.php" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold <?= $currentPage === 'experience' ? 'bg-indigo-400/10 text-indigo-300' : 'text-white hover:bg-white/5' ?>">Experience</a>
                            <a @click="mobileMenuOpen = false" href="contact.php" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold <?= $currentPage === 'contact' ? 'bg-indigo-400/10 text-indigo-300' : 'text-white hover:bg-white/5' ?>">Contact</a>
                        </div>
                        <div class="py-6">
                            <?php if (is_logged_in()): ?>
                            <form action="logout.php" method="POST">
                                <button type="submit" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-300 hover:bg-white/5">Log out</button>
                            </form>
                            <?php else: ?>
                            <a href="login.php" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-indigo-400 hover:bg-white/5">Log in &rarr;</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <nav aria-label="Login navigation" class="flex items-center justify-between p-6 lg:px-8">
            <a href="index.php" class="-m-1.5 p-1.5">
                <span class="sr-only">M. Denifah Wirayudha</span>
                <img src="images/Logo.png" alt="Logo M. Denifah Wirayudha" class="h-9 w-auto object-contain" />
            </a>
            <a href="index.php" class="rounded-md border border-white/10 px-4 py-2 text-sm font-semibold text-white transition hover:border-indigo-400 hover:text-indigo-300">
                Halaman Pengenalan <span aria-hidden="true">&rarr;</span>
            </a>
        </nav>
        <?php endif; ?>
    </header>

    <!-- CONTENT DINAMIS -->
    <main class="relative isolate">
        <!-- Glow Effect Background Top -->
        <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"></div>
        </div>
