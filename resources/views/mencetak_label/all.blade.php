
             
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    
                        <title>Cetak Barcode</title>
                      
                        <!-- PWA  -->
<meta name="theme-color" content="#56e890"/>
<link rel="apple-touch-icon" href="{{ asset('RMA-logo.jpg') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">
                        <style>
                            .text-center {
                                text-align: center;
                            }
                            body {
    font-size: 18px;
    font-family: Arial, Helvetica, sans-serif;
  }
                            .page-break {
    page-break-after: always;
  }
                            
                        </style>
                
                        </head>
                    
<body>
    <table>
  
                         
                                    @foreach ($pdfs as $key => $cetak) 
                                  
                             
                                    <table width="100%">
                                      <tr>
                                          
                               
                                    <td class="text-center" style="border: 2px solid rgb(0, 0, 0);">
                                 
                             
                                   <p> <h3>Label QR Code</h3>
                                    <br>
                                  
                                        <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($cetak->permintaan_produk->order_no, 'QRCODE')}}" 
                                        alt="{{ $cetak->order_no }}"
                                        width="180"
                                        height="80">
                                    
                                        <p>  ORDER NO:  {{ $cetak->permintaan_produk->order_no}} </p>
                                        <p>  PART NO:  {{ $cetak->data_produk->part_no}} </p>
                                        <p>  PART NAME:  {{ $cetak->data_produk->part_name}} </p>
                              

                                   <p> QTY:  {{ $cetak->qty}} Unit </p>
                           <p> CUSTOMER:  {{ $cetak->data_produk->customer}} </p>

                          
                                       
                                <img src="{{ base_path() }}/public/icons/PT-ADM.jpg" width="250" height="128" float= "end">

                                         </div>
                                    </td>
                                    @endforeach
                                </form>
                               
                     
                            </tr>
                        </table>
      

                    </body>
                    </html>

                 
                
               
               
         

        </tr>
   
    </table>
    <br>
    @if ($key!=0)
      @if (($key+1) % 2==0)
        </td>
        <td>
      @endif
      @if (($key+1) % 4==0)
        </td>
      </tr>
      <tr>
        <td>
    
    @endif
  @endif

</td>
<script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
</body>
</html>