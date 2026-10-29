<?php
class Pemeriksaan {
    private int $idPemeriksaan;
    private Dokter $dokter;
    private Pasien $pasien;
    private string $tanggalPemeriksaan;
    private string $keluhan;
    private string $hasilPemeriksaan;

    public function __construct(int $idPemeriksaan, Dokter $dokter, Pasien $pasien, string $tanggalPemeriksaan) {
        $this->buatPemeriksaan($idPemeriksaan, $dokter, $pasien, $tanggalPemeriksaan);
    }

    public function buatPemeriksaan(int $idPemeriksaan, Dokter $dokter, Pasien $pasien, string $tanggalPemeriksaan): void {
        $this->idPemeriksaan = $idPemeriksaan;
        $this->dokter = $dokter;
        $this->pasien = $pasien;
        $this->tanggalPemeriksaan = $tanggalPemeriksaan;
        $this->keluhan = "-";
        $this->hasilPemeriksaan = "-";
    }

    public function catatKeluhan(string $keluhan): void {
        $this->keluhan = $keluhan;
    }

    public function catatHasil(string $hasil): void {
        $this->hasilPemeriksaan = $hasil;
    }

    public function getIdPemeriksaan(): int {
        return $this->idPemeriksaan;
    }

    public function getDokter(): Dokter {
        return $this->dokter;
    }

    public function getPasien(): Pasien {
        return $this->pasien;
    }

    public function getTanggalPemeriksaan(): string {
        return $this->tanggalPemeriksaan;
    }

    public function getKeluhan(): string {
        return $this->keluhan;
    }

    public function getHasilPemeriksaan(): string {
        return $this->hasilPemeriksaan;
    }
}
