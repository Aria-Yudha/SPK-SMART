<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
  <h2>Tambah Data Kriteria</h2>
  <form action="<?= base_url('kriteria/simpan'); ?>" method="post">
    <?= csrf_field(); ?>
    <div class="mb-3">
      <label for="id_kriteria" class="form-label">ID Kriteria</label>
      <input type="text" class="form-control" id="id_kriteria" name="id_kriteria" required>
    </div>
    
    <div class="mb-3">
      <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
      <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" required>
    </div>

    <div class="mb-3">
      <label for="kd_kriteria" class="form-label">Kode Kriteria</label>
      <input type="text" class="form-control" id="kd_kriteria" name="kd_kriteria" required>
    </div>

    <div class="mb-3">
      <label for="jenis_kriteria" class="form-label">Jenis</label>
      <select class="form-control" id="jenis_kriteria" name="jenis_kriteria" required>
        <option value="">-- Pilih --</option>
        <option value="Benefit">Benefit</option>
        <option value="Cost">Cost</option>
      </select>
    </div>
    
    <div class="mb-3">
      <label for="id_bobot" class="form-label">Bobot</label>
      <select class="form-control" id="id_bobot" name="id_bobot" required>
        <option value="">-- Pilih Bobot --</option>
        <?php foreach ($bobot as $b): ?>
          <option value="<?= $b['id_bobot']; ?>"><?= $b['nilai_bobot']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Tambah</button>
    <a href="<?= base_url('kriteria/index'); ?>" class="btn btn-secondary">Kembali</a>
  </form>
</div>
<?= $this->endSection(); ?>
