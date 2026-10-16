-- Jalankan di HeidiSQL (tab Query) jika ingin membuat database & tabel lewat SQL
CREATE DATABASE IF NOT EXISTS latihan_pbo;
USE latihan_pbo;

CREATE TABLE IF NOT EXISTS catatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(200),
    isi TEXT
);
