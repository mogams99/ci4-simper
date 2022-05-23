<!-- PAGE CONTAINER-->
<div class="page-container2">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop2">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap2">
                    <div class="logo d-block d-lg-none">
                        <a href="#">
                            <h1 style="color: white; padding-left: 30px;"><span class="no-bold">SIM</span>PER</h1>
                        </a>
                    </div>
                    <div class="header-button2">
                        <div class="header-button-item mr-0 js-sidebar-btn">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                        <div class="setting-menu js-right-sidebar d-none d-lg-block costum-rounded">
                            <div>
                                <a class="logout-nav costum-rounded" href="<?= base_url('keluar') ?>">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Tampilan mobile -->
    <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none costum-nav">
        <div class="menu-sidebar2__content js-scrollbar2 costum-nav">
            <div class="account2">
                <div class="image img-cir img-120">
                    <img src="<?= base_url() ?>/images/icon/img_avatar.jpg" />
                </div>
                <h4 class="name"><?= $_SESSION["NAMA"]; ?></h4>
                <a href="<?= base_url('ubahprofil_spv') ?>"
                    class="<?php if ($title == 'Ubah Profil - Supervisor') {echo 'text-primary'; } ?>">Ubah Profil</a>
            </div>
            <nav class="navbar-sidebar2">
                <ul class="list-unstyled navbar__list">
                    <li class="<?php if ($title == 'Beranda - Supervisor') {
                            echo 'active';
                    }?>">
                        <a href="<?= base_url('beranda_spv') ?>">
                            <i class="fas fa-home"></i>Beranda</a>
                    </li>
                    <li class="<?php if ($title == 'Riwayat Aksi - Supervisor') {
                            echo 'active';
                        }?>">
                        <a href="<?= base_url('riwayataksi_spv') ?>">
                            <i class="fas fa-user"></i>Riwayat Aksi</a>
                    </li>
                    <li class="has-sub <?php if(
                        $title == 'Grafik Barang Masuk - Supervisor' || 
                        $title == 'Grafik Barang Keluar - Supervisor' 
                        ){echo 'active';} ?>">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-bar-chart-o"></i>Grafik
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list <?php if(
                                $title == 'Grafik Barang Masuk - Supervisor' || 
                                $title == 'Grafik Barang Keluar - Supervisor'
                                ){echo 'stay-open';} ?> ">
                                <li class="<?php if ($title == 'Grafik Barang Masuk - Supervisor') {
                                    echo 'active';
                                }?>">
                                    <a href="<?= base_url('grafikbarangmasuk_spv') ?>">
                                        <i class="fas fa-arrow-circle-right"></i>Barang Masuk</a>
                                </li>
                                <li class="<?php if ($title == 'Grafik Barang Keluar - Supervisor') {
                                    echo 'active';
                                }?>">
                                    <a href="<?= base_url('grafikbarangkeluar_spv') ?>">
                                        <i class="fas fa-arrow-circle-left"></i>Barang Keluar</a>
                                </li>
                            </ul>
                        </li>
                    <li class="has-sub <?php if(
                        $title == 'Laporan Stok Barang - Supervisor' || 
                        $title == 'Laporan Barang Masuk - Supervisor' ||
                        $title == 'Laporan Barang Keluar - Supervisor'
                        ){echo 'active';} ?>">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-th"></i>Laporan
                            <span class="arrow">
                                <i class="fas fa-angle-down"></i>
                            </span>
                        </a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list <?php if(
                                $title == 'Laporan Stok Barang - Supervisor' || 
                                $title == 'Laporan Barang Masuk - Supervisor' ||
                                $title == 'Laporan Barang Keluar - Supervisor'
                                ){echo 'stay-open';} ?> ">
                            <li class="<?php if ($title == 'Laporan Stok Barang - Supervisor') {
                                    echo 'active';
                                }?>">
                                    <a href="<?= base_url('laporanstockbarang_spv') ?>">
                                        <i class="fas fa-tasks"></i>Stok Barang</a>
                            </li>
                            <li class="<?php if ($title == 'Laporan Barang Masuk - Supervisor') {
                                    echo 'active';
                                }?>">
                                <a href="<?= base_url('laporanbarangmasuk_spv') ?>">
                                    <i class="fas fa-arrow-right"></i>Pemasukan</a>
                            </li>
                            <li class="<?php if ($title == 'Laporan Barang Keluar - Supervisor') {
                                    echo 'active';
                                }?>">
                                <a href="<?= base_url('laporanbarangkeluar_spv') ?>">
                                    <i class="fas fa-arrow-left"></i>Pengeluaran</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div>
                <a class="logout-nav" href="<?= base_url('keluar') ?>">Keluar</a>
            </div>
        </div>
    </aside>