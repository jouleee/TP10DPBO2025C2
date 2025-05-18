<?php
$pageTitle = isset($studio) ? "Edit Studio" : "Tambah Studio Baru";
$formAction = isset($studio) 
    ? "index.php?entity=studio&action=update&id=" . $studio['id_studio'] 
    : "index.php?entity=studio&action=save";

// Include header
require_once 'views/template/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <?php if (isset($studio)): ?>
                        <i class="fas fa-edit me-2"></i>Edit Studio
                    <?php else: ?>
                        <i class="fas fa-plus-circle me-2"></i>Tambah Studio Baru
                    <?php endif; ?>
                </h5>
            </div>
            <div class="card-body">
                <form action="<?php echo $formAction; ?>" method="post" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="studio_name" class="form-label">Nama Studio <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="studio_name" name="studio_name" 
                               value="<?php echo isset($studio) ? htmlspecialchars($studio['nama_studio']) : ''; ?>" 
                               required>
                        <div class="invalid-feedback">
                            Silakan masukkan nama studio.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" 
                               value="<?php echo isset($studio) ? htmlspecialchars($studio['lokasi']) : ''; ?>" 
                               required>
                        <div class="invalid-feedback">
                            Silakan masukkan lokasi studio.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="harga_per_jam" class="form-label">Harga Per Jam (Rp) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="harga_per_jam" name="harga_per_jam" 
                                   value="<?php echo isset($studio) ? $studio['harga_per_jam'] : ''; ?>" 
                                   min="0" step="1000" required>
                            <div class="invalid-feedback">
                                Silakan masukkan harga sewa per jam.
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php?entity=studio" class="btn btn-secondary me-md-2">
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