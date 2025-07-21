<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
  <h2 class="text-dark mb-4">📋 Daftar Nama Supplier</h2>

  <div class="card border-left-primary shadow">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table align-middle text-center table-borderless table-hover">
          <thead class="bg-primary text-white">
            <tr>
              <th>No</th>
              <th>Kode Supplier</th>
              <th>Nama Supplier</th>
              <th>No Handphone</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php $no = 1; ?>
            <?php foreach ($supplier as $s): ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $s['kode_sup']; ?></td>
                <td><?= $s['nama_sup']; ?></td>
                <td><?= $s['nohp']; ?></td>
                <td><?= $s['alamat']; ?></td>
                <td>
                  <a href="<?= base_url('/supplier/edit/' . $s['id_supplier']); ?>" class="btn btn-outline-success btn-sm" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>
                  <form action="<?= base_url('/supplier/hapus/' . $s['id_supplier']); ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Hapus" onclick="return confirm('Yakin hapus data ini?')">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <a href="<?= base_url('/supplier/tambah'); ?>" class="btn btn-primary mt-3">
        <i class="fas fa-plus"></i> Tambah Data
      </a>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>