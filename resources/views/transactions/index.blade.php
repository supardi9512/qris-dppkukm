<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QRIS DPPKUKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      var transactions = <?php echo $transactions; ?>;

      google.charts.load('current', {'packages':['corechart']});

      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable(transactions);

        var options = {
          width: '100%',
          height: 600,
          curveType: 'function',
          legend: { position: 'bottom' },
          vAxis: {
            viewWindow: {
              min:0
            },
            textStyle: {
              fontSize: 10
            }
          },
          hAxis: {
            textStyle: {
              fontSize: 10
            }
          }
        };

        var chart = new google.visualization.LineChart(document.getElementById('linechart_transaction'));

        chart.draw(data, options);

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
                <h3>Chart Total Nominal Transaksi QRIS Per Bulan</h3>
              </div>
              <div class="card-body">
                <p>
                  <a class="btn btn-primary" href="{{ route('home') }}">Kembali</a>
                </p>
                <div id="linechart_transaction"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
