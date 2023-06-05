<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Tenaga Kesehatan</title>
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
        <h5 class="mb-2">Laporan Data Tenaga Kesehatan</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nomor Izin Praktik</th>
                <th>Tanggal Kadaluarsa Izin Praktik</th>
                <th>Nama Pengguna</th>
                <th>Nama Tenkes</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Spesialisasi</th>
                <th>Gaji</th>
                <th>Status</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($tenaga_kesehatan as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->NOMOR_IZIN_PRAKTIK }}</td>
                    <td>{{ $dok->TANGGAL_KADALUARSA_IZIN_PRAKTIK }}</td>
                    <td>{{ $dok->NAMA_PENGGUNA }}</td>
                    <td>{{ $dok->NAMA }}</td>
                    <td>{{ $dok->JENIS_KELAMIN }}</td>
                    <td>{{ $dok->EMAIL }}</td>
                    <td>{{ $dok->SPESIALISASI }}</td>
                    <td>{{ $dok->GAJI }}</td>
                    <td>{{ $dok->STATUS }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
