<?php
// portofolio.php - Halaman Portfolio (Member Protected)
require_once __DIR__ . '/config.php';
require_auth();

$pageTitle = 'Portfolio - M. Denifah Wirayudha';
$currentPage = 'portofolio';
require_once __DIR__ . '/includes/header.php';
?>

<main class="px-6 pb-24 pt-32 lg:px-8">
    <div class="mx-auto max-w-7xl">
        <section class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-400">Selected Work</p>
            <h1 class="mt-4 text-4xl font-semibold tracking-tight text-white sm:text-6xl">Proyek yang pernah saya kerjakan.</h1>
            <p class="mt-6 text-lg leading-8 text-gray-400">Kumpulan proyek teknologi dan desain yang menjadi ruang untuk menerapkan kemampuan pemrograman, pengelolaan data, dan pemecahan masalah.</p>
        </section>

        <section class="mt-16 grid gap-8 lg:grid-cols-2">
            <article class="overflow-hidden rounded-2xl border border-white/10 bg-gray-800/40 lg:col-span-2">
                <div class="grid lg:grid-cols-[1.15fr_0.85fr]">
                    <div class="flex aspect-video items-center justify-center border-b border-white/10 bg-gray-900/70 lg:aspect-auto lg:min-h-[360px] lg:border-b-0 lg:border-r">
                        <div class="px-8 text-center">
                            <div class="mx-auto flex size-16 items-center justify-center rounded-full border border-indigo-400/40 bg-indigo-400/10 text-indigo-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 4.5h16.5A1.75 1.75 0 0 1 22 6.25v11.5a1.75 1.75 0 0 1-1.75 1.75H3.75A1.75 1.75 0 0 1 2 17.75V6.25A1.75 1.75 0 0 1 3.75 4.5ZM8.25 9.75l2.25 2.25-2.25 2.25m5.25 0h2.25" /></svg>
                            </div>
                            <p class="mt-5 font-semibold text-white">Tempat video atau screenshot proyek</p>
                            <p class="mt-2 text-sm text-gray-400">Ganti area ini dengan media Traceability System.</p>
                        </div>
                    </div>
                    <div class="p-8 sm:p-10">
                        <p class="text-sm font-semibold text-indigo-400">Featured project</p>
                        <h2 class="mt-3 text-3xl font-bold text-white">Traceability System</h2>
                        <p class="mt-5 leading-7 text-gray-400">Sistem untuk melacak hasil produksi dan aktivitas karyawan di lingkungan pabrik. Proyek ini menjadi latihan untuk memahami alur data, kebutuhan pengguna, dan pengembangan aplikasi berbasis web.</p>
                        <div class="mt-8 flex flex-wrap gap-2">
                            <span class="rounded-full border border-white/10 px-3 py-1 text-xs text-gray-300">PHP</span>
                            <span class="rounded-full border border-white/10 px-3 py-1 text-xs text-gray-300">Laravel</span>
                            <span class="rounded-full border border-white/10 px-3 py-1 text-xs text-gray-300">Database</span>
                        </div>
                    </div>
                </div>
            </article>

            <article class="overflow-hidden rounded-2xl border border-white/10 bg-gray-800/40">
                <div class="flex aspect-video items-center justify-center bg-gray-900/70">
                    <p class="px-6 text-center text-sm text-gray-400">Placeholder foto/video<br><span class="text-indigo-300">MY Money</span></p>
                </div>
                <div class="p-7">
                    <p class="text-sm font-semibold text-indigo-400">Mobile application</p>
                    <h2 class="mt-2 text-2xl font-bold text-white">MY Money</h2>
                    <p class="mt-4 text-sm leading-6 text-gray-400">Aplikasi manajemen keuangan pribadi yang dibuat untuk membantu pencatatan dan pemantauan keuangan.</p>
                    <div class="mt-6 flex flex-wrap gap-2">
                        <span class="rounded-full border border-white/10 px-3 py-1 text-xs text-gray-300">Java</span>
                        <span class="rounded-full border border-white/10 px-3 py-1 text-xs text-gray-300">IntelliJ IDEA</span>
                    </div>
                </div>
            </article>

            <article class="overflow-hidden rounded-2xl border border-white/10 bg-gray-800/40">
                <div class="flex aspect-video items-center justify-center bg-gray-900/70">
                    <p class="px-6 text-center text-sm text-gray-400">Placeholder foto/video<br><span class="text-indigo-300">Smart Farming</span></p>
                </div>
                <div class="p-7">
                    <p class="text-sm font-semibold text-indigo-400">IoT project</p>
                    <h2 class="mt-2 text-2xl font-bold text-white">Smart Farming</h2>
                    <p class="mt-4 text-sm leading-6 text-gray-400">Sistem monitoring dan pengendalian pertanian berbasis IoT menggunakan ESP32.</p>
                    <div class="mt-6 flex flex-wrap gap-2">
                        <span class="rounded-full border border-white/10 px-3 py-1 text-xs text-gray-300">ESP32</span>
                        <span class="rounded-full border border-white/10 px-3 py-1 text-xs text-gray-300">IoT</span>
                    </div>
                </div>
            </article>

            <article class="overflow-hidden rounded-2xl border border-white/10 bg-gray-800/40">
                <div class="flex aspect-video items-center justify-center bg-gray-900/70">
                    <p class="px-6 text-center text-sm text-gray-400">Placeholder gambar desain<br><span class="text-indigo-300">AutoCAD</span></p>
                </div>
                <div class="p-7">
                    <p class="text-sm font-semibold text-indigo-400">Technical design</p>
                    <h2 class="mt-2 text-2xl font-bold text-white">Meja Stand Bladder</h2>
                    <p class="mt-4 text-sm leading-6 text-gray-400">Desain meja stand untuk alat bladders tire yang menampilkan ketertarikan pada detail teknis dan rancangan fungsional.</p>
                    <div class="mt-6">
                        <span class="rounded-full border border-white/10 px-3 py-1 text-xs text-gray-300">AutoCAD</span>
                    </div>
                </div>
            </article>

            <article class="rounded-2xl border border-dashed border-indigo-400/30 bg-indigo-400/5 p-7">
                <p class="text-sm font-semibold text-indigo-400">Coming next</p>
                <h2 class="mt-2 text-2xl font-bold text-white">Proyek berikutnya</h2>
                <p class="mt-4 text-sm leading-6 text-gray-400">Area ini siap diisi saat kamu memiliki proyek baru, dokumentasi, link demo, atau video presentasi.</p>
            </article>
        </section>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
