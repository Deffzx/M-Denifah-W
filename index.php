<?php
// index.php - Halaman Utama / Welcome
$pageTitle = 'Introduction - M Denifah W';
$currentPage = 'home';
require_once __DIR__ . '/includes/header.php';
?>

<!-- ==================== SCROLL 1: WELCOME / HERO ==================== -->
<section id="welcome" class="min-h-screen flex items-center justify-center px-6 pt-20 lg:px-8">
    <div class="mx-auto max-w-2xl text-center py-20">
        <div class="hidden sm:mb-8 sm:flex sm:justify-center">
            <div class="relative rounded-full px-3 py-1 text-sm/6 text-gray-400 ring-1 ring-white/10 hover:ring-white/20">
                Ingin melihat profil & detail pengalaman lengkap? <a href="register.php" class="font-semibold text-indigo-400"><span aria-hidden="true" class="absolute inset-0"></span>Daftar Akun <span aria-hidden="true">&rarr;</span></a>
            </div>
        </div>
        <h1 class="text-4xl font-semibold tracking-tight text-white sm:text-6xl">
            Selamat Datang di Website Pribadi Saya
        </h1>
        <p class="mt-6 text-lg font-medium text-gray-400 sm:text-xl/8">
            Halo! Saya M. Denifah Wirayudha. Di sini Anda dapat menemukan gambaran umum mengenai pendidikan, portofolio proyek teknis, serta pengalaman organisasi dan kerja saya.
        </p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="#about" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-indigo-500">
                Jelajahi Profil
            </a>
            <a href="login.php" class="text-sm font-semibold text-white">Login / Register <span aria-hidden="true">→</span></a>
        </div>
    </div>
</section>

<!-- ==================== SCROLL 2: ABOUT ==================== -->
<section id="about" class="py-24 px-6 lg:px-8 max-w-5xl mx-auto border-t border-white/10">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Tentang Saya</h2>
        <p class="mt-2 text-base text-gray-400">Ringkasan latar belakang pendidikan dan pengalaman organisasi.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Pendidikan -->
        <div class="bg-gray-800/50 p-6 rounded-2xl border border-white/10">
            <h3 class="text-xl font-semibold text-indigo-400 mb-4">Pendidikan</h3>
            <div class="space-y-4 text-sm text-gray-300">
                <div>
                    <h4 class="font-bold text-white">Universitas Raharja</h4>
                    <p class="text-gray-400">Sistem Komputer | 2023 - 2027</p>
                    <p class="mt-1 text-gray-300">Fokus studi: Pemrograman Web, Basis Data, Jaringan Komputer, Mikrokontroler</p>
                </div>
                <hr class="border-white/5">
                <div>
                    <h4 class="font-bold text-white">SMAN 15 KOTA TANGERANG</h4>
                    <p class="text-gray-400">Jurusan IPA | 2020 - 2023</p>
                </div>
            </div>
        </div>

        <!-- Latar Belakang & Organisasi SMA -->
        <div class="bg-gray-800/50 p-6 rounded-2xl border border-white/10">
            <h3 class="text-xl font-semibold text-indigo-400 mb-4">Pengalaman Sekolah & Organisasi</h3>
            <p class="text-sm text-gray-300 leading-relaxed">
                Ketua Umum OSIS pada tahun 2022, aktif dalam berbagai kegiatan ekstrakurikuler dan proyek sekolah. Memiliki pengalaman dalam kepemimpinan, manajemen acara, dan kolaborasi tim.
            </p>
        </div>
    </div>
</section>

