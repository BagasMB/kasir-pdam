<div class="container-xxl flex-grow-1 container-p-y">
    <!-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Admin</h4> -->

    <div id="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <div id="type-error" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>


    <!-- Basic with Icons -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Penggunaan Air</h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('penggunaanair/input'); ?>" method="post">
                    <div class="form-group row">
                        <div class="col">
                            <div class="col-sm-6 mb-3">
                                <label class="col-sm col-form-label">Id Pelanggan</label>
                                <input type="number" class="form-control" name="pelanggan_id" placeholder="ID Pelanggan" autocomplete="off" />
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Pemakaian Awal</label>
                                <input type="number" name="pemakaian_awal" class="form-control" placeholder="Pemakaian Awal" autocomplete="off" />
                                <small class="form-text text-danger"><?= form_error('pemakaian_awal'); ?></small>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Pemakaian Akhir</label>
                                <input type="number" name="pemakaian_akhir" class="form-control" placeholder="Pemakaian Akhir" autocomplete="off" />
                                <small class="form-text text-danger"><?= form_error('pemakaian_akhir'); ?></small>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- / Content -->