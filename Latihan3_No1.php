<?php
// Tugas 1 : Modifikasi Class Mobil 

class Mobil {
    private $merek;
    private $warna;
    private $kecepatan;
    private $pesanWarna = "";
    private $pesanKecepatan = "";

    public function getMerek() {
        return $this->merek;
    }

    public function getWarna() {
        return $this->warna ?? $this->pesanWarna;
    }

    public function getKecepatan() {
        return $this->kecepatan ?? $this->pesanKecepatan;
    }

    public function setMerek($merek) {
        $this->merek = $merek;
    }

    public function setWarna($warna) {
        if (empty($warna)) {
            $this->pesanWarna = "Warna tidak boleh kosong.";
        } elseif (strlen($warna) < 3) {
            $this->pesanWarna = "Warna minimal 3 karakter.";
        } else {
            $this->warna = $warna;
        }
    }

    public function setKecepatan($kecepatan) {
        if ($kecepatan < 0) {
            $this->pesanKecepatan = "Kecepatan tidak boleh negatif.";
        } elseif ($kecepatan > 200) {
            $this->pesanKecepatan = "Kecepatan maksimal 200 km/jam.";
        } else {
            $this->kecepatan = $kecepatan;
        }
    }
}

$mobil1 = new Mobil();
$mobil1->setMerek("Toyota");
$mobil1->setWarna("Merah");
$mobil1->setKecepatan(120);

$mobil2 = new Mobil();
$mobil2->setMerek("Daihatsu");
$mobil2->setWarna("Bi");
$mobil2->setKecepatan(100);

$mobil3 = new Mobil();
$mobil3->setMerek("Honda");
$mobil3->setWarna("Putih");
$mobil3->setKecepatan(220); 


echo "Merek Mobil: " . $mobil1->getMerek() . "<br>";
echo "Warna Mobil: " . $mobil1->getWarna() . "<br>";
echo "Kecepatan : " . $mobil1->getKecepatan() . "<br><br>";

echo "Merek Mobil: " . $mobil2->getMerek() . "<br>";
echo "Warna Mobil: " . $mobil2->getWarna() . "<br>";
echo "Kecepatan : " . $mobil2->getKecepatan() . "<br><br>";

echo "Merek Mobil: " . $mobil3->getMerek() . "<br>";
echo "Warna Mobil: " . $mobil3->getWarna() . "<br>";
echo "Kecepatan : " . $mobil3->getKecepatan() . "<br><br>";

?>