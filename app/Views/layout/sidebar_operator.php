<div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <h1 style="color: white; padding-left: 20px;">SIMPER <span class="no-bold">DSI</span></h1>
                    <!-- <img src="images/icon/logo-white.png" alt="Cool Admin" /> -->
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="<?= base_url() ?>/images/icon/img_avatar.jpg"/>
                    </div>
                    <h4 class="name text-center"><?= $_SESSION["NAMA"] ?></h4>
                    <a href="<?= base_url('ubahprofil_op') ?>" class="<?php if ($title == 'Ubah Profil - Operator') {echo 'text-primary'; } ?>">Ubah Profil</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="<?php if ($title == 'Beranda - Operator') {
                            echo 'active';
                        }?>">
                            <a href="<?= base_url('beranda_op') ?>">
                                <i class="fas fa-home"></i>Beranda</a>
                        </li>
                        <li class="has-sub <?php if(
                        $title == 'Barang Masuk - Operator' || 
                        $title == 'Barang Keluar - Operator'
                        ){echo 'active';} ?>">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-th"></i>Transaksi
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list <?php if(
                                $title == 'Barang Masuk - Operator' ||
                                $title == 'Tambah Barang Masuk - Operator' ||
                                $title == 'Edit Barang Masuk - Operator' ||
                                $title == 'Barang Keluar - Operator' || 
                                $title == 'Tambah Barang Keluar - Operator' ||
                                $title == 'Edit Barang Keluar - Operator'
                                ){echo 'stay-open';} ?> ">
                                <li  class="<?php if ($title == 'Barang Masuk - Operator' || $title == 'Tambah Barang Masuk - Operator' || $title == 'Edit Barang Masuk - Operator') {
                                    echo 'active';
                                }?>">
                                    <a href="<?= base_url('brgmasuk_op') ?>">
                                        <i class="fas fa-arrow-right"></i>Barang Masuk</a>
                                </li>
                                <li  class="<?php if ($title == 'Barang Keluar - Operator' || $title == 'Tambah Barang Keluar - Operator' || $title == 'Edit Barang Keluar - Operator') {
                                    echo 'active';
                                }?>">
                                    <a href="<?= base_url('brgkeluar_op') ?>">
                                        <i class="fas fa-arrow-left"></i>Barang Keluar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub <?php if(
                            $title == 'Master Barang - Operator' || 
                            $title == 'Tambah Barang - Operator' || 
                            $title == 'Edit Barang - Operator' || 
                            $title == 'Master Kategori - Operator' ||
                            $title == 'Tambah Kategori - Operator' ||
                            $title == 'Edit Kategori - Operator' ||
                            $title == 'Master Lokasi - Operator' ||
                            $title == 'Tambah Lokasi - Operator' ||
                            $title == 'Edit Lokasi - Operator' || 
                            $title == 'Master Satuan - Operator' ||
                            $title == 'Tambah Satuan - Operator' ||
                            $title == 'Edit Satuan - Operator' ||
                            $title == 'Master Vendor - Operator' ||
                            $title == 'Tambah Vendor - Operator' ||
                            $title == 'Edit Vendor - Operator'
                            ){echo 'active';} ?>">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-th"></i>Master
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list <?php if(
                                $title == 'Master Barang - Operator' || 
                                $title == 'Tambah Barang - Operator' || 
                                $title == 'Edit Barang - Operator' ||
                                $title == 'Master Kategori - Operator' ||
                                $title == 'Tambah Kategori - Operator' ||
                                $title == 'Edit Kategori - Operator' ||
                                $title == 'Master Lokasi - Operator' ||
                                $title == 'Tambah Lokasi - Operator' ||
                                $title == 'Edit Lokasi - Operator' || 
                                $title == 'Master Satuan - Operator' ||
                                $title == 'Tambah Satuan - Operator' ||
                                $title == 'Edit Satuan - Operator' ||
                                $title == 'Master Vendor - Operator' ||
                                $title == 'Tambah Vendor - Operator' ||
                                $title == 'Edit Vendor - Operator'
                                ){echo 'stay-open';} ?> ">
                                <li  class="<?php if ($title == 'Master Barang - Operator' || $title == 'Tambah Barang - Operator' || $title == 'Edit Barang - Operator') {
                                    echo 'active';
                                }?>">
                                    <a href="<?= base_url('brgmaster_op') ?>">
                                        <i class="fas fa-tasks"></i>Barang</a>
                                </li>
                                <li class="<?php if ($title == 'Master Kategori - Operator' || $title == 'Tambah Kategori - Operator' || $title == 'Edit Kategori - Operator') {
                                    echo 'active';
                                }?>">
                                    <a href="<?= base_url('kategori_op') ?>">
                                        <i class="fas fa-certificate"></i>Kategori</a>
                                </li>
                                <li class="<?php if ($title == 'Master Lokasi - Operator' || $title == 'Tambah Lokasi - Operator' || $title == 'Edit Lokasi - Operator') {
                                    echo 'active';
                                }?>">
                                    <a href="<?= base_url('lokasi_op') ?>">
                                        <i class="fas fa-map-marker"></i>Lokasi</a>
                                </li>
                                <li class="<?php if ($title == 'Master Satuan - Operator' || $title == 'Tambah Satuan - Operator' || $title == 'Edit Satuan - Operator') {
                                    echo 'active';
                                }?>">
                                    <a href="<?= base_url('satuan_op') ?>">
                                        <i class="fas fa-filter"></i>Satuan</a>
                                </li>
                                <li class="<?php if ($title == 'Master Vendor - Operator' || $title == 'Tambah Vendor - Operator' || $title == 'Edit Kategori - Operator') {
                                    echo 'active';
                                }?>">
                                    <a href="<?= base_url('vendor_op') ?>">
                                        <i class="fas fa-industry"></i>Vendor</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>