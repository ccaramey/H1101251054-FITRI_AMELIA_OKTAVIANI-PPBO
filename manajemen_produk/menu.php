<?php
// Antarmuka sederhana (form) untuk CRUD - dijalankan lewat terminal: php menu.php
require_once 'Product.php';

if (php_sapi_name() !== 'cli') {
    die("Jalankan file ini lewat terminal dengan perintah: php menu.php");
}

// menampilkan pertanyaan lalu membaca jawaban dari keyboard
function input($label) {
    echo $label;
    return trim(fgets(STDIN));
}

// meminta angka sampai pengguna mengisi dengan benar
function inputAngka($label) {
    while (true) {
        $nilai = input($label);
        if ($nilai !== '' && ctype_digit($nilai)) {
            return (int) $nilai;
        }
        echo "Input harus berupa angka (0 atau lebih)." . PHP_EOL;
    }
}

// meminta teks yang tidak boleh kosong
function inputWajib($label) {
    while (true) {
        $nilai = input($label);
        if ($nilai !== '') {
            return $nilai;
        }
        echo "Input tidak boleh kosong." . PHP_EOL;
    }
}

function tampilkanDetail($p) {
    echo "ID        : " . $p['id'] . PHP_EOL;
    echo "Nama      : " . $p['nama'] . PHP_EOL;
    echo "Harga     : Rp " . number_format($p['harga'], 0, ',', '.') . PHP_EOL;
    echo "Stok      : " . $p['stok'] . PHP_EOL;
    echo "Deskripsi : " . $p['deskripsi'] . PHP_EOL;
}

while (true) {
    echo PHP_EOL;
    echo "=============================" . PHP_EOL;
    echo "  SISTEM MANAJEMEN PRODUK" . PHP_EOL;
    echo "=============================" . PHP_EOL;
    echo "1. Tambah produk" . PHP_EOL;
    echo "2. Lihat semua produk" . PHP_EOL;
    echo "3. Lihat satu produk" . PHP_EOL;
    echo "4. Ubah produk" . PHP_EOL;
    echo "5. Hapus produk" . PHP_EOL;
    echo "0. Keluar" . PHP_EOL;
    $pilihan = input("Pilih menu: ");
    echo PHP_EOL;

    switch ($pilihan) {
        case '1':
            echo "--- Tambah Produk ---" . PHP_EOL;
            $nama = inputWajib("Nama produk : ");
            $harga = inputAngka("Harga (Rp)  : ");
            $stok = inputAngka("Stok         : ");
            $deskripsi = input("Deskripsi    : ");

            $p = new Product();
            $hasil = $p->setNama($nama)
                       ->setHarga($harga)
                       ->setStok($stok)
                       ->setDeskripsi($deskripsi)
                       ->save();
            echo $hasil ? "Produk berhasil disimpan." : "Produk gagal disimpan.";
            echo PHP_EOL;
            break;

        case '2':
            echo "--- Daftar Produk ---" . PHP_EOL;
            $data = Product::findAll();
            if (count($data) === 0) {
                echo "Belum ada data produk." . PHP_EOL;
            }
            foreach ($data as $item) {
                echo $item['id'] . ". " . $item['nama']
                   . " - Rp " . number_format($item['harga'], 0, ',', '.')
                   . " - Stok: " . $item['stok'] . PHP_EOL;
            }
            break;

        case '3':
            echo "--- Detail Produk ---" . PHP_EOL;
            $id = inputAngka("Masukkan ID produk: ");
            $detail = Product::findById($id);
            if ($detail) {
                tampilkanDetail($detail);
            } else {
                echo "Produk tidak ditemukan." . PHP_EOL;
            }
            break;

        case '4':
            echo "--- Ubah Produk ---" . PHP_EOL;
            $id = inputAngka("Masukkan ID produk yang diubah: ");
            $lama = Product::findById($id);
            if (!$lama) {
                echo "Produk tidak ditemukan." . PHP_EOL;
                break;
            }
            echo "Data saat ini:" . PHP_EOL;
            tampilkanDetail($lama);
            echo "(Kosongkan lalu tekan Enter jika tidak ingin mengubah)" . PHP_EOL;

            $nama = input("Nama baru      : ");
            $harga = input("Harga baru     : ");
            $stok = input("Stok baru      : ");
            $deskripsi = input("Deskripsi baru : ");

            if ($nama === '') { $nama = $lama['nama']; }
            if ($harga === '' || !ctype_digit($harga)) { $harga = $lama['harga']; }
            if ($stok === '' || !ctype_digit($stok)) { $stok = $lama['stok']; }
            if ($deskripsi === '') { $deskripsi = $lama['deskripsi']; }

            $p = new Product();
            $hasil = $p->setNama($nama)
                       ->setHarga((int) $harga)
                       ->setStok((int) $stok)
                       ->setDeskripsi($deskripsi)
                       ->update($id);
            echo $hasil ? "Produk berhasil diperbarui." : "Produk gagal diperbarui.";
            echo PHP_EOL;
            break;

        case '5':
            echo "--- Hapus Produk ---" . PHP_EOL;
            $id = inputAngka("Masukkan ID produk yang dihapus: ");
            $detail = Product::findById($id);
            if (!$detail) {
                echo "Produk tidak ditemukan." . PHP_EOL;
                break;
            }
            tampilkanDetail($detail);
            $yakin = input("Yakin hapus produk ini? (y/n): ");
            if (strtolower($yakin) === 'y') {
                $hasil = Product::delete($id);
                echo $hasil ? "Produk berhasil dihapus." : "Produk gagal dihapus.";
                echo PHP_EOL;
            } else {
                echo "Penghapusan dibatalkan." . PHP_EOL;
            }
            break;

        case '0':
            echo "Terima kasih. Program selesai." . PHP_EOL;
            exit;

        default:
            echo "Menu tidak tersedia, pilih angka 0-5." . PHP_EOL;
    }
}
