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
                                    <a href="<?= base_url('brgmaster_op') ?>">Barang</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <?php if ($formHeader=="Edit Barang") : ?>
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
                    Form <strong><?= $formHeader; ?> </strong>
                </div>
                <div class="card-body card-block">
                    <form action="<?= $action ?>" method="post" enctype="multipart/form-data" class="form-inline"
                        id="form-master">
                        <?= csrf_field() ?>
                        <input type="hidden" name="ID_BARANG2" id="ID_BARANG2"
                            value="<?= (isset($product['ID_BARANG'])) ? $product['ID_BARANG'] : '' ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="selectSm" class="form-control-label pr-3">Kategori</label>
                                        <?php if ($formHeader=="Edit Barang") : ?>
                                        <input type="hidden" name="PREFIX_KATEGORI" id="PREFIX_KATEGORI"
                                            class="form-control w-100 costum-rounded"
                                            value="<?= (isset($product['ID_KATEGORI'])) ? $product['ID_KATEGORI'] : '' ?>"
                                            readonly>
                                        <input type="text" name="PREFIX_KATEGORI2" id="PREFIX_KATEGORI2"
                                            class="form-control w-100 costum-rounded"
                                            value="<?= (isset($product['PREFIX_KATEGORI'])) ? $product['PREFIX_KATEGORI'] : '' ?>"
                                            readonly>
                                        <?php else:?>
                                        <select name="PREFIX_KATEGORI" id="PREFIX_KATEGORI"
                                            class="js-select2-extend js-states form-control" onchange="getKodeBrg()">
                                            <option value="" disabled selected>Pilih Opsi</option>
                                            <?php foreach($category as $cat) : ?>
                                            <?php if(isset($product)&&$product['ID_KATEGORI']==$cat['ID_KATEGORI']) : ?>
                                            <option value="<?= $cat['ID_KATEGORI']; ?>" selected>
                                                <?= $cat['PREFIX_KATEGORI']; ?></option>
                                            <?php else :?>
                                            <option value="<?= $cat['ID_KATEGORI']; ?>"><?= $cat['PREFIX_KATEGORI']; ?>
                                            </option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php endif;?>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2">
                                    <div class="form-group mb-3">
                                        <label for="ID_BARANG" class="pr-2 form-control-label">Kode Barang</label>
                                        <input type="text" name="ID_BARANG" id="ID_BARANG"
                                            class="form-control w-100 costum-rounded"
                                            value="<?= (isset($product['ID_BARANG'])) ? $product['ID_BARANG'] : '' ?>"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="NAMA_BARANG" class="pr-2 form-control-label">Nama Barang</label>
                                        <input type="text" name="NAMA_BARANG" id="NAMA_BARANG"
                                            class="form-control w-100 costum-rounded"
                                            value="<?= (isset($product['NAMA_BARANG'])) ? $product['NAMA_BARANG'] : '' ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="form-control-label pr-3">Lokasi</label>
                                        <select name="BLOK" id="BLOK" class="js-select2-extend js-states form-control">
                                            <option value="" disabled selected>Pilih Opsi</option>
                                            <?php foreach($location as $loc) : ?>
                                            <?php if(isset($product)&&$product['ID_LOKASI']==$loc['ID_LOKASI']): ?>
                                            <option value="<?= $loc['ID_LOKASI']; ?>" selected><?= $loc['BLOK']; ?>
                                            </option>
                                            <?php else:?>
                                            <option value="<?= $loc['ID_LOKASI']; ?>"><?= $loc['BLOK']; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="" class="form-control-label pr-3">Satuan</label>
                                        <select name="NOTASI" id="NOTASI" class="js-select2-extend js-states form-control">
                                            <option value="" disabled selected>Pilih Opsi</option>
                                            <?php foreach($unit as $un) : ?>
                                            <?php if(isset($product)&&$product['ID_SATUAN']==$un['ID_SATUAN']) : ?>
                                            <option value="<?= $un['ID_SATUAN']; ?>" selected><?= $un['NOTASI']; ?>
                                            </option>
                                            <?php else: ?>
                                            <option value="<?= $un['ID_SATUAN']; ?>"><?= $un['NOTASI']; ?></option>
                                            <?php endif;?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="HARGA_BARANG" class="pr-2 form-control-label">Harga</label>
                                        <input type="text" onfocus="this.value=''" name="HARGA_BARANG" id="HARGA_BARANG"
                                            class="form-control w-100 costum-rounded" onchange="reformatHarga(this)"
                                            value="<?= (isset($product['HARGA_BARANG'])) ? $product['HARGA_BARANG'] : '' ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="STOK" class="pr-2 form-control-label">Stok Tersedia</label>
                                        <input type="text" name="STOK" id="STOK"
                                            class="form-control w-100 costum-rounded"
                                            value="<?= (isset($product['STOK'])) ? $product['STOK'] : '' ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <div class="form-group mb-3">
                                        <label for="MINIMAL_BARANG" class="pr-2 form-control-label">Stok Minimal</label>
                                        <input type="number" min="0" name="MINIMAL_BARANG" id="MINIMAL_BARANG"
                                            class="form-control w-100 costum-rounded"
                                            value="<?= (isset($product['MINIMAL_BARANG'])) ? $product['MINIMAL_BARANG'] : '' ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="KETERANGAN_BARANG" class="pr-2 form-control-label">Deskripsi
                                            Barang</label>
                                        <input type="text" name="KETERANGAN_BARANG" id="KETERANGAN_BARANG"
                                            class="form-control w-100 costum-rounded"
                                            value="<?= (isset($product['KETERANGAN_BARANG'])) ? $product['KETERANGAN_BARANG'] : '' ?>">
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
    function getKodeBrg() {
        let e = document.getElementById("PREFIX_KATEGORI");
        let idkategori = e.value;
        var fields = {
            '<?= csrf_token(); ?>': '<?= csrf_hash(); ?>'
        };

        $.get("/generateKodeBrg/" + idkategori, function (response) {
            let kode = JSON.parse(response);
            document.getElementById("ID_BARANG").value = kode;

        });

    }

    function reformatHarga(element) {
        if (element.value > 0) {
            element.value = formatRupiah(element.value);
        } else {
            element.value = 0;
        }
    }

    $(function () {
        reformatHarga(document.getElementById("HARGA_BARANG"));
    });
</script>
<?= $this->endSection(); ?>