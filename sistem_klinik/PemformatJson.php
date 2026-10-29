<?php
class PemformatJson implements PemformatDetail {
    public function format(Pemeriksaan $pemeriksaan): string {
        $data = [
            'idPemeriksaan'      => $pemeriksaan->getIdPemeriksaan(),
            'tanggalPemeriksaan' => $pemeriksaan->getTanggalPemeriksaan(),
            'idPasien'           => $pemeriksaan->getPasien()->getIdPasien(),
            'namaPasien'         => $pemeriksaan->getPasien()->getNama(),
            'idDokter'           => $pemeriksaan->getDokter()->getIdDokter(),
            'namaDokter'         => $pemeriksaan->getDokter()->getNama(),
            'keluhan'            => $pemeriksaan->getKeluhan(),
            'hasilPemeriksaan'   => $pemeriksaan->getHasilPemeriksaan()
        ];
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
