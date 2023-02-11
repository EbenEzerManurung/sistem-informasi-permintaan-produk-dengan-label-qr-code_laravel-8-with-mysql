<div class="p2">
    <div class="form-group">
        <input type="text" name="id_dataproduk" id="id_dataproduk" value="{{ $data->id_dataproduk }}" class="form-control"
            placeholder="name product">
    </div>
    <div class="form-group">
        <input type="text" name="qty" id="qty" value="{{ $data->qty }}" class="form-control"
            placeholder="name product">
    </div>
    
    <div class="form-group mt-2">
        <button class="btn btn-warning" onClick="update({{ $data->id_produkmasuk }})">Update</button>
    </div>
</div>
