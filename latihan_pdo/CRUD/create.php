<?php
require_once '../Catatan.php';

$c = new Catatan();
$hasil = $c->setJudul("PBO")
           ->setIsi("Belajar cara mengkoneksi objek ke database")
           ->save();

echo $hasil ? "Berhasil disimpan" : "Gagal";
