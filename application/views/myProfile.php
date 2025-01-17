<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Admin</h4> -->
    <!-- Basic with Icons -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">My Profile</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('myprofile'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="namafoto" value="<?= $this->session->userdata('image'); ?>">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label class="col-sm-2 col-form-label"> Id User</label>
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="user_id" value="<?= $this->session->userdata('user_id'); ?>" readonly autocomplete="off" />
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="col-sm-2 col-form-label">UserName</label>
                            <div class="input-group input-group-merge">
                                <input type="text" class="form-control" name="username" value="<?= $this->session->userdata('username'); ?>" readonly autocomplete="off" />
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="input-group input-group-merge">
                                <input type="text" name="nama" class="form-control" value="<?= $this->session->userdata('nama'); ?>" autocomplete="off" />
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="col-sm-3 col-form-label">Status Akun</label>
                            <input type="text" class="form-control" name="status" value="<?= $this->session->userdata('status'); ?>" readonly autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label class="col-sm-2 col-form-label">User Role</label>
                            <input type="text" class="form-control" name="user_role" value="<?= $this->session->userdata('user_role'); ?>" readonly autocomplete="off" />
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="row">
                                <div class="col-sm-9">
                                    <label class="form-label">Profile</label>
                                    <input type="file" name="image" class="form-control">
                                    <div class="form-text fst-italic">Ukuran Gambar Harus Persegi</div>
                                </div>
                                <?php $profile = $this->session->userdata('image') == null ? "default.png" : $this->session->userdata('image'); ?>
                                <div class="col-sm-3">
                                    <a href="<?= base_url('assets/img/profile/') . $profile; ?>" class="fancybox" data-fancybox="gallery1">
                                        <img src="<?= base_url('assets/img/profile/') . $profile; ?>" width="120" class="img-thumbnail rounded">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </form>
                <? //= form_close(); 
                ?>
            </div>
        </div>
    </div>
    <? //= form_open_multipart('myprofile') 
    ?>

</div>
<!-- / Content -->