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
                                <li class="list-inline-item">Satuan</li>
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
            <div class="row m-b-5">
                <div class="col-lg-4 col-md-4 m-b-5">
                    <div class="input-group">
                        <div class="input-group-addon universal-rounded-left">
                            <i class="fa fa-search"></i>
                        </div>
                        <input type="text" id="dataInputMaster" placeholder="Data" title="Type in a name" class="form-control universal-rounded-right">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 ml-auto">
                    <!-- <button class="btn btn-success btn-md" type="submit" href="/login">Tambah Barang</button> -->
                    <a class="btn btn-success btn-block costum-rounded" type="submit" href="/tambah_satuanmaster_op">Tambah Satuan</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= session()->getFlashdata('status') ?>
                    <!-- DATA TABLE-->
                    <div class="costum-table table-responsive">
                        <table id="dataTableMaster" class="table table-borderless table-data1 text-center align-center table-color-bg costum-rounded" style="font-size: 10pt;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Satuan</th>
                                    <th>Notasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($unit as $key => $un) : ?>
                                <tr>
                                    <td><?= $key+1 ?></td>
                                    <td><?= $un['SATUAN'] ?></td>
                                    <td><?= $un['NOTASI'] ?></td>
                                    <td>
                                        <a href="<?= base_url('/edit_satuanmaster_op/'.$un['ID_SATUAN']) ?>" class="btn btn-secondary btn-sm rounded-circle" title="Edit">
                                             <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <!-- <a href="<?= base_url('/hapus_satuanmaster_op/'.$un['ID_SATUAN']) ?>" class="delete btn btn-danger btn-sm rounded-circle" title="Hapus">
                                             <i class="zmdi zmdi-delete"></i>
                                        </a> -->
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>