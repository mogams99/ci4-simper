<html lang="en">
 
<head>
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title>Hasil Laporan - Supervisor</title>

  <!-- CSS Pages-->
  <style>
      table {
        align: center;
        width: 100% !important;
      }
      table, th, td {
        border: 1px solid black !important;
        border-collapse: collapse !important;
      }
      table th { 
          text-align: center !important;
          /* vertical-align: middle!important; */
          /* font-size: 14px !important; */
          font-weight: bolder !important;
      }
      table td{
          text-align: center !important;
          /* font-size: 4px !important; */
          font-weight: lighter !important;
      }
      .report-top {
          margin-top: 48px !important;
      }
      .report-left {
          margin-left: auto;
      }
      .report-signature {
        margin-top: 48px !important;
      }
      /* h2 {
        text-align: center !important;
        font-weight: bold !important;
      }  */
      /* th, td {
        padding: 4px !important;
      } */
  </style>
</head>
<body onload="print()">
  <div class="container" id="print">
    <div class="row">
      <div class="col">
        <table class="table">
        <thead>
          <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Lokasi</th>
            <th>Stok Tersedia</th>
            <th>Minimal Stok</th>
            <th>Harga</th>
            <th>Satuan</th>
            <th>Total Harga</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>BB0001</td>
            <td>Paku</td>
            <td>Forclip</td>
            <td>G-001</td>
            <td>5</td>
            <td>1</td>
            <td><?= format_rupiah(1000000); ?></td>
            <td>Kg</td>
            <td><?= format_rupiah(1000000*5); ?></td>
          </tr>
          <tr>
            <td colspan="7" style="font-weight: bolder !important;">Total Persediaan</td>
            <td colspan="7" style="font-weight: bolder !important;"><?= format_rupiah(5000000); ?></td>
          </tr>
        </tbody>
      </table>
      </div>
    </div>
    <div class="row report-top">
      <div class="col" align="center"> 
        <div>
          Surabaya,
          <span></span>
          21 Juli 2021
        </div>
      </div>
    </div>
    <div class="row report-signature">
      <div class="col" align="center">
        <div>
          Ridwan Irlanto
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col" align="center">
        <div>
          <strong>(Supervisor Logistik)</strong>
        </div>
      </div>
    </div>
  </div>
  
  <script type="text/javascript" src="<?= base_url(); ?>/js/print.min.js"></script>
    <script type="text/javascript">
      function print() {
      printJS({
      printable: 'print',
      type: 'html',
      targetStyles: ['*'],
      header: 'Hasil Laporan Persediaan Departemen Logistik 21 Juli 2021',
      headerStyle: 'text-align: center; font-size: 24px;',
      })
      }
    </script>
</body>
</html>
