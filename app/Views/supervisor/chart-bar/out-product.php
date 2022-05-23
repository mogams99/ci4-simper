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
                                <li class="list-inline-item">Grafik Barang Keluar</li>
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
            <form action="" method="get">
                <div class="row">
                    <div class="col-lg-2 col-md-12">
                        <div class="form-group mb-3">
                            <select name="TAHUN" id="TAHUN" class="js-select2-extend js-states form-control">
                                <?php foreach ($params as $thn) : ?>
                                    <?php if ($tahun == $thn['tahun']) : ?>
                                        <option selected value="<?= $thn['tahun']; ?>"><?= $thn['tahun']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $thn['tahun']; ?>"><?= $thn['tahun']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-12 mb-md-3">
                        <button class="btn btn-success btn-block costum-rounded" type="submit">Tampil</button>
                    </div>
                    <div class="col-lg-2 col-md-12 ml-auto">
                        <a class="btn color-btn-start btn-block costum-rounded d-md-block d-none" id="printChart" href="" download="<?= $tahun ?>-chart-image.png">Cetak</a>
                    </div>
                </div>
            </form>
            <div class="row p-sm-t-15">
                <div class="col-lg-12">
                    <div class="au-card m-b-30" style="background-color: rgba(0,0,0,.03);">
                        <div class="au-card-inner">
                            <h4 class="m-b-20">Grafik <strong>Barang Keluar (Rp)</strong></h4>
                            <canvas id="myChart" </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url() ?>/js/chart.min.js"></script>

<script>
    var cData = JSON.parse('<?php echo $chart_out ?>')

    const data = {
        labels: cData.label,
        datasets: [{
            label: 'Jumlah Pemasukan',
            data: cData.data,
            backgroundColor: ['#c62828'],
            borderWidth: 2,
            borderRadius: 10,
            borderSkipped: false,
            borderWidth: 1
        }]
    };
    const config = {
        type: 'bar',
        data: data,
        options: {
            animation: {
                onComplete: function() {
                    console.log(this.toBase64Image())
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    }
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    // Unduh chart dengan format .png
    document.getElementById("printChart").addEventListener('click', function() {
        /*Ambil chart*/
        var url_base64jp = document.getElementById("myChart").toDataURL("image/jpg");
        /*Ambil id tombol */
        var a = document.getElementById("printChart");
        /*Memasukkan hasil chart yang sudah di konversi ke format img*/
        a.href = url_base64jp;
    });
</script>
<?= $this->endSection(); ?>