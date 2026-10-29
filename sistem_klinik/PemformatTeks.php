<?php
class PemformatTeks implements PemformatDetail {
    public function format(Pemeriksaan $pemeriksaan): string {
        $out = "=====================================================\n";
        $out .= "   RIWAYAT PEMERIKSAAN PASIEN: " . $pemeriksaan->getPasien()->getNama() . "\n";
        $out .= "=====================================================\n";
        $out .= "ID Pemeriksaan      : " . $pemeriksaan->getIdPemeriksaan() . "\n";
        $out .= "Tanggal Pemeriksaan : " . $pemeriksaan->getTanggalPemeriksaan() . "\n";
        $out .= "ID Pasien           : " . $pemeriksaan->getPasien()->getIdPasien() . "\n";
        $out .= "ID Dokter           : " . $pemeriksaan->getDokter()->getIdDokter() . "\n";
        $out .= "Keluhan             : " . $pemeriksaan->getKeluhan() . "\n";
        $out .= "Hasil Pemeriksaan   : " . $pemeriksaan->getHasilPemeriksaan() . "\n";
        $out .= "---------------------------------------------------------------------------\n\n";
        return $out;
    }
}
