<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="container mt-5">
                <h2 class="mb-4">Tambah Data User</h2>
                <form action="<?= base_url('user/simpan'); ?>" method="post">
                    <? csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nama_user" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="nama_user" name="nama_user"required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"required>
                    </div>

                    <div class="mb-3">
                    <label class="form-label">Pilih Role</label>
                    <select name="role" class="form-control" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">admin</option>
                    <option value="owner">owner</option>
                    </select>
                    </div>
 
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required></input>
                    </div>

                    <button type="submit" class="btn btn-success">Tambah</button>
                     <a href="<?= base_url('user/index'); ?>" class="btn btn-secondary">Kembali</a>
                </form>
                </>
            </div>
           
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
