<?php
// M_Denifah_W - Standalone Non-Laravel Configuration

// Aktifkan Output Buffering agar redirect header() tidak terhalang output awal
if (!ob_get_level()) {
    ob_start();
}

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

// Helper membaca environment variable dari getenv(), $_ENV, atau $_SERVER
function get_app_env(string $key, ?string $default = null): ?string {
    $val = getenv($key);
    if ($val !== false && $val !== '') {
        return $val;
    }
    if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
        return $_ENV[$key];
    }
    if (isset($_SERVER[$key]) && $_SERVER[$key] !== '') {
        return $_SERVER[$key];
    }
    return $default;
}

// Telegram Bot Credentials (Mendukung Vercel Environment Variables & config.local.php)
$genericBotToken = get_app_env('TELEGRAM_BOT_TOKEN');

if (!defined('TELEGRAM_REGISTRATION_BOT_TOKEN')) {
    $envReg = get_app_env('TELEGRAM_REGISTRATION_BOT_TOKEN', $genericBotToken ?: 'YOUR_REGISTRATION_BOT_TOKEN');
    define('TELEGRAM_REGISTRATION_BOT_TOKEN', $envReg);
}
if (!defined('TELEGRAM_CONTACT_BOT_TOKEN')) {
    $envContact = get_app_env('TELEGRAM_CONTACT_BOT_TOKEN', $genericBotToken ?: 'YOUR_CONTACT_BOT_TOKEN');
    define('TELEGRAM_CONTACT_BOT_TOKEN', $envContact);
}
if (!defined('TELEGRAM_CHAT_ID')) {
    $envChatId = get_app_env('TELEGRAM_CHAT_ID', 'YOUR_CHAT_ID');
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

// Telegram Sending Function dengan pelaporan detail error
function send_telegram_raw(string $token, string $chatId, string $message, ?string &$errorDetail = null): bool {
    if (empty($token) || strpos($token, 'YOUR_') === 0) {
        $errorDetail = 'TELEGRAM_CONTACT_BOT_TOKEN atau TELEGRAM_BOT_TOKEN belum diatur';
        return false;
    }
    if (empty($chatId) || strpos($chatId, 'YOUR_') === 0) {
        $errorDetail = 'TELEGRAM_CHAT_ID belum diatur';
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
    $curlErr = curl_error($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($curlErr) {
        $errorDetail = "cURL error: {$curlErr}";
        return false;
    }

    $resJson = json_decode($response, true);
    if ($httpCode >= 200 && $httpCode < 300 && !empty($resJson['ok'])) {
        return true;
    }

    $desc = $resJson['description'] ?? "HTTP {$httpCode}";
    $errorDetail = "Telegram API: {$desc}";
    return false;
}

function notify_account_registered(string $email, ?string &$errorDetail = null): void {
    $message = "Member Access: akun baru terdaftar\nEmail: {$email}";
    
    // Coba bot registrasi terlebih dahulu
    $sent = false;
    if (defined('TELEGRAM_REGISTRATION_BOT_TOKEN') && TELEGRAM_REGISTRATION_BOT_TOKEN !== '' && strpos(TELEGRAM_REGISTRATION_BOT_TOKEN, 'YOUR_') !== 0) {
        $sent = send_telegram_raw(TELEGRAM_REGISTRATION_BOT_TOKEN, TELEGRAM_CHAT_ID, $message, $errorDetail);
    }
    
    // Fallback ke contact bot jika belum terkirim
    if (!$sent && defined('TELEGRAM_CONTACT_BOT_TOKEN') && TELEGRAM_CONTACT_BOT_TOKEN !== '' && strpos(TELEGRAM_CONTACT_BOT_TOKEN, 'YOUR_') !== 0) {
        send_telegram_raw(TELEGRAM_CONTACT_BOT_TOKEN, TELEGRAM_CHAT_ID, $message, $errorDetail);
    }
}

function notify_contact_message(string $name, string $email, string $message, ?string &$errorDetail = null): bool {
    $formatted = "Member Access: pesan kontak baru\nNama: {$name}\nEmail: {$email}\nPesan:\n{$message}";
    return send_telegram_raw(TELEGRAM_CONTACT_BOT_TOKEN, TELEGRAM_CHAT_ID, $formatted, $errorDetail);
}
