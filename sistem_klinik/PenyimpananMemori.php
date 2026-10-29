<?php
class PenyimpananMemori implements PenulisPemeriksaan, PembacaPemeriksaan {
    private array $pemeriksaanList = [];

    public function simpan(Pemeriksaan $pemeriksaan): void {
        $this->pemeriksaanList[$pemeriksaan->getIdPemeriksaan()] = $pemeriksaan;
    }

    public function cariDenganId(int $idPemeriksaan): ?Pemeriksaan {
        return $this->pemeriksaanList[$idPemeriksaan] ?? null;
    }

    public function cariBerdasarkanPasien(int $idPasien): array {
        $hasil = [];
        foreach ($this->pemeriksaanList as $p) {
            if ($p->getPasien()->getIdPasien() === $idPasien) {
                $hasil[] = $p;
            }
        }
        return $hasil;
    }

    public function ambilSemua(): array {
        return array_values($this->pemeriksaanList);
    }
}
