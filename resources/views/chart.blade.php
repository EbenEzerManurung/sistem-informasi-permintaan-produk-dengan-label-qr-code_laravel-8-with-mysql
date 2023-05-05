<!DOCTYPE html>
<html>
<head>
    <title>Sistem informasi permintaan produk dengan label qr code</title>
    <!-- PWA  -->
<meta name="theme-color" content="#56e890"/>
<link rel="apple-touch-icon" href="{{ asset('RMA-logo.jpg') }}">
<link rel="manifest" href="{{ asset('/manifest.json') }}">
</head>
   
<body>
<h1>Data permintaan produk</h1>
<div id="container"></div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var permintaan_produks =  <?php echo json_encode($permintaan_produks) ?>;
   
    Highcharts.chart('container', {
        title: {
            text: 'Grafik Data permintaan produk'
        },
        subtitle: {
            text: 'Data permintaan produk'
        },
         xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Number of New permintaan_produks'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New permintaan_produks',
            data: permintaan_produks
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});
</script>
<script src="{{ asset('/sw.js') }}"></script>
<script>
    if (!navigator.serviceWorker.controller) {
        navigator.serviceWorker.register("/sw.js").then(function (reg) {
            console.log("Service worker has been registered for scope: " + reg.scope);
        });
    }
</script>
</html>