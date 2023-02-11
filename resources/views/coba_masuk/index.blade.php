<!DOCTYPE html>
<html>

<head>
<title>permintaan produk dengan label QR Code</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MULAI STYLE CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


    <!-- AKHIR STYLE CSS -->
    
    @extends('templates/main')
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/manage_account/account/style.css') }}">
    @endsection
    @section('content')

</head>

<body>

   
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header d-flex justify-content-between align-items-center">
    
          <h4 class="page-title">Daftar Produk Masuk</h4>
          <div class="d-flex justify-content-start">
              <div class="dropdown">
                <button class="btn btn-icons btn-inverse-primary btn-filter shadow-sm" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="mdi mdi-filter-variant"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton1">
                  <h6 class="dropdown-header">Urut Berdasarkan :</h6>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item filter-btn" data-filter="part_no">Part No</a>
                <a href="#" class="dropdown-item filter-btn" data-filter="part_name">Part name</a>
                <a href="#" class="dropdown-item filter-btn" data-filter="customer">customer</a>
                <a href="#" class="dropdown-item filter-btn" data-filter="qty">qty</a>
                <a href="#" class="dropdown-item filter-btn" data-filter="date">date</a>
                </div>
              </div>
            
            <div class="dropdown dropdown-search">
              <button class="btn btn-icons btn-inverse-primary btn-filter shadow-sm ml-2" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-magnify"></i>
              </button>
              <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuIconButton1">
                <div class="row">
                  <div class="col-11">
                    <input type="text" class="form-control" name="search" placeholder="Cari Daftar produk">
                  </div>
                </div>
              </div>
            </div>
    
          </div>
        </div>
      </div>
    </div>
     <!-- MULAI CONTAINER -->
     






 <!-- MULAI CONTAINER -->
 <div class="container">

    <div class="card">
        
        <div class="card-body">
            <!-- MULAI TOMBOL TAMBAH -->
            <a href="javascript:void(0)" class="btn btn-primary" id="tombol-tambah">Tambah produk masuk</a>
            <br><br>
            <!-- AKHIR TOMBOL -->
            <!-- MULAI TABLE -->
            <table class="table table-striped table-bordered table-sm" id="table_masuk">
                <thead>
                    <tr>
                        <th>No</th>
                 
                    <th>Part no</th>
                    <th>Part Name</th>
                    <th>qty</th>
                    <th>status</th>
                    <th>Date time</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
        <!-- AKHIR TABLE -->
		<br>
		<br>
        
       </div>
    </div>
  </div>

  <!-- MULAI MODAL FORM TAMBAH/EDIT-->
