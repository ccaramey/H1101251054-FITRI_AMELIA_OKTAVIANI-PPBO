<?php
// Tugas 2 : Validasi Harga

class Produk {
    private $nama;
    private $harga;
    private $pesanHarga = "";

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setHarga($harga) {
        if (!is_numeric($harga)) {
            $this->pesanHarga = "Harga harus berupa angka.";
        } elseif ($harga < 0) {
            $this->pesanHarga = "Harga tidak boleh negatif.";
        } elseif ($harga > 50000000) {
            $this->pesanHarga = "Harga maksimal Rp 50.000.000.";
        } else {
            $this->harga = $harga;
        }
    }

    public function getHarga() {
        return $this->harga ?? $this->pesanHarga;
    }
}

$produk1 = new Produk();
$produk1->setNama("Kemeja Batik");
$produk1->setHarga(150000);

$produk2 = new Produk();
$produk2->setNama("Sepatu Sneakers");
$produk2->setHarga(-50000); 

$produk3 = new Produk();
$produk3->setNama("Motor Bekas");
$produk3->setHarga(75000000); 


echo "Nama Produk : " . $produk1->getNama() . "<br>";
echo "Harga : Rp " . $produk1->getHarga() . "<br><br>";

echo "Nama Produk : " . $produk2->getNama() . "<br>";
echo "Harga : " . $produk2->getHarga() . "<br><br>";

echo "Nama Produk : " . $produk3->getNama() . "<br>";
echo "Harga : " . $produk3->getHarga() . "<br><br>";

?>