<?php
require_once 'DatabaseConnection.php';

class Product {
    private $id;
    private $nama;
    private $harga;
    private $stok;
    private $deskripsi;
    private $db;

    public function __construct() {
        $this->db = DatabaseConnection::getInstance()->getConnection();
    }

    public function setNama($nama) {
        $this->nama = $nama;
        return $this;
    }

    public function setHarga($harga) {
        $this->harga = $harga;
        return $this;
    }

    public function setStok($stok) {
        $this->stok = $stok;
        return $this;
    }

    public function setDeskripsi($deskripsi) {
        $this->deskripsi = $deskripsi;
        return $this;
    }

    // save() - tambah data
    public function save() {
        $sql = "INSERT INTO products (nama, harga, stok, deskripsi)
                VALUES (:nama, :harga, :stok, :deskripsi)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'nama' => $this->nama,
            'harga' => $this->harga,
            'stok' => $this->stok,
            'deskripsi' => $this->deskripsi
        ]);
    }

    // findAll() - lihat semua
    public static function findAll() {
        $db = DatabaseConnection::getInstance()->getConnection();
        $stmt = $db->query("SELECT * FROM products ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    // findById($id) - lihat satu
    public static function findById($id) {
        $db = DatabaseConnection::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute([
            'id' => $id
        ]);
        return $stmt->fetch();
    }

    // update($id) - update data
    public function update($id) {
        $sql = "UPDATE products SET
                nama = :nama,
                harga = :harga,
                stok = :stok,
                deskripsi = :deskripsi
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'nama' => $this->nama,
            'harga' => $this->harga,
            'stok' => $this->stok,
            'deskripsi' => $this->deskripsi,
            'id' => $id
        ]);
    }

    // delete($id) - hapus data
    public static function delete($id) {
        $db = DatabaseConnection::getInstance()->getConnection();
        $stmt = $db->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute([
            'id' => $id
        ]);
    }
}
