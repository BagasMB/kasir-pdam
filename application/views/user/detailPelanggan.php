<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card card-responsive mb-3">
    <div class="card-header">
      <div class="d-flex align-items-center justify-content-between">
        <h5 class="mb-2">Data Transaksi Pelanggan</h5>
      </div>
    </div>
    <div class="card-body">
      <div class="d-flex align-items-start justify-content-start">
        <div class="table-responsive text-nowrap">
          <table class="table table-borderless">
            <tr>
              <td>Nomor Pelanggan</td>
              <td>:</td>
              <td><?= $pelanggan->nomor_pelanggan; ?></td>
            </tr>
            <tr>
              <td>Nama Pelanggan</td>
              <td>:</td>
              <td><?= $pelanggan->nama; ?></td>
            </tr>
            <tr>
              <td>Jenis Kelamin </td>
              <td>:</td>
              <td><?= $pelanggan->jenis_kelamin; ?></td>
            </tr>
            <tr>
              <td>Email </td>
              <td>:</td>
              <td><?= $pelanggan->email; ?></td>
            </tr>
            <tr>
              <td>No Telp/whatsApp </td>
              <td>:</td>
              <td><?= $pelanggan->no_wa; ?></td>
            </tr>
          </table>
        </div>
        <div class="table-responsive text-nowrap">
          <table class="table table-borderless">
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td>
                <?= $pelanggan->dusun; ?>, RT 0<?= $pelanggan->rt; ?> / 0<?= $pelanggan->rw; ?>, <?= $pelanggan->desa; ?>, <br> <?= $pelanggan->kecamatan; ?>, Kab. <?= $pelanggan->kabupaten; ?>
              </td>
            </tr>
            <tr>
              <td>Kategori</td>
              <td>:</td>
              <td><?= $pelanggan->nama_tarif; ?></td>
            </tr>
          </table>
        </div>
      </div>
      <hr class="my-3 mb-4">
      <div class="table-responsive text-nowrap">
        <table id="myTable" class="table table-bordered table-striped" width="100%">
          <thead>
            <tr>
              <th>Tanggal Bayar</th>
              <th>Total Pembayaran</th>
              <th>Bayar</th>
              <th>Kembalian</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($transaksi as $value) : ?>
              <tr>
                <td>
                  <?php if ($value->tanggal_transaksi != "0000-00-00") : ?>
                    <?= $value->jam_transaksi; ?>, <?= date('d F Y', strtotime($value->tanggal_transaksi)); ?>
                  <?php else : ?>
                    <span class="badge bg-label-danger me-1">Belum Bayar</span>
                  <?php endif; ?>
                </td>
                <td>Rp. <?= number_format($value->total_pembayaran); ?></td>
                <td>Rp. <?= number_format($value->bayar); ?></td>
                <td>Rp. <?= number_format($value->kembalian); ?></td>
                <td>

                  <a href="<?= base_url('transaksi/print_pembayaran/' . $value->kode_transaksi); ?>" class="btn btn-danger btn-sm" target="_blank"><i class='bx bx-printer'></i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>