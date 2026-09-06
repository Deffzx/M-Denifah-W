<?php
// M_Denifah_W - Standalone Configuration Template
// Salin file ini menjadi config.php jika belum ada

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Neon PostgreSQL Database Connection URL (Opsional, fallback otomatis ke SQLite jika kosong)
// Format: postgresql://[user]:[password]@[endpoint].neon.tech/[dbname]?sslmode=require
// define('DATABASE_URL', 'YOUR_NEON_DATABASE_URL_HERE');

// Telegram Bot Credentials (Ganti dengan token bot & Chat ID Anda)
define('TELEGRAM_REGISTRATION_BOT_TOKEN', 'YOUR_REGISTRATION_BOT_TOKEN_HERE');
define('TELEGRAM_CONTACT_BOT_TOKEN', 'YOUR_CONTACT_BOT_TOKEN_HERE');
define('TELEGRAM_CHAT_ID', 'YOUR_CHAT_ID_HERE');

// Base URL helper
function base_url(string $path = ''): string {
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
    $base = rtrim($scriptDir, '/');
    return $base . '/' . ltrim($path, '/');
}

// Auth Helpers
function is_logged_in(): bool {
    return !empty($_SESSION['user_id']);
}

function current_user(): ?array {
    return $_SESSION['user'] ?? null;
}

function require_auth(): void {
    if (!is_logged_in()) {
        $currentUri = $_SERVER['REQUEST_URI'] ?? 'index.php';
        $_SESSION['redirect_after_login'] = $currentUri;
        header('Location: login.php');
        exit;
    }
}

// Flash Message Helpers
function set_flash(string $type, string $message): void {
    $_SESSION['flash'][$type] = $message;
}

function get_flash(string $type): ?string {
    if (!empty($_SESSION['flash'][$type])) {
        $msg = $_SESSION['flash'][$type];
        unset($_SESSION['flash'][$type]);
        return $msg;
    }
    return null;
}

// Telegram Sending Function
function send_telegram_raw(string $token, string $chatId, string $message): bool {
    if (empty($token) || empty($chatId) || strpos($token, 'YOUR_') === 0) {
        return false;
    }

    $url = "https://api.telegram.org/bot{$token}/sendMessage";
    $ch = curl_init($url);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'chat_id' => $chatId,
        'text' => $message,
    ]));
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return ($httpCode >= 200 && $httpCode < 300);
}

function notify_account_registered(string $email): void {
    $message = "Member Access: akun baru terdaftar\nEmail: {$email}";
    
    if (defined('TELEGRAM_REGISTRATION_BOT_TOKEN') && TELEGRAM_REGISTRATION_BOT_TOKEN !== '') {
        $sent = send_telegram_raw(TELEGRAM_REGISTRATION_BOT_TOKEN, TELEGRAM_CHAT_ID, $message);
    }
    
    if (empty($sent) && defined('TELEGRAM_CONTACT_BOT_TOKEN') && TELEGRAM_CONTACT_BOT_TOKEN !== '') {
        send_telegram_raw(TELEGRAM_CONTACT_BOT_TOKEN, TELEGRAM_CHAT_ID, $message);
    }
}

function notify_contact_message(string $name, string $email, string $message): bool {
    $formatted = "Member Access: pesan kontak baru\nNama: {$name}\nEmail: {$email}\nPesan:\n{$message}";
    return send_telegram_raw(TELEGRAM_CONTACT_BOT_TOKEN, TELEGRAM_CHAT_ID, $formatted);
}
