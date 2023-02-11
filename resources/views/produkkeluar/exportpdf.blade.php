<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="shortcut icon"  href="{{ asset('images/RMA-logo.jpg') }}"  width="86" height="40">
    <title>Cetak produk keluar</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

</head>
<body>
  

    <style>
        div.a {
            text-align: center;

        }
        </style>
        
        
        <div class="a">
            <img src="{{ base_path() }}/public/icons/RMA-logo.jpg" type="image/x-icon" align="right" alt="logo" width="120" height="125"/>
           <h2 text-align: center ><u>Laporan Produk keluar</u></h2> 
      
        
        <p>Daftar Produk Keluar</p>
       

  </div>
        </div>
      
        
    <table id="table_keluar" width="100%">
        <thead>
        <tr>
            
            <td>No</td>
            <td>Kode produk keluar</td>
            <td>Part No</td>
            <td>Part Name</td>
            <td>uom</td>
            <td>qty</td>
        </tr>
        </thead>
        @foreach($produk_keluar as $c)
            <tbody>
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ $c->kode_produkkeluar}} 
                <td>{{ $c->data_produk->part_no}}    
                <td>{{ $c->data_produk->part_name}}    
                <td>{{ $c->uom }}</td>
                <td>{{ $c->qty}}</td>
         
            </tr>
            </tbody>

            
        @endforeach
    
    </table>


    <style>
         #table_keluar {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #table_keluar td, #table_keluar th {
        border: 1px solid rgb(85, 78, 78);
        padding: 8px;
    }

    #table_keluar tr:nth-child(even){background-color: #e8eae9;}

    #table_keluar tr:hover {background-color: rgb(218, 192, 192);}

    #table_keluar th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: rgb(191, 186, 186);
    }
    </style>


  
    

</div>
</div>
</div>
        <!--section end-->
      
    </body>
    </html>