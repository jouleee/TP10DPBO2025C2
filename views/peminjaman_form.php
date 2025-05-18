<?php

$pageTitle = isset($peminjaman) ? "Edit Peminjaman" : "Tambah Peminjaman Baru";
$formAction = isset($peminjaman) 
    ? "index.php?entity=peminjaman&action=update&id=" . $peminjaman['id_peminjaman'] 
    : "index.php?entity=peminjaman&action=save";

// Include header
require_once 'views/template/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <?php if (isset($peminjaman)): ?>
                        <i class="fas fa-edit me-2"></i>Edit Peminjaman
                    <?php else: ?>
                        <i class="fas fa-plus-circle me-2"></i>Tambah Peminjaman Baru
                    <?php endif; ?>
                </h5>
            </div>
            <div class="card-body">
                <form action="<?php echo $formAction; ?>" method="post" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="id_studio" class="form-label">Studio <span class="text-danger">*</span></label>
                        <select class="form-select" id="id_studio" name="id_studio" required>
                            <option value="">-- Pilih Studio --</option>
                            <?php foreach ($studioList as $studio): ?>
                                <option value="<?php echo $studio['id_studio']; ?>" 
                                        <?php echo (isset($peminjaman) && $peminjaman['id_studio'] == $studio['id_studio']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($studio['nama_studio']) . ' - ' . htmlspecialchars($studio['lokasi']) . ' (Rp ' . number_format($studio['harga_per_jam'], 0, ',', '.') . '/jam)'; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Silakan pilih studio.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="id_penyewa" class="form-label">Penyewa <span class="text-danger">*</span></label>
                        <select class="form-select" id="id_penyewa" name="id_penyewa" required>
                            <option value="">-- Pilih Penyewa --</option>
                            <?php foreach ($penyewaList as $penyewa): ?>
                                <option value="<?php echo $penyewa['id_penyewa']; ?>" 
                                        <?php echo (isset($peminjaman) && $peminjaman['id_penyewa'] == $penyewa['id_penyewa']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($penyewa['nama_penyewa']) . ' - ' . htmlspecialchars($penyewa['kontak']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                            Silakan pilih penyewa.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Peminjaman <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" 
                               value="<?php echo isset($peminjaman) ? $peminjaman['tanggal_pinjam'] : date('Y-m-d'); ?>" 
                               min="<?php echo date('Y-m-d'); ?>"
                               required>
                        <div class="invalid-feedback">
                            Silakan pilih tanggal peminjaman.
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="jam_mulai" class="form-label">Jam Mulai <span class="text-danger">*</span></label>
                        <select class="form-select" id="jam_mulai" name="jam_mulai" required>
                            <option value="">-- Pilih Jam Mulai --</option>
                            <?php
                            for ($i = 8; $i <= 20; $i++) {
                                $jam = sprintf('%02d:00', $i);
                                echo "<option value=\"$jam\">$jam</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jam_selesai" class="form-label">Jam Selesai <span class="text-danger">*</span></label>
                        <select class="form-select" id="jam_selesai" name="jam_selesai" required>
                            <option value="">-- Pilih Jam Selesai --</option>
                            <?php
                            for ($i = 9; $i <= 22; $i++) {
                                $jam = sprintf('%02d:00', $i);
                                echo "<option value=\"$jam\">$jam</option>";
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="alert alert-info mb-3">
                        <i class="fas fa-info-circle me-2"></i>
                        <span id="duration-info">Silakan pilih jam mulai dan jam selesai untuk melihat durasi dan estimasi biaya.</span>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php?entity=peminjaman" class="btn btn-secondary me-md-2">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const jamMulai = document.getElementById('jam_mulai');
        const jamSelesai = document.getElementById('jam_selesai');
        const studioSelect = document.getElementById('id_studio');
        const durationInfo = document.getElementById('duration-info');
        
        function updateDurationAndCost() {
            if (jamMulai.value && jamSelesai.value && studioSelect.value) {
                const startHour = parseInt(jamMulai.value.split(':')[0]);
                const endHour = parseInt(jamSelesai.value.split(':')[0]);
                
                // Hitung durasi jam bulat, jika selesai < mulai, berarti next day
                let durationHours = endHour - startHour;
                if (durationHours <= 0) {
                    durationHours += 24; // next day
                }
                
                // Ambil harga per jam dari teks option studio (format "Nama Studio - Rp 50.000/jam")
                const selectedOption = studioSelect.options[studioSelect.selectedIndex];
                if (selectedOption.value) {
                    const priceText = selectedOption.text.match(/Rp\s*([\d.]+)/);
                    if (priceText && priceText[1]) {
                        // Ubah "50.000" jadi number 50000
                        const hourlyRate = parseInt(priceText[1].replace(/\./g, ''));
                        const estimatedCost = hourlyRate * durationHours;
                        
                        durationInfo.innerHTML = `
                            Durasi: <strong>${durationHours} jam</strong><br>
                            Estimasi Biaya: <strong>Rp ${estimatedCost.toLocaleString('id-ID')}</strong>
                        `;
                    }
                }
            } else {
                durationInfo.innerHTML = '';
            }
        }
        
        jamMulai.addEventListener('change', updateDurationAndCost);
        jamSelesai.addEventListener('change', updateDurationAndCost);
        studioSelect.addEventListener('change', updateDurationAndCost);
        
        document.querySelector('form').addEventListener('submit', function(event) {
            if (jamMulai.value && jamSelesai.value) {
                const startHour = parseInt(jamMulai.value.split(':')[0]);
                const endHour = parseInt(jamSelesai.value.split(':')[0]);
                
                let durationHours = endHour - startHour;
                if (durationHours <= 0) durationHours += 24;
                
                if (durationHours <= 0) {
                    alert('Jam selesai harus lebih besar dari jam mulai.');
                    event.preventDefault();
                    event.stopPropagation();
                }
            }
        });
        
        // Inisialisasi jika sudah ada value
        updateDurationAndCost();
    });
</script>


<?php
// Include footer
require_once 'views/template/footer.php';
?>