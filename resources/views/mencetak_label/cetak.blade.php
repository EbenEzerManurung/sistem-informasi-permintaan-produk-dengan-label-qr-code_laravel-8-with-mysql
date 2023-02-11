
             
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                       
                        
    <link rel="shortcut icon"  href="{{ asset('images/RMA-logo.jpg') }}"  width="86" height="40">
    <title>Cetak LABEL QR CODE</title>
                    
                        <style>
                            .text-center {
                                text-align: center;
                            }
                        </style>
                    </head>
                    <body>
                        <div class="card-body">
                     
                        <table width="100%">
                            <tr>
                                
                               
                                <td class="text-center" style="border: 2px solid rgb(0, 0, 0);">
                                   <br>
                                   <p> <h3>LABEL QR CODE</h3>
                                    <br>
                                    <br>
                                    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($permintaan_produk->order_no,
                                     'QRCODE')}}" 
     
                                    width="200"
                                    height="130">

                                    <p>  ORDER NO:  {{ $permintaan_produk->order_no}}</p>
                                    <p>  PART NO:  {{ $data_produk->part_no}} </p>
                                    <p>  PART NAME:  {{ $data_produk->part_name}} </p>

                                   <p> QTY:  {{ $pdfone->qty}} Unit </p> 
                                   <p>  CUSTOMER:  {{ $data_produk->customer}} </p>
                                 
                                       
                                   <figure float: right; ><img src="{{ base_path() }}/public/icons/PT-ADM.jpg" width="250" height="128" float= "end"></figure>

                                         </div>
                                    </td>
                                </form>
                               
                             
                            </tr>
                        </table>
                    </body>
                    </html>

                        
                    </div>
                </div>
                </td>
               
               
         

        </tr>
   
    </table>

    
</body>
</html>