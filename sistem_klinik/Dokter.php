<?php
class Dokter {
    private int $idDokter;
    private string $nama;
    private string $spesialisasi;

    public function __construct(int $idDokter, string $nama, string $spesialisasi) {
        $this->idDokter = $idDokter;
        $this->nama = $nama;
        $this->spesialisasi = $spesialisasi;
    }

    public function ubahSpesialisasi(string $spesialisasiBaru): void {
        $this->spesialisasi = $spesialisasiBaru;
    }

    public function getIdDokter(): int {
        return $this->idDokter;
    }

    public function getNama(): string {
        return $this->nama;
    }

    public function getSpesialisasi(): string {
        return $this->spesialisasi;
    }
}
