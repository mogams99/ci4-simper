 <!-- Jquery JS-->
 <script src="<?= base_url() ?>/vendor/jquery-3.2.1.min.js"></script>

 <!-- Bootstrap JS-->
 <script src="<?= base_url() ?>/vendor/bootstrap-4.1/popper.min.js"></script>
 <script src="<?= base_url() ?>/vendor/bootstrap-4.1/bootstrap.min.js"></script>

 <!-- Vendor JS     -->
 <script src="<?= base_url() ?>/vendor/slick/slick.min.js"></script>
 <script src="<?= base_url() ?>/vendor/wow/wow.min.js"></script>
 <script src="<?= base_url() ?>/vendor/animsition/animsition.min.js"></script>
 <script src="<?= base_url() ?>/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
 <script src="<?= base_url() ?>/vendor/counter-up/jquery.waypoints.min.js"></script>
 <script src="<?= base_url() ?>/vendor/counter-up/jquery.counterup.min.js"></script>
 <script src="<?= base_url() ?>/vendor/circle-progress/circle-progress.min.js"></script>
 <script src="<?= base_url() ?>/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
 <script src="<?= base_url() ?>/vendor/chartjs/Chart.bundle.min.js"></script>
 <script src="<?= base_url() ?>/vendor/select2/select2.min.js"></script>

 <!-- Extended JS -->
 <script type="text/javascript" src="<?= base_url() ?>/js/sweetalert2@10.js"></script>
 <script type="text/javascript" src="<?= base_url() ?>/js/datatables.min.js"></script>
 <script type="text/javascript" src="<?= base_url() ?>/js/datatables.buttons.min.js"></script>
 <script type="text/javascript" src="<?= base_url() ?>/js/buttons.print.min.js"></script>
 <script type="text/javascript" src="<?= base_url() ?>/js/pdfmake.min.js"></script>
 <script type="text/javascript" src="<?= base_url() ?>/js/vfs_fonts.js"></script>
 <script type="text/javascript" src="<?= base_url() ?>/js/buttons.html5.min.js"></script>
 <script type="text/javascript" src="<?= base_url() ?>/js/select2.min.js"></script>

 <!-- Main JS-->
 <script src="<?= base_url() ?>/js/main.js"></script>

 <!-- Operation JS -->
 <script>
     //Melakukan fungsi hapus pada button dengan class delete
     $('.delete').click(function(e) {
         e.preventDefault();
         Swal.fire({
             title: 'Apakah anda yakin?',
             text: "Anda tidak bisa mengembalikan data yang sudah dihapus!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Hapus',
             cancelButtonText: 'Kembali'
         }).then((result) => {
             if (result.isConfirmed == true) {
                 var href = $(this).attr('href');
                 setTimeout(function() {
                     window.location.href = href;
                 }, 500);
                 // window.location.href = $(this).attr('href');
                 Swal.fire({
                     position: 'center',
                     icon: 'success',
                     title: 'Data berhasil dihapus',
                     showConfirmButton: false
                 })
             }
         });
     })

     // Fungsi alert setiap transaksi data pada masing masing form
     $("#form-master").submit(function(e) { // Mengambil id form transaksi
         e.preventDefault(); // Mencegah fungsi bawaan form
         var form = $(this);
         var url = form.attr('action');
         $.ajax({
             type: "POST",
             url: url,
             data: form.serialize(), // Mengambil data yang di inputkan
             success: function(data) {
                 if (data == 'tambahKategori') { // Berfungsi memberi notifikasi edit kategori berhasil
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Kategori berhasil ditambah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/kategori_op';
                     })

                 }
                 if (data == 'editKategori') { // Berfungsi memberi notifikasi edit kategori berhasil
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Kategori berhasil diubah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/kategori_op';
                     })
                 }
                 if (data == 'alertaKategori') { // Berfungsi memberi peringatan
                     Swal.fire({
                         icon: 'error',
                         title: 'Perhatian!',
                         text: 'Semua data harus di isi!',
                     })
                 }
                 if (data == 'tambahLokasi') { // Bagian master lokasi
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Lokasi berhasil ditambah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/lokasi_op';
                     })
                 }
                 if (data == 'editLokasi') {
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Lokasi berhasil diubah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/lokasi_op';
                     })
                 }
                 if (data == 'alertaLokasi') {
                     Swal.fire({
                         icon: 'error',
                         title: 'Perhatian!',
                         text: 'Semua data harus di isi!',
                     })
                 }
                 if (data == 'tambahSatuan') { // Bagian master lokasi
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Satuan berhasil ditambah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/satuan_op';
                     })
                 }
                 if (data == 'editSatuan') {
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Satuan berhasil diubah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/satuan_op';
                     })
                 }
                 if (data == 'alertaSatuan') {
                     Swal.fire({
                         icon: 'error',
                         title: 'Perhatian!',
                         text: 'Semua data harus di isi!',
                     })
                 }
                 if (data == 'tambahVendor') { // Bagian master vendor
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Vendor berhasil ditambah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/vendor_op';
                     })
                 }
                 if (data == 'editVendor') {
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Vendor berhasil diubah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/vendor_op';
                     })
                 }
                 if (data == 'alertaVendor') {
                     Swal.fire({
                         icon: 'error',
                         title: 'Perhatian!',
                         text: 'Semua data harus di isi!',
                     })
                 }
                 if (data == 'tambahBarang') { // Bagian master barang
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Barang berhasil ditambah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/brgmaster_op';
                     })
                 }
                 if (data == 'editBarang') {
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Barang berhasil diubah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/brgmaster_op';
                     })
                 }
                 if (data == 'errorBarang') {
                     Swal.fire({
                         icon: 'error',
                         title: 'Perhatian!',
                         text: 'Barang gagal masuk!',
                     })
                 }
                 if (data == 'alertaBarang') {
                     Swal.fire({
                         icon: 'error',
                         title: 'Perhatian!',
                         text: 'Semua data harus di isi!',
                     })
                 }
                 if (data == 'tambahBarangMasuk') { // Bagian barang masuk
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Barang masuk berhasil ditambah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/brgmasuk_op';
                     })
                 }
                 if (data == 'editBarangMasuk') {
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Barang masuk berhasil diubah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/brgmasuk_op';
                     })
                 }
                 if (data == 'errorBarangMasuk') {
                     Swal.fire({
                         icon: 'error',
                         title: 'Perhatian!',
                         text: 'Barang gagal masuk!',
                     })
                 }
                 if (data == 'alertaBarangMasuk') {
                     Swal.fire({
                         icon: 'error',
                         title: 'Perhatian!',
                         text: 'Semua data harus di isi!',
                     })
                 }
                 if (data == 'tambahBarangKeluar') { // Bagian barang masuk
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Barang keluar berhasil ditambah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/brgkeluar_op';
                     })
                 }
                 if (data == 'editBarangKeluar') {
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Barang keluar berhasil diubah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/brgkeluar_op';
                     })
                 }
                 if (data == 'errorBarangKeluar') {
                     Swal.fire({
                         icon: 'error',
                         title: 'Perhatian!',
                         text: 'Barang gagal keluar!',
                     })
                 }
                 if (data == 'alertaBarangKeluar') {
                     Swal.fire({
                         icon: 'error',
                         title: 'Perhatian!',
                         text: 'Semua data harus di isi!',
                     })
                 }
                 if (data == 'editProfilOperator') {
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Profil operator berhasil diubah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/beranda_op';
                     })
                 }
                 if (data == 'editProfilSupervisor') {
                     Swal.fire({
                         position: 'center',
                         icon: 'success',
                         title: 'Profil supervisor berhasil diubah!',
                         showConfirmButton: false,
                         timer: 1500
                     }).then(function() {
                         window.location.href = '/beranda_spv';
                     })
                 }
             }
         });
     });

     // Fungsi formatter harga dari int ke rupiah
     function formatRupiah(bilangan) {
         var number_string = bilangan.toString(),
             sisa = number_string.length % 3,
             rupiah = 'Rp ' + number_string.substr(0, sisa),
             ribuan = number_string.substr(sisa).match(/\d{3}/g);

         if (ribuan) {
             separator = sisa ? '.' : '';
             rupiah += separator + ribuan.join('.');
         }
         return rupiah;
     }

     function formatToInteger(rupiah) {
         return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
     }

     // Fungsi select2 
     $(document).ready(function() {
         $('.js-select2-extend').select2();
     });

     $(document).ready(function() {
         $(".js-example-chart").select2({
             width: 'resolve' // need to override the changed default
         });
     });

     // Fungsi filter dan pencarian datatabel yang dikostum
     $(document).ready(function() {
         var table = $('#dataTable').DataTable({
             "pagingType": "simple", // Merubah format pagination 
             "sDom": "ltipr", // Menyembunyikan searchbar bawaan dari datatable
             "ordering": false, // Menonaktifkan fungsi sorting atau ordering
             "info": false, // Menonaktifkan "1 to n of n entries" text pada bagian bawah kiri tabeldata
             "lengthChange": false, // Menonaktifkan informasi record datatable perhalaman
             "pageLength": 6,
             scrollX: true,
             "oLanguage": {
                 "sEmptyTable": "Data dalam tabel kosong", // Merubah informasi bila datatabel tidak ada isinya
                 "sZeroRecords": "Data yang dicari tidak ada", // Merubah informasi bila data yang dicari tidak ada
                 "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json", // Merubah bahasa default menjadi bahasa indonesia
             }
         });

         $('#dataInput').on('keyup', function() {
             table.search($(this).val()).draw();
         });
     });

     $(document).ready(function() {
         var table1 = $('#dataTableMaster').DataTable({
             "pagingType": "simple", // Merubah format pagination 
             "sDom": "ltipr", // Menyembunyikan searchbar bawaan dari datatable
             "ordering": false, // Menonaktifkan fungsi sorting atau ordering
             "info": false, // Menonaktifkan "1 to n of n entries" text pada bagian bawah kiri tabeldata
             "lengthChange": false, // Menonaktifkan informasi record datatable perhalaman
             "pageLength": 6,
             "oLanguage": {
                 "sEmptyTable": "Data dalam tabel kosong", // Merubah informasi bila datatabel tidak ada isinya
                 "sZeroRecords": "Data yang dicari tidak ada", // Merubah informasi bila data yang dicari tidak ada
                 "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json", // Merubah bahasa default menjadi bahasa indonesia
             }
         });

         $('#dataInputMaster').on('keyup', function() {
             table1.search($(this).val()).draw();
         });
     });

     $(document).ready(function() {
         var table2 = $('#dataTableReportView').DataTable({
             "pagingType": "simple", // Merubah format pagination 
             "bFilter": false, // Menyebunyikan searchbar bawaan
             "ordering": false, // Menonaktifkan fungsi sorting atau ordering
             "info": false, // Menonaktifkan "1 to n of n entries" text pada bagian bawah kiri tabeldata
             "lengthChange": false, // Menonaktifkan informasi record datatable perhalaman
             "pageLength": 2,
             scrollX: true,
             "oLanguage": {
                 "sUrl": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json", // Merubah bahasa default menjadi bahasa indonesia
             }
         });
     });
 </script>