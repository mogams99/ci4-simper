<?= $this->extend('page_supervisor'); ?>

<?= $this->section('content_supervisor'); ?>
<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
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
                <div class="col-sm-12 col-lg-4">
                    <div class="overview-item overview-item--costum">
                        <a href="<?= base_url('laporanbarangmasuk_spv') ?>">
                            <div class="overview__inner">
                                <div class="overview-box clearfix p-b-10 p-l-10">
                                    <div class="icon">
                                        <h2 class="text-white"><?= format_rupiah($totalhargabrgmasuk['TOTAL_HARGA']); ?></h2>
                                    </div>
                                    <div class="text d-block p-l-10">
                                        <span>pemasukan</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="overview-item overview-item--costum2">
                        <a href="<?= base_url('laporanbarangkeluar_spv') ?>">
                            <div class="overview__inner">
                                <div class="overview-box clearfix p-b-10 p-l-10">
                                    <div class="icon">
                                        <h2 class="text-white"><?= format_rupiah($totalhargabrgkeluar['TOTAL_HARGA']); ?></h2>
                                    </div>
                                    <div class="text d-block p-l-10">
                                        <span>pengeluaran</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                     </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <div class="overview-item overview-item--costum3">
                        <a href="<?= base_url('laporanstockbarang_spv') ?>">
                            <div class="overview__inner">
                                <div class="overview-box clearfix p-b-10 p-l-10">
                                    <div class="icon">
                                        <h2 class="text-white"><?= format_rupiah((int)$totalhargastok); ?></h2>
                                    </div>
                                    <div class="text d-block p-l-10">
                                        <span>persediaan</span>
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