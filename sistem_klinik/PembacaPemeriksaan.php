<?php
interface PembacaPemeriksaan {
    public function cariDenganId(int $idPemeriksaan): ?Pemeriksaan;
    public function cariBerdasarkanPasien(int $idPasien): array;
    public function ambilSemua(): array;
}
