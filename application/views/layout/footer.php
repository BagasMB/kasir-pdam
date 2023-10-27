<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©
            <script>
                document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            <a href="https://github.com/BagasMB" target="_blank" class="footer-link fw-bolder"><i class='bx bxl-github mb-1'></i> BagasMB</a>
            <!-- <a href="https://www.instagram.com/bgsmhrdkabdhrto_/" target="_blank" class="footer-link fw-bolder"><i class='bx bxl-instagram-alt'></i> BagasMB</a> -->
        </div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?= base_url('') ?>assets/vendor/js/core.js"></script>
<script src="<?= base_url('') ?>assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= base_url('') ?>assets/vendor/libs/popper/popper.js"></script>
<script src="<?= base_url('') ?>assets/vendor/js/bootstrap.js"></script>
<script src="<?= base_url('') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="<?= base_url('') ?>assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= base_url('') ?>assets/vendor/libs/masonry/masonry.js"></script>

<!-- Main JS -->
<script src="<?= base_url('') ?>assets/js/main.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTable -->
<script src="https://cdn.datatables.net/buttons/2.4.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.colVis.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="<?= base_url(''); ?>assets/js/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(''); ?>assets/js/myscript.js"></script>

<script>
    fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
        .then(response => response.json())
        .then(provinces => {
            var data = provinces;
            var tampung = '<option>Pilih</option>';
            data.forEach(element => {
                tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
            });
            document.getElementById('provinsi').innerHTML = tampung;
        });
</script>

<script>
    const selectProvinsi = document.getElementById('provinsi');
    selectProvinsi.addEventListener('change', (e) => {
        var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
            .then(response => response.json())
            .then(regencies => {
                var data = regencies;
                var tampung = '<option>Pilih</option>';
                data.forEach(element => {
                    tampung += `<option data-dist="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById('kota').innerHTML = tampung;
            });
    });

    const selectKota = document.getElementById('kota');
    selectKota.addEventListener('change', (e) => {
        var kota = e.target.options[e.target.selectedIndex].dataset.dist;
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/districts/${kota}.json`)
            .then(response => response.json())
            .then(districts => {
                var data = districts;
                var tampung = '<option>Pilih</option>';
                data.forEach(element => {
                    tampung += `<option data-vill="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById('kecamatan').innerHTML = tampung;
            });
    });

    const selectKecamatan = document.getElementById('kecamatan');
    selectKecamatan.addEventListener('change', (e) => {
        var kecamatan = e.target.options[e.target.selectedIndex].dataset.vill;
        fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/villages/${kecamatan}.json`)
            .then(response => response.json())
            .then(villages => {
                var data = villages;
                var tampung = '<option>Pilih</option>';
                data.forEach(element => {
                    tampung += `<option data-vill="${element.id}" value="${element.name}">${element.name}</option>`;
                });
                document.getElementById('kelurahan').innerHTML = tampung;
            });
    });
</script>

</body>

</html>