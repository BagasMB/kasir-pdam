<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div id="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <div id="type-error" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>


        <!-- Bordered Table -->
        <div class="card card-responsive mb-3">

            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Data User</h5>
                <span class="badge bg-label-primary float-end" type="button" data-bs-toggle="modal" data-bs-target="#modalTambahUser">
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
                                <th>Username</th>
                                <th>Nama</th>
                                <th>Status Akun</th>
                                <th>User Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($akun as $kun) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $kun['username']; ?></td>
                                    <td><?= $kun['nama']; ?></td>
                                    <td>
                                        <?php if ($kun['status'] == "Aktif") : ?>

                                            <span class="badge bg-label-success me-1">
                                                <?= $kun['status']; ?>
                                            </span>

                                        <?php elseif ($kun['status'] == "Mati") :  ?>

                                            <span class="badge bg-label-danger me-1">
                                                <?= $kun['status']; ?>
                                            </span>

                                        <?php endif; ?>
                                    </td>
                                    <td><?= $kun['user_role']; ?></td>
                                    <td>
                                        <div class="dropdown text-center">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#modalEditUser<?= $kun['user_id']; ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <div class="dropdown-item" id="btn-hapus" href="<?= base_url('user/deleteUser/' . $kun['user_id']); ?>"><i class="bx bx-trash me-1"></i> Delete</di>
                                                </div>
                                            </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="modalEditUser<?= $kun['user_id']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel3">Edit Data User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?= base_url('user/editUser') ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="row mb-3 g-2">
                                                        <div class="col-12 mb-2 text-start">
                                                            <label class="form-label">User Id <strong class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" name="user_id" value="<?= $kun['user_id'] ?>" readonly>
                                                        </div>
                                                        <div class="col mb-2 text-start">
                                                            <label class="form-label">UserName <strong class="text-danger">*</strong></label>
                                                            <input type="text" name="username" class="form-control" placeholder="Enter Username" value="<?= $kun['username'] ?>" autocomplete="off">
                                                        </div>
                                                        <div class="col mb-2 text-start form-password-toggle">
                                                            <label class="form-label">Password <strong class="text-danger">*</strong></label>
                                                            <div class="input-group">
                                                                <input type="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" value="<?= $kun['password'] ?>" autocomplete="off">
                                                                <div class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mb-2 text-start">
                                                            <label class="form-label">Nama</label>
                                                            <input type="text" name="nama" class="form-control" placeholder="Enter Nama" value="<?= $kun['nama'] ?>" autocomplete="off">
                                                        </div>
                                                        <div class="col-6 mb-2 text-start">
                                                            <label class="form-label">Status Akun</label>
                                                            <select class="form-select" name="status">
                                                                <option selected><?= $kun['status'] ?></option>
                                                                <option value="Aktif">Aktif</option>
                                                                <option value="Mati">Mati</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-6 mb-2 text-start">
                                                            <label class="form-label">User Role</label>
                                                            <select class="form-select" name="user_role">
                                                                <option selected><?= $kun['user_role'] ?></option>
                                                                <option value="Kasir">Kasir</option>
                                                                <option value="Manager">Manager</option>
                                                                <option value="Admin">Admin</option>
                                                                <option value="Petugas Pencatat Meteran">Petugas Pencatat Meteran</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <strong class="text-start text-danger">Data Tidak Boleh Ada Yang Kosong</strong>
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

        <!-- <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            foreach ($akun as $kun) : ?>
                <div class="col">
                    <div class="card m-3" style="max-width: 540px;">
                        <div class="row">
                            <div class="col-md-5">
                                <a href="<?= base_url('assets/img/profile/') . $kun['image'] ?>" class="" data-fancybox="gallery">
                                    <img src="<?= base_url('assets/img/profile/') . $kun['image'] ?>" class="img-thumbnail rounded-start">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $kun['nama']; ?></h5>
                                    <p class="card-text text-secondary">
                                        Username : <?= $kun['username'] ?><br>  
                                        Position : <?= $kun['user_role'] ?><br>
                                        Status : <?php if ($kun['status'] == "Aktif") : ?>

                                            <span class="badge bg-label-success me-1">
                                                <?= $kun['status']; ?>
                                            </span>

                                        <?php elseif ($kun['status'] == "Mati") :  ?>

                                            <span class="badge bg-label-danger me-1">
                                                <?= $kun['status']; ?>
                                            </span>

                                        <?php endif; ?>
                                    </p>
                                    <p class="card-text"><small class="text-body-secondary">Date Create Akun <?= date('d F Y', $kun['date_created']) ?></small></p>
                                    <div class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#modalEditUser<?= $kun['user_id']; ?>" name="edit">Edit</div>
                                    <div id="btn-hapus" href="<?= base_url('admin/deleteUser/' . $kun['user_id']); ?>" class="badge bg-danger" name="delete">Delete</div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            <?php endforeach; ?>
        </div> -->

        <div class="modal fade" id="modalTambahUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Tambah Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?= base_url('user/tambahUser') ?>" method="post">
                        <div class="modal-body">
                            <div class="row mb-3 g-2">
                                <div class="col mb-2 text-start">
                                    <label class="form-label">UserName <strong class="text-danger">*</strong></label>
                                    <input type="text" name="username" class="form-control" placeholder="Enter Username" autocomplete="off">
                                </div>
                                <div class="col mb-2 text-start form-password-toggle">
                                    <label class="form-label">Password <strong class="text-danger">*</strong></label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" autocomplete="off">
                                        <div class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 text-start">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Enter Nama" autocomplete="off">
                                </div>
                                <div class="col-6 mb-2 text-start">
                                    <label class="form-label">Status Akun</label>
                                    <select class="form-select" name="status">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Mati">Mati</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-2 text-start">
                                    <label class="form-label">User Role</label>
                                    <select class="form-select" name="user_role">
                                        <option value="Kasir">Kasir</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Petugas Pencatat Meteran">Petugas Pencatat Meteran</option>
                                    </select>
                                </div>
                            </div>
                            <strong class="text-start text-danger">Data Tidak Boleh Ada Yang Kosong</strong>
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


    <!-- / Content -->