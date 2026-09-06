<?php
// api/index.php - Vercel Serverless Function Router for Native PHP

// Pindah working directory ke root project
chdir(dirname(__DIR__));

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$path = parse_url($requestUri, PHP_URL_PATH);
$path = trim($path, '/');

// 1. Fallback untuk file statis jika request dialihkan ke PHP
$staticFile = dirname(__DIR__) . '/' . $path;
if (!empty($path) && file_exists($staticFile) && !is_dir($staticFile)) {
    $ext = strtolower(pathinfo($staticFile, PATHINFO_EXTENSION));
    $mimes = [
        'css'   => 'text/css',
        'js'    => 'application/javascript',
        'png'   => 'image/png',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'gif'   => 'image/gif',
        'svg'   => 'image/svg+xml',
        'ico'   => 'image/x-icon',
        'woff'  => 'font/woff',
        'woff2' => 'font/woff2',
        'ttf'   => 'font/ttf',
    ];
    if (isset($mimes[$ext])) {
        header('Content-Type: ' . $mimes[$ext]);
        readfile($staticFile);
        exit;
    }
}

// 2. Daftar rute halaman PHP
$routes = [
    ''               => 'index.php',
    'index'          => 'index.php',
    'index.php'      => 'index.php',
    'about'          => 'about.php',
    'about.php'      => 'about.php',
    'portofolio'     => 'portofolio.php',
    'portofolio.php' => 'portofolio.php',
    'portfolio'      => 'portofolio.php',
    'portfolio.php'  => 'portofolio.php',
    'experience'     => 'experience.php',
    'experience.php' => 'experience.php',
    'contact'        => 'contact.php',
    'contact.php'    => 'contact.php',
    'login'          => 'login.php',
    'login.php'      => 'login.php',
    'register'       => 'register.php',
    'register.php'   => 'register.php',
    'logout'         => 'logout.php',
    'logout.php'     => 'logout.php',
];

$targetFile = $routes[$path] ?? null;

// Jika file PHP langsung ada di root
if (!$targetFile && !empty($path) && file_exists(dirname(__DIR__) . '/' . $path) && substr($path, -4) === '.php') {
    $targetFile = $path;
}

if ($targetFile && file_exists(dirname(__DIR__) . '/' . $targetFile)) {
    $_SERVER['SCRIPT_FILENAME'] = dirname(__DIR__) . '/' . $targetFile;
    $_SERVER['SCRIPT_NAME'] = '/' . $targetFile;
    $_SERVER['PHP_SELF'] = '/' . $targetFile;
    require dirname(__DIR__) . '/' . $targetFile;
} else {
    http_response_code(404);
    echo "<!DOCTYPE html><html lang='id'><head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'><title>404 Not Found</title></head><body style='font-family:system-ui,-apple-system,sans-serif;background:#0f172a;color:#f8fafc;display:flex;justify-content:center;align-items:center;min-height:100vh;margin:0;'><div style='text-align:center;padding:2rem;'><h1 style='font-size:3rem;margin:0 0 1rem;color:#818cf8;'>404</h1><p style='font-size:1.25rem;color:#94a3b8;margin-bottom:2rem;'>Halaman tidak ditemukan.</p><a href='/' style='background:#4f46e5;color:white;text-decoration:none;padding:0.75rem 1.5rem;border-radius:0.5rem;font-weight:600;'>Kembali ke Beranda</a></div></body></html>";
}
