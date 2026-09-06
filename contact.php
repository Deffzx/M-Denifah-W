<?php
// contact.php - Halaman Contact & Form Telegram (Member Protected)
require_once __DIR__ . '/config.php';
require_auth();

$status = get_flash('status');
$error = get_flash('error');

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name) || strlen($name) > 100) {
        set_flash('error', 'Silakan masukkan nama pengirim yang valid.');
        header('Location: contact.php');
        exit;
    } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        set_flash('error', 'Silakan masukkan alamat email yang valid.');
        header('Location: contact.php');
        exit;
    } elseif (empty($message) || strlen($message) > 4000) {
        set_flash('error', 'Pesan tidak boleh kosong dan maksimal 4000 karakter.');
        header('Location: contact.php');
        exit;
    } else {
        try {
            $errorDetail = null;
            $sent = notify_contact_message($name, $email, $message, $errorDetail);
            if ($sent) {
                set_flash('status', 'Pesan berhasil dikirim. Terima kasih sudah menghubungi saya.');
            } else {
                $errorMsg = 'Pesan belum dapat dikirim. Periksa konfigurasi bot Telegram.';
                if (!empty($errorDetail)) {
                    $errorMsg .= ' (' . $errorDetail . ')';
                }
                set_flash('error', $errorMsg);
            }
        } catch (Throwable $e) {
            set_flash('error', 'Pesan belum dapat dikirim: ' . $e->getMessage());
        }
        header('Location: contact.php');
        exit;
    }
}

$pageTitle = 'Contact - M. Denifah Wirayudha';
$currentPage = 'contact';
require_once __DIR__ . '/includes/header.php';
?>

<main class="px-6 pb-24 pt-32 lg:px-8">
    <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
        <section>
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-400">Contact</p>
            <h1 class="mt-4 text-4xl font-semibold tracking-tight text-white sm:text-6xl">Mari terhubung.</h1>
            <p class="mt-6 text-lg leading-8 text-gray-400">Punya pertanyaan, ide kolaborasi, atau ingin mengetahui lebih banyak tentang proyek saya? Kirim pesan melalui formulir ini.</p>
            <div class="mt-10 space-y-5 text-sm text-gray-400">
                <p><span class="font-semibold text-white">Email</span><br>mdenifaw@gmail.com</p>
                <p><span class="font-semibold text-white">Respons</span><br>Pesan akan diteruskan ke Ponsel pribadi Saya, harap tunggu balasan ya!</p>
            </div>
        </section>

        <section class="rounded-2xl border border-white/10 bg-gray-800/60 p-8 shadow-2xl shadow-indigo-950/20 backdrop-blur-sm sm:p-10">
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

            <h2 class="text-2xl font-bold text-white">Kirim pesan</h2>
            <p class="mt-2 text-sm text-gray-400">Isi data berikut agar saya dapat membalas pesanmu.</p>
            
            <form action="contact.php" method="POST" class="mt-8 space-y-5">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-200">Nama pengirim</label>
                    <input type="text" id="name" name="name" required class="mt-2 block w-full rounded-md border border-white/10 bg-gray-900/80 px-4 py-3 text-sm text-white outline-none placeholder:text-gray-500 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/30" placeholder="Nama kamu">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-200">Alamat email</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($_SESSION['user_email'] ?? '') ?>" required class="mt-2 block w-full rounded-md border border-white/10 bg-gray-900/80 px-4 py-3 text-sm text-white outline-none placeholder:text-gray-500 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/30" placeholder="nama@email.com">
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-200">Pesan</label>
                    <textarea id="message" name="message" rows="6" required class="mt-2 block w-full resize-y rounded-md border border-white/10 bg-gray-900/80 px-4 py-3 text-sm leading-6 text-white outline-none placeholder:text-gray-500 focus:border-indigo-400 focus:ring-2 focus:ring-indigo-500/30" placeholder="Tulis pesan kamu..."></textarea>
                </div>
                <button type="submit" class="w-full rounded-md bg-indigo-500 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-950/30 transition hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-indigo-500">
                    Kirim
                </button>
            </form>
        </section>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
