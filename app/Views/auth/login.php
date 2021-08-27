<?= $this->extend('page_auth'); ?>

<?= $this->section('content'); ?>
<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content costum-rounded">
                    <div class="login-logo">
                        <a href="#">
                            <h1>SIMPER <span class="no-bold">DSI</span></h1>
                        </a>
                    </div>
                    <div class="login-form">
                    <?php if(session()->getFlashdata('Msg')):?>
                        <div class="alert alert-danger alert-dismissible fade show flash-msg-head" role="alert">
                            <?= session()->getFlashdata('Msg') ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif;?>
                        <form action="<?= $action ?>" method="post">
                        <?= csrf_field() ?>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon universal-rounded-left">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input type="text" id="USERNAME" name="USERNAME" placeholder="Username" class="form-control universal-rounded-right">
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
                            <button class="btn au-btn--block m-b-15 m-t-15 color-btn-start costum-rounded" type="submit">Masuk</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Belum puya akun?
                                <a href="<?= base_url('daftar') ?>">Daftar disini!</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>