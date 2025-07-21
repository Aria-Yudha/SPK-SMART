<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
  /* Font Setting */
  body, 
  .custom-card, 
  .custom-card-header, 
  .table, 
  h2, h3, p, span {
      font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen,
        Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  }

  /* Custom Card Styling */
  .custom-card {
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: #ffffff;
    color: white !important; /* Ini bikin semua teks putih */
    text-align: center;
  }
  .custom-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
  }
  .custom-card-header {
    background: linear-gradient(45deg, #17a2b8, #138496);
    color: white;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
    padding: 1rem 1.5rem;
    font-weight: 600;
    font-size: 1.25rem;
    text-align: center;
  }
  .table thead th {
    background-color: #138496;
    color: white;
  }
  .small-box-footer {
    color: white !important;
  }

  /* Override warna teks khusus info sistem supaya hitam */
  .info-system-text {
    color: black !important;
    text-align: left;
  }
</style>

<div class="container-fluid mt-4">
  <div class="row mb-4">
    <div class="col-lg-12">
      <div class="alert alert-info shadow-sm rounded">
        <h4 class="mb-2"><i class="fas fa-info-circle"></i> Selamat Datang di Sistem SPK Pemilihan Supplier Terbaik</h4>
        <p class="mb-0">
          Dashboard ini menyajikan ringkasan informasi terbaru dari sistem, termasuk jumlah total kriteria penilaian dan daftar supplier yang terdaftar.
          Gunakan informasi ini untuk memantau performa dan membuat keputusan pemilihan supplier secara objektif dan terukur.
        </p>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <!-- Box for Total Kriteria -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="small-box bg-danger custom-card text-white">
        <div class="inner text-center">
          <h3><?= esc($totalKriteria) ?></h3>
          <p>Total Kriteria</p>
        </div>
        <div class="icon">
          <i class="ion ion-clipboard"></i>
        </div>
        <a href="<?= base_url('kriteria/index'); ?>" class="small-box-footer text-white">More Detail <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Box for Total Supplier -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="small-box bg-warning custom-card text-white">
        <div class="inner text-center">
          <h3><?= esc($totalsupplier) ?></h3>
          <p>Total Supplier</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-stalker"></i>
        </div>
        <a href="<?= base_url('supplier/index'); ?>" class="small-box-footer text-white">More Detail <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <!-- Box for Total Parameter (jika ada) -->
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div class="small-box bg-info custom-card text-white">
        <div class="inner text-center">
          <h3><?= esc($totalParameter ?? 0) ?></h3>
          <p>Total Parameter</p>
        </div>
        <div class="icon">
          <i class="ion ion-settings"></i>
        </div>
        <a href="<?= base_url('nilaiparameter/index'); ?>" class="small-box-footer text-white">More Detail <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

  <!-- Informasi Tambahan atau Pengumuman -->
  <div class="custom-card mb-5 p-3">
    <div class="custom-card-header">
      Informasi Sistem
    </div>
    <div class="mt-3 info-system-text">
      <p><strong>Versi Aplikasi:</strong> 1.0.0</p>
      <p><strong>Tanggal Update Data Terakhir:</strong> <?= date_default_timezone_set('Asia/Jakarta')? date('d-m-Y H:i'):'' ?></p>
      <p><strong>Catatan:</strong> Pastikan semua data supplier dan kriteria telah diperbarui sebelum melakukan evaluasi.</p>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
