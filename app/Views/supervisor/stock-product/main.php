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
                                <li class="list-inline-item">Laporan Persediaan</li>
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
                    Form <strong>Saat Ini</strong>
                </div>
                <div class="card-body">
                    <form action="" class="form-inline">
                        <?= csrf_field() ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="ID_BARANG" class="form-control-label pr-3">Kode Barang</label>
                                        <select name="ID_BARANG" id="ID_BARANG" onchange="getDetailProduk()"
                                            class="js-select2-extend form-control">
                                            <option value="" disabled selected>Pilih Opsi</option>
                                            <option value="all" <?= $selected_barang=="all" ? 'selected' : '' ?>>Semua
                                                Barang</option>
                                            <?php foreach($product as $pro) : ?>
                                            <option value="<?= $pro['ID_BARANG']; ?>"
                                                <?= $selected_barang==$pro['ID_BARANG'] ? 'selected' : '' ?>>
                                                <?= $pro['ID_BARANG']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="form-group">
                                        <label for="" class="form-control-label pr-3">Nama Barang</label>
                                        <input type="text" class="form-control w-100 costum-rounded" id="NAMA_BARANG" value="<?= (isset($selected_nama_barang)) ? $selected_nama_barang: '' ?>"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success btn-md costum-rounded" onclick="loadData()">
                        Tampil
                    </button>
                </div>
            </div>
            <div class="row d-md-block d-none">
                <div class="col-md-12 col-lg-12">
                    <!-- DATA TABLE-->
                    <div class="report table-responsive">
                        <table id="dataTableStock" class="table table-borderless table-color-bg text-center costum-rounded w-100"
                            style="font-size: 10pt;">
                            <thead>
                                <th style="min-width: 100px;">Kode Barang</th>
                                <th style="min-width: 100px;">Nama Barang</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th style="min-width: 100px;">Stok Tersedia</th>
                                <th style="min-width: 100px;">Minimal Stok</th>
                                <th style="min-width: 100px;">Harga</th>
                                <th>Satuan</th>
                                <th>Deskripsi</th>
                                <th style="min-width: 100px;">Harga Total</th>
                            </thead>
                            <tbody id="tbody">
                                <?php $total = 0; ?>
                                <?php foreach ($selected_data_barang as $item ) :?>
                                <tr>
                                    <td><?= $item['ID_BARANG']; ?></td>
                                    <td><?= $item['NAMA_BARANG']; ?></td>
                                    <td><?= $item['NAMA_KATEGORI']; ?></td>
                                    <td><?= $item['BLOK']; ?></td>
                                    <td><?= $item['STOK']; ?></td>
                                    <td><?= $item['MINIMAL_BARANG']; ?></td>
                                    <td><?= format_rupiah($item['HARGA_BARANG']); ?></td>
                                    <td><?= $item['NOTASI']; ?></td>
                                    <td><?= $item['KETERANGAN_BARANG']; ?></td>
                                    <td><?= format_rupiah((int)$item['HARGA_BARANG']*(int)$item['STOK']); ?></td>
                                </tr>
                                <?php $total += (int)$item['HARGA_BARANG']*(int)$item['STOK'];?>
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
                                    <td class="hide-col"><strong><?= format_rupiah($total); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE-->
                </div>
            </div>
            <div class="row d-md-none d-block">
                <div class="col-md-12 col-lg-12">
                    <div class="report table-responsive">
                        <table id="dataTableReportView" class="table table-bordered table-color-bg text-center costum-rounded w-100"
                            style="font-size: 10pt;">
                            <thead>
                                <th style="min-width: 100px;">Kode Barang</th>
                                <th style="min-width: 100px;">Nama Barang</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th style="min-width: 100px;">Stok Tersedia</th>
                                <th style="min-width: 100px;">Minimal Stok</th>
                                <th style="min-width: 100px;">Harga</th>
                                <th>Satuan</th>
                                <th>Deskripsi</th>
                                <th style="min-width: 100px;">Harga Total</th>
                            </thead>
                            <tbody id="tbody">
                                <?php foreach ($selected_data_barang as $item ) :?>
                                <tr>
                                    <td><?= $item['ID_BARANG']; ?></td>
                                    <td><?= $item['NAMA_BARANG']; ?></td>
                                    <td><?= $item['NAMA_KATEGORI']; ?></td>
                                    <td><?= $item['BLOK']; ?></td>
                                    <td><?= $item['STOK']; ?></td>
                                    <td><?= $item['MINIMAL_BARANG']; ?></td>
                                    <td><?= format_rupiah($item['HARGA_BARANG']); ?></td>
                                    <td><?= $item['NOTASI']; ?></td>
                                    <td><?= $item['KETERANGAN_BARANG']; ?></td>
                                    <td><?= format_rupiah((int)$item['HARGA_BARANG']*(int)$item['STOK']); ?></td>
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
                                    <td class="hide-col"><strong><?= format_rupiah($total); ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let detailbarang;

    function getDetailProduk() {
        let e = document.getElementById("ID_BARANG");
        let idbrg = e.value;
        if (idbrg == "all") {
            $.get("/getAllBrg", function (response) {
                detailbarang = JSON.parse(response);
            });
        } else {
            $.get("/getDetailBrg/" + idbrg, function (response) {
                let detailBrg = JSON.parse(response);
                detailbarang = detailBrg;
                document.getElementById("NAMA_BARANG").value = detailBrg.NAMA_BARANG;
            });
        }
    }

    function loadData() {
        let e = document.getElementById("ID_BARANG");
        let idbrg = e.value;
        if (idbrg == "all") {
            document.location.href = "/laporanstockbarang_spv";
        } else {
            document.location.href = `/laporanstockbarang_spv/${idbrg}`;
        }
    }

    $(document).ready(function() {
        var table3 = $('#dataTableStock').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'print',
                    text: 'Cetak',  
                    title: '',
                    customize: function ( win ) {
                        let datestart = window.datestartreport;
                        let dateend = window.dateendreport;
                        $(win.document.body).css( 'font-size', '7pt' );
                        
                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );

                        $(win.document.body).find('table').addClass('table-bordered');
                        $(win.document.body).find('table').find('thead').find('tr').last().find('th:not(.sorting_disabled)').css('padding-right', '10px');
                        $(win.document.body).find('table').find('tbody').find('tr').last().find('td:not(:nth-last-child(1))').addClass('hide-col').css('font-weight', 'bolder');
                        $(win.document.body).find('table').find('tbody').find('tr').last().find('td:first').removeClass('hide-col').addClass('hide-col-2').css('font-weight', 'bolder');
                        
                        $(win.document.body).append('<div class="row m-t-30 m-b-50"><div class="col" align="center"><h6 style="color: #666;">Ridwan Irlanto</h6></div></div><div class="row"><div class="col" align="center"><div><strong><h6 style="color: #666;">(Supervisor Logistik)</h6></strong></div></div></div>'); //after the table
                        $(win.document.body).prepend('<div class="row m-t-15 m-b-30"><div class="col" align="center"><h4 style="color: #666;">Laporan Persedian Departemen Logistik <?= date("d-m-Y") ?></h4></div></div>'); //before the table
                    }
                },
            ],
            "pagingType": "simple", // Merubah format pagination 
            "bFilter": false,       // Menyebunyikan searchbar bawaan
            "ordering": false,      // Menonaktifkan fungsi sorting atau ordering
            "info": false,          // Menonaktifkan "1 to n of n entries" text pada bagian bawah kiri tabeldata
            "lengthChange": false,  // Menonaktifkan informasi record datatable perhalaman
            "pageLength": 2,
            "scrollX": true,
            "oLanguage": {                          
                "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json",   // Merubah bahasa default menjadi bahasa indonesia
            }
        });
    });
</script>
<?= $this->endSection(); ?>