<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon"  href="{{ asset('images/RMA-logo.jpg') }}"  width="86" height="40">
    <title>Daftar data produk</title>
  
    
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

<body>

   
    <div class="row page-title-header">
      <div class="col-12">
        <div class="page-header d-flex justify-content-between align-items-center">
    
          <h4 class="page-title">Daftar Data Produk</h4>
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
            <div class="table-responsive">
      
            <table class="table table-striped table-bordered table-sm " id="table_produk">
            <thead>
            <tr>
                    <th>No</th>
                    <th>Order No</th>
                    <th>Part no</th>
                    <th>Part name</th>
                    <th>customer</th>
                </tr>
                </thead>
         @foreach($data_produk as $produk)
            <tbody>
              <td>{{$loop->iteration}}</td> 
              <td>{{ $produk->order_no}}</td>
            <td>{{ $produk->part_no}}</td>
            <td>{{ $produk->part_name }}</td>
            <td>{{ $produk->customer}}</td>
     

      
            </tbody>

        @endforeach
    </table>
    <br>
    {!! $data_produk->links() !!}
                  </tr>
                  
          </thead>
      </table>
      <br>
      <!-- AKHIR TABLE -->
      
        
       </div>
    </div>
  </div>
</div>



  



@endsection

@section('script')
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

