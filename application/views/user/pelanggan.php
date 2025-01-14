<div class="container-xxl flex-grow-1 container-p-y">
    <div id="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div id="type-error" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>

    <!-- Bordered Table -->
    <div class="card card-responsive">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Data Pelanggan</h5>
            <span class="badge bg-label-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#modalTambahPelanggan">
                <i class="fa-solid fa-person-circle-plus me-1"></i>
                Tambah
            </span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- text-nowrap -->
                <table id="myTable" class="table text-nowrap" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Kategori</th>
                            <th>Meteran Awal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pelanggan as $pel) : ?>
                            <tr>
                                <td><?= $pel['pelanggan_id']; ?></td>
                                <td><?= $pel['nama']; ?></td>
                                <td>
                                    <?php if ($pel['jenis_kelamin'] == "Laki-Laki") : ?>
                                        <i class='bx bx-male text-info me-1'></i><?= $pel['jenis_kelamin']; ?>
                                    <?php elseif ($pel['jenis_kelamin'] == "Perempuan") : ?>
                                        <i class='bx bx-female text-danger me-1'></i></i><?= $pel['jenis_kelamin']; ?>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= $pel['dusun']; ?>,
                                    RT 0<?= $pel['rt']; ?> / 0<?= $pel['rw']; ?>,
                                    <?= $pel['desa']; ?>,
                                    <?= $pel['kecamatan']; ?>,
                                    Kab. <?= $pel['kabupaten']; ?>
                                </td>
                                <td>
                                    <?php if ($pel['kategori'] == "R-01") : ?>

                                        <span class="badge bg-label-success me-1">
                                            <?= $pel['kategori']; ?>
                                        </span>

                                    <?php elseif ($pel['kategori'] == "R-02") :  ?>

                                        <span class="badge bg-label-warning me-1">
                                            <?= $pel['kategori']; ?>
                                        </span>

                                    <?php elseif ($pel['kategori'] == "K-01") :  ?>

                                        <span class="badge bg-label-primary me-1">
                                            <?= $pel['kategori']; ?>
                                        </span>

                                    <?php elseif ($pel['kategori'] == "K-02") :  ?>

                                        <span class="badge bg-label-info me-1">
                                            <?= $pel['kategori']; ?>
                                        </span>

                                    <?php endif; ?>
                                </td>
                                <td><?= $pel['meter_awal']; ?></td>
                                <td>
                                    <div class="dropdown text-center">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalEditPelanggan<?= $pel['pelanggan_id']; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <span class="dropdown-item btn" href="<?= base_url('pelanggan/delete/') . $pel['pelanggan_id'] ?>" id="btn-hapus" name="delete"><i class="bx bx-trash me-1"></i> Delete</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>


                            <!-- Modal Edit -->
                            <div class="modal fade" id="modalEditPelanggan<?= $pel['pelanggan_id']; ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel3">Input Data Pelanggan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= base_url('Pelanggan/edit') ?>" method="post">
                                            <div class="modal-body text-nowrap">
                                                <input type="hidden" name="pelanggan_id" value="<?= $pel['pelanggan_id']; ?>">
                                                <div class="row mb-3 g-2">
                                                    <div class="col">
                                                        <label for="nama" class="form-label">Nama</label>
                                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter Nama" value="<?= $pel['nama']; ?>" autocomplete="off">
                                                    </div>
                                                    <div class="col">
                                                        <label class="col-md-3 form-label" for="basic-icon-default-status">Jenis Kelamin</label>
                                                        <select class="form-select" name="jenis_kelamin" id="exampleFormControlSelect1" aria-describedby="basic-icon-default-status">
                                                            <option <?php if ($pel['jenis_kelamin'] == 'Laki-Laki') {
                                                                        echo "selected";
                                                                    } ?> value="Laki-Laki">Laki-Laki</option>
                                                            <option <?php if ($pel['jenis_kelamin'] == 'Perempuan') {
                                                                        echo "selected";
                                                                    } ?> value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3 g-2">
                                                    <div class="col">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" value="<?= $pel['email']; ?>" autocomplete="off">
                                                    </div>
                                                    <div class="col">
                                                        <label for="no_wa" class="form-label">No WhatsApp</label>
                                                        <input type="text" name="no_wa" id="no_wa" class="form-control" placeholder="No WhatsApp" value="<?= $pel['no_wa']; ?>" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="dusun" class="form-label">Dusun</label>
                                                        <input type="text" name="dusun" id="dusun" class="form-control" placeholder="Dusun" value="<?= $pel['dusun']; ?>" autocomplete="off" />
                                                    </div>
                                                    <div class="col">
                                                        <label for="rt" class="form-label">RT</label>
                                                        <input type="number" name="rt" id="rt" class="form-control" placeholder="RT" value="<?= $pel['rt']; ?>" autocomplete="off" />
                                                    </div>
                                                    <div class="col">
                                                        <label for="rw" class="form-label">RW</label>
                                                        <input type="number" name="rw" id="rw" class="form-control" placeholder="RW" value="<?= $pel['rw']; ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label for="desa" class="form-label">Desa</label>
                                                        <input type="text" name="desa" id="desa" class="form-control" placeholder="Desa" value="<?= $pel['desa']; ?>" autocomplete="off" />
                                                    </div>
                                                    <div class="col">
                                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                                        <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="Kecamatan" value="<?= $pel['kecamatan']; ?>" autocomplete="off" />
                                                    </div>
                                                    <div class="col">
                                                        <label for="kabupaten" class="form-label">Kabupaten</label>
                                                        <input type="text" name="kabupaten" id="kabupaten" class="form-control" placeholder="Kabupaten" value="<?= $pel['kabupaten']; ?>" autocomplete="off" />
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="col-md-3 form-label" for="basic-icon-default-status">kategori Pelanggan</label>
                                                        <select class="form-select" name="kategori" id="exampleFormControlSelect1" aria-describedby="basic-icon-default-status">
                                                            <option <?php if ($pel['kategori'] == 'R-01') {
                                                                        echo "selected";
                                                                    } ?> value="R-01">R-01 (Standar)</option>
                                                            <option <?php if ($pel['kategori'] == 'R-02') {
                                                                        echo "selected";
                                                                    } ?> value="R-02">R-02 (Keluarga Miskin)</option>
                                                            <option <?php if ($pel['kategori'] == 'K-01') {
                                                                        echo "selected";
                                                                    } ?> value="K-01">K-01 (Dinas/Instansi)</option>
                                                            <option <?php if ($pel['kategori'] == 'K-02') {
                                                                        echo "selected";
                                                                    } ?> value="K-02">K-02 (Tempat Ibadah)</option>
                                                        </select>
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

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="modalTambahPelanggan" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel3">Input Data Pelanggan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?= base_url('Pelanggan/tambah') ?>" method="post">
                                        <div class="modal-body text-nowrap">
                                            <div class="row mb-3 g-2">
                                                <div class="col">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter Nama" autocomplete="off">
                                                </div>
                                                <div class="col">
                                                    <label class="col-md-3 form-label" for="basic-icon-default-status">Jenis Kelamin</label>
                                                    <select class="form-select" name="jenis_kelamin" id="exampleFormControlSelect1" aria-describedby="basic-icon-default-status">
                                                        <option selected>Select Menu</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3 g-2">
                                                <div class="col">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="example@gmail.com" autocomplete="off">
                                                </div>
                                                <div class="col">
                                                    <label for="no_wa" class="form-label">No WhatsApp</label>
                                                    <input type="text" name="no_wa" id="no_wa" class="form-control" placeholder="No WhatsApp" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label for="dusun" class="form-label">Dusun</label>
                                                    <input type="text" name="dusun" id="dusun" class="form-control" placeholder="Dusun" autocomplete="off" />
                                                </div>
                                                <div class="col">
                                                    <label for="rt" class="form-label">RT</label>
                                                    <input type="number" name="rt" id="rt" class="form-control" placeholder="RT" autocomplete="off" />
                                                </div>
                                                <div class="col">
                                                    <label for="rw" class="form-label">RW</label>
                                                    <input type="number" name="rw" id="rw" class="form-control" placeholder="RW" autocomplete="off" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label for="desa" class="form-label">Desa</label>
                                                    <input type="text" name="desa" id="desa" class="form-control" placeholder="Desa" autocomplete="off" />
                                                </div>
                                                <div class="col">
                                                    <label for="kecamatan" class="form-label">Kecamatan</label>
                                                    <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="Kecamatan" autocomplete="off" />
                                                </div>
                                                <div class="col">
                                                    <label for="kabupaten" class="form-label">Kabupaten</label>
                                                    <input type="text" name="kabupaten" id="kabupaten" class="form-control" placeholder="Kabupaten" autocomplete="off" />
                                                </div>
                                            </div>
                                            <!-- <div class="row mb-3">
                                                      <div class="col">
                                                          <label class="col-md-3 form-label">Provinsi</label>
                                                          <select class="form-select" name="provinsi" id="provinsi">
                                                              <option>Pilih</option>
                                                          </select>
                                                      </div>
                                                      <div class="col">
                                                          <label class="col-md-3 form-label">Kab/Kota</label>
                                                          <select class="form-select" name="kabupaten" id="kota">
                                                              <option>Pilih</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="row mb-3">
                                                      <div class="col">
                                                          <label class="col-md-3 form-label">Kecamatan</label>
                                                          <select class="form-select" name="kecamatan" id="kecamatan">
                                                              <option>Pilih</option>
                                                          </select>
                                                      </div>
                                                      <div class="col">
                                                          <label class="col-md-3 form-label">Kelurahan</label>
                                                          <select class="form-select" name="desa" id="kelurahan">
                                                              <option>Pilih</option>
                                                          </select>
                                                      </div>
                                                  </div> -->
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="col-md-3 form-label" for="basic-icon-default-status">kategori Pelanggan</label>
                                                    <select class="form-select" name="kategori" id="exampleFormControlSelect1" aria-describedby="basic-icon-default-status">
                                                        <option selected>Select Menu</option>
                                                        <option value="R-01">R-01 (Standar)</option>
                                                        <option value="R-02">R-02 (Keluarga Miskin)</option>
                                                        <option value="K-01">K-01 (Dinas/Instansi)</option>
                                                        <option value="K-02">K-02 (Tempat Ibadah)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <strong class="text-danger">Data Tidak Boleh Ada Yang Kosong</strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->

</div>
<!-- / Content -->