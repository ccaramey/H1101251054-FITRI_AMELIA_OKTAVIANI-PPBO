<?php
require_once '../Product.php';

$id = 1;
$produkData = Product::findById($id);

if ($produkData) {
    $produk = new Product();
    $produk->setNama($produkData['nama'] . ' (Diperbarui)')
           ->setHarga($produkData['harga'] + 500)
           ->setStok($produkData['stok'])
           ->setDeskripsi($produkData['deskripsi'] . ' (Diperbarui)');

    if ($produk->update($id)) {
        echo "Produk {$id} berhasil diperbarui";
    } else {
        echo "Gagal memperbarui produk";
    }
} else {
    echo "Produk dengan id {$id} tidak ditemukan";
}
