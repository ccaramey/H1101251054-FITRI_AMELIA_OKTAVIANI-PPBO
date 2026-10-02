<?php

abstract class LayananSalon{
    protected $id;
    protected $nama;
    protected $hargaDasar;

    public function __construct($id, $nama, $hargaDasar){
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }

    public function getId(){
        return $this->id;
    }

    public function getNama(){
        return $this->nama;
    }

    public function getHargaDasar(){
        return $this->hargaDasar;
    }

    abstract public function hitungTotal();

    abstract public function getJenis();
}

class Potong extends LayananSalon{
    private $cm;

    public function __construct($id, $nama, $hargaDasar, $cm){
        parent::__construct($id, $nama, $hargaDasar);
        $this->cm = $cm;
    }

    public function hitungTotal(){
        return $this->hargaDasar + (500 * $this->cm);
    }

    public function getJenis(){
        return "Potong";
    }

    public function cetakDetail(){
        return "Potong " . $this->cm . " cm";
    }
}

class Facial extends LayananSalon{
    private $menit;

    public function __construct($id, $nama, $hargaDasar, $menit){
        parent::__construct($id, $nama, $hargaDasar);
        $this->menit = $menit;
    }

    public function hitungTotal(){
        return $this->hargaDasar + (2000 * $this->menit);
    }

    public function getJenis(){
        return "Facial";
    }

    public function cetakDetail(){
        return "Facial " . $this->menit . " menit";
    }
}

class Manicure extends LayananSalon{
    private $jari;

    public function __construct($id, $nama, $hargaDasar, $jari){
        parent::__construct($id, $nama, $hargaDasar);
        $this->jari = $jari;
    }

    public function hitungTotal(){
        $total = $this->hargaDasar + (5000 * $this->jari);
        $D = 4;

        if ($this->jari > $D) {
            $total = $total * 0.10;
        }
        return $total;
    }

    public function getJenis(){
        return "Manicure";
    }

    public function cetakDetail(){
        return "Manicure " . $this->jari . " jari";
    }
}

$layanan1 = new Potong("P001", "Fitri Amelia", 50000, 3);
$layanan2 = new Facial("F001", "Najwa Aulia", 70000, 30);
$layanan3 = new Manicure("M001", "Andini Putri", 60000, 10);
$layanan4 = new Potong("P002", "Tsanaya", 50000, 5);
$layanan5 = new Facial("F002", "Rebecca", 70000, 45);

$daftarLayanan = [
    $layanan1,
    $layanan2,
    $layanan3,
    $layanan4,
    $layanan5
];

$totalKeseluruhan = 0;

echo "SISTEM LAYANAN SALON" . "<br><br>";

foreach ($daftarLayanan as $layanan) {
    echo "ID: " . $layanan->getId() . "<br>";
    echo "Nama: " . $layanan->getNama() . "<br>";
    echo "Jenis: " . $layanan->getJenis() . "<br>";
    echo "Harga Dasar: Rp " . number_format($layanan->getHargaDasar(), 0, ',', '.') . "<br>";
    echo "Total: Rp " . number_format($layanan->hitungTotal(), 0, ',', '.') . "<br>";
    echo "-----------------------------<br>";

    $totalKeseluruhan += $layanan->hitungTotal();
}

echo "<br>";
echo "Total Keseluruhan: Rp " . number_format($totalKeseluruhan, 0, ',', '.');

?>