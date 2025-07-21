<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
  body, .custom-card, .custom-card-header, .table, h2, h3, p, span {
    font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen,
      Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }
  .custom-card {
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: #ffffff;
    color: #333;
    text-align: center;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
  }
  .custom-card-header {
    background: linear-gradient(45deg, #17a2b8, #138496);
    color: white;
    border-radius: 12px 12px 0 0;
    padding: 1rem 1.5rem;
    font-weight: 600;
    font-size: 1.25rem;
  }
  .custom-badge-terpilih {
    background-color: #28a745;
    color: white;
    padding: 0.25em 0.6em;
    border-radius: 0.35rem;
    font-size: 0.85rem;
  }
  .custom-badge-default {
    background-color: #6c757d;
    color: white;
    padding: 0.25em 0.6em;
    border-radius: 0.35rem;
    font-size: 0.85rem;
  }
  .table thead th {
    background-color: #138496;
    color: white;
  }
</style>

<div class="container-fluid mt-4">
    <div class="row mb-4">
    <div class="col-lg-12">
      <div class="alert alert-info shadow-sm rounded">
        <h4 class="mb-2"><i class="fas fa-info-circle"></i> Selamat Datang di Sistem Pemilihan Supplier Terbaik</h4>
        <p class="mb-0">
          Dashboard ini menyajikan ringkasan informasi terbaru dari sistem, termasuk grafik nilai supplier terbaru, daftar supplier yang terpilih, serta supplier dengan peringkat terbaik berdasarkan nilai akhir tertinggi.
          Gunakan informasi ini untuk memantau performa dan membuat keputusan pemilihan supplier secara objektif dan terukur.
        </p>
      </div>
    </div>
  </div>

  <!-- Grafik Nilai Supplier -->
  <div class="row mb-4">
    <div class="col-lg-8">
      <div class="custom-card">
        <div class="custom-card-header">Grafik Nilai Supplier</div>
        <canvas id="nilaiSupplierChart" height="300"></canvas>
      </div>
    </div>

    <!-- Daftar Supplier Terpilih -->
    <div class="col-lg-4">
      <div class="custom-card">
        <div class="custom-card-header">Supplier Terpilih Terbaru</div>
        <ul class="list-group list-group-flush text-left">
          <?php if (!empty($topSuppliers)): ?>
            <?php foreach($topSuppliers as $sup): ?>
              <li class="list-group-item">
                <strong><?= esc($sup['nama_sup']) ?></strong><br>
                Nilai: <?= number_format($sup['total_nilai'], 4) ?>
              </li>
            <?php endforeach; ?>
          <?php else: ?>
            <li class="list-group-item">Tidak ada data supplier terpilih</li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
    
  </div>

  <!-- Tabel Nilai Akhir Terbaru -->
  <div class="row">
    <div class="col-12">
      <div class="custom-card">
        <div class="custom-card-header">Nilai Akhir Terbaru</div>
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
              <?php if (!empty($ranking)): ?>
                <?php foreach (array_slice($ranking, 0, 3) as $i => $row): ?>
                  <tr>
                    <td><?= esc($row['nama_sup']) ?></td>
                    <td><?= number_format($row['total_nilai'], 4) ?></td>
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
              <?php else: ?>
                <tr><td colspan="4" class="text-center">Tidak ada data nilai akhir</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('nilaiSupplierChart').getContext('2d');
  const nilaiSupplierChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= json_encode($supplierNames ?? []) ?>,
      datasets: [{
        label: 'Nilai Akhir',
        data: <?= json_encode($supplierScores ?? []) ?>,
        backgroundColor: 'rgba(23, 162, 184, 0.7)',
        borderRadius: 5,
        borderWidth: 1,
        borderColor: 'rgba(23, 162, 184, 1)'
      }]
    },
    options: {
      scales: {
        y: { 
          beginAtZero: true,
          ticks: { precision: 4 }
        }
      },
      plugins: {
        legend: { display: false }
      }
    }
  });
</script>

<?= $this->endSection(); ?>
