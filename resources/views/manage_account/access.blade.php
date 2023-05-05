@extends('templates/main')
@section('css')
<link rel="stylesheet" href="{{ asset('css/manage_account/access/style.css') }}">

<!-- PWA  -->
<meta name="theme-color" content="#56e890"/>
<link rel="apple-touch-icon" href="{{ asset('RMA-logo.jpg') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">
@endsection
@section('content')
<div class="row page-title-header">
  <div class="col-12">
    <div class="page-header d-flex justify-content-between align-items-center row">
      <h4 class="page-title col-8">Hak Akses</h4>
      <div class="input-group big-search col-4 text-right">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="mdi mdi-magnify search-icon"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-lg mr-2" name="search" placeholder="Cari data">
      </div>
      <div class="dropdown small-search col-4 text-right" hidden="">
        <button class="btn btn-icons btn-inverse-primary btn-new shadow-sm mr-2" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="mdi mdi-magnify"></i>
        </button>
        <div class="dropdown-menu search-dropdown" aria-labelledby="dropdownMenuIconButton1">
          <div class="row">
            <div class="col-11">
              <input type="text" class="form-control" name="search" placeholder="Cari data">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card card-noborder b-radius">
      <div class="card-body">
        <div class="row">
        	<div class="col-12 table-responsive">
        		<table class="table table-custom">
              <thead>
                <tr>
                  <th width="84">Nama</th>
                  <th width="152" class="text-center b-left">Kelola Akun</th>
                <th width="197" class="text-center b-left">Mengimport permintaan produk</th>
                  <th width="206" class="text-center b-left">permintaan produksi</th>
                  <th width="206" class="text-center b-left">Data produk</th>
                  <th width="164" class="text-center b-left">produk masuk</th>
                  <th width="168" class="text-center b-left">Validasi produk keluar</th>
                  <th width="168" class="text-center b-left">Mencetak label QR Code</th>
                  <th width="168" class="text-center b-left">Laporan produk keluar</th>
				        	
                </tr>
              </thead>
              <tbody>
                @foreach($access as $user)
              	<tr>
                    <td height="256">
                    <span class="d-flex justify-content-start align-items-center">
                      <img src="{{ asset('pictures/' . $user->foto) }}">
                      <span class="ml-2">
                        <span class="d-block mb-1">{{ $user->nama }}</span>
                        <span class="txt-user-desc">{{ $user->role }} <i class="mdi mdi-checkbox-blank-circle dot"></i> {{ $user->email }}</span>
                      </span>
                    </span>
                  </td>
                  <td class="text-center b-left" data-access="kelola_akun" data-user="{{ $user->user }}" data-role="{{ $user->role }}">
                    @if($user->kelola_akun == 1)
                    <div class="btn-checkbox btn-access">
                        <i class="mdi mdi-checkbox-marked"></i>
                    </div>
                    @else
                    <div class="btn-checkbox btn-non-access">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                    </div>
                    @endif
                  </td>

                  <td class="text-center b-left" data-access="permintaan_produk" data-user="{{ $user->user }}" data-role="{{ $user->role }}">
                    @if($user->permintaan_produk == 1)
                    <div class="btn-checkbox btn-access">
                        <i class="mdi mdi-checkbox-marked"></i>
                    </div>
                    @else
                    <div class="btn-checkbox btn-non-access">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                    </div>
                    @endif
                  </td>
                  <td class="text-center b-left" data-access="permintaan_produksi" data-user="{{ $user->user }}" data-role="{{ $user->role }}">
                    @if($user->permintaan_produksi == 1)
                    <div class="btn-checkbox btn-access">
                        <i class="mdi mdi-checkbox-marked"></i>
                    </div>
                    @else
                    <div class="btn-checkbox btn-non-access">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                    </div>
                    @endif
                  </td>
                  <td class="text-center b-left" data-access="data_produk" data-user="{{ $user->user }}" data-role="{{ $user->role }}">
                    @if($user->data_produk == 1)
                    <div class="btn-checkbox btn-access">
                        <i class="mdi mdi-checkbox-marked"></i>
                    </div>
                    @else
                    <div class="btn-checkbox btn-non-access">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                    </div>
                    @endif
                  </td>

                  <td class="text-center b-left" data-access="produk_masuk" data-user="{{ $user->user }}" data-role="{{ $user->role }}">
                    @if($user->produk_masuk == 1)
                    <div class="btn-checkbox btn-access">
                        <i class="mdi mdi-checkbox-marked"></i>
                    </div>
                    @else
                    <div class="btn-checkbox btn-non-access">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                    </div>
                    @endif
                  </td>
                  <td class="text-center b-left" data-access="validasi" data-user="{{ $user->user }}" data-role="{{ $user->role }}">
                    @if($user->validasi == 1)
                    <div class="btn-checkbox btn-access">
                        <i class="mdi mdi-checkbox-marked"></i>
                    </div>
                    @else
                    <div class="btn-checkbox btn-non-access">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                    </div>
                    @endif
                  </td>
                    <td class="text-center b-left" data-access="mencetak_label" data-user="{{ $user->user }}" data-role="{{ $user->role }}">
                    @if($user->mencetak_label == 1)
                    <div class="btn-checkbox btn-access">
                        <i class="mdi mdi-checkbox-marked"></i>
                    </div>
                    @else
                    <div class="btn-checkbox btn-non-access">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                    </div>
                    @endif
                  </td>
                  <td class="text-center b-left" data-access="produk_keluar" data-user="{{ $user->user }}" data-role="{{ $user->role }}">
                    @if($user->produk_keluar == 1)
                    <div class="btn-checkbox btn-access">
                        <i class="mdi mdi-checkbox-marked"></i>
                    </div>
                    @else
                    <div class="btn-checkbox btn-non-access">
                        <i class="mdi mdi-checkbox-blank-outline"></i>
                    </div>
                    @endif
                  </td>
                @endforeach
            </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/manage_account/access/script.js') }}"></script>
