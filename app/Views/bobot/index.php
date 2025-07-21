<?= $this->extend('layout/template');  ?>

<?= $this->section('content');  ?>
<div class="container">
  <div class="row">
    <div class="container mt-3">
      <h1>Daftar Bobot</h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Id Bobot</th>
            <th scope="col">Nilai Bobot</th>
            <th scope="col">Nilai Alternatif</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <?php $no = 1; ?>
        <tbody>
          <?php foreach($bobot as $b): ?>
            
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $b['id_bobot']; ?></td>
            <td><?= $b['nilai_bobot']; ?></td>
            <td><?= number_format($b['nilai_bobot'] / 100, 2); ?></td>
            <td><?= $b['keterangan']; ?></td>
            <td>
            <a href="<?= base_url('/bobot/edit/' . $b['id_bobot']); ?>" class="btn btn-success">Ubah</a>
            <form action="<?= base_url('/bobot/hapus/'.$b['id_bobot']); ?>" method="post" class="d-inline">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">Hapus</button>
            </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table> 
      <a href="<?= base_url('/bobot/tambah'); ?>" class="btn btn-primary">Tambah Data</a>
    </div>
  </div>
</div>
<div class="container mt-3">
  <h2>Keterangan</h2>
  <p>Berikut adalah rumus mencari nilai normalisasi pada tabel pembobotan:</p>
  
  <p><strong>Normalisasi = W<sub>j</sub> / (∑ W<sub>j</sub>)</strong></p>
  
  <p>Keterangan:</p>
  <ul>
    <li><strong>W<sub>j</sub></strong> : bobot untuk kriteria ke-j.</li>
    <li><strong>∑ W<sub>j</sub></strong> : total bobot dari semua kriteria.</li>
  </ul>

  <p>Contoh perhitungan:</p>
  <ul>
    <li>W<sub>1</sub> = 30 / (30 + 20 + 10 + 15 + 10 + 10 + 5) = 0,30  
    <li>W<sub>2</sub> = 20 / (30 + 20 + 10 + 15 + 10 + 10 + 5) = 0,20  
    <li>W<sub>3</sub> = 10 / (30 + 20 + 10 + 15 + 10 + 10 + 5) = 0,10  
    <li>W<sub>4</sub> = 15 / (30 + 20 + 10 + 15 + 10 + 10 + 5) = 0,15  
    <li>W<sub>5</sub> = 10 / (30 + 20 + 10 + 15 + 10 + 10 + 5) = 0,10  
    <li>W<sub>6</sub> = 10 / (30 + 20 + 10 + 15 + 10 + 10 + 5) = 0,10  
    <li>W<sub>7</sub> = 5 / (30 + 20 + 10 + 15 + 10 + 10 + 5) = 0,05  
  </ul>
</div>

<style>
  .container p, .container ul {
    font-size: 0.9rem;
    line-height: 1.5;
  }
  .container ul {
    padding-left: 1.2rem;
  }
  .container li {
    margin-bottom: 0.8rem;
  }
</style>
<?= $this->endSection();  ?>
