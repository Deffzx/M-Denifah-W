<?php
// login.php - Halaman Login Member Access
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';

// Jika sudah login, langsung lempar ke about.php
if (is_logged_in()) {
    header('Location: about.php');
    exit;
}

$error = null;
$status = get_flash('status');

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $error = 'Silakan isi email dan password.';
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE LOWER(email) = LOWER(?) LIMIT 1");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Login sukses
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            $redirectTo = $_SESSION['redirect_after_login'] ?? 'about.php';
            unset($_SESSION['redirect_after_login']);
            header('Location: ' . $redirectTo);
            exit;
        } else {
            $error = 'Email atau password yang dimasukkan tidak sesuai.';
        }
    }
}

$pageTitle = 'Login - M. Denifah Wirayudha';
$currentPage = 'login';
require_once __DIR__ . '/includes/header.php';
?>

<section x-data="{ showPassword: false }" class="min-h-screen px-6 pb-16 pt-32 lg:px-8">
    <div class="mx-auto grid max-w-5xl items-center gap-12 lg:grid-cols-[1fr_420px]">
        <div class="hidden lg:block">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-400">Member Access</p>
            <h1 class="mt-4 max-w-xl text-4xl font-semibold tracking-tight text-white sm:text-6xl">
                Selamat datang kembali.
            </h1>
            <p class="mt-6 max-w-lg text-lg leading-8 text-gray-400">
                Masuk untuk melihat detail pengalaman dan informasi lengkap mengenai perjalanan profesional saya.
            </p>
        </div>

        <div class="rounded-2xl border border-white/10 bg-gray-800/60 p-8 shadow-2xl shadow-indigo-950/20 backdrop-blur-sm sm:p-10">
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-white">Login ke akun</h2>
                <p class="mt-2 text-sm text-gray-400">Gunakan email dan password yang telah terdaftar.</p>
            </div>

            <?php if ($status): ?>
                <div class="mb-6 rounded-md border border-emerald-400/20 bg-emerald-400/10 px-4 py-3 text-sm text-emerald-300" role="status">
                    <?= htmlspecialchars($status) ?>
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="mb-6 rounded-md border border-red-400/20 bg-red-400/10 px-4 py-3 text-sm text-red-300" role="alert">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST" class="space-y-5">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-200">Email</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" autocomplete="email" required
                        class="mt-2 block w-full rounded-md border border-white/10 bg-gray-900/80 px-4 py-3 text-sm text-white outline-none placeholder:text-gray-500 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/30"
                        placeholder="nama@email.com">
                </div>

                <div>
                    <div class="flex items-center justify-between gap-4">
                        <label for="password" class="block text-sm font-medium text-gray-200">Password</label>
                        <a href="#" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300">Lupa password?</a>
                    </div>
                    <div class="relative mt-2">
                        <input :type="showPassword ? 'text' : 'password'" id="password" name="password" autocomplete="current-password" required
                        class="block w-full rounded-md border border-white/10 bg-gray-900/80 px-4 py-3 pr-12 text-sm text-white outline-none placeholder:text-gray-500 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/30"
                        placeholder="Masukkan password">
                        <button type="button" @click="showPassword = !showPassword" :aria-label="showPassword ? 'Sembunyikan password' : 'Tampilkan password'" class="absolute inset-y-0 right-0 flex w-12 items-center justify-center text-gray-400 transition hover:text-indigo-300 focus-visible:outline-2 focus-visible:outline-indigo-500">
                            <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.644C3.423 7.51 7.36 5 12 5c4.64 0 8.577 2.51 9.964 6.678.044.13.044.27 0 .4C20.577 16.49 16.64 19 12 19c-4.64 0-8.577-2.51-9.964-6.678Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 2.036 12.322a1.012 1.012 0 0 0 0 .644C3.423 17.49 7.36 20 12 20a10.45 10.45 0 0 0 5.32-1.444M6.228 6.228A10.451 10.451 0 0 1 12 4c4.64 0 8.577 2.51 9.964 6.678.044.13.044.27 0 .4a10.523 10.523 0 0 1-4.143 5.117M6.228 6.228 3 3m3.228 3.228 3.65 3.65m4.244 4.244 3.65 3.65M9.878 9.878a3 3 0 0 0 4.244 4.244M9.878 9.878 3 3m11.122 11.122L21 21" />
                            </svg>
                        </button>
                    </div>
                </div>

                <label class="flex items-center gap-3 text-sm text-gray-400">
                    <input type="checkbox" name="remember" class="size-4 rounded border-white/20 bg-gray-900 text-indigo-500 focus:ring-indigo-500/40">
                    Ingat saya
                </label>

                <button type="submit" class="w-full rounded-md bg-indigo-500 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-950/30 transition hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-indigo-500">
                    Login
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-gray-400">
                Belum memiliki akun?
                <a href="register.php" class="font-semibold text-indigo-400 hover:text-indigo-300">Daftar sekarang</a>
            </p>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
