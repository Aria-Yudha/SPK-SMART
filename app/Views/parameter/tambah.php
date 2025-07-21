<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
  <h2>Tambah Data Nilai Parameter</h2>
  <form action="<?= base_url('parameter/simpan'); ?>" method="post">
    <?= csrf_field(); ?>

    <div class="mb-3">
      <label for="id_kriteria" class="form-label">Nama Kriteria</label>
      <select class="form-control" id="id_kriteria" name="id_kriteria" required>
        <option value="">-- Pilih Kriteria --</option>
        <?php foreach ($kriteria as $k): ?>
          <option value="<?= $k['id_kriteria']; ?>"><?= $k['nama_kriteria']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div id="parameter-wrapper">
      <div class="parameter-group border rounded p-3 mb-3">
        <h5>Parameter</h5>
        <div class="mb-3">
          <label class="form-label">Nilai Parameter</label>
          <input type="number" step="any" name="nilai_parameter[]" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Keterangan</label>
          <input type="text" name="keterangan[]" class="form-control" required>
        </div>
        <button type="button" class="btn btn-danger btn-sm remove-btn">Hapus</button>
      </div>
    </div>

    <button type="button" class="btn btn-secondary mb-3" id="add-parameter">Tambah Parameter</button>
    <br>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('parameter/index'); ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<script>
// DOM Ready
document.addEventListener('DOMContentLoaded', function () {
  const wrapper = document.getElementById('parameter-wrapper');
  const addBtn = document.getElementById('add-parameter');

  addBtn.addEventListener('click', function () {
    const group = document.createElement('div');
    group.classList.add('parameter-group', 'border', 'rounded', 'p-3', 'mb-3');
    group.innerHTML = `
      <h5>Parameter</h5>
      <div class="mb-3">
        <label class="form-label">Nilai Parameter</label>
        <input type="number" step="any" name="nilai_parameter[]" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Keterangan</label>
        <input type="text" name="keterangan[]" class="form-control" required>
      </div>
      <button type="button" class="btn btn-danger btn-sm remove-btn">Hapus</button>
    `;
    wrapper.appendChild(group);
  });

  // Event delegation for remove buttons
  wrapper.addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-btn')) {
      e.target.parentElement.remove();
    }
  });
});
</script>
<?= $this->endSection(); ?>
