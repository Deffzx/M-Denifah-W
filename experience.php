<?php
// experience.php - Halaman Experience (Member Protected)
require_once __DIR__ . '/config.php';
require_auth();

$pageTitle = 'Experience - M. Denifah Wirayudha';
$currentPage = 'experience';
require_once __DIR__ . '/includes/header.php';
?>

<main class="px-6 pb-24 pt-32 lg:px-8">
    <div class="mx-auto max-w-6xl">
        <section class="max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-400">Experience</p>
            <h1 class="mt-4 text-4xl font-semibold tracking-tight text-white sm:text-6xl">Pengalaman yang membentuk cara saya bekerja.</h1>
            <p class="mt-6 text-lg leading-8 text-gray-400">Perjalanan kerja, organisasi, dan pembelajaran yang membangun kemampuan teknis, kepemimpinan, serta koordinasi saya.</p>
        </section>

        <section class="mt-16 grid gap-12 lg:grid-cols-[1fr_0.8fr]">
            <div class="border-l border-white/10 pl-6 sm:pl-8">
                <article class="relative pb-12">
                    <span class="absolute -left-[31px] top-1.5 size-3 rounded-full bg-indigo-400 ring-8 ring-gray-900 sm:-left-[39px]"></span>
                    <p class="text-sm font-semibold text-indigo-300">Maret 2024 - Sekarang</p>
                    <h2 class="mt-2 text-2xl font-bold text-white">PT Gajah Tunggal Tbk</h2>
                    <p class="mt-2 text-sm font-medium text-gray-300">Production support, data management & machine operation</p>
                    <ul class="mt-5 space-y-3 text-sm leading-6 text-gray-400">
                        <li>Mengelola dan menganalisis data produksi menggunakan MS Excel.</li>
                        <li>Memberikan support kebutuhan departemen produksi dan aktivitas karyawan.</li>
                        <li>Mengarahkan serta mengoperasikan mesin cetak ban industri.</li>
                    </ul>
                </article>
                <article class="relative pb-12">
                    <span class="absolute -left-[31px] top-1.5 size-3 rounded-full bg-indigo-400 ring-8 ring-gray-900 sm:-left-[39px]"></span>
                    <p class="text-sm font-semibold text-indigo-300">Januari - Februari 2024</p>
                    <h2 class="mt-2 text-2xl font-bold text-white">PT Secure Parking Indonesia</h2>
                    <p class="mt-2 text-sm font-medium text-gray-300">Parking Attendant</p>
                    <p class="mt-5 text-sm leading-6 text-gray-400">Memandu kendaraan, melayani transaksi tiket atau pembayaran digital, dan menata posisi kendaraan dengan tertib.</p>
                </article>
                <article class="relative">
                    <span class="absolute -left-[31px] top-1.5 size-3 rounded-full bg-indigo-400 ring-8 ring-gray-900 sm:-left-[39px]"></span>
                    <p class="text-sm font-semibold text-indigo-300">2022 - 2023</p>
                    <h2 class="mt-2 text-2xl font-bold text-white">Ketua Umum OSIS</h2>
                    <p class="mt-2 text-sm font-medium text-gray-300">Kepemimpinan dan organisasi sekolah</p>
                    <p class="mt-5 text-sm leading-6 text-gray-400">Mengatur kegiatan, berkoordinasi dengan anggota, dan mengembangkan kemampuan manajemen acara serta komunikasi tim.</p>
                </article>
            </div>

            <aside class="space-y-8">
                <div class="rounded-2xl border border-white/10 bg-gray-800/40 p-7">
                    <p class="text-sm font-semibold uppercase tracking-[0.15em] text-indigo-400">Sertifikasi</p>
                    <h2 class="mt-3 text-2xl font-bold text-white">Bukti pembelajaran</h2>
                    <div class="mt-6 space-y-5">
                        <div class="border-b border-white/10 pb-5">
                            <p class="font-semibold text-white">Sertifikasi 01</p>
                            <p class="mt-1 text-sm text-gray-400">Tambahkan nama sertifikasi, penerbit, dan tahun.</p>
                        </div>
                        <div class="border-b border-white/10 pb-5">
                            <p class="font-semibold text-white">Sertifikasi 02</p>
                            <p class="mt-1 text-sm text-gray-400">Tempat untuk sertifikasi teknis atau profesional berikutnya.</p>
                        </div>
                        <div>
                            <p class="font-semibold text-white">Sertifikasi 03</p>
                            <p class="mt-1 text-sm text-gray-400">Tambahkan link atau nomor kredensial jika tersedia.</p>
                        </div>
                    </div>
                </div>
                <div class="flex aspect-[4/3] items-center justify-center rounded-2xl border border-dashed border-indigo-400/40 bg-gray-800/50 p-8 text-center">
                    <div>
                        <p class="font-semibold text-white">Tempat dokumentasi organisasi</p>
                        <p class="mt-2 text-sm leading-6 text-gray-400">Tambahkan foto kegiatan, event, atau dokumentasi kepemimpinan kamu di area ini.</p>
                    </div>
                </div>
            </aside>
        </section>

        <section class="mt-20 border-t border-white/10 pt-16">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-[0.15em] text-indigo-400">Organisasi & Event</p>
                <h2 class="mt-3 text-3xl font-bold tracking-tight text-white">Kegiatan yang pernah saya dukung.</h2>
                <p class="mt-4 leading-7 text-gray-400">Dokumentasi dan detail peran dapat kamu tambahkan pada setiap kegiatan saat materi sudah siap.</p>
            </div>
            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-5">
                    <p class="text-xs font-semibold text-indigo-300">2026 · Event Marshal</p>
                    <h3 class="mt-2 font-semibold text-white">Yellow Run 2026</h3>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-5">
                    <p class="text-xs font-semibold text-indigo-300">2026 · Event Marshal</p>
                    <h3 class="mt-2 font-semibold text-white">Refreshment Planet Sports Run "Unlock your best together"</h3>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-5">
                    <p class="text-xs font-semibold text-indigo-300">2025 · Event Marshal</p>
                    <h3 class="mt-2 font-semibold text-white">Bank Saqu Sunrise Society Vol.3 Take Over GBK</h3>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-5">
                    <p class="text-xs font-semibold text-indigo-300">2025 · Event Marshal</p>
                    <h3 class="mt-2 font-semibold text-white">BNI Wondr Jakarta Running Fest</h3>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-5">
                    <p class="text-xs font-semibold text-indigo-300">2025 · Event Marshal</p>
                    <h3 class="mt-2 font-semibold text-white">Isoplus Run Jakarta Series</h3>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-5">
                    <p class="text-xs font-semibold text-indigo-300">2025 · Logistics Officer</p>
                    <h3 class="mt-2 font-semibold text-white">Digiland Run 2025</h3>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-5">
                    <p class="text-xs font-semibold text-indigo-300">2024 · Human Directional (HD)</p>
                    <h3 class="mt-2 font-semibold text-white">PT Abipraya 44th Anniversary</h3>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-5">
                    <p class="text-xs font-semibold text-indigo-300">2024 · Refreshment Officer</p>
                    <h3 class="mt-2 font-semibold text-white">Wondr Jakarta Running Fest October 2024</h3>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-5">
                    <p class="text-xs font-semibold text-indigo-300">2024 · Event Marshal</p>
                    <h3 class="mt-2 font-semibold text-white">Garmin Run</h3>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-5">
                    <p class="text-xs font-semibold text-indigo-300">2024 · Event Marshal</p>
                    <h3 class="mt-2 font-semibold text-white">LPS Monas Half Marathon</h3>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-5">
                    <p class="text-xs font-semibold text-indigo-300">2022 · Sharing Committee</p>
                    <h3 class="mt-2 font-semibold text-white">FEISTRA (Bunyi dari Karya)</h3>
                </article>
                <article class="rounded-xl border border-white/10 bg-gray-800/40 p-5">
                    <p class="text-xs font-semibold text-indigo-300">2022 · Logistics & Equipment Officer</p>
                    <h3 class="mt-2 font-semibold text-white">Tangerang Kreatif (Cisadane Walk Festival)</h3>
                </article>
            </div>
        </section>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
