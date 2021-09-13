<div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="<?= base_url('beranda_op') ?>">
                    <h1 style="color: white; padding-left: 55px;"><span class="no-bold">SIM</span>PER</h1>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="<?= base_url() ?>/images/icon/img_avatar.jpg"/>
                    </div>
                    <h4 class="name text-center"><?= $_SESSION["NAMA"]; ?></h4>
                    <a href="<?= base_url('ubahprofil_spv') ?>" class="<?php if ($title == 'Ubah Profil - Supervisor') {echo 'text-primary'; } ?>">Ubah Profil</a>
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
                        $title == 'Laporan Sisa Stok - Supervisor' || 
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
                                $title == 'Laporan Sisa Stok - Supervisor' || 
                                $title == 'Laporan Barang Masuk - Supervisor' ||
                                $title == 'Laporan Barang Keluar - Supervisor'
                                ){echo 'stay-open';} ?> ">
                                <li class="<?php if ($title == 'Laporan Sisa Stok - Supervisor') {
                                    echo 'active';
                                }?>">
                                    <a href="<?= base_url('laporanstockbarang_spv') ?>">
                                        <i class="fas fa-tasks"></i>Persediaan</a>
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
            </div>
        </aside>