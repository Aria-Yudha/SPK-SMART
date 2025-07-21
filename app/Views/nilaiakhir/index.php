<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2>Data Nilai Akhir</h2>
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

    <!-- Tabel Data Nilai Akhir -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <?php foreach ($kriteria as $nama_kriteria): ?>
                    <th><?= esc($nama_kriteria); ?></th>
                <?php endforeach; ?>
                <th>Total Skor Akhir</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($nilai_akhir)): ?>
                <?php $no = 1; ?>
                <?php foreach ($nilai_akhir as $n): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= esc($n['kode_sup']); ?></td>
                        <td><?= esc($n['nama_sup']); ?></td>
                        <?php foreach ($kriteria as $id_kriteria => $nama_kriteria): ?>
                            <td>
                                <?= isset($n['nilai'][$id_kriteria]) ? number_format($n['nilai'][$id_kriteria], 3) : '0.0000'; ?>
                            </td>
                        <?php endforeach; ?>
                        <td><strong><?= number_format($n['total'], 3); ?></strong></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="<?= 5 + count($kriteria); ?>" class="text-center">Data nilai akhir belum dihitung. Silakan klik tombol "Hitung Nilai Akhir".</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="mb-3">
        <!-- Button Hitung Nilai Akhir -->
        <form action="<?= base_url('nilaiakhir/hitung'); ?>" method="post" style="display: inline-block;">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-primary">Hitung Nilai Akhir</button>
        </form>

        <!-- Button Hapus Semua Nilai Akhir -->
        <form action="<?= base_url('nilaiakhir/hapussemua'); ?>" method="post" style="display: inline-block;" onsubmit="return confirm('Yakin ingin menghapus semua data nilai akhir?');">
            <?= csrf_field(); ?>
            <button type="submit" class="btn btn-danger">Hapus Semua Nilai Akhir</button>
        </form>
    </div>
</div>

<!-- Tambahan Tabel Top 3 Supplier -->
<div class="container mt-4">
    <h4>Hasil Akhir Supplier Terbaik</h4>
    <div class="p-3">
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Nama Supplier</th>
                        <th>Nilai Akhir</th>
                        <th>Ranking</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($ranking as $i => $row): ?>
                        <tr>
                            <td><?= esc($row['nama_sup']) ?></td>
                            <td><?= number_format($row['total'], 4) ?></td>
                            <td><?= $i + 1 ?></td>
                            <td>
                                <?php if ($i == 0): ?>
                                    <span class="custom-badge-terpilih">Terpilih</span>
                                <?php else: ?>
                                    <span class="custom-badge-default">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="<?= base_url('nilaiakhir/cetakpdf'); ?>" class="btn btn-success" target="_blank">Cetak Data</a>

        </div>
    </div>
</div>


<!-- Keterangan Rumus -->
<div class="container mt-3">
    <h2>Keterangan</h2>
    <p><strong>Rumus perhitungan nilai akhir:</strong></p>

    <p>
        <math xmlns="http://www.w3.org/1998/Math/MathML" display="block">
            <mi>Skor</mi>
            <mo>=</mo>
            <munderover>
                <mo>&#x2211;</mo>
                <mrow><mi>i</mi>=1</mrow>
                <mrow><mi>n</mi></mrow>
            </munderover>
            <mo>(</mo>
            <mi>u</mi>
            <msub><mi>i</mi></msub>
            <mo>&times;</mo>
            <mi>w</mi>
            <msub><mi>i</mi></msub>
            <mo>)</mo>
        </math>
    </p>

    <p><strong>Keterangan:</strong></p>
    <ul>
        <li><strong>Skor</strong> : nilai akhir untuk setiap supplier</li>
        <li><strong>u<sub>i</sub></strong> : nilai utility untuk kriteria ke-i</li>
        <li><strong>w<sub>i</sub></strong> : bobot yang telah dinormalisasi untuk kriteria ke-i</li>
        <li><strong>∑</strong> : penjumlahan dari seluruh kriteria</li>
    </ul>
</div>

<?= $this->endSection(); ?>
