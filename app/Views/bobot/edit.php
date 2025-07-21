<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">Form Ubah Data Bobot</h2>
            <form action="<?= base_url('bobot/ubah/' . $bobot['id_bobot']); ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">

                <div class="mb-3">
                    <label for="id_bobot" class="form-label">Id Bobot</label>
                    <input type="text" class="form-control" id="id_bobot" name="id_bobot" value="<?= $bobot['id_bobot']; ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="nilai_bobot" class="form-label">Nilai Bobot</label>
                    <input type="text" class="form-control" id="nilai_bobot" name="nilai_bobot" value="<?= $bobot['nilai_bobot']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $bobot['keterangan']; ?>" required>
                </div>

                <button type="submit" class="btn btn-success">Ubah</button>
                <a href="<?= base_url('bobot/index'); ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
