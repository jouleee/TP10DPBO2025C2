<?php
require_once 'model/Penyewa.php';

class PenyewaViewModel {
    private $penyewa;

    public function __construct() {
        $this->penyewa = new Penyewa();
    }

    public function getPenyewaList() {
        return $this->penyewa->getAll();
    }

    public function getPenyewaById($id) {
        return $this->penyewa->getById($id);
    }

    public function addPenyewa($name, $contact) {
        return $this->penyewa->create($name, $contact);
    }

    public function updatePenyewa($id, $name, $contact) {
        return $this->penyewa->update($id, $name, $contact);
    }

    public function deletePenyewa($id) {
        return $this->penyewa->delete($id);
    }
}

?>