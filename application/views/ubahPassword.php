<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account /</span> Admin</h4> -->

    <!-- Basic with Icons -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Password</h5>
            </div>
            <div class="card-body">
                <?= form_open_multipart('password') ?>
                <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id'); ?>">
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="password-lama">Password Lama</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password-lama" name="password_lama" placeholder="Password Lama" autocomplete="off" />
                        <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="password-baru">Password Baru</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="password-baru" name="password_baru1" placeholder="Password Baru" autocomplete="off" />
                        <?= form_error('password_baru1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label" for="basic-default-name">Konfirmasi Password Baru</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" id="basic-default-name" name="password_baru2" placeholder="Konfirmasi Password Baru" autocomplete="off" />
                        <?= form_error('password_baru2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>


</div>
<!-- / Content -->