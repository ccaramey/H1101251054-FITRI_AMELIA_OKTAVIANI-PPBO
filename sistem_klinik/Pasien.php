<?php
class Pasien {
    private int $idPasien;
    private string $nama;
    private string $alamat;
    private int $noTelepon;

    public function __construct(int $idPasien, string $nama, string $alamat = "-", int $noTelepon = 0) {
        $this->idPasien = $idPasien;
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->noTelepon = $noTelepon;
    }

    public function mendaftar(): string {
        return "Pasien '{$this->nama}' (ID: {$this->idPasien}) berhasil didaftarkan.";
    }

    public function ubahDataPasien(string $nama, string $alamat, int $noTelepon): void {
        $this->nama = $nama;
        $this->alamat = $alamat;
        $this->noTelepon = $noTelepon;
    }

    public function getIdPasien(): int {
        return $this->idPasien;
    }

    public function getNama(): string {
        return $this->nama;
    }

    public function getAlamat(): string {
        return $this->alamat;
    }

    public function getNoTelepon(): int {
        return $this->noTelepon;
    }
}
