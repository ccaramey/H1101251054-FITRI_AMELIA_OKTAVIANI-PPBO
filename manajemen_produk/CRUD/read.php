<?php
require_once '../Product.php';

$detail = Product::findById(1);

if ($detail) {
    echo "Nama: " . $detail['nama'] . PHP_EOL;
    echo "Harga: Rp " . $detail['harga'] . PHP_EOL;
    echo "Stok: " . $detail['stok'] . PHP_EOL;
    echo "Deskripsi: " . $detail['deskripsi'] . PHP_EOL;
} else {
    echo "Produk tidak ditemukan.";
}
