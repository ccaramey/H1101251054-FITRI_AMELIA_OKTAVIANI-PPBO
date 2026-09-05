<?php
// Tugas 1 : Class Mobil

class Mobil {
    public $merek;
    public $warna;
    public $kecepatan;

    public function __construct($merek, $warna, $kecepatan)
    {
        $this->merek = $merek;
        $this->warna = $warna;
        $this->kecepatan = $kecepatan;
    }

    public function getInfo(){
        return "Mobil $this->merek berwarna $this->warna dengan kecepatan $this->kecepatan km/jam";
    }

    public function jalankan(){
        return "Mobil berjalan...";
    }

    public function berhenti(){
        return "Mobil berhenti";
    }
}

$mobil1 = new Mobil("Toyota", "Merah", 120);
$mobil2 = new Mobil("Daihatsu", "Hitam", 100);
$mobil3 = new Mobil("Honda", "Putih", 140);

echo $mobil1->getInfo() . "<br>";
echo $mobil1->jalankan() . "<br>";
echo $mobil1->berhenti() . "<br><br>";

echo $mobil2->getInfo() . "<br>";
echo $mobil2->jalankan() . "<br>";
echo $mobil2->berhenti() . "<br><br>";

echo $mobil3->getInfo() . "<br>";
echo $mobil3->jalankan() . "<br>";
echo $mobil3->berhenti() . "<br>";

?>
