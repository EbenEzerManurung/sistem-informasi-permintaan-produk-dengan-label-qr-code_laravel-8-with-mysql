<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon"  href="{{ asset('images/RMA-logo.jpg') }}"  width="86" height="40">
  <title>Permintaan produk</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MULAI STYLE CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<!-- PWA  -->
<meta name="theme-color" content="#56e890"/>
<link rel="apple-touch-icon" href="{{ asset('RMA-logo.jpg') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">

    <!-- AKHIR STYLE CSS -->
    
    @extends('templates/main')
    @section('css')
    <link rel="stylesheet" href="{{ asset('css/manage_account/account/style.css') }}">
@endsection
@section('content')

</head>
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header d-flex justify-content-between align-items-center">

      <h4 class="page-title">Daftar Permintaan Produk</h4>
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
                <input type="text" class="form-control" name="search" placeholder="Cari permintaan produk">
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

  
     <!-- MULAI CONTAINER -->
     



{{-- notifikasi form validasi --}}
@if ($errors->has('file'))
<span class="invalid-feedback" role="alert">
<strong>{{ $errors->first('file') }}</strong>
</span>
@endif

{{-- notifikasi sukses --}}
@if ($sukses = Session::get('sukses'))
<div class="alert alert-success alert-block">
<button type="button" class="close" data-dismiss="alert">×</button>
<strong>{{ $sukses }}</strong>
</div>
@endif
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message')}}
        </div>
        @endif

         
      <div class="card-body">
        @if ($errors->any())
        <h5 style="color:red"> Terjadi kesalahan, perhatikan file Excel tersebut </h5>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    
@endif
</div> 

<div class="container">

    <div class="card">
        
        <div class="card-body">
     
        <a href="button" class="btn btn-primary " data-toggle="modal" data-target="#importExcel"><span class="mdi mdi-file-document">IMPORT EXCEL</span></a>
            <br>
            
           
<br>
<!-- Import Excel -->
<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<form method="post" action="/permintaan/import_excel" enctype="multipart/form-data">
<div class="modal-content">
<div class="modal-header">
<h5 class="text-center" id="exampleModalLabel"> Import Excel</h5>
</div>

<div class="modal-body">
{{ csrf_field() }}
<label>Pilih file excel</label>
<div class="form-group">
<input type="file" name="file" accept=".xlsx" required="required">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary">Import</button>
</div>
</div>
</form>
</div>
</div>
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-sm" >
                <thead>
                    <tr>
	
                      <th><b>No</th>
                      <th><b>Order No.</th>
                        <th><b>Part No.</th>
        <th><b>Part Name</th>
        <th><b>Customer</th>
        <th><b>Qty</th>	
        <th><b>Uom</th>	
        <th><b>Date</th>
        <th><b>Description</th>
	</tr>
	</thead>
	<tbody>
	
	@foreach($permintaan_produk as $s)


	<tr>
                  <td>{{$s->id}}</td>
                  <td>{{$s->order_no}}</td>
                 <td>{{$s->part_no}}</td>
                 <td>{{$s->part_name}}</td>
                 <td>{{$s->customer}}</td>
                  <td>{{$s->qty}}</td>
                  <td>{{$s->uom}}</td>
                  <td>{{$s->date}}</td>		
                  <td>
                @if($s->status == 'waiting')
                <i class="bi btn-warning bi-exclamation-circle-fill">Belum Terpenuhi</i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle-fill " viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg>
                @else
                <i class="bi btn-success position-relative bi-check-circle primary">Sudah Terpenuhi</i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
</svg>
                          @endif
                        </td>		
	</tr>
	@endforeach
	</tbody>
	</table>
	<br>
	
        {!! $permintaan_produk->links() !!}
       </div>
    </div>
  </div>
</div>

<!--form input permintaan produksi-->
<div class="modal fade" id="post-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <form name="userForm" class="form-horizontal">
               <input type="hidden" name="post_id" id="post_id">
                <div class="form-group">
                    <label for="name" class="col-sm-2">pic</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="pic" name="pic" placeholder="Enter pic">
                        <span id="titleError" class="alert-message"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2">Description</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" id="description" name="description" placeholder="Enter description" rows="4" cols="50">
                        </textarea>
                        <span id="descriptionError" class="alert-message"></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="createPost()">Save</button>
        </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

<!-- AKHIR MODAL -->




@endsection
@section('script')
<script>
  $('#laravel_crud').DataTable();

  function addPost() {
    $("#post_id").val('');
    $('#post-modal').modal('show');
  }
  function createPost() {
      var pic = $('#pic').val();
      var description = $('#description').val();
      var id = $('#post_id').val();
  
      let _url     = `/posts`;
      let _token   = $('meta[name="csrf-token"]').attr('content');
  
        $.ajax({
          url: _url,
          type: "POST",
          data: {
            id: id,
            pic: pic,
            description: description,
            _token: _token
          },
          success: function(response) {
              if(response.code == 200) {
                if(id != ""){
                  $("#row_"+id+" td:nth-child(2)").html(response.data.pic);
                  $("#row_"+id+" td:nth-child(3)").html(response.data.description);
                } else {
                  $('table tbody').prepend('<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.title+'</td><td>'+response.data.description+'</td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editPost(event.target)" class="btn btn-info">Edit</a></td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td></tr>');
                }
                $('#pic').val('');
                $('#description').val('');
  
                $('#post-modal').modal('hide');
              }
          },
          error: function(response) {
            $('#titleError').text(response.responseJSON.errors.title);
            $('#descriptionError').text(response.responseJSON.errors.description);
          }
        });
    }
  </script>

<script src="{{ asset('plugins/js/quagga.min.js') }}"></script>
<script src="{{ asset('js/manage_account/account/script.js') }}"></script>

<script type="text/javascript">
  <!-- LIBARARY JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>

<script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
    integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>

    </script>
    <script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
@endsection
</html>


	

