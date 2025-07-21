<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">Form Ubah Data Supplier</h2>
            <form action="<?= base_url('supplier/ubah/' . $supplier['id_supplier']); ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">

                <div class="mb-3">
                    <label for="id_supplier" class="form-label">Id Supplier</label>
                    <input type="text" class="form-control" id="id_supplier" name="id_supplier" value="<?= $supplier['id_supplier']; ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="kode_sup" class="form-label">Kode Supplier</label>
                    <input type="text" class="form-control" id="kode_sup" name="kode_sup" value="<?= $supplier['kode_sup']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nama_sup" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" id="nama_sup" name="nama_sup" value="<?= $supplier['nama_sup']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nohp" class="form-label">No HP</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $supplier['nohp']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $supplier['alamat']; ?></textarea>
                </div>

                <button type="submit" class="btn btn-success">Ubah</button>
                <a href="<?= base_url('supplier/index'); ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
