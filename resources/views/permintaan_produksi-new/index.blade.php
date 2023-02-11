<!DOCTYPE html>
<html>

  <head>
    <link rel="shortcut icon"  href="{{ asset('images/RMA-logo.jpg') }}"  width="86" height="40">
    <title>permintaan produksi </title>


    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- MULAI STYLE CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


    <!-- AKHIR STYLE CSS -->
    
   <!-- AKHIR STYLE CSS -->
    
   @extends('templates/main')
   @section('css')
   <link rel="stylesheet" href="{{ asset('css/manage_account/account/style.css') }}">
@endsection
@section('content')
<div class="row page-title-header">
 <div class="col-12">
   <div class="page-header d-flex justify-content-between align-items-center">

     <h4 class="page-title">Daftar Permintaan Produksi</h4>
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
               <input type="text" class="form-control" name="search" placeholder="Cari permintaan produksi">
             </div>
           </div>
         </div>
       </div>

     </div>
   </div>
 </div>
</div>
  

<div class="container">

  <div class="card">
      
      <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-sm" >
              <thead>
                  <tr>
                <th>No</th>
                <th>Plant area</th>
                <th>Shift</th>
                <th>Date</th>
                <th>Pic</th>
                <th>PART NO</th>
                <th>PART NAME</th>
                <th>Satuan</th>
                <th>Target plan</th>
                <th>Actual</th>
                
                <th>keterangan</th>
                <th>status</th>
            
                
                <th>Action</th>
                
            </tr>
        </thead>

        <tbody>
          {{-- //perhatikan nilai valuenya --}}
     
          @foreach($produk_masuky as $masuk)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$masuk->plant_area}}</td>
              <td>{{$masuk->shift}}</td>
              <td>{{$masuk->permintaan_produk->date}}</td>
              <td>{{$masuk->pic}}</td>
              <td>{{$masuk->permintaan_produk->part_no}}</td>
              <td>{{$masuk->permintaan_produk->part_name}}</td>
              <td>{{$masuk->permintaan_produk->uom}}</td>
              <td>{{$masuk->permintaan_produk->qty}}</td>
              <td>{{$masuk->actual}}</td>
              <td>{{$masuk->keterangan}}</td>
         
     
              <td>
                @if($masuk->status == 'waiting')
                 <label  class="btn btn-warning position-relative">Waiting....</label>
                @else
                <label class="btn btn-success position-relative" > Confirmed</label>
                          @endif
                        </td>
                    
                    <td>
                      <div class="btn-group dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </button>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                          @if($masuk->status == 'waiting')
                          <form action="/permintaan-update/{{$masuk->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <button class="dropdown-item" onclick="return confirm('Anda yakin data ini dikonfirmasi?')"> confirm
                            </button>
                          </form>
                          @endif
                            <form  class="pull-left"  method="post">
                       
        
                         
                          </form>
                          </div>
                        </div>
               
                        


            
            @endforeach
          </tbody>
          </table>
          <br>
          
             
               </div>
            </div>
          </div>
        </div>
<!-- AKHIR MODAL -->


@endsection
@section('script')
<script src="{{ asset('plugins/js/quagga.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/manage_account/account/style.css') }}">
<script type="text/javascript">
  @if ($message = Session::get('create_success'))
    swal(
        "Berhasil dikonfirmasi!",
        "{{ $message }}",
        "success"
    );
  @endif
  </script>
<script src="{{ asset('plugins/js/quagga.min.js') }}"></script>
<script src="{{ asset('js/manage_account/account/script.js') }}"></script>

<script type="text/javascript">
  <!-- LIBARARY JS -->
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
    </script>
@endsection
</html>

