<?php
class LayananKlinik {
    private PenulisPemeriksaan $penulis;
    private PembacaPemeriksaan $pembaca;

    public function __construct(PenulisPemeriksaan $penulis, PembacaPemeriksaan $pembaca) {
        $this->penulis = $penulis;
        $this->pembaca = $pembaca;
    }

    public function buatPemeriksaanBaru(int $idPemeriksaan, Dokter $dokter, Pasien $pasien, string $tanggal): Pemeriksaan {
        $pemeriksaan = new Pemeriksaan($idPemeriksaan, $dokter, $pasien, $tanggal);
        $this->penulis->simpan($pemeriksaan);
        return $pemeriksaan;
    }

    public function catatKeluhanPemeriksaan(int $idPemeriksaan, string $keluhan): void {
        $pemeriksaan = $this->pembaca->cariDenganId($idPemeriksaan);
        if ($pemeriksaan) {
            $pemeriksaan->catatKeluhan($keluhan);
        }
    }

    public function catatHasilPemeriksaan(int $idPemeriksaan, string $hasil): void {
        $pemeriksaan = $this->pembaca->cariDenganId($idPemeriksaan);
        if ($pemeriksaan) {
            $pemeriksaan->catatHasil($hasil);
        }
    }

    public function cetakDetailPemeriksaan(int $idPemeriksaan, PemformatDetail $pemformat): string {
        $pemeriksaan = $this->pembaca->cariDenganId($idPemeriksaan);
        if (!$pemeriksaan) {
            return "Pemeriksaan dengan ID {$idPemeriksaan} tidak ditemukan.\n";
        }
        return $pemformat->format($pemeriksaan);
    }

    public function cetakRiwayatPasien(int $idPasien, PemformatDetail $pemformat): string {
        $daftarPemeriksaan = $this->pembaca->cariBerdasarkanPasien($idPasien);
        if (empty($daftarPemeriksaan)) {
            return "Belum ada riwayat pemeriksaan untuk pasien ID {$idPasien}.\n";
        }
        $output = "";
        foreach ($daftarPemeriksaan as $pemeriksaan) {
            $output .= $pemformat->format($pemeriksaan);
        }
        return $output;
    }
}
