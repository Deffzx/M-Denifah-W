<?php
// M_Denifah_W - Database Connection (Neon PostgreSQL with SQLite Fallback)

require_once __DIR__ . '/config.php';

// Cek apakah berjalan di lingkungan Vercel atau serverless
$isVercel = !empty($_ENV['VERCEL']) || !empty(getenv('VERCEL')) || !empty($_SERVER['VERCEL']);

// Ambil Connection String PostgreSQL (mendukung DATABASE_URL dan POSTGRES_URL standar Neon & Vercel)
$dbUrl = (defined('DATABASE_URL') ? DATABASE_URL : null)
    ?: getenv('DATABASE_URL')
    ?: ($_ENV['DATABASE_URL'] ?? null)
    ?: getenv('POSTGRES_URL')
    ?: ($_ENV['POSTGRES_URL'] ?? null);

$pdo = null;

if (!empty($dbUrl)) {
    try {
        // Format URL: postgresql://[user]:[pass]@[host]:[port]/[dbname]?sslmode=require
        $parts = parse_url($dbUrl);
        $host = $parts['host'] ?? 'localhost';
        $port = $parts['port'] ?? 5432;
        $dbName = ltrim($parts['path'] ?? '', '/');
        $user = isset($parts['user']) ? urldecode($parts['user']) : '';
        $pass = isset($parts['pass']) ? urldecode($parts['pass']) : '';

        $sslmode = 'require';
        if (!empty($parts['query'])) {
            parse_str($parts['query'], $query);
            if (!empty($query['sslmode'])) {
                $sslmode = $query['sslmode'];
            }
        }

        $dsn = "pgsql:host={$host};port={$port};dbname={$dbName};sslmode={$sslmode}";
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_TIMEOUT => 5,
        ]);

        // Otomatis buat tabel users di PostgreSQL jika belum ada
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS users (
                id SERIAL PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
        ");
    } catch (PDOException $e) {
        error_log("Koneksi Neon PostgreSQL Gagal: " . $e->getMessage());
        if ($isVercel) {
            die("Koneksi Database Neon PostgreSQL Gagal. Silakan periksa nilai DATABASE_URL di Environment Variables Vercel.<br>Error: " . htmlspecialchars($e->getMessage()));
        }
    }
}

// Fallback ke SQLite jika belum ada DATABASE_URL
if ($pdo === null) {
    if ($isVercel) {
        // Di Vercel, direktori root bersifat Read-Only. Gunakan /tmp
        $dbFile = sys_get_temp_dir() . '/database.sqlite';
    } else {
        // Di Laragon / Local, simpan langsung di folder project
        $dbFile = __DIR__ . '/database.sqlite';
    }

    try {
        $pdo = new PDO('sqlite:' . $dbFile);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        // Otomatis buat tabel users jika belum ada di SQLite
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
        die("Koneksi Database SQLite Gagal: " . $e->getMessage());
    }
}
