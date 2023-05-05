@foreach($access as $user)
<!-- PWA  -->
<meta name="theme-color" content="#56e890"/>
<link rel="apple-touch-icon" href="{{ asset('RMA-logo.jpg') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">
<tr>
  <td>
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
  <td class="text-center b-left" data-access="Permintaan_produksi" data-user="{{ $user->user }}" data-role="{{ $user->role }}">
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
</tr>
<script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
@endforeach
