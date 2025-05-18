<?php

?>
    </div> <!-- End of container -->

    <footer class="bg-light text-dark py-4 mt-5 border-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold">Studio Rental System</h5>
                    <p class="text-muted">Sistem manajemen peminjaman studio musik yang mudah dan efisien.</p>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold">Menu</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php?entity=peminjaman" class="text-primary text-decoration-none fw-semibold">Peminjaman</a></li>
                        <li><a href="index.php?entity=studio" class="text-primary text-decoration-none fw-semibold">Studio</a></li>
                        <li><a href="index.php?entity=penyewa" class="text-primary text-decoration-none fw-semibold">Penyewa</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold">Kontak</h5>
                    <ul class="list-unstyled text-muted">
                        <li><i class="fas fa-phone me-2"></i> +62 123-4567-890</li>
                        <li><i class="fas fa-envelope me-2"></i> info@studiomusik.com</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Musik No. 123, Indonesia</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center text-muted small">
                &copy; <?php echo date('Y'); ?> Studio Rental System. All rights reserved.
            </div>
        </div>
    </footer>

    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Form validation
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>