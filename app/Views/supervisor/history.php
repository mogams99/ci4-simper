<?= $this->extend('page_supervisor'); ?>

<?= $this->section('content_supervisor'); ?>
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active costum-breadcrumb-1">
                                    <a href="<?= base_url('beranda_spv') ?>">Beranda</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>   
                                <li class="list-inline-item">Riwayat Aksi</li>
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
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <!-- DATA TABLE-->
                    <div class="costum-table table-responsive">
                        <table id="dataTable" class="table table-borderless table-data1 text-center align-center table-color-bg costum-rounded w-100" style="font-size: 10pt;">
                            <thead>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Kode Transaksi</th>
                                <th>Nama Pengguna</th>
                                <th>Riwayat Aksi</th>
                            </thead>
                            <tbody>
                                <?php foreach ($datalog as $key => $log ): ?>
                                    <?php $date = strtotime($log['CREATED_LOG']);
                                    $tgl = date('d-m-Y', $date);
                                    $jam = date('H:i:s', $date);
                                ?>
                                <tr>
                                    <td><?= $key+1; ?></td>
                                    <td><?= $tgl; ?></td>
                                    <td><?= $jam; ?></td>
                                    <td><?= $log['ID_TRANSAKSI']; ?></td>
                                    <td><?= $log['NAMA']; ?></td>
                                    <td><?= $log['KETERANGAN_LOG']; ?></td>
                                </tr>
                                <?php endforeach;?>
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