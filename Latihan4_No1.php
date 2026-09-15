<?php
// Tugas 1 : Inheritance Produk

class Produk {
    protected $nama;
    protected $merek;
    protected $harga;

    public function __construct($nama, $merek, $harga){
        $this->nama = $nama;
        $this->merek = $merek;

        if ($harga <= 0) {
            echo "Harga harus lebih besar dari 0.<br>";
            $this->harga = 0;
        } else {
            $this->harga = $harga;
        }
    }

    public function getNama() {
        return $this->nama;
    }

    public function getMerek() {
        return $this->merek;
    }

    public function getHarga() {
        return $this->harga;
    }

    public function getInfo() {
        echo "Produk: " . $this->nama . "<br>";
        echo "Merek: " . $this->merek . "<br>";
        echo "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "<br>";
    }
}

class Makanan extends Produk {
    private $tanggalKadaluarsa;

    public function __construct($nama, $merek, $harga, $tanggalKadaluarsa){
        parent::__construct($nama, $merek, $harga);
        $this->tanggalKadaluarsa = $tanggalKadaluarsa;
    }

    public function getTanggalKadaluarsa() {
        return $this->tanggalKadaluarsa;
    }

    public function getStatus() {
        if ($this->tanggalKadaluarsa >= date("Y-m-d")) {
            return "Segar";
        } else {
            return "Kadaluarsa";
        }
    }

    public function getInfo() {
        echo "Produk: Makanan - " . $this->nama . "<br>";
        echo "Merek: " . $this->merek . "<br>";
        echo "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "<br>";
        echo "Tanggal Kadaluarsa: " . $this->tanggalKadaluarsa . "<br>";
        echo "Status: " . $this->getStatus() . "<br>";
    }
}

class Elektronik extends Produk {
    private $garansi; 

    public function __construct($nama, $merek, $harga, $garansi) {
        parent::__construct($nama, $merek, $harga);
        $this->garansi = $garansi;
    }

    public function getGaransi(){
        return $this->garansi;
    }

    public function getInfo() {
        echo "Produk: Elektronik - " . $this->nama . "<br>";
        echo "Merek: " . $this->merek . "<br>";
        echo "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "<br>";
        echo "Garansi: " . $this->garansi . " bulan<br>";
    }
}

$makanan = new Makanan("Mie Instan", "Indomie", 3500, "2027-06-30");
$makanan->getInfo();
echo "<br>";

$elektronik = new Elektronik("Smart TV", "Samsung", 5000000, 12);
$elektronik->getInfo();
echo "<br>";

?>