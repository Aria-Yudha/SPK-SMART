<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
  <h2>Ubah Data Parameter</h2>
  <form action="<?= base_url('parameter/ubah/' . $parameter['id_parameter']); ?>" method="post">
    <?= csrf_field(); ?>
    <input type="hidden" name="_method" value="PUT">

    <div class="mb-3">
      <label for="id_parameter" class="form-label">ID Parameter</label>
      <input type="text" class="form-control" id="id_parameter" name="id_parameter" value="<?= $parameter['id_parameter']; ?>" readonly>
    </div>

    <div class="mb-3">
      <label for="id_kriteria" class="form-label">Kriteria</label>
      <select class="form-control" id="id_kriteria" name="id_kriteria" required>
        <option value="">-- Pilih Kriteria --</option>
        <?php foreach ($kriteria as $k): ?>
          <option value="<?= $k['id_kriteria']; ?>" <?= ($k['id_kriteria'] == $parameter['id_kriteria']) ? 'selected' : ''; ?>>
            <?= $k['nama_kriteria']; ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="nilai_parameter" class="form-label">Nilai Parameter</label>
      <input type="text" class="form-control" id="nilai_parameter" name="nilai_parameter" value="<?= $parameter['nilai_parameter']; ?>" required>
    </div>

    <div class="mb-3">
      <label for="keterangan" class="form-label">Keterangan</label>
      <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $parameter['keterangan']; ?>" required>
    </div>

    <button type="submit" class="btn btn-success">Ubah</button>
    <a href="<?= base_url('parameter/index'); ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<?= $this->endSection(); ?>
