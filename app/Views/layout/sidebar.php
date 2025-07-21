<style>
    /* Sidebar fix di kiri dan responsif toggle */
    .sidebar {
        position: fixed !important;
        top: 0;
        left: 0;
        height: 100vh !important;
        width: 250px;
        overflow-y: auto;
        z-index: 1030;
        transition: width 0.3s ease;
    }

    .sidebar.collapsed {
        width: 100px !important;
    }

    /* Agar konten utama tidak tertutup sidebar dan ikut bergeser saat toggle */
    #content-wrapper {
        margin-left: 200px; /* disesuaikan dengan width sidebar */
        transition: margin-left 0.3s ease;
        padding: 0px; /* opsional agar konten tidak nempel */
    }

    #content-wrapper.collapsed {
        margin-left: 80px !important;
    }

    /* Pastikan body tidak overflow saat sidebar fixed */
    body {
        overflow-x: hidden;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.querySelector('.sidebar');
        const content = document.getElementById('content-wrapper');
        const toggleBtn = document.getElementById('sidebarToggle');

        toggleBtn.addEventListener('click', function () {
            sidebar.classList.toggle('collapsed');
            content.classList.toggle('collapsed');
        });
    });
</script>



<?php $role = session()->get('role'); ?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/dashboard/index') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">CV. AnekaBunga</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Semua user bisa akses Home -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/dashboard/index'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    </li>

    <?php if ($role === 'admin'): ?>
        <!-- Menu untuk Admin -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('supplier/index'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Data Supplier</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('bobot/index'); ?>">
                <i class="fas fa-fw fa-balance-scale"></i>
                <span>Bobot</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('kriteria/index'); ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Kriteria</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('parameter/index'); ?>">
                <i class="fas fa-fw fa-sliders-h"></i>
                <span>Nilai Parameter</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('penilaian/index'); ?>">
                <i class="fas fa-fw fa-check-square"></i>
                <span>Penilaian</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('utility/index'); ?>">
                <i class="fas fa-fw fa-calculator"></i>
                <span>Nilai Utility</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('nilaiakhir/index'); ?>">
                <i class="fas fa-fw fa-chart-line"></i>
                <span>Nilai Akhir</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('user/index'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Data User</span>
            </a>
        </li>

    <?php elseif ($role === 'owner'): ?>
        <!-- Menu untuk Owner -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('nilaiakhir/index'); ?>">
                <i class="fas fa-fw fa-chart-line"></i>
                <span>Nilai Akhir</span>
            </a>
        </li>
    <?php endif; ?>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <?php if ($role): ?>
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        <?php else: ?>
            <a class="nav-link" href="<?= base_url('auth/login'); ?>">
                <i class="fas fa-fw fa-sign-in-alt"></i>
                <span>Login</span>
            </a>
        <?php endif; ?>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
