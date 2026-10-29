<?php
interface PemformatDetail {
    public function format(Pemeriksaan $pemeriksaan): string;
}
