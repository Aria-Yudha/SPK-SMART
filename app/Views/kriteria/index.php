<?= $this->extend('layout/template');  ?>

<?= $this->section('content');  ?>
<div class="container">
  <div class="row">
    <div class="container mt-5">
      <h1>Daftar Kriteria</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kriteria</th>
            <th scope="col">Kode Kriteria</th>
            <th scope="col">Jenis Kriteria</th>
            <th scope="col">Nilai Bobot Alternatif</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <?php $no = 1; ?>
        <tbody>
          <?php foreach($kriteria as $k): ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $k['nama_kriteria']; ?></td>
            <td><?= $k['kd_kriteria']; ?></td>
            <td><?= $k['jenis_kriteria']; ?></td>
            <td><?= number_format($k['nilai_bobot'] / 100, 2); ?></td>
            <td>
            <a href="<?= base_url('/kriteria/edit/' . $k['id_kriteria']); ?>" class="btn btn-success">Ubah</a>
            <form action="<?= base_url('/kriteria/hapus/'.$k['id_kriteria']); ?>" method="post" class="d-inline">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table> 
      <a href="<?= base_url('/kriteria/tambah'); ?>" class="btn btn-primary">Tambah Data</a>
    </div>
  </div>
</div>
<?= $this->endSection();  ?>
