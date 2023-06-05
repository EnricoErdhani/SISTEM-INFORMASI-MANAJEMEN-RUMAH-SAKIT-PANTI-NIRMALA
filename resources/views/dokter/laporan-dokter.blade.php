<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Dokter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5 class="mb-2">Laporan Data Dokter</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Izin Praktik</th>
                <th>Tanggal Kadaluarsa Izin Praktik</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Spesialisasi</th>
                <th>Gaji</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($dokter as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->NOMOR_IZIN_PRAKTIK }}</td>
                    <td>{{ $p->TANGGAL_KADALUARSA_IZIN_PRAKTIK }}</td>
                    <td>{{ $p->NAMA }}</td>
                    <td>{{ $p->JENIS_KELAMIN }}</td>
                    <td>{{ $p->EMAIL }}</td>
                    <td>{{ $p->SPESIALISASI }}</td>
                    <td>{{ $p->GAJI }}</td>
                    <td>{{ $p->STATUS }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
