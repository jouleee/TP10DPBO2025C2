<?php
// Set page title
$pageTitle = "Daftar Peminjaman Studio";

// Include header
require_once 'views/template/header.php';
?>

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-calendar-check me-2"></i>Daftar Peminjaman Studio</h5>
        <a href="index.php?entity=peminjaman&action=add" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-1"></i> Tambah Peminjaman
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($peminjamanList)): ?>
            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle me-2"></i> Belum ada data peminjaman.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Studio</th>
                            <th>Penyewa</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Durasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($peminjamanList as $peminjaman): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($peminjaman['nama_studio']); ?></td>
                                <td><?php echo htmlspecialchars($peminjaman['nama_penyewa']); ?></td>
                                <td><?php echo date('d-m-Y', strtotime($peminjaman['tanggal_pinjam'])); ?></td>
                                <td><?php echo date('H:i', strtotime($peminjaman['jam_mulai'])); ?></td>
                                <td><?php echo date('H:i', strtotime($peminjaman['jam_selesai'])); ?></td>
                                <td>
                                    <?php 
                                        $mulai = new DateTime($peminjaman['jam_mulai']);
                                        $selesai = new DateTime($peminjaman['jam_selesai']);
                                        $diff = $mulai->diff($selesai);
                                        echo $diff->format('%h jam %i menit');
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="index.php?entity=peminjaman&action=edit&id=<?php echo $peminjaman['id_peminjaman']; ?>" 
                                       class="btn btn-info btn-sm icon-btn" 
                                       data-bs-toggle="tooltip" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" 
                                       onclick="confirmDelete(<?php echo $peminjaman['id_peminjaman']; ?>, '<?php echo htmlspecialchars($peminjaman['nama_studio']); ?>', '<?php echo date('d-m-Y', strtotime($peminjaman['tanggal_pinjam'])); ?>')" 
                                       class="btn btn-danger btn-sm icon-btn" 
                                       data-bs-toggle="tooltip" 
                                       title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus peminjaman studio <strong id="deleteStudio"></strong> pada tanggal <strong id="deleteDate"></strong>?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="deleteLink" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id, studio, date) {
        document.getElementById('deleteStudio').textContent = studio;
        document.getElementById('deleteDate').textContent = date;
        document.getElementById('deleteLink').href = 'index.php?entity=peminjaman&action=delete&id=' + id;
        
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }
</script>

<?php
// Include footer
require_once 'views/template/footer.php';

?>