<?= $this->extend('page_operator'); ?>

<?= $this->section('content_operator'); ?>
<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>   
                                <li class="list-inline-item">Beranda</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <?php if(session()->getFlashdata('Msg')):?>
                    <div class="alert alert-success alert-dismissible fade show flash-msg-head" role="alert">
                        <?= session()->getFlashdata('Msg') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            <?php endif;?>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--costum">
                        <a href="<?= base_url('brgmasuk_op') ?>">
                            <div class="overview__inner">
                                <div class="overview-box clearfix p-b-10 p-l-10">
                                    <div class="icon">
                                        <h2 class="text-white"><?= $total_barang_masuk['JUMLAH_BARANG']; ?></h2>
                                    </div>
                                    <div class="text" style="padding-top: 3px;">
                                        <span>jumlah barang masuk</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--costum2">
                        <a href="<?= base_url('brgkeluar_op') ?>">
                            <div class="overview__inner">
                                <div class="overview-box clearfix p-b-10 p-l-10">
                                    <div class="icon">
                                        <h2 class="text-white"><?= $total_barang_keluar['JUMLAH_BARANG']; ?></h2>
                                    </div>
                                    <div class="text" style="padding-top: 3px;">
                                        <span>jumlah barang keluar</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                     </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--costum3">
                        <a href="<?= base_url('brgmaster_op') ?>">
                            <div class="overview__inner">
                                <div class="overview-box clearfix p-b-10 p-l-10">
                                    <div class="icon">
                                        <h2 class="text-white"><?= $jumlah_stok_tersedia['ID_BARANG']; ?></h2>
                                    </div>
                                    <div class="text" style="padding-top: 3px;">
                                        <span>jumlah barang</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                     </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--costum4">
                        <a href="<?= base_url('kategori_op') ?>">
                            <div class="overview__inner">
                                <div class="overview-box clearfix p-b-10 p-l-10">
                                    <div class="icon">
                                        <h2 class="text-white"><?= $jumlah_kategori['ID_KATEGORI']; ?></h2>
                                    </div>
                                    <div class="text" style="padding-top: 3px;">
                                        <span>jumlah kategori</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--costum5">
                        <a href="<?= base_url('lokasi_op') ?>">
                            <div class="overview__inner">
                                <div class="overview-box clearfix p-b-10 p-l-10">
                                    <div class="icon">
                                        <h2 class="text-white"><?= $jumlah_lokasi['ID_LOKASI']; ?></h2>
                                    </div>
                                    <div class="text" style="padding-top: 3px;">
                                        <span>jumlah lokasi</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--costum6">
                        <a href="<?= base_url('satuan_op') ?>">
                            <div class="overview__inner">
                                <div class="overview-box clearfix p-b-10 p-l-10">
                                    <div class="icon">
                                        <h2 class="text-white"><?= $jumlah_satuan['ID_SATUAN']; ?></h2>
                                    </div>
                                    <div class="text" style="padding-top: 3px;">
                                        <span>jumlah satuan</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="overview-item overview-item--costum7">
                        <a href="<?= base_url('vendor_op') ?>">
                            <div class="overview__inner">
                                <div class="overview-box clearfix p-b-10 p-l-10">
                                    <div class="icon">
                                        <h2 class="text-white"><?= $jumlah_vendor['ID_VENDOR']; ?></h2>
                                    </div>
                                    <div class="text" style="padding-top: 3px;">
                                        <span>jumlah vendor</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>