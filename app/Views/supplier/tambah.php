<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="container mt-5">
                <h2 class="mb-4">Tambah Data Supplier</h2>
                <form action="<?= base_url('supplier/simpan'); ?>" method="post">
                    <? csrf_field(); ?>
                    

                    <div class="mb-3">
                        <label for="kode_sup" class="form-label">Kode Supplier</label>
                        <input type="text" class="form-control" id="kode_sup" name="kode_sup" placeholder="C1" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_sup" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" id="nama_sup" name="nama_sup" placeholder="Contoh: PT. Sumber Rezeki" required>
                    </div>

                    <div class="mb-3">
                        <label for="nohp" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Contoh: 081234567890" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Contoh: Jl. Raya No. 123, Jakarta" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Tambah</button>
                     <a href="<?= base_url('supplier/index'); ?>" class="btn btn-secondary">Kembali</a>
                </form>
                </>
            </div>
           
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
