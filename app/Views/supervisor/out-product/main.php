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
                                <li class="list-inline-item">Laporan Pengeluaran</li>
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
            <div class="row">
                <div class="col-md-4">
                    <div class="card costum-rounded">
                        <div class="card-header">
                            Form <strong>Saat Ini</strong>
                        </div>
                        <div class="card-body">
                            <form action="" class="form-inline">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-control-label pr-3">Tanggal Saat Ini</label>
                                                <input type="text" class="form-control w-100 costum-rounded"
                                                    id="DATE_OUT" name="DATE_OUT" value="<?= $tanggal; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="submit" onclick="getDetailTransaksi()"
                                class="btn btn-success btn-md costum-rounded">
                                Tampil
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card costum-rounded">
                        <div class="card-header">
                            Form <strong>Periode</strong>
                        </div>
                        <div class="card-body">
                            <form action="" class="form-inline">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-control-label pr-3">Pilih Tanggal</label>
                                                <input type="date" class="form-control w-100 costum-rounded"
                                                    id="DATE_START" name="DATE_START">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="" class="form-control-label pr-3">Sampai Tanggal</label>
                                                <input type="date" class="form-control w-100 costum-rounded"
                                                    id="DATE_END" name="DATE_END">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="submit" onclick="getTransaksiByPeriod()"
                                class="btn btn-success btn-md costum-rounded">
                                Tampil
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-md-block d-none">
                <div class="col-md-12 col-lg-12">
                    <!-- DATA TABLE-->
                    <div class="report table-responsive">
                        <table id="dataTableOutProduct"
                            class="table table-borderless table-color-bg text-center costum-rounded w-100"
                            style="font-size: 10pt;">
                            <thead>
                                <th style="min-width: 120px;">Kode Transaksi</th>
                                <th style="min-width: 120px;">Tanggal Keluar</th>
                                <th style="min-width: 100px;">Nama Barang</th>
                                <th>Lokasi</th>
                                <th style="min-width: 100px;">Stok Keluar</th>
                                <th style="min-width: 100px;">Minimal Stok</th>
                                <th style="min-width: 100px;">Harga Satuan</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                                <th style="min-width: 100px;">Harga Total</th>
                            </thead>
                            <tbody>
                                <?php $subtotal = 0;?>
                                <?php foreach ($data as $databarangkeluar) : ?>
                                <tr>
                                    <td><?= $databarangkeluar['ID_TRANSAKSI']; ?></td>
                                    <td><?= date('d-m-Y', strtotime($databarangkeluar['DATE_OUT'])); ?></td>
                                    <td><?= $databarangkeluar['NAMA_BARANG']; ?></td>
                                    <td><?= $databarangkeluar['BLOK']; ?></td>
                                    <td><?= $databarangkeluar['JUMLAH_BARANG']; ?></td>
                                    <td><?= $databarangkeluar['MINIMAL_BARANG']; ?></td>
                                    <td><?= format_rupiah($databarangkeluar['HARGA_BARANG']); ?></td>
                                    <td><?= $databarangkeluar['NOTASI']; ?></td>
                                    <td><?= $databarangkeluar['KETERANGAN_TRANSAKSI'] ?></td>
                                    <td><?= format_rupiah($databarangkeluar['TOTAL_HARGA']); ?></td>
                                    <?php $subtotal += (int)$databarangkeluar['TOTAL_HARGA'];?>
                                </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td class="hide-col"><strong>Subtotal</strong></td>
                                    <td class="hide-col"></td>
                                    <td class="hide-col"></td>
                                    <td class="hide-col"></td>
                                    <td class="hide-col"></td>
                                    <td class="hide-col"></td>
                                    <td class="hide-col"></td>
                                    <td class="hide-col"></td>
                                    <td></td>
                                    <td class="hide-col"><strong><?= format_rupiah($subtotal); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
            <div class="row d-md-none d-block">
                <div class="col-md-12 col-lg-12">
                    <!-- DATA TABLE-->
                    <div class="report table-responsive">
                        <table id="dataTableReportView"
                            class="table table-borderless table-color-bg text-center costum-rounded w-100"
                            style="font-size: 10pt;">
                            <thead>
                                <th style="min-width: 120px;">Kode Transaksi</th>
                                <th style="min-width: 120px;">Tanggal Keluar</th>
                                <th style="min-width: 100px;">Nama Barang</th>
                                <th>Lokasi</th>
                                <th style="min-width: 100px;">Stok Keluar</th>
                                <th style="min-width: 100px;">Minimal Stok</th>
                                <th style="min-width: 100px;">Harga Satuan</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                                <th style="min-width: 100px;">Harga Total</th>
                            </thead>
                            <tbody>
                                <?php $subtotal = 0;?>
                                <?php foreach ($data as $databarangkeluar) : ?>
                                <tr>
                                    <td><?= $databarangkeluar['ID_TRANSAKSI']; ?></td>
                                    <td><?= date('d-m-Y', strtotime($databarangkeluar['DATE_OUT'])); ?></td>
                                    <td><?= $databarangkeluar['NAMA_BARANG']; ?></td>
                                    <td><?= $databarangkeluar['BLOK']; ?></td>
                                    <td><?= $databarangkeluar['JUMLAH_BARANG']; ?></td>
                                    <td><?= $databarangkeluar['MINIMAL_BARANG']; ?></td>
                                    <td><?= format_rupiah($databarangkeluar['HARGA_BARANG']); ?></td>
                                    <td><?= $databarangkeluar['NOTASI']; ?></td>
                                    <td><?= $databarangkeluar['KETERANGAN_TRANSAKSI'] ?></td>
                                    <td><?= format_rupiah($databarangkeluar['TOTAL_HARGA']); ?></td>
                                    <?php $subtotal += (int)$databarangkeluar['TOTAL_HARGA'];?>
                                </tr>
                                <?php endforeach;?>
                                <tr>
                                    <td class="hide-col"><strong>Subtotal</strong></td>
                                    <td class="hide-col"></td>
                                    <td class="hide-col"></td>
                                    <td class="hide-col"></td>
                                    <td class="hide-col"></td>
                                    <td class="hide-col"></td>
                                    <td class="hide-col"></td>
                                    <td class="hide-col"></td>
                                    <td></td>
                                    <td class="hide-col"><strong><?= format_rupiah($subtotal); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let detailtransaksi;

    function getDetailTransaksi() {
        document.location.href = "/laporanbarangkeluar_spv";
    }

    function getTransaksiByPeriod() {
        let elementstart = document.getElementById("DATE_START");
        let elemetend = document.getElementById("DATE_END");
        let datestart = elementstart.value;
        let dateend = elemetend.value;
        if (datestart == "" || dateend == "") {
            Swal.fire({
                icon: 'error',
                title: 'Peringatan!',
                text: 'Kolom Tanggal Periode Harus Diisi!',
            });
        } else {
            window.datestartreport = datestart;
            window.dateendreport = dateend;
            document.location.href = `/laporanbarangkeluar_spv/${datestart}/${dateend}`;
        }
    }

    $(document).ready(function () {
        var table4 = $('#dataTableOutProduct').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'print',
                text: 'Cetak',
                title: '',
                customize: function (win) {
                    $(win.document.body).css('font-size', '7pt');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');

                    $(win.document.body).find('table').addClass('table-bordered');
                    $(win.document.body).find('table').find('thead').find('tr').last().find(
                        'th:not(.sorting_disabled)').css('padding-right', '10px');
                    $(win.document.body).find('table').find('tbody').find('tr').last().find(
                        'td:not(:nth-last-child(1))').addClass('hide-col').css(
                        'font-weight', 'bolder');
                    $(win.document.body).find('table').find('tbody').find('tr').last().find('td:nth-last-child(1)').css('font-weight', 'bolder');
                    $(win.document.body).find('table').find('tbody').find('tr').last().find(
                        'td:first').removeClass('hide-col').addClass('hide-col-2').css(
                        'font-weight', 'bolder');

                    $(win.document.body).append(
                        '<div class="row m-t-30 m-b-50"><div class="col" align="center"><h6 style="color: #666;">Ridwan Irlanto</h6></div></div><div class="row"><div class="col" align="center"><div><strong><h6 style="color: #666;">(Supervisor Logistik)</h6></strong></div></div></div>'
                    ); //after the table
                    <?php if ($date_harian == null): ?>
                        $(win.document.body).prepend(
                            '<div class="row m-t-15 m-b-30"><div class="col" align="center"><h4 style="color: #666;">Laporan Pengeluaran Departemen Logistik Periode Tanggal <?= date('d - m - Y ', strtotime($date_start)) ?> s/d <?= date('d - m - Y ', strtotime($date_end)) ?></h4></div></div>'
                        ); //before the table
                    <?php else : ?>
                        $(win.document.body).prepend(
                            '<div class="row m-t-15 m-b-30"><div class="col" align="center"><h4 style="color: #666;">Laporan Pengeluaran Departemen Logistik Harian Tanggal <?= date('d - m - Y ', strtotime($date_harian)); ?></h4></div></div>'
                        ); //before the table
                    <?php endif; ?>
                }
            }],
            "pagingType": "simple", // Merubah format pagination 
            "bFilter": false, // Menyebunyikan searchbar bawaan
            "ordering": false, // Menonaktifkan fungsi sorting atau ordering
            "info": false, // Menonaktifkan "1 to n of n entries" text pada bagian bawah kiri tabeldata
            "lengthChange": false, // Menonaktifkan informasi record datatable perhalaman
            "pageLength": 2,
            "scrollX": true,
            "oLanguage": {
                "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json", // Merubah bahasa default menjadi bahasa indonesia
            }
        });
    });
</script>
<?= $this->endSection(); ?>