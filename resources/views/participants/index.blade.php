<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QRIS DPPKUKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.css" />
  </head>
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="main-content">
          <div class="container">
            <div class="card mt-5">
              <div class="card-header">
                <h3>List Peserta QRIS</h3>
              </div>
              <div class="card-body">
                <p>
                  <a class="btn btn-primary" href="{{ route('home') }}">Kembali</a>
                </p>
                <table id="participantTable" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Pemilik QRIS</th>
                      <th>Nama Usaha</th>
                      <th>Terverifikasi</th>
                      <th>Total Transaksi QRIS</th>
                      <th>Total Nominal Transaksi QRIS</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($participants as $participant)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $participant->nama_pemilik_qris }}</td>
                        <td>{{ $participant->nama_usaha }}</td>
                        <td>{{ $participant->verified == 1 ? 'Ya' : 'Tidak' }}</td>
                        <td>{{ number_format($participant->total_qris_transaction, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($participant->total_nominal_qris_transaction, 0, ',', '.') }}</td>

                      </tr>
                    @empty
                      <tr>
                        <td colspan="8">
                            No record found!
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.js"></script>
    <script>
      new DataTable('#participantTable', {
          order: [4, 'desc'],
          columnDefs: [
          { 
            orderSequence: ["asc","desc"], 
            targets: [1,2,3,4,5] 
          },
        ],
      });
    </script>
  </body>
</html>
