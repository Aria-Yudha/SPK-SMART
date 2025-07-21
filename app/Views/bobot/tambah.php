<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="container mt-5">
                <h2 class="mb-4">Tambah Data Bobot</h2>


                <form action="<?= base_url('bobot/simpan'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="id_bobot" class="form-label">Id Bobot</label>
                        <input type="text" class="form-control" id="id_bobot" name="id_bobot" placeholder="Contoh: B01" required>
                    </div>

                    <div class="mb-3">
                        <label for="nilai_bobot" class="form-label">Nilai Bobot</label>
                        <input type="text" class="form-control" id="nilai_bobot" name="nilai_bobot" placeholder="Contoh: 10" required>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Contoh: Bobot bernilai 10%" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Tambah</button>
                    <a href="<?= base_url('bobot/index'); ?>" class="btn btn-secondary">Kembali</a>

                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
