<?php
// M_Denifah_W - SQLite Database Connection

require_once __DIR__ . '/config.php';

// Cek apakah berjalan di lingkungan Vercel atau serverless
$isVercel = !empty($_ENV['VERCEL']) || !empty(getenv('VERCEL')) || !empty($_SERVER['VERCEL']);

if ($isVercel) {
    // Di Vercel, direktori root bersifat Read-Only.
    // Gunakan folder /tmp yang memiliki izin tulis (writable).
    $dbFile = sys_get_temp_dir() . '/database.sqlite';
} else {
    // Di Laragon / Local, simpan langsung di folder project
    $dbFile = __DIR__ . '/database.sqlite';
}

try {
    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Otomatis buat tabel users jika belum ada
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )
    ");
} catch (PDOException $e) {
    die("Koneksi Database Gagal: " . $e->getMessage());
}
