<?= $this->extend('layout/template');  ?>

<?= $this->section('content');  ?>
<div class="container">
  <div class="row">
    <div class="container mt-3">
      <h1>Daftar Nilai Parameter</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Kriteria</th>
            <th scope="col">Nilai Parameter</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <?php $no = 1; ?>
        <tbody>
          <?php foreach($parameter as $p): ?>
            
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $p['nama_kriteria']; ?></td>
            <td><?= $p['nilai_parameter']; ?></td>
            <td><?= $p['keterangan']; ?></td>
            <td>
            <a href="<?= base_url('/parameter/edit/' . $p['id_parameter']); ?>" class="btn btn-success">Ubah</a>
            <form action="<?= base_url('/parameter/hapus/'.$p['id_parameter']); ?>" method="post" class="d-inline">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table> 
      <a href="<?= base_url('/parameter/tambah'); ?>" class="btn btn-primary">Tambah Data</a>
    </div>
  </div>
</div>
<?= $this->endSection();  ?>
