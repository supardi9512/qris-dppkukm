<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QRIS DPPKUKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <div class="card mt-5">
              <div class="card-header">
                <h3>Selamat Datang Di QRIS DPPKUKM</h3>
              </div>
              <div class="card-body">
                <p>
                  <a class="btn btn-primary" href="{{ route('participants') }}">Lihat List Peserta QRIS</a>
                  <a class="btn btn-success" href="{{ route('events') }}">Lihat Chart Top 5 Event</a>
                  <a class="btn btn-warning" href="{{ route('transactions') }}">Lihat Chart Total Nominal Transaksi QRIS Per Bulan</a>
                  <a class="btn btn-danger" href="{{ route('participants.total_business') }}">Lihat Chart Total Usaha Peserta QRIS</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
