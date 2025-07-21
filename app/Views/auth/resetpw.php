<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password</title>

    <!-- Custom fonts & styles -->
    <link href="<?= base_url('vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-8 col-lg-10 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center">
                            <img src="<?= base_url('img/logo.png') ?>" alt="Reset Password" class="img-fluid p-4" style="max-height: 300px;">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Atur Ulang Password Anda</h1>
                                    <p class="mb-4">Silakan masukkan password baru Anda di bawah ini.</p>
                                </div>

                                <form class="user" action="<?= base_url('auth/simpanpassword'); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="token" value="<?= esc($token) ?>">
                                    <input type="hidden" name="email" value="<?= esc($email) ?>">

                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                               placeholder="Password Baru" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Simpan Password Baru
                                    </button>
                                </form>

                                <?php if (session()->getFlashdata('error')): ?>
                                    <div class="alert alert-danger mt-3">
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (session()->getFlashdata('success')): ?>
                                    <div class="alert alert-success mt-3">
                                        <?= session()->getFlashdata('success') ?>
                                    </div>
                                <?php endif; ?>

                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/login'); ?>">Kembali ke Login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Scripts -->
<script src="<?= base_url('vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
<script src="<?= base_url('js/sb-admin-2.min.js') ?>"></script>

</body>
</html>
