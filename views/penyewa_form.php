<?php
// Set page title based on action
$pageTitle = isset($penyewa) ? "Edit Penyewa" : "Tambah Penyewa Baru";
$formAction = isset($penyewa) 
    ? "index.php?entity=penyewa&action=update&id=" . $penyewa['id_penyewa'] 
    : "index.php?entity=penyewa&action=save";

// Include header
require_once 'views/template/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <?php if (isset($penyewa)): ?>
                        <i class="fas fa-edit me-2"></i>Edit Penyewa
                    <?php else: ?>
                        <i class="fas fa-user-plus me-2"></i>Tambah Penyewa Baru
                    <?php endif; ?>
                </h5>
            </div>
            <div class="card-body">
                <form action="<?php echo $formAction; ?>" method="post" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Penyewa <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" 
                               value="<?php echo isset($penyewa) ? htmlspecialchars($penyewa['nama_penyewa']) : ''; ?>" 
                               required>
                        <div class="invalid-feedback">
                            Silakan masukkan nama penyewa.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="contact" class="form-label">Kontak <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="contact" name="contact" 
                               value="<?php echo isset($penyewa) ? htmlspecialchars($penyewa['kontak']) : ''; ?>" 
                               required>
                        <div class="invalid-feedback">
                            Silakan masukkan informasi kontak.
                        </div>
                        <small class="text-muted">Bisa berupa nomor telepon atau email.</small>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php?entity=penyewa" class="btn btn-secondary me-md-2">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Include footer
require_once 'views/template/footer.php';
?>