<!-- ==================== SCROLL 3: PORTOFOLIO ==================== -->
<section id="portfolio" class="py-24 px-6 lg:px-8 max-w-7xl mx-auto border-t border-white/10">
    <div class="text-center mb-16">
        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Portofolio & Proyek</h2>
        <p class="mt-2 text-base text-gray-400">Beberapa contoh hasil karya dalam pengembangan perangkat lunak dan desain teknis.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Tabel 1: Web App (PHP) -->
        <div class="bg-gray-800/40 p-6 rounded-2xl border border-white/10">
            <h3 class="text-lg font-semibold text-indigo-400 mb-4 flex items-center gap-2">
                <span>🌐</span> Web Application 
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-gray-300">
                    <thead class="bg-gray-900/60 text-gray-400 uppercase border-b border-white/10">
                        <tr>
                            <th class="p-3">Alat</th>
                            <th class="p-3">Nama Project</th>
                            <th class="p-3">Fungsi</th>
                            <th class="p-3">Link</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <tr>
                            <td class="p-3">
                                <img src="images/Laravel.jpg" alt="Laravel Logo" class="w-9 h-9 object-contain group-hover:scale-105 transition-transform duration-200">
                            </td>
                            <td class="p-3 font-semibold text-white">Traceability System</td>
                            <td class="p-3">Sistem untuk melacak setiap hasil produksi dan aktivitas karyawan di sebuah pabrik</td>
                            <td class="p-3"><a href="#" class="text-indigo-400 hover:underline">Lihat &rarr;</a></td>
                        </tr>
                    </tbody>

                    <tbody class="divide-y divide-white/5">
                        <tr>
                            <td class="p-3">
                                <img src="images/Tailwind.jpg" alt="Laravel Logo" class="w-9 h-9 object-contain group-hover:scale-105 transition-transform duration-200">
                            </td>
                            <td class="p-3 font-semibold text-white">This Web</td>
                            <td class="p-3">Website Portfolio Pribadi untuk menampilkan project dan pengalaman saya</td>
                            <td class="p-3"><a href="#" class="text-indigo-400 hover:underline">Lihat &rarr;</a></td>
                        </tr>
                    </tbody>
                    <tbody class="divide-y divide-white/5">
                        <tr>
                            <td class="p-3">
                                <h4>-</h4>
                            </td>
                            <td class="p-3 font-semibold text-white">Website Affiliate Shopee</td>
                            <td class="p-3">Website Affiliate Shopee</td>
                            <td class="p-3"><a href="#" class="text-indigo-400 hover:underline">Lihat &rarr;</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel 2: Mobile App (Java / IntelliJ IDEA) -->
        <div class="bg-gray-800/40 p-6 rounded-2xl border border-white/10">
            <h3 class="text-lg font-semibold text-indigo-400 mb-4 flex items-center gap-2">
                <span>📱</span> Mobile Application (Java)
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-gray-300">
                    <thead class="bg-gray-900/60 text-gray-400 uppercase border-b border-white/10">
                        <tr>
                            <th class="p-3">Logo</th>
                            <th class="p-3">Nama Aplikasi</th>
                            <th class="p-3">Fungsi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <tr>
                            <td class="p-3">
                                <img src="images/MyMoney.png" alt="MY Money Logo" class="w-9 h-9 object-contain group-hover:scale-105 transition-transform duration-200">
                            </td>
                            <td class="p-3 font-semibold text-white">MY Money</td>
                            <td class="p-3">Aplikasi manajemen keuangan pribadi</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel 3: Mikrokontroler (Arduino/IoT) -->
        <div class="bg-gray-800/40 p-6 rounded-2xl border border-white/10">
            <h3 class="text-lg font-semibold text-indigo-400 mb-4 flex items-center gap-2">
                <span>⚡</span> Mikrokontroler & Hardware
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-gray-300">
                    <thead class="bg-gray-900/60 text-gray-400 uppercase border-b border-white/10">
                        <tr>
                            <th class="p-3">Project</th>
                            <th class="p-3">Fungsi</th>
                            <th class="p-3">Video</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <tr>
                            <td class="p-3 font-semibold text-white">Smart Farming</td>
                            <td class="p-3">Sistem monitoring dan pengendalian pertanian berbasis IoT dengan ESP32</td>
                            <td class="p-3"><a href="#" class="text-red-400 hover:underline">YouTube</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel 4: AutoCAD -->
        <div class="bg-gray-800/40 p-6 rounded-2xl border border-white/10">
            <h3 class="text-lg font-semibold text-indigo-400 mb-4 flex items-center gap-2">
                <span>📐</span> AutoCAD Design
            </h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-gray-300">
                    <thead class="bg-gray-900/60 text-gray-400 uppercase border-b border-white/10">
                        <tr>
                            <th class="p-3">Nama Desain</th>
                            <th class="p-3">Fungsi</th>
                            <th class="p-3">Gambar</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <tr>
                            <td class="p-3 font-semibold text-white">Meja Stand Bladder</td>
                            <td class="p-3">Desain meja stand untuk alat bladders tire</td>
                            <td class="p-3"><a href="#" class="text-blue-400 hover:underline">Desain</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<!-- ==================== SCROLL 4: EXPERIENCE ==================== -->
