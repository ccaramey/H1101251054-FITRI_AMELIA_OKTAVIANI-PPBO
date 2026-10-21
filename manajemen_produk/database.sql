CREATE DATABASE IF NOT EXISTS manajemen_produk;
USE manajemen_produk;

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL DEFAULT 0,
    deskripsi TEXT
);
