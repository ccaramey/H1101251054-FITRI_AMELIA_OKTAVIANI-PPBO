<?php
require_once '../Product.php';

$p = new Product();
$hasil = $p->setNama("Pulpen Gel Hitam")
           ->setHarga(3500)
           ->setStok(100)
           ->setDeskripsi("Pulpen gel tinta hitam 0.5 mm")
           ->save();

echo $hasil ? "Berhasil disimpan" : "Gagal";
