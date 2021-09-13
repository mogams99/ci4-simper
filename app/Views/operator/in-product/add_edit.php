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
                                    <a href="<?= base_url('brgmasuk_op') ?>">Barang Masuk</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <?php if ($formHeader=="Edit Barang Masuk") : ?>
                                    <li class="list-inline-item">Edit</li>
                                <?php else : ?>
                                    <li class="list-inline-item">Tambah</li>
                                <?php endif; ?>
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
                    <form action="<?= $action ?>" method="post" enctype="multipart/form-data" class="form-inline"
                        id="form-master">
                        <?= csrf_field() ?>
                        <input type="hidden" name="ID_TRANSAKSI2" id="ID_TRANSAKSI2"
                            value="<?= (isset($transac['ID_TRANSAKSI'])) ? $transac['ID_TRANSAKSI'] : '' ?>">
                        <input type="hidden" name="ID_USER" id="ID_USER"
                            value="<?= (isset($user_aktif)) ? $user_aktif : '' ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="ID_TRANSAKSI" class="form-control-label pr-3">Kode Transaksi</label>
                                        <input type="text" class="form-control w-100 costum-rounded" id="ID_TRANSAKSI"
                                            name="ID_TRANSAKSI"
                                            value="<?= (isset($transac['ID_TRANSAKSI'])) ? $transac['ID_TRANSAKSI'] : '' ?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="DATE_IN" class="form-control-label pr-3">Tanggal Masuk</label>
                                        <?php if ($formHeader=="Tambah Barang Masuk") : ?>
                                        <input type="text" class="form-control w-100 costum-rounded" id="DATE_IN"
                                            name="DATE_IN" value="<?= $tanggal_masuk; ?>" readonly>
                                        <?php else: ?>
                                        <input type="text" class="form-control w-100 costum-rounded" id="DATE_IN"
                                            name="DATE_IN" value="<?= $transac['DATE_IN']; ?>" readonly>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <div class="form-group mb-3">
                                        <label for="ID_BARANG" class="form-control-label pr-3">Kode Barang</label>
                                        <?php if ($formHeader=="Edit Barang Masuk") : ?>
                                        <input type="text" class="form-control w-100 costum-rounded" id="ID_BARANG"
                                            name="ID_BARANG"
                                            value="<?= (isset($transac['ID_BARANG'])) ? $transac['ID_BARANG'] : '' ?>"
                                            readonly>
                                        <?php else: ?>
                                        <select name="ID_BARANG" id="ID_BARANG" class="js-select2-extend form-control"
                                            onchange="getDetailProduk()"
                                            <?php if ($formHeader=="Edit Barang Masuk") {echo 'readonly'; } ?>>
                                            <option value="" selected disabled>Pilih Opsi</option>
                                            <?php foreach($product as $pro) : ?>
                                            <?php if (isset($transac['ID_BARANG']) && $transac['ID_BARANG']==$pro['ID_BARANG']) :?>
                                            <option value="<?= $pro['ID_BARANG']; ?>" selected><?= $pro['ID_BARANG']; ?>
                                            </option>
                                            <?php else:?>
                                            <option value="<?= $pro['ID_BARANG']; ?>"><?= $pro['ID_BARANG']; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="NAMA_BARANG" class="form-control-label pr-3">Nama Barang</label>
                                        <input type="text" class="form-control w-100 costum-rounded" id="NAMA_BARANG"
                                            name="NAMA_BARANG"
                                            value="<?= (isset($transac['NAMA_BARANG'])) ? $transac['NAMA_BARANG'] : ''; ?>"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-2">
                                    <div class="form-group mb-3">
                                        <label for="BLOK" class="form-control-label pr-3">Lokasi</label>
                                        <input type="text" name="BLOK" id="BLOK"
                                            class="form-control w-100 costum-rounded"
                                            value="<?= (isset($transac['BLOK'])) ? $transac['BLOK'] : ''; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="HARGA" class="pr-2 form-control-label">Harga</label>
                                        <input type="text" name="HARGA" id="HARGA"
                                            class="form-control w-100 costum-rounded"
                                            value="<?= (isset($transac['HARGA_BARANG'])) ? format_rupiah($transac['HARGA_BARANG']) : '' ; ?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="NOTASI" class="form-control-label pr-3">Satuan</label>
                                        <input type="text" name="NOTASI" id="NOTASI"
                                            class="form-control w-100 costum-rounded"
                                            value="<?= (isset($transac['NOTASI'])) ? $transac['NOTASI'] : ''; ?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <div class="form-group mb-3">
                                        <label for="STOK_MASUK" class="pr-2 form-control-label">Stok Masuk</label>
                                        <?php if ($formHeader=="Tambah Barang Masuk") : ?>
                                        <input type="number" min="0" name="STOK_MASUK" id="STOK_MASUK"
                                            class="form-control w-100 costum-rounded"
                                            value="<?= (isset($transac['JUMLAH_BARANG'])) ? $transac['JUMLAH_BARANG'] : ''; ?>">
                                        <?php else: ?>
                                        <input type="text" class="form-control w-100 costum-rounded" id="JUMLAH_BARANG"
                                            name="JUMLAH_BARANG" value="<?= $transac['JUMLAH_BARANG']; ?>" readonly>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <div class="form-group mb-3">
                                        <label for="STOK_MINIMAL" class="pr-2 form-control-label">Stok Minimal</label>
                                        <input type="text" name="STOK_MINIMAL" id="STOK_MINIMAL"
                                            class="form-control w-100 costum-rounded"
                                            value="<?= (isset($transac['MINIMAL_BARANG'])) ? $transac['MINIMAL_BARANG'] : ''; ?>"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="VENDOR" class="form-control-label pr-3">Vendor</label>
                                        <select name="VENDOR" id="VENDOR" class="js-select2-extend form-control">
                                            <option value="" disabled selected>Pilih Vendor</option>
                                            <?php foreach ($vendor as $itemvendor) :?>
                                            <?php if (isset($transac['ID_VENDOR']) && $itemvendor['ID_VENDOR']==$transac['ID_VENDOR']) : ?>
                                            <option value="<?= $itemvendor['ID_VENDOR']; ?>" selected>
                                                <?= $itemvendor['NAMA_VENDOR']; ?></option>
                                            <?php else: ?>
                                            <option value="<?= $itemvendor['ID_VENDOR']; ?>">
                                                <?= $itemvendor['NAMA_VENDOR']; ?></option>
                                            <?php endif;?>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success btn-md costum-rounded" form="form-master">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function getDetailProduk() {
        let e = document.getElementById("ID_BARANG");
        let idbrg = e.value;
        var fields = {
            '<?= csrf_token(); ?>': '<?= csrf_hash(); ?>'
        };
        $.get("/getDetailBrg/" + idbrg, function (response) {
            let detailBrg = JSON.parse(response);
            document.getElementById("NAMA_BARANG").value = detailBrg.NAMA_BARANG;
            document.getElementById("NOTASI").value = detailBrg.NOTASI;
            document.getElementById("BLOK").value = detailBrg.BLOK;
            document.getElementById("HARGA").value = formatRupiah(detailBrg.HARGA_BARANG);
            document.getElementById("STOK_MINIMAL").value = detailBrg.MINIMAL_BARANG;
        });
    }
</script>
<?= $this->endSection(); ?>