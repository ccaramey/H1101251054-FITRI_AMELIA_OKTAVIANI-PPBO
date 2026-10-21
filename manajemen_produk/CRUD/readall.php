<?php
require_once '../Product.php';

$data = Product::findAll();

foreach ($data as $item) {
    echo $item['id'] . ". " . $item['nama'] . " - Rp " . $item['harga'] . " - Stok: " . $item['stok'];
    echo PHP_EOL;
}