<script type="text/javascript">
  function refreshNav(){
    $.ajax({
      url: "{{ url('/access/sidebar') }}",
      method: "GET",
      success:function(data){
        $('#sidebar').html(data);
      }
    });
  }

  $(document).on('click', '.btn-checkbox', function(){
    var data_access = $(this).parent().attr('data-access');
    var data_user = $(this).parent().attr('data-user');
    var data_role = $(this).parent().attr('data-role');
    if(data_role == 'admin'){
      swal({
        title: "Apa anda yakin?",
        text: "Program menyarankan untuk tidak mengubah hak akses admin",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Sedang diproses....", {
            buttons: false,
            timer: 1000,
          });
          $.ajax({
            url: "{{ url('/access/change') }}/" + data_user + '/' + data_access,
            method: "GET",
            success:function(data_1){
              var my_account = "{{ auth()->user()->id }}";
              $.ajax({
                url: "{{ url('/access/check') }}/" + my_account,
                method: "GET",
                success:function(data_2){
                  if(data_2 == 'benar'){
                    $('tbody').html(data_1);
                    refreshNav();
                  }else{
                    window.open("{{ url('/dashboard') }}", "_self");
                  }
                }
              });
            }
          });
        }
      });
    }else{
      swal("Sedang diproses....", {
        buttons: false,
        timer: 1000,
      });
      $.ajax({
        url: "{{ url('/access/change') }}/" + data_user + '/' + data_access,
        method: "GET",
        success:function(data_1){
          var my_account = "{{ auth()->user()->id }}";
          $.ajax({
            url: "{{ url('/access/check') }}/" + my_account,
            method: "GET",
            success:function(data_2){
              if(data_2 == 'benar'){
                $('tbody').html(data_1);
                refreshNav();
              }else{
                window.open("{{ url('/dashboard') }}", "_self");
              }
            }
          });
        }
      });
    }
  });
  <script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
@endsection
