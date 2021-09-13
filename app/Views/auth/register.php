<?= $this->extend('page_auth'); ?>

<?= $this->section('content'); ?>
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content costum-rounded">
                    <div class="login-logo">
                        <a href="<?= base_url('masuk') ?>">
                            <h1><span class="no-bold">SIM</span>PER</h1>
                        </a>
                    </div>
                    <div class="login-form">
                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo session()->getFlashdata('error'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <form action="<?= $action ?>" method="post">
                        <?= csrf_field() ?>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon universal-rounded-left">
                                        <i class="fa fa-group"></i>
                                    </div>
                                    <input type="text" id="NAMA" name="NAMA" placeholder="Nama Lengkap" class="form-control universal-rounded-right">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon universal-rounded-left">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="number" min="0" id="PHONE" name="PHONE" placeholder="No. Handphone" class="form-control universal-rounded-right">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon universal-rounded-left">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="text" id="EMAIL" name="EMAIL" placeholder="Email" class="form-control universal-rounded-right">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <div class="input-group-addon universal-rounded-left">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" id="USERNAME" name="USERNAME" placeholder="Username" class="form-control universal-rounded-right">
                                    </div>
                                </div>
                                <div class="col-md-5 m-sm-t-15">
                                    <div class="input-group-btn">
                                        <select name="JABATAN" id="JABATAN" class="form-control w-100 costum-rounded">
                                            <option value="" disabled selected>Pilih Jabatan</option>
                                            <option value="0">Supervisor</option>
                                            <option value="1">Operator</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon universal-rounded-left">
                                        <i class="fa fa-asterisk"></i>
                                    </div>
                                    <input type="password" id="PASSWORD" name="PASSWORD" placeholder="Password" class="form-control universal-rounded-right">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon universal-rounded-left">
                                        <i class="fa fa-asterisk"></i>
                                    </div>
                                    <input type="password" id="PASSWORD_CONF" name="PASSWORD_CONF" placeholder="Konfirmasi Password" class="form-control universal-rounded-right">
                                </div>
                            </div>
                            <!-- Fungsi Button -->
                            <button class="btn au-btn--block m-b-15 m-t-15 color-btn-start costum-rounded" type="submit">Daftar</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Sudah punya akun?
                                <a href="<?= base_url('masuk') ?>">Masuk!</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>