<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Pasien</title>
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
        <h5 class="mb-2">Laporan Data Pasien</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama Pasien</th>
                <th>Nama Kamar</th>
                <th>Nama Dokter</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <th>Nomor Telepon</th>
                <th>Email</th>
                <th>Riwayat Penyakit</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($pasien as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->NAMA }}</td>
                    <td>{{ $dok->NAMA_KAMAR }}</td>
                    <td>{{ $dok->NAMA_DOKTER }}</td>
                    <td>{{ $dok->ALAMAT }}</td>
                    <td>{{ $dok->TANGGAL_LAHIR }}</td>
                    <td>{{ $dok->JENIS_KELAMIN }}</td>
                    <td>{{ $dok->UMUR }}</td>
                    <td>{{ $dok->NOMOR_TELEPON }}</td>
                    <td>{{ $dok->EMAIL }}</td>
                    <td>{{ $dok->RIWAYAT_PENYAKIT }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
