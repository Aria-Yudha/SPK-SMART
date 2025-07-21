<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Form Ubah Data Penilaian</h4>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('penilaian/ubah/' . $penilaian[0]['id_supplier']); ?>" method="post">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">

                        <div class="mb-3">
                            <label class="form-label">Nama Supplier</label>
                            <input type="text" class="form-control" value="<?= esc($supplier[0]['nama_sup']); ?>" readonly>
                            <input type="hidden" name="id_supplier" value="<?= esc($supplier[0]['id_supplier']); ?>">
                        </div>

                        <?php foreach ($kriteria as $k): ?>
                            <div class="mb-3">
                                <label class="form-label"><?= esc($k['nama_kriteria']); ?></label>
                                <input type="hidden" name="id_kriteria[]" value="<?= $k['id_kriteria']; ?>">
                                <select name="id_parameter[]" class="form-control" required>
                                    <option value="">-- Pilih Nilai --</option>
                                    <?php foreach ($parameter as $p): ?>
                                        <?php if ($p['id_kriteria'] == $k['id_kriteria']): ?>
                                            <option value="<?= $p['id_parameter']; ?>"
                                                <?php foreach ($penilaian as $pn):
                                                    if ($pn['id_kriteria'] == $k['id_kriteria'] && $pn['id_parameter'] == $p['id_parameter']) echo 'selected'; 
                                                endforeach; ?>>
                                                <?= $p['nilai_parameter']; ?> - <?= $p['keterangan']; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endforeach; ?>

                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('penilaian'); ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
