<?php
// Tes cepat: pastikan env vars terpasang dan bot bisa kirim pesan
// File ini AMAN untuk di-deploy sementara, tidak mengandung credentials
chdir(dirname(__DIR__));
require_once __DIR__ . '/../config.php';

$err = null;
$ok = notify_contact_message('Tes Antigravity', 'test@denifah.dev', 'Tes otomatis dari Vercel - Konfigurasi bot Telegram berhasil!', $err);

header('Content-Type: application/json');
echo json_encode([
    'status'       => $ok ? 'BERHASIL' : 'GAGAL',
    'error'        => $err,
    'token_set'    => strpos(TELEGRAM_CONTACT_BOT_TOKEN, 'YOUR_') === false ? 'YA' : 'TIDAK',
    'chat_id_set'  => strpos(TELEGRAM_CHAT_ID, 'YOUR_') === false ? 'YA' : 'TIDAK',
]);
