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
                                <li class="list-inline-item">Barang</li>
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
                        <input type="text" id="dataInput" placeholder="Data" title="Type in a name"
                            class="form-control universal-rounded-right">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 ml-auto">
                    <!-- <button class="btn btn-success btn-md" type="submit" href="/login">Tambah Barang</button> -->
                    <a class="btn btn-success btn-block costum-rounded" type="submit" href="/tambah_brgmaster_op">Tambah
                        Barang</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?= session()->getFlashdata('status') ?>
                    <!-- DATA TABLE-->
                    <div class="costum-table table-responsive">
                        <table id="dataTable"
                            class="table table-borderless table-data1 text-center align-center table-color-bg costum-rounded"
                            style="font-size: 10pt;">
                            <thead>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Lokasi</th>
                                    <th>Stok Tersedia</th>
                                    <th>Minimal Stok</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th>Deskripsi Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($product as $pro) : ?>
                                <tr>
                                    <td><?= $pro['ID_BARANG']; ?></td>
                                    <td><?= $pro['NAMA_BARANG']; ?></td>
                                    <td><?= $pro['NAMA_KATEGORI']; ?></td>
                                    <td><?= $pro['BLOK']; ?></td>
                                    <td><?= $pro['STOK']; ?></td>
                                    <td><?= $pro['MINIMAL_BARANG']; ?></td>
                                    <td><?= $pro['NOTASI']; ?></td>
                                    <td><?= format_rupiah($pro['HARGA_BARANG']); ?></td>
                                    <td><?= $pro['KETERANGAN_BARANG']; ?></td>
                                    <td>
                                        <a href="<?= base_url('/edit_brgmaster_op/'.$pro['ID_BARANG'].'/'.$pro['ID_KATEGORI'])?>"
                                            class="btn btn-secondary btn-sm rounded-circle" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <!-- <a href="<?= base_url('/hapus_brgmaster_op/'.$pro['ID_BARANG']) ?>" class="delete btn btn-danger btn-sm rounded-circle" title="Hapus">
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