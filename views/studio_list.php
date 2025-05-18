<?php
/**
 * View for displaying a list of studio
 */

// Set page title
$pageTitle = "Daftar Studio";

// Include header
require_once 'views/template/header.php';
?>

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-guitar me-2"></i>Daftar Studio</h5>
        <a href="index.php?entity=studio&action=add" class="btn btn-primary btn-sm">
            <i class="fas fa-plus me-1"></i> Tambah Studio
        </a>
    </div>
    <div class="card-body">
        <?php if (empty($studioList)): ?>
            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle me-2"></i> Belum ada data studio.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama Studio</th>
                            <th>Lokasi</th>
                            <th>Harga Per Jam</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($studioList as $studio): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($studio['nama_studio']); ?></td>
                                <td><?php echo htmlspecialchars($studio['lokasi']); ?></td>
                                <td>Rp <?php echo number_format($studio['harga_per_jam'], 0, ',', '.'); ?></td>
                                <td class="text-center">
                                    <a href="index.php?entity=studio&action=edit&id=<?php echo $studio['id_studio']; ?>" 
                                       class="btn btn-info btn-sm icon-btn" 
                                       data-bs-toggle="tooltip" 
                                       title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" 
                                       onclick="confirmDelete(<?php echo $studio['id_studio']; ?>, '<?php echo htmlspecialchars($studio['nama_studio']); ?>')" 
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="fas fa-exclamation-triangle me-2"></i>Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus studio <strong id="deleteName"></strong>?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan dan mungkin mempengaruhi data peminjaman.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="deleteLink" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id, name) {
        document.getElementById('deleteName').textContent = name;
        document.getElementById('deleteLink').href = 'index.php?entity=studio&action=delete&id=' + id;
        
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }
</script>

<?php
// Include footer
require_once 'views/template/footer.php';
?>