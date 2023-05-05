<a href="#" class="nav-link"><br>
  <!-- PWA  -->
<meta name="theme-color" content="#6777ef"/>
<link rel="apple-touch-icon" href="{{ asset('RMA-logo.jpg') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">
  </a>
<ul class="nav">
  <li class="nav-item nav-profile"><a href="#" class="nav-link">
    <div class="profile-image">
      <div class="dot-indicator bg-success"></div>
    </div>
      <br />
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
    <a class="nav-link active" href="{{ url('/dashboard') }}">
      <span class="menu-title">Dashboard</span>
    </a>
  </li>


  @php
  $access = \App\Acces::where('user', auth()->user()->id)
  ->first();s
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
  @if($access->permintaan_produksi == 1)
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/permintaan') }}">
      <span class="menu-title">Permintaan produksi</span>
    </a>
  </li>
  @endif
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
  @if($access->validasi_keluar == 1)
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/validasi') }}">
                    <span class="menu-title">Validasi Produk keluar</span>
                  </a>
                </li>
                @endif
  @if($access->mencetak_label== 1)
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/mencetak_label') }}">
      <span class="menu-title"> Mencetak label QR Code</span>
    </a>
  </li>
  @endif
  @if($access->produk_keluar == 1)
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/produk_keluar') }}">
      <span class="menu-title"> Mengelola Laporan produkkeluar</span>
    </a>
  </li>
  <script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
  @endif
 


