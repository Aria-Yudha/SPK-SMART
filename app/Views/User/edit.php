<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="mb-4">Form Ubah Data User</h2>
            <form action="<?= base_url('user/ubah/' . $user['id_user']); ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">

                <div class="mb-3">
                    <label for="nama_user" class="form-label">Nama User</label>
                    <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $user['nama_user']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nama_user" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" required>
                </div>

                <div class="mb-3">
                     <label class="form-label">Pilih Role</label>
                    <select name="role" class="form-control" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin" <?= ($user['role'] == 'admin') ? 'selected' : ''; ?>>admin</option>
                    <option value="owner" <?= ($user['role'] == 'owner') ? 'selected' : ''; ?>>owner</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">password Baru</label>
                    <input type="password" class="form-control" id="password" name="password" rows="3" required></input>
                </div>

                <button type="submit" class="btn btn-success">Ubah</button>
                <a href="<?= base_url('user/index'); ?>" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
