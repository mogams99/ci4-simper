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
                                <li class="list-inline-item">Barang Keluar</li>
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
                        <input type="text" id="dataInput" placeholder="Data" title="Type in a name" class="form-control universal-rounded-right">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 ml-auto">
                    <!-- <button class="btn btn-success btn-md" type="submit" href="/login">Tambah Barang</button> -->
                    <a class="btn btn-success btn-block costum-rounded" type="submit" href="/tambah_brgkeluar_op">Tambah Barang Keluar</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= session()->getFlashdata('status') ?>
                    <!-- DATA TABLE-->
                    <div class="costum-table table-responsive">
                        <table id="dataTable" class="table table-borderless table-data1 text-center align-center table-color-bg costum-rounded" style="font-size: 10pt;">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Kode Barang</th>
                                    <th>Nama</th>
                                    <th>Stok Keluar</th>
                                    <th>Satuan</th>
                                    <th>Harga Total</th>
                                    <!-- <th>Tipe</th> -->
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($transac as $tra) : ?>
                                <tr>
                                    <td><?= $tra['ID_TRANSAKSI'] ?></td>
                                    <td><?= $tra['DATE_OUT'] ?></td>
                                    <td><?= $tra['ID_BARANG'] ?></td>
                                    <td><?= $tra['NAMA_BARANG'] ?></td>
                                    <td><?= $tra['JUMLAH_BARANG'] ?></td>
                                    <td><?= $tra['NOTASI'] ?></td>
                                    <td><?= format_rupiah($tra['TOTAL_HARGA']) ?></td>
                                    <!-- <td><?= $tra['TIPE_TRANSAKSI'] ?></td> -->
                                    <td><?= $tra['KETERANGAN_TRANSAKSI'] ?></td>
                                    <td>
                                        <a href="<?= base_url('/edit_brgkeluar_op/'.$tra['ID_TRANSAKSI']) ?>" class="btn btn-secondary btn-sm rounded-circle" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="<?= base_url('/hapus_brgkeluar_op/'.$tra['ID_TRANSAKSI']) ?>" class="delete btn btn-danger btn-sm rounded-circle" title="Hapus">
                                            <i class="zmdi zmdi-delete"></i>
                                        </a>
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