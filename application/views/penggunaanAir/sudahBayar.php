<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> <?= $title_halaman ?></h4> -->

    <div id="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div id="type-error" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>

    <!-- Bordered Table -->
    <div class="card card-responsive">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Data Penggunaan Air</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table text-nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>Id Transaksi</th>
                            <th>Id Pelanggan</th>
                            <th>Nama</th>
                            <th>Pemakaian Bulan</th>
                            <th>Pemakaian Awal</th>
                            <th>Pemakaian Akhir</th>
                            <th>Status Pembayaran</th>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        foreach ($bayar as $yar) : ?>
                            <tr>
                                <td><?= $yar['pengair_id']; ?></td>
                                <td><?= $yar['pelanggan_id']; ?></td>
                                <td><?= $yar['nama']; ?></td>
                                <td><?= $yar['pemakaian_perbulan']; ?></td>
                                <td><?= $yar['pemakaian_awal']; ?></td>
                                <td><?= $yar['pemakaian_akhir']; ?></td>
                                <td>
                                    <?php if ($yar['status_pembayaran'] == "Sudah DiBayar") : ?>

                                        <span class="badge bg-label-success me-1">
                                            <?= $yar['status_pembayaran']; ?>
                                        </span>

                                    <?php elseif ($yar['status_pembayaran'] == "Belum Bayar") :  ?>

                                        <span class="badge bg-label-danger me-1">
                                            <?= $yar['status_pembayaran']; ?>
                                        </span>

                                    <?php endif; ?>
                                </td>
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