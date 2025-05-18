<?php
require_once 'model/Studio.php';

class StudioViewModel {
    private $studio;

    public function __construct() {
        $this->studio = new Studio();
    }

    public function getStudioList() {
        return $this->studio->getAll();
    }

    public function getStudioById($id) {
        return $this->studio->getById($id);
    }

    public function addStudio($studio_name, $lokasi, $harga_per_jam) {
        return $this->studio->create($studio_name, $lokasi, $harga_per_jam);
    }

    public function updateStudio($id, $studio_name, $lokasi, $harga_per_jam) {
        return $this->studio->update($id, $studio_name, $lokasi, $harga_per_jam);
    }

    public function deleteStudio($id) {
        return $this->studio->delete($id);
    }
}

?>