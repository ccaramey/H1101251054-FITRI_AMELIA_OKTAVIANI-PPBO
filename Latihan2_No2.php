<?php
// Tugas 2 : Melengkapi Kode

class Product {
    public $nama;
    public $harga;
    public $kategori;

    public function __construct($nama, $harga, $kategori){
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
    }

    public function getInfo(){
        return "Produk: $this->nama | Kategori: $this->kategori | Harga: Rp" . number_format($this->harga, 0, ',', '.');
    }

    public function applyDiskon($persen){
        $this->harga = $this->harga - ($this->harga * $persen / 100);
    }
}

$product1 = new Product("Kemeja", 150000, "Pakaian");
$product2 = new Product("Flatshoes", 350000, "Alas Kaki");

echo "Sebelum diskon:<br>";
echo $product1->getInfo() . "<br>";
echo $product2->getInfo() . "<br><br>";

$product1->applyDiskon(10); // diskon 10%
$product2->applyDiskon(20); // diskon 20%

echo "Setelah diskon:<br>";
echo $product1->getInfo() . "<br>";
echo $product2->getInfo() . "<br>";

?>
