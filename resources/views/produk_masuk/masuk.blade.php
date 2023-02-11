<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

</head>
  <style>
  .alert-message {
    color: red;
  }
</style>
<body>

<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-success">Ajax CRUD with Laravel App -
       <a href="https://www.codingdriver.com" target="_blank" >CodingDriver</a>
     </h2><br>
     <div class="row">
       <div class="col-12 text-right">
         <a href="javascript:void(0)" class="btn btn-success mb-3" id="create-new-post" onclick="addPost()">Add Post</a>
       </div>
    </div>
    <div class="row" style="clear: both;margin-top: 18px;">
        <div class="col-12">
          <table id="laravel_crud" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>kode_produkmasuk</th>
                    <th>qty</th>
                    <th>uom</th>
                    <th>status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $masuk)
 
                   <td>{{ $masuk->kode_produkmasuk  }}</td>
                   <td>{{ $masuk->qty }}</td>
                   <td>{{ $masuk->uom }}</td>
                   <td>{{ $masuk->status }}</td>
                   <td><a href="javascript:void(0)" data-id="{{ $masuk->id_produkmasuk }}" onclick="editPost(event.target)" class="btn btn-info">Edit</a></td>
                   <td>
                    <a href="javascript:void(0)" data-id="{{ $masuk->id_produkmasuk }}" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
          </table>
       </div>
    </div>
</div>

<div class="modal fade" id="post-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title"></h4>
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
                                    @foreach ($posts as $data)
                                    <option value="{{ $data->id_dataproduk }}">{{ $data->part_name }}</option>
                                    @endforeach
                                </select>
                                </div>
                        </div>
                        </div>
                  <div class="form-group">
                      <label class="col-sm-2">qty</label>
                      <div class="col-sm-12">
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="input qty">
                
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
</body>

<script>
    $('#laravel_crud').DataTable();
  
    function addPost() {
      $("#post_id").val('');
      $('#post-modal').modal('show');
    }
  
    function editPost(event) {
      var id  = $(event).data("id");
      let _url = `/posts/${id}`;
      $('#titleError').text('');
      $('#descriptionError').text('');
      
      $.ajax({
        url: _url,
        type: "GET",
        success: function(response) {
            if(response) {
              $("#post_id").val(response.id_produkmasuk);
              $("#id_produkmasuk").val(response.id_produkmasuk);
              $("#qty").val(response.qty);
              $('#post-modal').modal('show');
            }
        }
      });
    }
  
    function createPost() {
      var id_dataproduk = $('#id_dataproduk').val();
      var qty = $('#qty').val();
      var id = $('#post_id').val();
  
      let _url     = `/posts`;
      let _token   = $('meta[name="csrf-token"]').attr('content');
  
        $.ajax({
          url: _url,
          type: "POST",
          data: {
            id: id,
           id_dataproduk: id_produkmasuk,
          qty: qty,
            _token: _token
          },
          success: function(response) {
              if(response.code == 200) {
                if(id != ""){
                  $("#row_"+id+" td:nth-child(2)").html(response.data.id_dataproduk);
                  $("#row_"+id+" td:nth-child(3)").html(response.data.qty);
                } else {
                  $('table tbody').prepend('<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.id_dataproduk+'</td><td>'+response.data.qty+'</td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editPost(event.target)" class="btn btn-info">Edit</a></td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td></tr>');
                }
                $('#id_dataproduk').val('');
                $('#qty').val('');
  
                $('#post-modal').modal('hide');
              }
          },
          error: function(response) {
            $('#titleError').text(response.responseJSON.errors.id_dataproduk);
            $('#descriptionError').text(response.responseJSON.errors.qty);
          }
        });
    }
  
    function deletePost(event) {
      var id  = $(event).data("id");
      let _url = `/posts/${id}`;
      let _token   = $('meta[name="csrf-token"]').attr('content');
  
        $.ajax({
          url: _url,
          type: 'DELETE',
          data: {
            _token: _token
          },
          success: function(response) {
            $("#row_"+id).remove();
          }
        });
    }
  
  </script>
</html>