<div class="modal" tabindex="-1" id="tambah-edit-modal" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-judul"></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="form-tambah-edit" name="form-tambah-edit" class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-12">

                            <input type="hidden" name="dataproduk_id" id="dataproduk_id">

                            <div class="form-group">
                                <label for="" class="col-sm-12 control-label">Part No</label>
                                <div class="col-sm-12">
                                    <select name="dataproduk_id" id="dataproduk_id" class="form-control" required>
                                        <option value="" disabled selected>Pilih data produk</option>
                                        @foreach ($data_produk as $data)
                                        <option value="{{ $data->id_dataproduk }}">{{ $data->part_name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                            </div>
                            </div>
                          
                            <div class="form-group">
                                <label for="name" class="col-sm-12 control-label">qty</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="qty" name="qty" value=""
                                        required>
                                </div>
                            </div>
                        

                        <div class="col-sm-offset-2 col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block" id="tombol-simpan"
                                value="create">Simpan
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- AKHIR MODAL -->





  <!-- MULAI MODAL KONFIRMASI DELETE-->


  <div class="modal danger" tabindex="-1" role="dialog" id="konfirmasi-modal" data-backdrop="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">PERHATIAN</h5>
              
                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            
            <div class="modal-body">
                <p><b>Jika menghapus produk_masuk maka</b></p>
                <p>*data produk masuk tersebut hilang selamanya, apakah anda yakin?</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" name="tombol-hapus" id="tombol-hapus">Hapus
                    Data</button>
            </div>
        </div>
    </div>
</div>

<!-- AKHIR MODAL -->


<!-- AKHIR MODAL -->
@endsection
@section('script')
<script src="{{ asset('plugins/js/quagga.min.js') }}"></script>
<script src="{{ asset('js/manage_account/account/script.js') }}"></script>

<script type="text/javascript">
  <!-- LIBARARY JS -->
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
    integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
    integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>
<!-- AKHIR LIBARARY JS -->



<!-- JAVASCRIPT -->
<!-- JAVASCRIPT -->
<script>
    
    //CSRF TOKEN PADA HEADER
    //Script ini wajib krn kita butuh csrf token setiap kali mengirim request post, patch, put dan delete ke server
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    //TOMBOL TAMBAH DATA
    //jika tombol-tambah diklik maka
    $('#tombol-tambah').click(function () {
        $('#button-simpan').val("create-post"); //valuenya menjadi create-post
        $('#id_produkmasuk').val(''); //valuenya menjadi kosong
        $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
        $('#modal-judul').html("Tambah Data Produk Baru"); //valuenya tambah data_produk baru
        $('#tambah-edit-modal').modal('show'); //modal tampil
    });

    //MULAI DATATABLE
    //script untuk memanggil data json dari server dan menampilkannya berupa datatable
    $(document).ready(function () {
        $('#table_masuk').DataTable({
            processing: true,
            serverSide: true, //aktifkan server-side 
            ajax: {
                url: "{{ route('coba_masuk.index') }}",
                type: 'GET'
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                
                {
                    data: 'part_no',
                    name: 'part_no'
                },
                {
                    data: 'part_name',
                    name: 'part_name'
                },
                {
                    data: 'qty',
                    name: 'qty'
                },
                {
                    data: 'status', 
                    name: 'status'
                },
                {
                    data: 'formatted_date', 
                    name: 'formatted_date'
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ],
            order: [
                [0, 'asc']
            ]
        });
    });

    
    //SIMPAN & UPDATE DATA DAN VALIDASI (SISI CLIENT)
    //jika id = form-tambah-edit panjangnya lebih dari 0 atau bisa dibilang terdapat data dalam form tersebut maka
    //jalankan jquery validator terhadap setiap inputan dll dan eksekusi script ajax untuk simpan data
    if ($("#form-tambah").length > 0) {
        $("#form-tambah-edit").validate({
            submitHandler: function (form) {
                var actionType = $('#tombol-simpan').val();
                $('#tombol-simpan').html('Sending..');

                $.ajax({
                    data: $('#form-tambah-edit')
                        .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                    url: "{{ route('coba_masuk.index') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                    dataType: 'json', //data tipe kita kirim berupa JSON
                    success: function (data) { //jika berhasil 
                        $('#form-tambah-edit').trigger("reset"); //form reset
                        $('#tambah-edit-modal').modal('hide'); //modal hide
                        $('#tombol-simpan').html('Simpan'); //tombol simpan
                        var oTable = $('#table_masuk').dataTable(); //inialisasi datatable
                        oTable.fnDraw(false); //reset datatable
                        iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                            title: 'Data Berhasil Disimpan',
                            message: '{{ Session('
                            success ')}}',
                            position: 'bottomRight'
                        });
                        location.reload ()
                    },
                    error: function (data) { //jika error tampilkan error pada console
                        $('#tombol-simpan').html('Simpan');
                    }
                });
            }
        })
    }

    if ($("#form-tambah-edit").length > 0) {
        $("#form-tambah-edit").validate({
            submitHandler: function (form) {
                var actionType = $('#tombol-simpan').val();
                $('#tombol-simpan').html('Sending..');

                $.ajax({
                    data: $('#form-tambah-edit')
                        .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                    // url: "{{ route('coba_masuk.index') }}", //url simpan data
                    type: "POST", //karena simpan kita pakai method POST
                   dataType: 'json', //data tipe kita kirim berupa JSON
                    success: function (data) { //jika berhasil 
                        $('#edit-tambah').trigger("reset"); //form reset
                        $('#tambah-edit-modal').modal('hide'); //modal hide
                        $('#tombol-simpan').html('Simpan'); //tombol simpan
                        var oTable = $('#table_masuk').dataTable(); //inialisasi datatable
                        oTable.fnDraw(false); //reset datatable
                        iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                            title: 'Data Berhasil Diedit',
                            message: '{{ Session('
                            success ')}}',
                            position: 'bottomRight'
                        });
                        location.reload ()
                    },
                    error: function (data) { //jika error tampilkan error pada console
                        $('#tombol-simpan').html('Simpan');
                    }
                });
            }
        })
    }

  
    //TOMBOL EDIT DATA PER produk_masuk DAN TAMPIKAN DATA BERDASARKAN ID produk_masuk KE MODAL

    $(document).on('click', '.edit', function () {
        var data_id = $(this).data('id');
        $.get('coba_masuk/' + data_id + '/edit', function (data) {
            console.log(data);
            $('#modal-judul').html("Edit Post");
            $('#tombol-simpan').val("edit-post");
            $('#tambah-edit-modal').modal('show');
          
        
            //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas               
            $('#id_produkmasuk').val(data.id_produkmasuk);
            // $("#dataproduk_id > [value="+data.dataproduk_id+"]").attr("selected", "true");
            $('#qty').val(data.qty);
            $('#dataproduk_id').val(data.dataproduk_id);
        })
    });

  
    function editForm(id) {
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#modal-form form')[0].reset();
            $.ajax({
                url: "{{ url('coba_produk') }}" + '/' + id + "/edit",
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#tambah-edit-modal').modal('show');
                    
                    $('#modal-judul').text('Edit Products');

                    $('#id_produkmasuk').val(data.id);
                    $('#qty').val(data.qty);
                    $('#dataproduk_id').val(data.dataproduk_id);
        
                  
                },
                error : function() {
                    alert("Nothing Data");
                }
            });
        }

      


    //jika klik class delete (yang ada pada tombol delete) maka tampilkan modal konfirmasi hapus maka
    $(document).on('click', '.delete', function () {
        dataId = $(this).attr('id');
        $('#konfirmasi-modal').modal('show');
    });

    //jika tombol hapus pada modal konfirmasi di klik maka
    $('#tombol-hapus').click(function () {
        $.ajax({
            url: "coba_masuk/" + dataId, //eksekusi ajax ke url ini
            type: 'delete',
            beforeSend: function () {
                $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
            },
            success: function (data) { //jika sukses
                setTimeout(function () {
                    $('#konfirmasi-modal').modal('hide'); //sembunyikan konfirmasi modal
                    var oTable = $('#table_masuk').dataTable();
                    oTable.fnDraw(false); //reset datatable
                });
                iziToast.warning({ //tampilkan izitoast warning
                    title: 'Data Berhasil Dihapus',
                    message: '{{ Session('
                    delete ')}}',
                    position: 'bottomRight'
                });
            }
        })
    });


</script>
@endsection
</html>
