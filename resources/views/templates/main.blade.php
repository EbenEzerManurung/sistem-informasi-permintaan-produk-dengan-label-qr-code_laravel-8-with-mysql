<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon"  href="{{ asset('images/RMA-logo.jpg') }}"  width="86" height="40">
    <title>Sistem informasi permintaan produk dengan label QR CODE</title>
        

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.addons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/RMA-logo.jpg') }}" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
    @yield('css')
    <!-- End-CSS -->
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('RMA-logo.jpg') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
  </head>
  <body>
    <div class="container-scroller">
      <!-- TopNav -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="{{ url('/dashboard') }}">
    <h1> PT RMA</h1>
        <img src="{{ asset('images/RMA-logo.jpg') }}" alt="logo" width="94" height="85" type="image/x-icon" /> </a>

        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <form class="search-form d-none d-md-block" action="#">
            <div class="form-group">
              <input type="search" class="form-control" name="search_page" placeholder="Cari Halaman">
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              
              <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                
                 
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                <div class="dropdown-item py-3 border-bottom">
                  
                  <p class="mb-0 font-weight-medium float-left">Anda Memiliki 0 Pemberitahuan</p>
                  
                  <a href="#" role="button" data-toggle="modal" data-target="#notificationModal"><span class="badge badge-pill badge-primary float-right">Semua</span></a>
                </div>
              
                
              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="{{ asset('pictures/' . auth()->user()->foto) }}" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="{{ asset('pictures/' . auth()->user()->foto) }}" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold">{{ auth()->user()->nama }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ auth()->user()->email }}</p>
                </div>
                <a href="{{ url('/profile') }}" class="dropdown-item">Profil</a>
                <a href="{{ url('/logout') }}" class="dropdown-item">Sign Out</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- End-TopNav -->

      <div class="container-fluid page-body-wrapper">
        <!-- SideNav -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="{{ url('/profile') }}" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{ asset('pictures/' . auth()->user()->foto) }}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  @php
                  $user_name = auth()->user()->nama;
                  if(strlen($user_name) > 12){
                    $nama = substr($user_name, 0, 12) . '..';
                  }else{
                    $nama = $user_name;
                  }
                  @endphp
                  <p class="profile-name">{{ $nama }}</p>
                  <p class="designation">{{ auth()->user()->role }}</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Daftar Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/dashboard') }}">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            @php
            $access = \App\Acces::where('user', auth()->user()->id)
            ->first();
            @endphp
           
            
            @if($access->kelola_akun == 1)
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#kelola_akun" aria-expanded="false" aria-controls="kelola_akun">
                <span class="menu-title">Kelola Akun</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="kelola_akun">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/account') }}">Daftar Akun</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ url('/access') }}">Hak Akses</a>
                  </li>
                </ul>
              </div>
            </li>
            @endif
           

           @if($access->permintaan_produk == 1)
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/permintaan_produk') }}">
                <span class="menu-title">Mengimport permintaan produk</span>
              </a>
            </li>
            @endif
         {{-- @if($access->permintaan_produksi == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/permintaan_produksi') }}">
                  <span class="menu-title">Permintaan produksi</span>
                </a>
              </li>
            @endif --}}
            @if($access->formpermintaan_produksi == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/permintaan-tambah') }}">
                  <span class="menu-title">Menginput Permintaan produksi</span>
                </a>
              </li>
            @endif
            @if($access->formpermintaan_produksi == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/permintaan-produksi') }}">
                  <span class="menu-title">Data Permintaan produksi</span>
                </a>
              </li>
            @endif
            @if($access->permintaan_produksi == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/permintaan-index') }}">
                  <span class="menu-title">Menerima Permintaan produksi</span>
                </a>
              </li>
            @endif
            {{-- @if($access->permintaan_produksi == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/permintaan-index') }}">
                  <span class="menu-title">Daftar Permintaan Produksi</span>
                </a>
              </li>
            @endif --}}

            @if($access->data_produk == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/data_produk') }}">
                  <span class="menu-title"> Data produk</span>
                </a>
              </li>
           @endif
           
       @if($access->produk_masuk == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/produkmasuk') }}">
                  <span class="menu-title"> Produk masuk</span>
                </a>
              </li>
           @endif
                
              
                @if($access->validasi == 1)
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/validasi') }}">
                    <span class="menu-title">Validasi Produk keluar</span>
                  </a>
                </li>
                @endif

                @if($access->mencetak_label == 1)
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/cetak_label') }}">
                    <span class="menu-title">Mencetak label qr code</span>
                  </a>
                </li>
                @endif

          

            @if($access->produk_keluar== 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/produk_keluar') }}">
                  <span class="menu-title">Mengelola Laporan <br>Produk keluar</span>
                </a>
              </li>
              @endif
              


          </ul>
        </nav>
        <!-- End-SideNav -->

        <div class="main-panel">
          <div class="row">
            <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="notificationModalLabel">Daftar Notifikasi</h5>

                    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      
                    </button>
                    
                  </div>
                  
                  <div class="modal-body">
                    <div class="row">
                      
                      <div class="col-12">
                        
                        {{-- <div class="modal-body">
                          <p>Modal body text goes here.</p>
                        </div>
                        <div class="float-right">
                          <p class="mb-0 text-right">Permintaan produk</p>
                          <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{\App\permintaan_produk::count()}}</h3>
                          
                          </div>
                        </div> --}}
                          {{--  @foreach($notifications as $notif)
                          @if($notif->qty != 0)
                          <div class="d-flex justify-content-start align-items-center mb-3">
                            <div class="icon-notification">
                              <i class="mdi mdi-alert m-auto text-warning"></i>
                            </div>
                            <div class="text-group ml-3">
                              <p class="m-0 title-notification">Barang Hampir Habis</p>
                              <p class="m-0 description-notification">qty {{ $notif->part_name }} tersisa {{ $notif->qty }}</p>
                            </div>
                          </div>
                          @else
                          <div class="d-flex justify-content-start align-items-center mb-3">
                            <div class="icon-notification">
                              <i class="mdi mdi-alert m-auto text-danger"></i>
                            </div>
                            <div class="text-group ml-3">
                              <p class="m-0 title-notification">Barang Telah Habis</p>
                              <p class="m-0 description-notification">qty barang {{ $notif->part_name }} telah habis</p>
                            </div>
                          </div>
                          @endif
                          @endforeach  --}}

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="content-wrapper" id="content-web-page">
            @yield('content')
          </div>
          <div class="content-wrapper" id="content-web-search" hidden="">
            <div class="row">
              <div class="col-12 text-left">
                <h3 class="d-block">Cari Halaman</h3>
                <h5 class="mt-3 d-block"><span class="result-1"></span> <span class="result-2"></span></h5>
              </div>
              <div class="col-12 mt-3">
                <div class="row" id="page-result-parent">
                </div>
              </div>
            </div>
          </div>
          <footer class="footer" id="footer-content">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-center d-sm-inline-block">Copyright © Eben Nezer Manurung© {{date('Y')}} </span>

              </span>
            </div>
          </footer>
        </div>
      </div>
    </div>

    <!-- Javascript -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <script src="{{ asset('assets/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('js//jquery-3.6.0.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">  </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/shared/misc.js') }}"></script>
    <script src="{{ asset('plugins/js/jquery.form-validator.min.js') }}"></script>
    <script src="{{ asset('plugins/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('plugins/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/templates/script.js') }}"></script>
    <script type="text/javascript">
      $(document).on('input', 'input[name=search_page]', function(){
        if($(this).val() != ''){
          $('#content-web-page').prop('hidden', true);
          $('#content-web-search').prop('hidden', false);
          var search_word = $(this).val();
          $.ajax({
            url: "{{ url('/search') }}/" + search_word,
            method: "GET",
            success:function(response){
              $('.result-1').html(response.length + ' Hasil Pencarian');
              $('.result-2').html('dari "' + search_word + '"');
              var lengthLoop = response.length - 1;
              var searchResultList = '';
              for(var i = 0; i <= lengthLoop; i++){
                var page_url = "{{ url('/', ':id') }}";
                page_url = page_url.replace('%3Aid', response[i].page_url);
                searchResultList += '<a href="'+ page_url +'" class="page-result-child mb-4 w-100"><div class="col-12"><div class="card card-noborder b-radius"><div class="card-body"><div class="row"><div class="col-12"><h5 class="d-block page_url">'+ response[i].page_name +'</h5><p class="align-items-center d-flex justify-content-start"><span class="icon-in-search mr-2"><i class="mdi mdi-chevron-double-right"></i></span> <span class="breadcrumbs-search page_url">'+ response[i].page_title +'</span></p><div class="search-description"><p class="m-0 p-0 page_url">'+ response[i].page_content.substring(0, 500) +'...</p></div></div></div></div></div></div></a>';
              }
              $('#page-result-parent').html(searchResultList);
              $('.page_url:contains("'+search_word+'")').each(function(){
                  var regex = new RegExp(search_word, 'gi');
                  $(this).html($(this).text().replace(regex, '<span style="background-color: #607df3;">'+search_word+'</span>'));
              });
            }
          });
        }else{
          $('#content-web-page').prop('hidden', false);
          $('#content-web-search').prop('hidden', true);
        }
      });
    </script>
    @yield('script')
    <script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
<script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
    <!-- End-Javascript -->
  </body>
</html>
