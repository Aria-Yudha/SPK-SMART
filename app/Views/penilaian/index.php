<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
  <h2>Data Penilaian Supplier</h2>
  
  <table class="table table-bordered">
    <thead class="table-light">
      <tr>
        <th rowspan="2" class="align-middle text-center">No</th>
        <th rowspan="2" class="align-middle text-center">Kode Supplier</th>
        <th rowspan="2" class="align-middle text-center">Nama Supplier</th>
        <th colspan="<?= count($kriteria); ?>" class="text-center">Nilai</th>
        <th rowspan="2" class="align-middle text-center">Aksi</th>
      </tr>
      <tr>
        <?php foreach ($kriteria as $nama): ?>
          <th class="text-center"><?= esc($nama); ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($penilaian as $id_supplier => $p): ?>
        <tr>
          <td class="text-center"><?= $no++; ?></td>
          <td class="text-center"><?= esc($p['kode_supplier']); ?></td>
          <td><?= esc($p['nama_sup']); ?></td>
          <?php foreach ($kriteria as $id_kriteria => $nama): ?>
            <td class="text-center"><?= esc($p['nilai'][$id_kriteria] ?? '-'); ?></td>
          <?php endforeach; ?>
          <td class="text-center">
            <a href="<?= base_url('penilaian/edit/' . $id_supplier); ?>" class="btn btn-sm btn-warning">Edit</a>
            <form action="<?= base_url('penilaian/hapus/' . $id_supplier); ?>" method="post" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus penilaian supplier ini?');">
              <?= csrf_field(); ?>
              <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <a href="<?= base_url('penilaian/tambah'); ?>" class="btn btn-primary mb-3">Tambah Penilaian</a>
</div>

<?= $this->endSection(); ?>
