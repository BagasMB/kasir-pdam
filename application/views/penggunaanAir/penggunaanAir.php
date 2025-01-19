<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Penggunaan Air</h5>
        </div>
        <div class="card-body row">
            <div class="col-md-6 mb-4">
                <form action="<?= base_url('penggunaanair/input'); ?>" method="post">
                    <div class="form-group mb-3">
                        <label class="form-label">Pilih Pelanggan</label>
                        <select id="select-pelanggan" class="form-select" data-placeholder="Pilih Pelanggan" data-allow-clear="1" name="nomor_pelanggan">
                            <option></option>
                            <?php foreach ($pelangan as $value) : ?>
                                <option value="<?= $value->nomor_pelanggan; ?>"><?= $value->nama; ?> (<?= $value->nomor_pelanggan; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Pemakaian Akhir</label>
                        <input type="number" name="pemakaian_akhir" class="form-control" placeholder="Pemakaian Akhir" autocomplete="off" />
                        <small class="form-text text-danger"><?= form_error('pemakaian_akhir'); ?></small>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="col-md-6 mb-4" id="data-pelanggan">
                <p class="d-flex justify-content-center">Silakan pilih pelanggan untuk menampilkan data.</p>
            </div>
        </div>
    </div>
</div>
<!-- / Content -->