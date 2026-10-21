<?php
require_once '../Product.php';

$id = 1;
$hapus = Product::delete($id);

if ($hapus) {
    echo "Produk {$id} berhasil dihapus";
} else {
    echo "Gagal menghapus produk";
}
