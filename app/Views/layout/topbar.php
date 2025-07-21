<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow position-relative">
    <!-- Sidebar Toggle -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Center Title -->
    <div class="position-absolute w-100 text-center">
        <span class="text-primary font-weight-bold h5 mb-0">
            Sistem Pemilihan Supplier Terbaik Cv. AnekaBunga
        </span>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <?php 
            $role = session()->get('role'); 
            $nama = session()->get('nama_user');
        ?>
        <?php if ($role === 'admin' || $role === 'owner') : ?>
            <li class="nav-item">
                    <span class="nav-link">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 fw-bold fs-3">
                    Hi, <?= esc($nama) ?>
                    </span>
                </span>
            </li>
        <?php endif; ?>
    </ul>
</nav>
