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
                                <li class="list-inline-item">Ubah Profil</li>
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
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card costum-rounded">
                <div class="card-header">
                    Form <strong><?= $formHeader ?></strong>
                </div>
                <div class="card-body card-block">
                    <form action="<?= $action ?>" method="post" enctype="multipart/form-data" class="form-inline" id="formMaster">
                    <?= csrf_field() ?>
                    <input type="hidden" name="ID_USER" id="ID_USER" value="<?= (isset($pengguna['ID_USER'])) ? $pengguna['ID_USER'] : '' ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-5">
                                    <div class="form-group mb-3">
                                        <label for="NAMA" class="form-control-label pr-3">Nama Lengkap</label>
                                        <input type="text" class="form-control w-100 costum-rounded" name="NAMA" id="NAMA" value="<?= (isset($pengguna['NAMA'])) ? $pengguna['NAMA'] : '' ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="PHONE" class="form-control-label pr-3">No. Handphone</label>
                                        <input type="text" class="form-control w-100 costum-rounded" name="PHONE" id="PHONE" value="<?= (isset($pengguna['PHONE'])) ? $pengguna['PHONE'] : '' ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="EMAIL" class="form-control-label pr-3">Email</label>
                                        <input type="text" class="form-control w-100 costum-rounded" name="EMAIL" id="EMAIL" value="<?= (isset($pengguna['EMAIL'])) ? $pengguna['EMAIL'] : '' ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label for="USERNAME" class="form-control-label pr-3">Username</label>
                                        <input type="text" class="form-control w-100 costum-rounded" name="USERNAME" id="USERNAME" value="<?= (isset($pengguna['USERNAME'])) ? $pengguna['USERNAME'] : '' ?>">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label for="PASSWORD" class="form-control-label pr-3">Password Baru</label>
                                        <input type="password" class="form-control w-100 costum-rounded" name="PASSWORD" id="PASSWORD">
                                    </div>
                                </div> <div class="col-4">
                                    <div class="form-group mb-3">
                                        <label for="PASSWORD_CONF" class="form-control-label pr-3">Konfirmasi Password</label>
                                        <input type="password" class="form-control w-100 costum-rounded" name="PASSWORD_CONF" id="PASSWORD_CONF">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" form="formMaster" class="btn btn-success btn-md costum-rounded">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>