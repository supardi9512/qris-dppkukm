<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QRIS DPPKUKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});

      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable({{ Js::from($event_result) }});

        var options = {
          width: '100%',
          height: 600,
          bars: 'horizontal',
          axes: {
            x: {
              0: { side: 'left', label: 'Total Transaksi QRIS'}
            }
          },
          hAxis: {
            format : 'decimal'
          },
          bar: { groupWidth: "90%" },
          chartArea:{left:30,top:10,width:'50%'},
        };
        
        var chart = new google.charts.Bar(document.getElementById('barchart_event'));
        chart.draw(data, google.charts.Bar.convertOptions(options));

      }

    </script>
  </head>
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <div class="card mt-5">
              <div class="card-header">
                <h3>Chart Top 5 Event</h3>
              </div>
              <div class="card-body">
                <p>
                  <a class="btn btn-primary" href="{{ route('home') }}">Kembali</a>
                </p>
                <div id="barchart_event"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
