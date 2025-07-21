<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <h2>Hasil Supplier Terbaik</h2>

    <!-- Tabel Data Nilai Akhir -->
    <div class="container mt-4">
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
</div>
            <a href="<?= base_url('nilaiakhir/cetakpdf'); ?>" class="btn btn-success" target="_blank">Cetak Data</a>

<?= $this->endSection(); ?>
