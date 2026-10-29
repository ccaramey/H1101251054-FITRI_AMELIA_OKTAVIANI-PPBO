<?php
require_once __DIR__ . '/autoload.php';

// Menambahkan styling & pre-formatting khusus tampilan browser via PHP
if (php_sapi_name() !== 'cli') {
    echo "<style>body { background-color: #ffffff !important; color: #000000 !important; font-family: 'Courier New', Courier, monospace; padding: 20px; font-size: 14px; }</style>";
    echo "<pre>";
}

$penyimpanan = new PenyimpananMemori();
$layananKlinik = new LayananKlinik($penyimpanan, $penyimpanan);

echo "================ SIMULASI SISTEM KLINIK ================\n\n";

// 1. Carmenita
$pasien1 = new Pasien(101, "Carmenita", "Jl. Ahmad Yani No. 12", 812345678);
$dokter1 = new Dokter(201, "dr. Hendra", "Dokter Umum");

echo "[SISTEM] " . $pasien1->mendaftar() . "\n";

$pemeriksaan1 = $layananKlinik->buatPemeriksaanBaru(501, $dokter1, $pasien1, "2026-10-28");
echo "[AKSI PASIEN] Pasien '{$pasien1->getNama()}' mengajukan pemeriksaan (ID Transaksi: {$pemeriksaan1->getIdPemeriksaan()}).\n";

$layananKlinik->catatKeluhanPemeriksaan(501, "Demam tinggi 38°C dan batuk kering selama 3 hari.");
echo "[AKSI DOKTER] Dokter {$dokter1->getNama()} mencatat keluhan pasien.\n";

$layananKlinik->catatHasilPemeriksaan(501, "Gejala Flu/ISPA. Diberikan parasetamol dan perbanyak istirahat.");
echo "[AKSI DOKTER] Dokter {$dokter1->getNama()} mencatat hasil diagnosa medis.\n\n";

// 2. Yoona Kim
$pasien2 = new Pasien(102, "Yoona Kim", "Jl. Sudirman No. 45", 819876543);
echo "[SISTEM] " . $pasien2->mendaftar() . "\n";

$pemeriksaan2 = $layananKlinik->buatPemeriksaanBaru(502, $dokter1, $pasien2, "2026-10-29");
echo "[AKSI PASIEN] Pasien '{$pasien2->getNama()}' mengajukan pemeriksaan (ID Transaksi: {$pemeriksaan2->getIdPemeriksaan()}).\n";

$layananKlinik->catatKeluhanPemeriksaan(502, "Sakit kepala ringan dan gangguan asam lambung.");
echo "[AKSI DOKTER] Dokter {$dokter1->getNama()} mencatat keluhan pasien.\n";

$layananKlinik->catatHasilPemeriksaan(502, "Dispepsia / Maag ringan. Diberikan antasida dan edukasi pola makan.");
echo "[AKSI DOKTER] Dokter {$dokter1->getNama()} mencatat hasil diagnosa medis.\n\n";

// Cetak Riwayat Pemeriksaan
$pemformatTeks = new PemformatTeks();
echo $layananKlinik->cetakRiwayatPasien(101, $pemformatTeks);
echo $layananKlinik->cetakRiwayatPasien(102, $pemformatTeks);

if (php_sapi_name() !== 'cli') {
    echo "</pre>";
}
?>
