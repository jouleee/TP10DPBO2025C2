<?php
require_once 'config/Database.php';
class Peminjaman{
    private $conn;
    private $table = 'peminjaman';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT p.*, s.nama_studio, py.nama_penyewa 
                  FROM " . $this->table . " p 
                  JOIN studio s ON p.id_studio = s.id_studio 
                  JOIN penyewa py ON p.id_penyewa = py.id_penyewa";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id_peminjaman = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($id_studio, $id_penyewa, $tanggal_pinjam, $jam_mulai, $jam_selesai) {
        $query = "INSERT INTO " . $this->table . " (id_studio, id_penyewa, tanggal_pinjam, jam_mulai, jam_selesai) VALUES (:id_studio, :id_penyewa, :tanggal_pinjam, :jam_mulai, :jam_selesai)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_studio', $id_studio);
        $stmt->bindParam(':id_penyewa', $id_penyewa);
        $stmt->bindParam(':tanggal_pinjam', $tanggal_pinjam);
        $stmt->bindParam(':jam_mulai', $jam_mulai);
        $stmt->bindParam(':jam_selesai', $jam_selesai);
        return $stmt->execute();
    }

    public function update($id, $id_studio, $id_penyewa, $tanggal_pinjam, $jam_mulai, $jam_selesai) {
        $query = "UPDATE " . $this->table . " SET id_studio = :id_studio, id_penyewa = :id_penyewa, tanggal_pinjam = :tanggal_pinjam, jam_mulai = :jam_mulai, jam_selesai = :jam_selesai WHERE id_peminjaman = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_studio', $id_studio);
        $stmt->bindParam(':id_penyewa', $id_penyewa);
        $stmt->bindParam(':tanggal_pinjam', $tanggal_pinjam);
        $stmt->bindParam(':jam_mulai', $jam_mulai);
        $stmt->bindParam(':jam_selesai', $jam_selesai);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_peminjaman = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}

?>