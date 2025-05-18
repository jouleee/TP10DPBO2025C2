<?php
require_once 'viewmodel/PenyewaViewModel.php';
require_once 'viewmodel/StudioViewModel.php';
require_once 'viewmodel/PeminjamanViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'peminjaman';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';


if($entity == 'peminjaman') {
    $viewModel = new PeminjamanViewModel();
    if ($action == 'list') {
        $peminjamanList = $viewModel->getPeminjamanList();
        require_once 'views/peminjaman_list.php';
    } elseif ($action == 'add') {
        $penyewaList = $viewModel->getPenyewaList();
        $studioList = $viewModel->getStudioList();
        require_once 'views/peminjaman_form.php';
    } elseif ($action == 'edit') {
        $peminjaman = $viewModel->getPeminjamanById($_GET['id']);
        $penyewaList = $viewModel->getPenyewaList();
        $studioList = $viewModel->getStudioList();
        require_once 'views/peminjaman_form.php';
    } elseif ($action == 'save') {
        $viewModel->addPeminjaman($_POST['id_studio'], $_POST['id_penyewa'], $_POST['tanggal_pinjam'], $_POST['jam_mulai'], $_POST['jam_selesai']);
        header('Location: index.php?entity=peminjaman');
    } elseif ($action == 'update') {
        $viewModel->updatePeminjaman($_GET['id'], $_POST['id_studio'], $_POST['id_penyewa'], $_POST['tanggal_pinjam'], $_POST['jam_mulai'], $_POST['jam_selesai']);
        header('Location: index.php?entity=peminjaman');
    } elseif ($action == 'delete') {
        $viewModel->deletePeminjaman($_GET['id']);
        header('Location: index.php?entity=peminjaman');
    }
} elseif ($entity == 'studio') {
    $viewModel = new StudioViewModel();
    if ($action == 'list') {
        $studioList = $viewModel->getStudioList();
        require_once 'views/studio_list.php';
    } elseif ($action == 'add') {
        require_once 'views/studio_form.php';
    } elseif ($action == 'edit') {
        $studio = $viewModel->getStudioById($_GET['id']);
        require_once 'views/studio_form.php';
    } elseif ($action == 'save') {
        $viewModel->addStudio($_POST['studio_name'], $_POST['lokasi'], $_POST['harga_per_jam']);
        header('Location: index.php?entity=studio');
    } elseif ($action == 'update') {
        $viewModel->updateStudio($_GET['id'], $_POST['studio_name'], $_POST['lokasi'], $_POST['harga_per_jam']);
        header('Location: index.php?entity=studio');
    } elseif ($action == 'delete') {
        $viewModel->deleteStudio($_GET['id']);
        header('Location: index.php?entity=studio');
    }
} elseif ($entity == 'penyewa') {
    $viewModel = new PenyewaViewModel();
    if ($action == 'list') {
        $penyewaList = $viewModel->getPenyewaList();
        require_once 'views/penyewa_list.php';
    } elseif ($action == 'add') {
        require_once 'views/penyewa_form.php';
    } elseif ($action == 'edit') {
        $penyewa = $viewModel->getPenyewaById($_GET['id']);
        require_once 'views/penyewa_form.php';
    } elseif ($action == 'save') {
        $viewModel->addPenyewa($_POST['name'], $_POST['contact']);
        header('Location: index.php?entity=penyewa');
    } elseif ($action == 'update') {
        $viewModel->updatePenyewa($_GET['id'], $_POST['name'], $_POST['contact']);
        header('Location: index.php?entity=penyewa');
    } elseif ($action == 'delete') {
        $viewModel->deletePenyewa($_GET['id']);
        header('Location: index.php?entity=penyewa');
    }
}
?>