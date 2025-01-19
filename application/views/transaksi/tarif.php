<div class="container-xxl flex-grow-1 container-p-y">
  <!-- Bordered Table -->
  <div class="card card-responsive mb-3">

    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="mb-0">Data Tarif</h5>
      <span class="badge bg-label-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#modalTambahTarif">
        <i class="fa-solid fa-person-circle-plus me-1"></i>
        Tambah
      </span>
    </div>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table id="myTable" class="table" width="100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Tarif</th>
              <th>Nominal Tarif</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($tarif as $res) : ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $res['nama_tarif']; ?></td>
                <td>Rp. <?= number_format($res['biaya'], 2); ?></td>
                <td>
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditTarif<?= $res['tarif_id']; ?>">
                    <i class="bx bx-edit"></i>
                  </button>
                  <a id="btn-hapus" class="btn btn-danger btn-sm" href="<?= base_url('tarif/deleteTarif/' . $res['tarif_id']); ?>"><i class="bx bx-trash"></i></a>
                </td>
              </tr>

              <div class="modal fade" id="modalEditTarif<?= $res['tarif_id']; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel3">Edit Data Tarif</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('tarif/editTarif') ?>" method="post">
                      <input type="hidden" name="tarif_id" value="<?= $res['tarif_id']; ?>">
                      <div class="modal-body">
                        <div class="row mb-3 g-2">
                          <div class="col-6 mb-2">
                            <label class="form-label">Nama Tarif</label>
                            <input type="text" name="nama_tarif" class="form-control" placeholder="Nama Tarif" value="<?= $res['nama_tarif']; ?>" autocomplete="off">
                          </div>
                          <div class="col-6 mb-2">
                            <label class="form-label">Biaya</label>
                            <input type="text" name="biaya" class="form-control" placeholder="100000" value="<?= $res['biaya']; ?>" autocomplete="off">
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>

          </tbody>
        </table>

      </div>
    </div>
  </div>
  <!--/ Bordered Table -->

  <div class="modal fade" id="modalTambahTarif" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Tambah Data Tarif</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= base_url('tarif/tambahTarif') ?>" method="post">
          <div class="modal-body">
            <div class="row mb-3 g-2">
              <div class="col-6 mb-2">
                <label class="form-label">Nama Tarif</label>
                <input type="text" name="nama_tarif" class="form-control" placeholder="Nama Tarif" autocomplete="off">
              </div>
              <div class="col-6 mb-2">
                <label class="form-label">Biaya</label>
                <input type="text" name="biaya" class="form-control" placeholder="100000" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>