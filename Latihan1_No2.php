<?php

// Mendefinisikan variabel
$nama = "Fitri Amelia Oktaviani";
$nim = "H1101251054";
$nilai_uts = 85.5;
$nilai_uas = 90;
$lulus = true;

// Menampilkan data
echo "Nama: $nama <br>";
echo "NIM: $nim <br>";
echo "Nilai UTS: $nilai_uts <br>";
echo "Nilai UAS: $nilai_uas <br>";
echo "Status Lulus: " . ($lulus ? "Ya" : "Tidak") . "<br>";

// Menampilkan tipe data
echo "Tipe data: " . gettype($nilai_uts) . "<br>";

// Fungsi menghitung nilai akhir 
function hitungNilaiAkhir($uts, $uas, $tugas): float {
    return ($uts * 0.3) + ($uas * 0.4) + ($tugas * 0.3);
}
// Fungsi menentukan grade
function getGrade($nilai) {
if ($nilai >= 85) return "A";
elseif ($nilai >= 70) return "B";
elseif ($nilai >= 55) return "C";
elseif ($nilai >= 40) return "D";
else return "E";
}
// Contoh penggunaan
$nilai_akhir = hitungNilaiAkhir(80, 90, 85);
echo "Nilai Akhir: $nilai_akhir <br>";
echo "Grade: " . getGrade($nilai_akhir);

?>