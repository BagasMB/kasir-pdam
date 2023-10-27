 <!-- Content wrapper -->
 <div class="content-wrapper">
     <!-- Content -->

     <div class="container-xxl flex-grow-1 container-p-y">
         <!-- <h4 class="fw-bold py-2"><span class="text-muted fw-light">Dashboard /</span> Manager</h4> -->

         <div class="row">
             <div class="col-lg-8 mb-4 order-0">
                 <div class="card">
                     <div class="d-flex align-items-end row">
                         <div class="col-sm-7">
                             <div class="card-body">
                                 <h5 class="card-title text-primary">Welcome <?= $user['nama']; ?> To The <?= $user['user_role']; ?> Page! 🎉</h5>
                                 <p class="mb-4">
                                     You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                                     your profile.
                                 </p>

                                 <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                             </div>
                         </div>
                         <div class="col-sm-5 text-center text-sm-left">
                             <div class="card-body pb-0 px-0 px-md-4">
                                 <img src="<?= base_url('') ?>/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-4 col-md-4 order-1">
                 <div class="row">
                     <div class="col-lg-6 col-md-12 col-6 mb-4">
                         <div class="card">
                             <div class="card-body">
                                 <div class="card-title d-flex align-items-start justify-content-between">
                                     <div class="avatar flex-shrink-0">
                                         <img src="<?= base_url('') ?>/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                                     </div>
                                 </div>
                                 <span>Pelanggan</span>
                                 <h3 class="card-title text-nowrapy mb-1"><?= $total_rows; ?></h3>
                                 <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                             </div>
                         </div>
                     </div>
                     <div class="col-lg-6 col-md-12 col-6 mb-4">
                         <div class="card">
                             <div class="card-body">
                                 <div class="card-title d-flex align-items-start justify-content-between">
                                     <div class="avatar flex-shrink-0">
                                         <img src="<?= base_url('') ?>/assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                                     </div>
                                 </div>
                                 <span>Sales</span>
                                 <h3 class="card-title text-nowrap mb-1"><?= $total_rows_transaksi; ?></h3>
                                 <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </div>


         <div class="card card-responsive">
             <div class="card-header d-flex align-items-center justify-content-between">
                 <h5 class="mb-0">Data Transaksi</h5>
                 <button data-bs-toggle="modal" data-bs-target="#ModalPrint" class="btn btn-danger float-end"><i class='fa fa-file-pdf me-1'></i>Detail Laporan</button>
             </div>
             <div class="card-body">
                 <div class="table-responsive text-nowrap">
                     <table id="myTable" class="table" width="100%">
                         <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Tanggal Transaksi</th>
                                 <th>Jam Transaksi</th>
                                 <th>Nama</th>
                                 <th>Jumlah Pembayaran</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $i = 1;
                                foreach ($transaksi as $kun) : ?>
                                 <tr>
                                     <td><?= $kun['transaksi_id']; ?></td>
                                     <td><?= $kun['tanggal_transaksi']; ?></td>
                                     <td><?= $kun['jam_transaksi']; ?></td>
                                     <td><?= $kun['nama']; ?></td>
                                     <td align="left">Rp. <?= number_format($kun['total_pembayaran']); ?></td>
                                 </tr>
                             <?php endforeach; ?>
                         </tbody>
                     </table>

                 </div>
             </div>
         </div>

         <!-- Modal -->
         <div class="modal fade" id="ModalPrint" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h1 class="modal-title fs-5" id="exampleModalLabel">Laporan</h1>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form action="<?= base_url('home/laporan'); ?>" method="post" target="_blank">
                         <div class="modal-body">
                             <div class="form-group mb-3">
                                 <label class="form-label">Tanggal Awal</label>
                                 <input type="date" class="form-control" name="tanggal1" required>
                             </div>
                             <div class="form-group mb-3">
                                 <label class="form-label">Tanggal Berakhir</label>
                                 <input type="date" class="form-control" name="tanggal2" required>
                             </div>

                         </div>
                         <div class="modal-footer">
                             <button type="submit" class="btn btn-primary">Print</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <!-- End Modal -->


     </div>
     <!-- / Content -->