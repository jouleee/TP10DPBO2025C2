<?php
require_once 'config/Database.php';

class Studio{
    private $conn;
    private $table = 'studio';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id_studio = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($studio_name, $lokasi, $harga_per_jam) {
        $query = "INSERT INTO " . $this->table . " (nama_studio, lokasi, harga_per_jam) VALUES (:studio_name, :lokasi, :harga_per_jam)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':studio_name', $studio_name);
        $stmt->bindParam(':lokasi', $lokasi);
        $stmt->bindParam(':harga_per_jam', $harga_per_jam);
        return $stmt->execute();
    }

    public function update($id, $studio_name, $lokasi, $harga_per_jam) {
        $query = "UPDATE " . $this->table . " SET nama_studio = :studio_name, lokasi = :lokasi, harga_per_jam = :harga_per_jam WHERE id_studio = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':studio_name', $studio_name);
        $stmt->bindParam(':lokasi', $lokasi);
        $stmt->bindParam(':harga_per_jam', $harga_per_jam);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id_studio = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}


?>