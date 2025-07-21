<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
  <h2>Tambah Penilaian Supplier</h2>

  <form action="<?= base_url('penilaian/simpan'); ?>" method="post">
    <?= csrf_field(); ?>

    <div class="mb-3">
      <label class="form-label">Pilih Supplier</label>
      <select name="id_supplier" class="form-control" required>
        <option value="">-- Pilih Supplier --</option>
        <?php foreach ($supplier as $s): ?>
          <option value="<?= $s['id_supplier']; ?>"><?= $s['nama_sup']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <?php foreach ($kriteria as $k): ?>
      <div class="mb-3">
        <label class="form-label"><?= $k['nama_kriteria']; ?></label>
        <input type="hidden" name="id_kriteria[]" value="<?= $k['id_kriteria']; ?>">
        <select name="id_parameter[]" class="form-control" required>
          <option value="">-- Pilih Nilai --</option>
          <?php foreach ($parameter as $p): ?>
            <?php if ($p['id_kriteria'] == $k['id_kriteria']): ?>
              <option value="<?= $p['id_parameter']; ?>"><?= $p['nilai_parameter']; ?> - <?= $p['keterangan']; ?></option>
            <?php endif; ?>
          <?php endforeach; ?>
        </select>
      </div>
    <?php endforeach; ?>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('penilaian'); ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<?= $this->endSection(); ?>