<section id="experience" class="py-24 px-6 lg:px-8 max-w-6xl mx-auto border-t border-white/10">
    <div class="text-center mb-16">
        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Pengalaman</h2>
        <p class="mt-2 text-base text-gray-400">Rekam jejak pengalaman kerja profesional dan kegiatan organisasi.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Tabel Pengalaman Kerja -->
        <div class="bg-gray-800/40 p-6 rounded-2xl border border-white/10">
            <h3 class="text-xl font-semibold text-indigo-400 mb-4">Pengalaman Kerja</h3>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs text-gray-300">
                    <thead class="bg-gray-900/60 text-gray-400 uppercase border-b border-white/10">
                        <tr>
                            <th class="p-3">Perusahaan / Peran</th>
                            <th class="p-3">Periode</th>
                            <th class="p-3">Tugas Singkat</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <tr>
                            <td class="p-3 font-semibold text-white">PT Secure Parking Indonesia<br><span class="text-gray-400 font-normal">Parking Attendat</span></td>
                            <td class="p-3 text-gray-400">Januari - Februari 2024</td>
                            <td class="p-3">Petugas garda terdepan yang memandu kendaraan masuk/keluar, melayani transaksi tiket/pembayaran digital, dan menata posisi kendaraan</td>
                        </tr>
                        <tr>
                            <td class="p-3 font-semibold text-white">PT Gajah Tunggal Tbk<br><span class="text-gray-400 font-normal">Worker</span></td>
                            <td class="p-3 text-gray-400">Maret 2024 - Sekarang</td>
                            <td class="p-3">Memberikan support untuk departement Produksi seperti memberikan apa saja yang dibutuhkan kepada para karyawan, mengelola aktivitas karyawan untuk penilaian akhir tahun, kepengurusan area.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tabel Pengalaman Organisasi -->
        <div class="bg-gray-800/40 p-6 rounded-2xl border border-white/10">
            <h3 class="text-xl font-semibold text-indigo-400 mb-4">Pengalaman Organisasi</h3>
            <div class="max-h-80 overflow-x-auto overflow-y-auto">
                <table class="w-full text-left text-xs text-gray-300">
                    <thead class="bg-gray-900/60 text-gray-400 uppercase border-b border-white/10">
                        <tr>
                            <th class="p-3">Organisasi / Event</th>
                            <th class="p-3">Jabatan</th>
                            <th class="p-3">Periode</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <!-- 2026 -->
                        <tr>
                            <td class="p-3 font-semibold text-white">Yellow Run 2026</td>
                            <td class="p-3 text-indigo-300">Event Marshal</td>
                            <td class="p-3 text-gray-400">2026</td>
                        </tr>
                        <tr>
                            <td class="p-3 font-semibold text-white">Refreshment Planet Sports Run "Unlock your best together"</td>
                            <td class="p-3 text-indigo-300">Event Marshal</td>
                            <td class="p-3 text-gray-400">2026</td>
                        </tr>

                        <!-- 2025 -->
                        <tr>
                            <td class="p-3 font-semibold text-white">Bank Saqu Sunrise Society Vol.3 Take Over GBK</td>
                            <td class="p-3 text-indigo-300">Event Marshal</td>
                            <td class="p-3 text-gray-400">2025</td>
                        </tr>
                        <tr>
                            <td class="p-3 font-semibold text-white">BNI Wondr Jakarta Running Fest</td>
                            <td class="p-3 text-indigo-300">Event Marshal</td>
                            <td class="p-3 text-gray-400">2025</td>
                        </tr>
                        <tr>
                            <td class="p-3 font-semibold text-white">Isoplus Run Jakarta Series</td>
                            <td class="p-3 text-indigo-300">Event Marshal</td>
                            <td class="p-3 text-gray-400">2025</td>
                        </tr>
                        <tr>
                            <td class="p-3 font-semibold text-white">Digiland Run 2025</td>
                            <td class="p-3 text-indigo-300">Logistics Officer</td>
                            <td class="p-3 text-gray-400">2025</td>
                        </tr>

                        <!-- 2024 -->
                        <tr>
                            <td class="p-3 font-semibold text-white">PT Abipraya 44th Anniversary</td>
                            <td class="p-3 text-indigo-300">Human Directional (HD)</td>
                            <td class="p-3 text-gray-400">2024</td>
                        </tr>
                        <tr>
                            <td class="p-3 font-semibold text-white">Wondr Jakarta Running Fest October 2024</td>
                            <td class="p-3 text-indigo-300">Refreshment Officer</td>
                            <td class="p-3 text-gray-400">2024</td>
                        </tr>
                        <tr>
                            <td class="p-3 font-semibold text-white">Garmin Run</td>
                            <td class="p-3 text-indigo-300">Event Marshal</td>
                            <td class="p-3 text-gray-400">2024</td>
                        </tr>
                        <tr>
                            <td class="p-3 font-semibold text-white">LPS Monas Half Marathon</td>
                            <td class="p-3 text-indigo-300">Event Marshal</td>
                            <td class="p-3 text-gray-400">2024</td>
                        </tr>

                        <!-- 2022 (Pengalaman Organisasi) -->
                        <tr>
                            <td class="p-3 font-semibold text-white">FEISTRA (Bunyi dari Karya)</td>
                            <td class="p-3 text-indigo-300">Sharing Committee</td>
                            <td class="p-3 text-gray-400">2022</td>
                        </tr>
                        <tr>
                            <td class="p-3 font-semibold text-white">Tangerang Kreatif (Cisadane Walk Festival)</td>
                            <td class="p-3 text-indigo-300">Logistics & Equipment Officer</td>
                            <td class="p-3 text-gray-400">2022</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<!-- ==================== SCROLL 5: CONTACT ==================== -->
