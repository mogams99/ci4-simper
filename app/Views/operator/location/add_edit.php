<?= $this->extend('page_operator'); ?>

<?= $this->section('content_operator'); ?>
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active costum-breadcrumb-1">
                                    <a href="<?= base_url('beranda_op') ?>">Beranda</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li> 
                                <li class="list-inline-item active costum-breadcrumb-1">
                                    <a href="<?= base_url('lokasi_op') ?>">Lokasi</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>   
                                <li class="list-inline-item">Tambah Lokasi</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="card costum-rounded">
                <div class="card-header">
                    Form <strong><?= $formHeader ?></strong>
                </div>
                <div class="card-body card-block">
                    <form action="<?= $action ?>" method="post" enctype="multipart/form-data" class="form-inline" id="form-master">
                    <?= csrf_field() ?>
                    <input type="hidden" name="ID_LOKASI" id="ID_LOKASI" value="<?= (isset($location['ID_LOKASI'])) ? $location['ID_LOKASI'] : '' ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="BLOK" class="form-control-label pr-3">Nama Blok</label>
                                        <input type="text" class="form-control w-100 costum-rounded" name="BLOK" id="BLOK" value="<?= (isset($location['BLOK'])) ? $location['BLOK'] : '' ?>">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="form-group mb-3">
                                        <label for="KETERANGAN_LOKASI" class="form-control-label pr-3">Keterangan Blok</label>
                                        <input type="text" class="form-control w-100 costum-rounded" name="KETERANGAN_LOKASI" id="KETERANGAN_LOKASI" value="<?= (isset($location['KETERANGAN_LOKASI'])) ? $location['KETERANGAN_LOKASI'] : '' ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" form="form-master" class="btn btn-success btn-md costum-rounded">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>