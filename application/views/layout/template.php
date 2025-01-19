<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('') ?>assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('') ?>assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" /> -->

    <!-- Css DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.0/css/buttons.bootstrap4.min.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/semantic.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Helpers -->
    <script src="<?= base_url('') ?>assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('') ?>assets/js/config.js"></script>
    <!-- select2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">

    <!-- select2-bootstrap4-theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/css/select2-bootstrap4.css">
</head>

<body>
    <div id="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div id="type-error" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <?php $this->load->view('layout/sidebar'); ?>
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php $this->load->view('layout/navbar'); ?>
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <?= $contents; ?>
                    <!-- / Content -->
                    <!-- Footer -->
                    <?php $this->load->view('layout/footer'); ?>
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


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha256-7dA7lq5P94hkBsWdff7qobYkp9ope/L5LQy2t/ljPLo=" crossorigin="anonymous"></script>
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js" integrity="sha256-AFAYEOkzB6iIKnTYZOdUf9FFje6lOTYdwRJKwTN5mks=" crossorigin="anonymous"></script>

    <script src="<?= base_url(''); ?>assets/js/myscript.js"></script>
    <script>
        $(function() {
            // Inisialisasi select2
            $('#select-pelanggan').each(function() {
                $(this).select2({
                    theme: 'bootstrap4',
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    allowClear: Boolean($(this).data('allow-clear')),
                    closeOnSelect: !$(this).attr('multiple'),
                });

                // Tambahkan event change untuk mengambil data pelanggan
                $(this).on('change', function() {
                    const nomorPelanggan = $(this).val();
                    const dataPelangganContainer = $('#data-pelanggan');

                    if (!nomorPelanggan) {
                        dataPelangganContainer.html('<p class="d-flex justify-content-center">Silakan pilih pelanggan untuk menampilkan data.</p>');
                        return; // Hentikan proses jika pelanggan tidak dipilih
                    }

                    if (nomorPelanggan) {
                        $.ajax({
                            url: `<?= base_url('penggunaanair/getPelangganData/'); ?>${nomorPelanggan}`,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                if (data) {
                                    dataPelangganContainer.html(`
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Nomor Pelanggan</td>
                                            <td>:</td>
                                            <td>${data.nomor_pelanggan}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>${data.nama}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>${data.jenis_kelamin}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>${data.email}</td>
                                        </tr>
                                        <tr>
                                            <td>No Telp/WA</td>
                                            <td>:</td>
                                            <td>${data.no_wa}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>${data.dusun}, RT ${data.rt} / RW ${data.rw}, ${data.desa}, ${data.kecamatan}, Kab. ${data.kabupaten}</td>
                                        </tr>
                                        <tr>
                                            <td>Kategori</td>
                                            <td>:</td>
                                            <td>${data.nama_tarif}</td>
                                        </tr>
                                        <tr>
                                            <td>Meteran Awal</td>
                                            <td>:</td>
                                            <td>${data.meter_awal}</td>
                                        </tr>
                                    </table>
                                </div>
                            `);
                                } else {
                                    dataPelangganContainer.html('<p>Data pelanggan tidak ditemukan.</p>');
                                }
                            },
                            error: function() {
                                dataPelangganContainer.html('<p>Terjadi kesalahan saat mengambil data pelanggan.</p>');
                            },
                        });
                    } else {
                        dataPelangganContainer.html('<p>Silakan pilih pelanggan untuk menampilkan data.</p>');
                    }
                });
            });
        });
    </script>
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