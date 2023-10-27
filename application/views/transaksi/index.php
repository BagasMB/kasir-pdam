            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Halaman /</span> Pembayaran</h4>

                    <div id="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                    <div id="type-error" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>

                    <!-- Bordered Table -->
                    <div class="card card-responsive mb-3">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Data Pelanggan</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Id Transaksi</th>
                                            <th>Nama</th>
                                            <th>Id Pelanggan</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Total Pembayaran</th>
                                            <th>Bayar</th>
                                            <th>Kembalian</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-nowrap">
                                        <?php
                                        foreach ($bayar as $yar) : ?>
                                            <tr>
                                                <td><?= $yar['transaksi_id']; ?></td>
                                                <td><?= $yar['nama']; ?></td>
                                                <td><?= $yar['pelanggan_id']; ?></td>
                                                <td><?= $yar['jam_transaksi']; ?> <?= $yar['tanggal_transaksi']; ?></td>
                                                <td>Rp <?= number_format($yar['total_pembayaran']); ?></td>
                                                <td>Rp <?= number_format($yar['bayar']); ?></td>
                                                <td>Rp <?= number_format($yar['kembalian']); ?></td>
                                                <td>
                                                    <?php if ($yar['bayar'] > 0) : ?>
                                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPembayaran<?= $yar['transaksi_id'] ?>"><i class='bx bx-wallet me-1'></i></button>
                                                        <a href="<?= base_url('kasir/print_pembayaran/' . $yar['transaksi_id']); ?>" class="btn btn-danger" target="_blank"><i class='fa fa-print'></i></a>
                                                    <?php else : ?>
                                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPembayaran<?= $yar['transaksi_id'] ?>"><i class='bx bx-wallet me-1'></i></button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/ Bordered Table -->

                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="keyword" placeholder="Search keyword..." autocomplete="off" autofocus>
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-magnifying-glass me-2"></i>Search</button>
                                </div>
                            </form>
                        </div>
                        <!-- <div class="col">
                            <a href="<?= base_url('admin/log') ?>" class="btn btn-primary"><i class="fa-solid fa-arrows-rotate"></i></a>
                        </div> -->
                    </div>

                    <div class="row">
                        <?php foreach ($bayar as $yar) : ?>
                            <div class="col-lg-4">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5 class="mb-0">Data Pelanggan</h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Id Transaksi : <?= $yar['transaksi_id']; ?></li>
                                        <li class="list-group-item">Nama : <?= $yar['nama']; ?></li>
                                        <li class="list-group-item">Jam Transaksi : <?= $yar['jam_transaksi']; ?></li>
                                        <li class="list-group-item">Tanggal Transaksi : <?= date('d F Y', strtotime($yar['tanggal_transaksi'])); ?>
                                        </li>
                                        <!-- $yar['tanggal_transaksi']; -->
                                        <li class="list-group-item">Total Pembayaran : Rp. <?= number_format($yar['total_pembayaran']); ?></li>
                                        <li class="list-group-item">Bayar :
                                            <?php if ($yar['bayar'] == 0) : ?>
                                                Rp. <strong>-</strong>
                                            <?php else : ?>
                                                Rp. <?= number_format($yar['bayar']); ?>
                                            <?php endif; ?>
                                        </li>
                                        <li class="list-group-item">Kembalian :
                                            <?php if ($yar['kembalian'] == 0) : ?>
                                                Rp. <strong> - </strong>
                                            <?php else : ?>
                                                Rp. <?= number_format($yar['kembalian']); ?>
                                            <?php endif; ?>
                                        </li>
                                        <li class="list-group-item mb-2 mt-2">
                                            <?php if ($yar['bayar'] > 0) : ?>
                                                <a href="<?= base_url('kasir/print_pembayaran/' . $yar['transaksi_id']); ?>" class="btn btn-danger" target="_blank"><i class='fa fa-print'></i> Print</a>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPembayaran<?= $yar['transaksi_id'] ?>"><i class='bx bx-wallet'></i>Bayar</button>
                                            <?php else : ?>
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPembayaran<?= $yar['transaksi_id'] ?>"><i class='bx bx-wallet'></i>Bayar</button>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="modal fade" id="modalPembayaran<?= $yar['transaksi_id'] ?>" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Input Pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= base_url('transaksi/bayar') ?>" method="post">
                                            <div class="modal-body text-nowrap">
                                                <div class="row mb-3 g-2">
                                                    <input type="hidden" name="transaksi_id" value="<?= $yar['transaksi_id']; ?>" class="form-control" readonly>
                                                    <input type="hidden" name="pengair_id" value="<?= $yar['pengair_id']; ?>" class="form-control" readonly>
                                                    <div class="col-12 mb-3">
                                                        <label>Nama Pelanggan</label>
                                                        <input type="text" name="nama" value="<?= $yar['nama']; ?>" class="form-control" readonly>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label>Total Pembayaran</label>
                                                        <input type="text" name="total_pembayaran" value="<?= $yar['total_pembayaran']; ?>" class="form-control" readonly>
                                                    </div>
                                                    <div class="col-12">
                                                        <label>Pembayaran </label>
                                                        <input type="number" name="bayar" class="form-control" placeholder="Bayar" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="save" class="btn btn-primary">Bayar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>



                </div>
                <!-- / Content -->