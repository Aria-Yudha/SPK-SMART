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

    <p style="margin-top: 20px; font-size: 12px;"><strong>Penjelasan Pemilihan Supplier:</strong></p>
    <p style="text-align: justify; font-size: 12px;">
    Supplier yang terpilih memperoleh nilai akhir tertinggi berdasarkan metode <em>Simple Multi Attribute Rating Technique (SMART)</em>.
    Pemilihan dilakukan berdasarkan berbagai kriteria dan parameter yang relevan.
</p>

<ul style="font-size: 12px;">
    <?php if (!empty($parameter_terbaik)): ?>
        <?php foreach ($parameter_terbaik as $pt): ?>
        <li><strong><?= esc($pt['nama_kriteria']) ?></strong>: <?= esc($pt['keterangan']) ?></li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>Data parameter terbaik tidak tersedia.</li>
    <?php endif; ?>
</ul>

<p style="text-align: justify; font-size: 12px;">
    Dengan mempertimbangkan aspek-aspek di atas, supplier ini terbukti unggul dalam berbagai hal seperti variasi bahan yang ditawarkan, kualitas produk, ketepatan waktu pengiriman, serta harga yang kompetitif. Oleh karena itu, supplier ini layak dipilih sebagai mitra terbaik dalam pengadaan bahan pembuatan bunga papan.
</p>

</body>
</html>