<section id="contact" class="py-24 px-6 lg:px-8 max-w-4xl mx-auto border-t border-white/10">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Hubungi Saya</h2>
        <p class="mt-2 text-base text-gray-400">Silakan terhubung melalui platform media sosial atau email di bawah ini.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- Email -->
        <a href="mailto:mdenifaw@gmail.com" target="_blank" class="flex items-center gap-4 bg-gray-800/50 p-4 rounded-xl border border-white/10 hover:border-indigo-500 hover:bg-gray-800 transition group">
            <img src="images/Email.png" alt="Email Logo" class="w-9 h-9 object-contain group-hover:scale-105 transition-transform duration-200">
            <div>
                <p class="text-xs text-gray-400">Gmail</p>
                <p class="text-sm font-semibold text-white group-hover:text-indigo-400 transition">mdenifaw@gmail.com</p>
            </div>
        </a>

        <!-- LinkedIn -->
        <a href="https://www.linkedin.com/in/muhdenifahwirayudha" target="_blank" class="flex items-center gap-4 bg-gray-800/50 p-4 rounded-xl border border-white/10 hover:border-indigo-500 hover:bg-gray-800 transition group">
            <img src="images/Linkedin.png" alt="LinkedIn Logo" class="w-9 h-9 object-contain group-hover:scale-105 transition-transform duration-200">
            <div>
                <p class="text-xs text-gray-400">LinkedIn</p>
                <p class="text-sm font-semibold text-white group-hover:text-indigo-400 transition">M Denifah Wirayudha</p>
            </div>
        </a>

        <!-- GitHub -->
        <a href="https://github.com/Deffzx" target="_blank" rel="noopener noreferrer" class="flex items-center gap-4 bg-gray-800/50 p-4 rounded-xl border border-white/10 hover:border-indigo-500 hover:bg-gray-800 transition group">
            <img src="images/github.png" alt="GitHub Logo" class="w-9 h-9 object-contain group-hover:scale-105 transition-transform duration-200">
            <div>
                <p class="text-xs text-gray-400">GitHub</p>
                <p class="text-sm font-semibold text-white group-hover:text-indigo-400 transition">Deffzx</p>
            </div>
        </a>

        <!-- Instagram -->
        <a href="https://instagram.com/m.denifah.w" target="_blank" class="flex items-center gap-4 bg-gray-800/50 p-4 rounded-xl border border-white/10 hover:border-indigo-500 hover:bg-gray-800 transition group">
            <img src="images/instagram.png" alt="Instagram Logo" class="w-9 h-9 object-contain group-hover:scale-105 transition-transform duration-200">
            <div>
                <p class="text-xs text-gray-400">Instagram</p>
                <p class="text-sm font-semibold text-white group-hover:text-indigo-400 transition">m.denifah.w</p>
            </div>
        </a>
    </div>
</section>

<!-- ==================== SCROLL 6: FOOTER THANK YOU ==================== -->
<section class="py-5 px-6 lg:px-8 max-w-4xl mx-auto border-t border-white/10">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Terima Kasih!</h2>
        <p class="mt-2 text-base text-gray-400">Terima kasih telah mengunjungi website pribadi saya. Semoga informasi yang disajikan bermanfaat dan memberikan gambaran yang jelas mengenai profil saya. <br>Untuk mendapatkan informasi lebih lanjut bisa melakukan register/login.</p>
    </div>
    <div class="flex justify-center gap-4">
        <a href="#welcome" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-indigo-500">
            Kembali ke Atas
        </a>
        <a href="#contact" class="rounded-md bg-gray-700 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-gray-600 focus-visible:outline-2 focus-visible:outline-gray-500">
            Hubungi Saya
        </a>
    </div>
    <div class="mt-10 text-center">
        <p class="text-sm text-gray-400">&copy; 2026 M. Denifah Wirayudha. All rights reserved.</p>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
