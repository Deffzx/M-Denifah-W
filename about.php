<?php
// about.php - Halaman About Me (Member Protected)
require_once __DIR__ . '/config.php';
require_auth();

$pageTitle = 'About - M. Denifah Wirayudha';
$currentPage = 'about';
require_once __DIR__ . '/includes/header.php';
?>

<main class="px-6 pb-24 pt-32 lg:px-8">
    <div class="mx-auto max-w-6xl">
        <section class="grid items-center gap-12 lg:grid-cols-[1.1fr_0.9fr]">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-400">About Me</p>
                <h1 class="mt-4 max-w-3xl text-4xl font-semibold tracking-tight text-white sm:text-6xl">
                    Mengenal saya lebih dekat.
                </h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-gray-400">
                    Saya M. Denifah Wirayudha, mahasiswa Sistem Komputer yang tertarik pada perpaduan teknologi, pengelolaan data, dan kerja kolaboratif. Saya senang mempelajari hal baru lalu mengubahnya menjadi solusi yang dapat digunakan.
                </p>
                <div class="mt-8 grid max-w-xl grid-cols-2 gap-6 border-y border-white/10 py-6 sm:grid-cols-3">
                    <div>
                        <p class="text-2xl font-bold text-white">2023</p>
                        <p class="mt-1 text-sm text-gray-400">Mulai kuliah S1</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-white">2022</p>
                        <p class="mt-1 text-sm text-gray-400">Ketua Umum OSIS</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-white">2024</p>
                        <p class="mt-1 text-sm text-gray-400">Mulai pengalaman kerja</p>
                    </div>
                </div>
            </div>

            <div class="relative mx-auto w-full max-w-md">
                <div class="aspect-[4/5] overflow-hidden rounded-2xl border border-dashed border-indigo-400/40 bg-gray-800/50 shadow-2xl shadow-indigo-950/20">
                    <img src="images/Agents.jpg" alt="Foto M. Denifah Wirayudha" class="size-full object-cover object-center">
                </div>
            </div>
        </section>

        <section class="mt-24 grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-400">Organisasi</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight text-white">Belajar memimpin dan bekerja bersama.</h2>
                <p class="mt-4 leading-7 text-gray-400">
                    Pengalaman organisasi membentuk cara saya berkomunikasi, mengatur kegiatan, dan mengambil tanggung jawab dalam sebuah tim.
                </p>
            </div>

            <div class="space-y-6 border-l border-white/10 pl-6 sm:pl-8">
                <article class="relative">
                    <span class="absolute -left-[31px] top-1.5 size-3 rounded-full bg-indigo-400 ring-8 ring-gray-900 sm:-left-[39px]"></span>
                    <p class="text-sm font-semibold text-indigo-300">2022</p>
                    <h3 class="mt-1 text-lg font-semibold text-white">Ketua Umum OSIS</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-400">Mengembangkan kepemimpinan, koordinasi kegiatan, manajemen acara, dan kolaborasi dengan anggota organisasi.</p>
                </article>
                <article class="relative">
                    <span class="absolute -left-[31px] top-1.5 size-3 rounded-full bg-indigo-400 ring-8 ring-gray-900 sm:-left-[39px]"></span>
                    <p class="text-sm font-semibold text-indigo-300">2022 - sekarang</p>
                    <h3 class="mt-1 text-lg font-semibold text-white">Kegiatan event dan komunitas</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-400">Terlibat dalam berbagai kegiatan sebagai Event Marshal, Logistics Officer, dan peran pendukung acara.</p>
                </article>
            </div>
        </section>

        <section class="mt-24 border-t border-white/10 pt-16">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-400">Bakat & Minat</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight text-white">Hal yang ingin terus saya kembangkan.</h2>
            </div>
            <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-6">
                    <h3 class="font-semibold text-white">Teknologi Web</h3>
                    <p class="mt-3 text-sm leading-6 text-gray-400">Membangun website, mempelajari framework, dan memahami alur kerja aplikasi dari sisi pengguna hingga database.</p>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-6">
                    <h3 class="font-semibold text-white">Pengelolaan Data</h3>
                    <p class="mt-3 text-sm leading-6 text-gray-400">Merapikan, membaca, dan menyajikan data agar dapat membantu proses kerja dan pengambilan keputusan.</p>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-6">
                    <h3 class="font-semibold text-white">Kepemimpinan</h3>
                    <p class="mt-3 text-sm leading-6 text-gray-400">Mengatur prioritas, berkomunikasi dengan tim, dan menjaga tanggung jawab sampai pekerjaan selesai.</p>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-6">
                    <h3 class="font-semibold text-white">Kegiatan Lapangan</h3>
                    <p class="mt-3 text-sm leading-6 text-gray-400">Menyukai aktivitas yang membutuhkan koordinasi cepat, ketelitian, dan interaksi langsung dengan banyak orang.</p>
                </article>
            </div>
        </section>

        <section class="mt-24 grid gap-8 border-t border-white/10 pt-16 md:grid-cols-3">
            <div class="md:col-span-2">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-400">Cara Saya Bekerja</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight text-white">Teknis, teratur, dan terbuka untuk belajar.</h2>
                <p class="mt-4 max-w-2xl leading-7 text-gray-400">Saya membawa pengalaman organisasi dan kerja ke dalam proses belajar teknologi: mendengar kebutuhan, menyusun langkah, mengerjakan dengan teliti, lalu mengevaluasi hasilnya.</p>
            </div>
            <div class="rounded-xl border border-indigo-400/20 bg-indigo-400/10 p-6">
                <p class="text-sm font-semibold text-indigo-200">Fokus saat ini</p>
                <p class="mt-3 text-sm leading-6 text-indigo-100/70">Memperdalam pengembangan web, database, dan cara membuat produk digital yang rapi serta mudah digunakan.</p>
            </div>
        </section>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
