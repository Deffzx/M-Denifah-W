# M_Denifah_W (Versi Standalone Non-Laravel)

Project website portofolio pribadi milik **M. Denifah Wirayudha** versi **Native PHP + SQLite**.
Website ini memiliki tampilan visual yang **100% sama persis** dengan versi Laravel, namun dirancang ringan dan mandiri tanpa membutuhkan Composer ataupun framework Laravel.

---

## Fitur Utama

1. **Pixel-Perfect Design**:
   - Menggunakan aset Tailwind CSS hasil kompilasi asli (`assets/app-BJiLA5iJ.css`).
   - Animasi scroll reveal asli via IntersectionObserver (`assets/app-CuZKXZ7g.js`).
   - Font kustom "Instrument Sans" lokal woff/woff2 (`assets/fonts-DMOSjcMr.css`).
   - Navbar interaktif dengan drawer mobile responsif via Alpine.js.
   - Efek glow polygon background yang identik.

2. **Aset Gambar Lengkap**:
   - Seluruh logo dan foto (`Logo.png`, `Agents.jpg`, `MyMoney.png`, `Laravel.jpg`, `Email.png`, `Linkedin.png`, `github.png`, `instagram.png`) telah disalin ke folder `images/`.

3. **Sistem Autentikasi Member Access**:
   - Registrasi akun baru di `register.php` (validasi email, password minimal 8 karakter, konfirmasi password).
   - Password dienkripsi dengan standar keamanan tinggi `password_hash()` (BCRYPT).
   - Login di `login.php` dengan `password_verify()`, session PHP, dan proteksi halaman.
   - Halaman `about.php`, `portofolio.php`, `experience.php`, dan `contact.php` hanya dapat diakses setelah login.
   - Logout di `logout.php`.

4. **Notifikasi Bot Telegram**:
   - **Pendaftaran Akun Baru**: Mengirimkan notifikasi langsung ke bot Telegram saat ada pengunjung yang mendaftar.
   - **Pesan Kontak**: Mengirimkan pesan formulir kontak dari `contact.php` (Nama, Email, dan Pesan) langsung ke Telegram Anda.
   - Pengiriman dilakukan di sisi server via cURL sehingga token bot Telegram Anda aman dan tidak terekspos di browser.

5. **Database SQLite Otomatis (Zero Configuration)**:
   - Menggunakan SQLite bawaan PHP (`database.sqlite`).
   - Tabel `users` akan otomatis dibuat saat pertama kali website dibuka.
   - Tidak perlu install atau konfigurasi server MySQL/PostgreSQL tambahan.

---

## Cara Menjalankan Website

### Opsi 1: Menggunakan Laragon (Sangat Direkomendasikan)
1. Buka aplikasi **Laragon**.
2. Klik tombol **Start All**.
3. Buka browser dan kunjungi salah satu URL berikut:
   - `http://localhost/M_Denifah_W/`
   - atau `http://M_Denifah_W.test/`

### Opsi 2: Menggunakan PHP Built-in Server
Buka terminal/PowerShell di folder ini, lalu jalankan:
```bash
php -S localhost:8080
```
Buka browser di `http://localhost:8080`.

---

## Struktur Folder & File

```
M_Denifah_W/
├── config.php            # Konfigurasi Token Telegram, Session & Helper
├── db.php                # Koneksi SQLite & inisialisasi tabel users
├── index.php             # Halaman Beranda (Pengenalan / Hero / Portfolio preview)
├── login.php             # Halaman Login
├── register.php          # Halaman Register
├── logout.php            # Handler Logout
├── about.php             # Halaman Tentang Saya (Khusus Member)
├── portofolio.php        # Halaman Portofolio Proyek (Khusus Member)
├── experience.php        # Halaman Pengalaman Kerja & Organisasi (Khusus Member)
├── contact.php           # Halaman Formulir Kontak & Pengirim Telegram (Khusus Member)
├── includes/
│   ├── header.php        # Navbar responsif, Alpine drawer, auth check, glow blob
│   └── footer.php        # Glow blob penutup & script animasi
├── assets/               # CSS Tailwind, JS reveal observer, dan web fonts
├── images/               # Semua file gambar proyek
├── .htaccess             # Pengaturan rewrite Apache & MIME type font
└── database.sqlite       # Database SQLite lokal (otomatis terbuat)
```
