<?php
// M_Denifah_W - Standalone Non-Laravel Configuration

if (session_status() === PHP_SESSION_NONE) {
    // Di Vercel serverless functions, gunakan /tmp/sessions agar tidak terkendala read-only permission
    if (!empty($_ENV['VERCEL']) || !empty(getenv('VERCEL')) || !empty($_SERVER['VERCEL'])) {
        $sessDir = sys_get_temp_dir() . '/sessions';
        if (!is_dir($sessDir)) {
            @mkdir($sessDir, 0777, true);
        }
        @session_save_path($sessDir);
    }
    session_start();
}

// Load local credentials if available (disimpan di config.local.php agar aman dari Git)
if (file_exists(__DIR__ . '/config.local.php')) {
    require_once __DIR__ . '/config.local.php';
}

// Telegram Bot Credentials (Mendukung Vercel Environment Variables & config.local.php)
if (!defined('TELEGRAM_REGISTRATION_BOT_TOKEN')) {
    $envReg = getenv('TELEGRAM_REGISTRATION_BOT_TOKEN') ?: ($_ENV['TELEGRAM_REGISTRATION_BOT_TOKEN'] ?? 'YOUR_REGISTRATION_BOT_TOKEN');
    define('TELEGRAM_REGISTRATION_BOT_TOKEN', $envReg);
}
if (!defined('TELEGRAM_CONTACT_BOT_TOKEN')) {
    $envContact = getenv('TELEGRAM_CONTACT_BOT_TOKEN') ?: ($_ENV['TELEGRAM_CONTACT_BOT_TOKEN'] ?? 'YOUR_CONTACT_BOT_TOKEN');
    define('TELEGRAM_CONTACT_BOT_TOKEN', $envContact);
}
if (!defined('TELEGRAM_CHAT_ID')) {
    $envChatId = getenv('TELEGRAM_CHAT_ID') ?: ($_ENV['TELEGRAM_CHAT_ID'] ?? 'YOUR_CHAT_ID');
    define('TELEGRAM_CHAT_ID', $envChatId);
}

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
    if (empty($token) || empty($chatId)) {
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
    
    // Try registration bot first
    $sent = false;
    if (defined('TELEGRAM_REGISTRATION_BOT_TOKEN') && TELEGRAM_REGISTRATION_BOT_TOKEN !== '') {
        $sent = send_telegram_raw(TELEGRAM_REGISTRATION_BOT_TOKEN, TELEGRAM_CHAT_ID, $message);
    }
    
    // Fallback to contact bot if not sent
    if (!$sent && defined('TELEGRAM_CONTACT_BOT_TOKEN') && TELEGRAM_CONTACT_BOT_TOKEN !== '') {
        send_telegram_raw(TELEGRAM_CONTACT_BOT_TOKEN, TELEGRAM_CHAT_ID, $message);
    }
}

function notify_contact_message(string $name, string $email, string $message): bool {
    $formatted = "Member Access: pesan kontak baru\nNama: {$name}\nEmail: {$email}\nPesan:\n{$message}";
    return send_telegram_raw(TELEGRAM_CONTACT_BOT_TOKEN, TELEGRAM_CHAT_ID, $formatted);
}
