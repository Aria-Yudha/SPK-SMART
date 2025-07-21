<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
  .company-description {
    margin-top: 2rem;
    font-family: 'Nunito', sans-serif;
    color: #333;
    line-height: 1.6;
  }
  .product-gallery {
    margin-top: 3rem;
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    justify-content: center;
  }
  .product-card {
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    overflow: hidden;
    width: 300px;
    background: white;
    text-align: center;
  }
  .product-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    display: block;
  }
  .product-card h5 {
    margin: 1rem 0;
    font-weight: 600;
    color: #17a2b8;
  }
  .contact-section {
    margin-top: 4rem;
    padding: 2rem;
    background-color: #f8f9fa;
    border-radius: 10px;
  }
</style>

<div class="container-fluid mt-4">
  <div class="row mb-4">
    <div class="col-lg-12">
      <div class="alert alert-info shadow-sm rounded">
        <h4 class="mb-2"><i class="fas fa-info-circle"></i> Selamat Datang di Sistem Pemilihan Supplier Terbaik</h4>
        <p class="mb-1">
          Sistem ini dikembangkan sebagai bagian dari inisiatif digitalisasi oleh <strong>CV. Anekabunga</strong>, untuk meningkatkan efisiensi dan transparansi dalam proses pemilihan supplier bahan baku pembuatan bunga papan.           
          Meskipun sistem ini digunakan secara internal, informasi yang ditampilkan di halaman ini bersifat umum dan bertujuan memberikan gambaran tentang mekanisme kerja dan standar seleksi supplier yang kami terapkan. 
          CV. Anekabunga percaya bahwa dengan sistem yang objektif, kami dapat menjalin kemitraan yang lebih baik dengan para supplier unggulan.
        </p>
      </div>
    </div>
  </div>
</div>

<div class="container company-description">
  <h2 class="text-center mb-4">Profil Perusahaan CV. Anekabunga</h2>
  <p>
    CV. Anekabunga adalah sebuah badan usaha yang bergerak di bidang penyediaan <strong>bunga papan</strong> untuk berbagai kebutuhan seperti pernikahan, pemakaman, perayaan, dan acara korporasi. Sebagai penyedia bunga papan, CV. Anekabunga juga menyediakan <strong>beragam bahan berkualitas tinggi</strong> untuk pembuatan produk tersebut.
  </p>
  <p>
    Dalam menjalankan usahanya, pemilihan supplier bahan bunga papan merupakan proses penting yang selama ini dilakukan secara manual dengan mempertimbangkan aspek-aspek seperti harga, kualitas, pengiriman, pelayanan, dan variasi bahan. Namun, metode konvensional ini sering kali memakan waktu dan menghasilkan kualitas produk yang kurang konsisten.
  </p>
  <p>
    Untuk meningkatkan efisiensi dan kualitas produk, CV. Anekabunga mengembangkan <strong>Sistem Pendukung Keputusan (SPK)</strong> berbasis website menggunakan metode <strong>Simple Multi Attribute Rating Technique (SMART)</strong>. Sistem ini dirancang untuk membantu perusahaan dalam memilih supplier bahan yang paling sesuai berdasarkan kriteria yang lebih objektif dan menyeluruh.
  </p>
  <p>
    Dengan penerapan sistem ini, diharapkan CV. Anekabunga mampu:
  </p>
  <ul>
    <li>Meningkatkan kualitas dan konsistensi bunga papan.</li>
    <li>Mengurangi subjektivitas dalam pemilihan supplier.</li>
    <li>Menyederhanakan proses pengambilan keputusan.</li>
    <li>Menambah daya saing di pasar melalui efisiensi dan pelayanan yang lebih baik.</li>
  </ul>

  <h3 class="text-center mt-5">Contoh Produk Bunga Papan</h3>
  <div class="product-gallery">
    <div class="product-card">
      <img src="<?= base_url('img/bungapapannikah.jpeg') ?>" alt="Bunga Papan 1">
      <h5>Bunga Papan Ucapan pernikahan</h5>
    </div>
    <div class="product-card">
      <img src="<?= base_url('img/bungapapanduka1.jpeg') ?>" alt="Bunga Papan 2">
      <h5>Bunga Papan Duka Cita</h5>
    </div>
    <div class="product-card">
      <img src="<?= base_url('img/bungapapanopening.jpeg') ?>" alt="Bunga Papan 3">
      <h5>Bunga Papan Opening Usaha</h5>
    </div>
  </div>

  <h3 class="text-center mt-5">Contoh Produk yang Lain dari CV. Anekabunga</h3>
  <div class="product-gallery">
    <div class="product-card">
      <img src="<?= base_url('img/bungabucket1.jpeg') ?>" alt="Bunga Bucket">
      <h5>Bunga Bucket</h5>
    </div>
    <div class="product-card">
      <img src="<?= base_url('img/bungabucket3.jpeg') ?>" alt="Bunga Papan 2">
      <h5>Bunga Bucket</h5>
    </div>
    <div class="product-card">
      <img src="<?= base_url('img/bungabucket2.jpeg') ?>" alt="Bunga Papan 3">
      <h5>Bunga Bucket</h5>
    </div>
  </div>
</div>

<div class="container contact-section mt-5">
  <h3 class="text-center mb-3">Hubungi Kami</h3>
  <p class="text-center">
    Jika Anda memiliki pertanyaan seputar produk bunga papan, atau produk lainnya, silakan hubungi kami melalui:
  </p>
  <ul class="list-unstyled text-center mt-3">
    <li><i class="fas fa-phone-alt me-2"></i> <strong>Telepon:</strong> 0813-1001-0096</li>
    <li><i class="fas fa-envelope me-2"></i> <strong>Email:</strong> info@anekabunga.co.id</li>
    <li><i class="fas fa-map-marker-alt me-2"></i> <strong>Alamat:</strong> Jalan Perumahan Taman Semanan Indah Jl. Dharma Sentosa No.19 Blok E9, RT.9/RW.8, 
    <br>Kalideres, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11850</li>
  </ul>
</div>

<?= $this->endSection(); ?>
