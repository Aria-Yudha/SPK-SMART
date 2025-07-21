<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2>Data Nilai Utility</h2>
    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('error'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <!-- Tabel Data Utility -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <?php foreach ($kriteria as $nama_kriteria): ?>
                    <th><?= esc($nama_kriteria); ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php if (!empty($utility)): ?>
                <?php foreach ($utility as $supplier_id => $u): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= esc($u['kode_supplier']); ?></td>
                        <td><?= esc($u['nama_sup']); ?></td>
                        <?php foreach ($kriteria as $id_kriteria => $nama_kriteria): ?>
                            <td>
                                <?= isset($u['nilai'][$id_kriteria]) ? number_format($u['nilai'][$id_kriteria], 2) : '0.00'; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="<?= 3 + count($kriteria); ?>" class="text-center">Data utility belum dihitung. Silakan klik tombol "Hitung Utility".</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <div class="mb-3">
        <!-- Button Hitung Utility -->
        <form action="<?= base_url('utility/hitung'); ?>" method="post" style="display: inline-block;">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-primary">Hitung Utility</button>
        </form>

        <!-- Button Hapus Semua Data Utility -->
        <form action="<?= base_url('utility/hapussemua'); ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus semua data utility?');">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-danger">Hapus Semua Data Utility</button>
        </form>
    </div>
</div>
<div class="container mt-3">
  <h2>Keterangan</h2>

<p><strong>Rumus perhitungan nilai utility:</strong></p>

<p>
  <math xmlns="http://www.w3.org/1998/Math/MathML" display="block">
    <mi>ui</mi>
    <mo>(</mo>
    <mi>ai</mi>
    <mo>)</mo>
    <mo>=</mo>
    <mfrac>
      <mrow>
        <mi>Cout</mi>
        <mo>-</mo>
        <mi>Cmin</mi>
      </mrow>
      <mrow>
        <mi>Cmax</mi>
        <mo>-</mo>
        <mi>Cmin</mi>
      </mrow>
    </mfrac>
    <span>(untuk Kriteria <strong>Benefit</strong>)</span>
  </math>
</p>

<p>
  <math xmlns="http://www.w3.org/1998/Math/MathML" display="block">
    <mi>ui</mi>
    <mo>(</mo>
    <mi>ai</mi>
    <mo>)</mo>
    <mo>=</mo>
    <mfrac>
      <mrow>
        <mi>Cmax</></mi>
        <mo>-</mo>
        <mi>Cout</mi>
      </mrow>
      <mrow>
        <mi>Cmax</mi>
        <mo>-</mo>
        <mi>Cmin</mi>
      </mrow>
    </mfrac>
    <span>(untuk Kriteria <strong>Cost</strong>)</span>
  </math>
</p>

<p>Keterangan:</p>
<ul>
  <li><strong>u<sub>i</sub>(a<sub>i</sub>)</strong> : nilai utility untuk kriteria ke-i</li>
  <li><strong>C<sub>max</sub></strong> : nilai kriteria maksimal</li>
  <li><strong>C<sub>min</sub></strong> : nilai kriteria minimal</li>
  <li><strong>C<sub>out</sub></strong> : nilai kriteria ke-i yang sedang dihitung</li>
</ul>

<?= $this->endSection(); ?>
