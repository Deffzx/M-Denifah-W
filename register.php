<?php
// register.php - Halaman Registrasi Member Access
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';

// Jika sudah login, langsung lempar ke about.php
if (is_logged_in()) {
    header('Location: about.php');
    exit;
}

$error = null;

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirmation = $_POST['password_confirmation'] ?? '';

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Gunakan alamat email yang valid.';
    } elseif (strlen($password) < 8) {
        $error = 'Password minimal harus 8 karakter.';
    } elseif ($password !== $password_confirmation) {
        $error = 'Konfirmasi password tidak cocok.';
    } else {
        $emailLower = strtolower($email);

        // Cek apakah email sudah terdaftar
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE LOWER(email) = LOWER(?)");
        $stmt->execute([$emailLower]);
        if ($stmt->fetchColumn() > 0) {
            $error = 'Alamat email ini sudah terdaftar. Silakan gunakan email lain atau login.';
        } else {
            // Simpan akun baru ke SQLite
            $name = explode('@', $emailLower)[0];
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $insert = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
            $insert->execute([$name, $emailLower, $hashedPassword]);

            // Kirim notifikasi bot Telegram
            try {
                notify_account_registered($emailLower);
            } catch (Throwable $e) {
                // Abaikan jika network error, registrasi tetap berhasil
            }

            set_flash('status', 'Registrasi berhasil. Silakan login dengan akun baru kamu.');
            header('Location: login.php');
            exit;
        }
    }
}

$pageTitle = 'Register - M. Denifah Wirayudha';
$currentPage = 'register';
require_once __DIR__ . '/includes/header.php';
?>

<section x-data="{ showPassword: false, showConfirmation: false }" class="min-h-screen px-6 pb-16 pt-32 lg:px-8">
    <div class="mx-auto max-w-lg">
        <div class="rounded-2xl border border-white/10 bg-gray-800/60 p-8 shadow-2xl shadow-indigo-950/20 backdrop-blur-sm sm:p-10">
            <div class="mb-8">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-400">Member Access</p>
                <h1 class="mt-3 text-2xl font-bold text-white">Buat akun pengunjung</h1>
                <p class="mt-2 text-sm leading-6 text-gray-400">Gunakan alamat email yang valid untuk membuat akun Member Access.</p>
            </div>

            <?php if ($error): ?>
                <div class="mb-6 rounded-md border border-red-400/20 bg-red-400/10 px-4 py-3 text-sm text-red-300" role="alert">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="register.php" method="POST" class="space-y-5">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-200">Alamat email</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" autocomplete="email" required autofocus
                        class="mt-2 block w-full rounded-md border border-white/10 bg-gray-900/80 px-4 py-3 text-sm text-white outline-none placeholder:text-gray-500 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/30"
                        placeholder="nama@email.com">
                    <p class="mt-2 text-xs text-gray-500">Domain email harus dapat ditemukan.</p>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-200">Password</label>
                    <div class="relative mt-2">
                        <input :type="showPassword ? 'text' : 'password'" id="password" name="password" minlength="8" autocomplete="new-password" required
                            class="block w-full rounded-md border border-white/10 bg-gray-900/80 px-4 py-3 pr-12 text-sm text-white outline-none placeholder:text-gray-500 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/30"
                            placeholder="Minimal 8 karakter">
                        <button type="button" @click="showPassword = !showPassword" :aria-label="showPassword ? 'Sembunyikan password' : 'Tampilkan password'" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-gray-400 hover:text-indigo-300 focus-visible:outline-2 focus-visible:outline-indigo-500">
                            <span x-text="showPassword ? 'Sembunyikan' : 'Lihat'" class="text-xs font-semibold"></span>
                        </button>
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-200">Konfirmasi password</label>
                    <div class="relative mt-2">
                        <input :type="showConfirmation ? 'text' : 'password'" id="password_confirmation" name="password_confirmation" minlength="8" autocomplete="new-password" required
                            class="block w-full rounded-md border border-white/10 bg-gray-900/80 px-4 py-3 pr-12 text-sm text-white outline-none placeholder:text-gray-500 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/30"
                            placeholder="Ulangi password">
                        <button type="button" @click="showConfirmation = !showConfirmation" :aria-label="showConfirmation ? 'Sembunyikan konfirmasi password' : 'Tampilkan konfirmasi password'" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-gray-400 hover:text-indigo-300 focus-visible:outline-2 focus-visible:outline-indigo-500">
                            <span x-text="showConfirmation ? 'Sembunyikan' : 'Lihat'" class="text-xs font-semibold"></span>
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full rounded-md bg-indigo-500 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-950/30 transition hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-indigo-500">
                    Buat Akun
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-400">
                Sudah memiliki akun?
                <a href="login.php" class="font-semibold text-indigo-400 hover:text-indigo-300">Login di sini</a>
            </p>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
