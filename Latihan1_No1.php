<?php

class Luas {
    public $panjang;
    public $lebar;

    public function penjumlahan(){
        return $this->panjang * $this->lebar;
    }
}

$perhitungan = new Luas();
$perhitungan->panjang = 20;
$perhitungan->lebar = 15;

echo "Panjang = 20";
echo "<br>";
echo "Lebar = 15";
echo "<br>";
echo "Luas persegi Panjang = ".$perhitungan->penjumlahan(); 
echo "<br>";
echo "<br>";
echo "ini hasil penjumlahan";

?>
