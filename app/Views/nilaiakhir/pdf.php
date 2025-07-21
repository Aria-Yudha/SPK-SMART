<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Nilai Akhir Supplier</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h2, h3 {
            text-align: center;
            margin: 0;
        }
        h3 {
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table, th, td {
            border: 1px solid #444;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .terpilih {
            background-color: #d4edda;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Laporan Data Supplier Terbaik</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Nilai Akhir</th>
                <th>Ranking</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1; 
            $nilai_tertinggi = !empty($nilai_akhir) ? max(array_column($nilai_akhir, 'total')) : 0;
            ?>
            <?php foreach ($nilai_akhir as $na): ?>
                <tr class="<?= ($na['total'] == $nilai_tertinggi) ? 'terpilih' : '' ?>">
                    <td><?= $no++ ?></td>
                    <td><?= esc($na['nama_sup']) ?></td>
                    <td><?= number_format($na['total'], 4) ?></td>
                    <td><?= $na['ranking'] ?? '-' ?></td>
                    <td><?= ($na['total'] == $nilai_tertinggi) ? 'Terpilih' : '-' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    <p style="margin-top: 20px; font-size: 11px;">Dicetak pada: <?= date('d-m-Y H:i:s') ?></p>
    <p style="font-size: 11px;">Dicetak oleh: <?= esc($nama_user ?? 'User Tidak Diketahui') ?></p>

</body>
</html>
