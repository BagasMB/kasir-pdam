<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> <?= $title_halaman ?></h4> -->
    <!-- Bordered Table -->
    <div class="card card-responsive">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Data <?= $title; ?></h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor Pelanggan</th>
                            <th>Nama</th>
                            <th>Pemakaian Bulan</th>
                            <th>Pemakaian Awal</th>
                            <th>Pemakaian Akhir</th>
                            <!-- <th>Status Pembayaran</th> -->
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($bayar as $yar) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $yar['nomor_pelanggan']; ?></td>
                                <td><?= $yar['nama']; ?></td>
                                <td><?= date('F Y', strtotime($yar['pemakaian_perbulan'])); ?></td>
                                <td><?= $yar['pemakaian_awal']; ?></td>
                                <td><?= $yar['pemakaian_akhir']; ?></td>
                                <!-- <td>
                                    <span class="badge bg-label-<?= $yar['status_pembayaran'] == "Sudah DiBayar" ? "success" : ($yar['status_pembayaran'] == "Belum Bayar" ? "danger" : ""); ?> me-1">
                                        <?= $yar['status_pembayaran']; ?>
                                    </span>
                                </td> -->
                                <!-- <td>
                                                    <a href="" class="btn btn-success">Bayar</a>
                                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!--/ Bordered Table -->
</div>
<!-- / Content -->