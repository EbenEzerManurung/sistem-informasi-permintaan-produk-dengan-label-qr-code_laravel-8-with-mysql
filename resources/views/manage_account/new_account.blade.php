@extends('templates/main')
@section('css')
<link rel="stylesheet" href="{{ asset('css/manage_account/new_account/style.css') }}">

@endsection
@section('content')
<div class="row page-title-header">
	<div class="col-12">
	<div class="page-header d-flex justify-content-start align-items-center">
	<div class="quick-link-wrapper d-md-flex flex-md-wrap">
		<ul class="quick-links">
		<li><a href="{{ url('account') }}">Daftar Akun</a></li>
		<li><a href="{{ url('account/new') }}">Akun Baru</a></li>
		</ul>
	</div>
	</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card card-noborder b-radius">
			<div class="card-body">

				
				<form action="{{ url('account/create') }}" method="post" name="create_form" enctype="multipart/form-data">
				  @csrf
				  <div class="form-group row">
				    <label class="col-12 font-weight-bold col-form-label">Foto Profil</label>
				    <div class="col-12 d-flex flex-row align-items-center mt-2 mb-2">
				    	<img src="{{ asset('pictures/default.jpg') }}" class="default-img mr-4" id="preview-foto">
				    	<div class="btn-action">
				    		<input type="file" name="foto" id="foto" hidden="">
				    		<button class="btn btn-sm upload-btn mr-1" type="button">Upload Foto</button>
				    		<button class="btn btn-sm delete-btn" type="button">Hapus</button>
				    	</div>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Nama <span class="text-danger">*</span></label>
				  	<div class="col-12">
				  		<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
				  	</div>
				  	<div class="col-12 error-notice" id="nama_error"></div>
				  </div>
				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Email <span class="text-danger">*</span></label>
				  	<div class="col-12">
				  		<input type="email" class="form-control" name="email" placeholder="Masukkan Email">
				  	</div>
				  	<div class="col-12 error-notice" id="email_error"></div>
				  </div>
				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Username <span class="text-danger">*</span></label>
				  	<div class="col-12">
				  		<input type="text" class="form-control" name="username" placeholder="Masukkan Username">
				  	</div>
				  	<div class="col-12 error-notice" id="username_error"></div>
				  </div>
				  {{-- <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Password <span class="text-danger">*</span></label>
	
						
				  		<input type="password" class="form-control" id= "password" name="password" placeholder="Masukkan Password">
				  	<div class="col-12 error-notice" id="password_error"></div>
			
			
				<!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
				<span id="mybutton" onclick="change()" class="input-group-text">

				 <!-- icon mata bawaan bootstrap  -->
				 <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor"
					 xmlns="http://www.w3.org/2000/svg">
					 <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
					 <path fill-rule="evenodd"
						 d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
				 </svg>
				</span>
					</div> --}}


				  
		 <div class="form-group">
                    <label class="label">Password</label>
                    <div class="input-group">
                      <input type="password" id="password" class="form-control" name="password" placeholder="*********" >
                      <div class="input-group-append">
                        <span class="input-group-text check-value" id="password_error"></span>
                       
                      </div>
                       <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                       <span id="mybutton" onclick="change()" class="input-group-text">
    
                        <!-- icon mata bawaan bootstrap  -->
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg>
                       </span>
                    </div>
		 </div>


				  <div class="form-group row">
				  	<label class="col-12 font-weight-bold col-form-label">Posisi <span class="text-danger">*</span></label>
				  	<div class="col-12">
				  		<select class="form-control" name="role">
				  			<option value="">-- Pilih Posisi --</option>
				  			<option value="admin">Admin</option>
							  <option value="ppic">PPIC</option>  
							  <option value="produksi">produksi</option>
							  <option value="warehousefg">warehouseFG</option>
			
                   
				  		</select>
				  	</div>
				  	<div class="col-12 error-notice" id="role_error"></div>
				  </div>
				  <div class="row mt-5">
				  	<div class="col-12 d-flex justify-content-end">
				  		<button class="btn simpan-btn btn-sm" type="submit"><i class="mdi mdi-content-save"></i> Simpan</button>
				  	</div>
				  </div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/manage_account/new_account/script.js') }}"></script>
<script>
	// membuat fungsi change
	function change() {
  
		// membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
		var x = document.getElementById('password').type;
  
		//membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
		if (x == 'password') {
  
			//ubah form input password menjadi text
			document.getElementById('password').type = 'text';
			
			//ubah icon mata terbuka menjadi tertutup
			document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
															<path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
															<path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
															<path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
															</svg>`;
		}
		else {
  
			//ubah form input password menjadi text
			document.getElementById('password').type = 'password';
  
			//ubah icon mata terbuka menjadi tertutup
			document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
															<path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
															<path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
															</svg>`;
		}
	}
  </script>
<script type="text/javascript">
	@if ($message = Session::get('both_error'))
	  swal(
		"",
		"{{ $message }}",
		"error"
	  );
	@endif

	@if ($message = Session::get('username_error'))
	  swal(
		"",
		"{{ $message }}",
		"error"
	  );
	@endif

	@if ($message = Session::get('email_error'))
	  swal(
		"",
		"{{ $message }}",
		"error"
	  );
	@endif

	$(document).on('click', '.delete-btn', function(){
		$("#preview-foto").attr("src", "{{ asset('pictures') }}/default.jpg");
	});
</script>
@endsection
