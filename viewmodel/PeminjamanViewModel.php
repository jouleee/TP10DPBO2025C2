<?php
require_once 'model/Penyewa.php';
require_once 'model/Peminjaman.php';
require_once 'model/Studio.php';

class PeminjamanViewModel {
    private $peminjaman;
    private $penyewa;
    private $studio;

    public function __construct() {
        $this->peminjaman = new Peminjaman();
        $this->penyewa = new Penyewa();
        $this->studio = new Studio();
    }

    public function getPeminjamanList() {
        return $this->peminjaman->getAll();
    }

    public function getPeminjamanById($id) {
        return $this->peminjaman->getById($id);
    }

    public function getPenyewaList() {
        return $this->penyewa->getAll();
    }

    public function getStudioList() {
        return $this->studio->getAll();
    }
    
    public function addPeminjaman($id_studio, $id_penyewa, $tanggal_pinjam, $jam_mulai, $jam_selesai) {
        return $this->peminjaman->create($id_studio, $id_penyewa, $tanggal_pinjam, $jam_mulai, $jam_selesai);
    }

    public function updatePeminjaman($id, $id_studio, $id_penyewa, $tanggal_pinjam, $jam_mulai, $jam_selesai) {
        return $this->peminjaman->update($id, $id_studio, $id_penyewa, $tanggal_pinjam, $jam_mulai, $jam_selesai);
    }

    public function deletePeminjaman($id) {
        return $this->peminjaman->delete($id);
    }
}
?>