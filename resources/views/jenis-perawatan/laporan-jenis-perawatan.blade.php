<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Jenis Perawatan</title>
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
        <h5 class="mb-2">Laporan Data Jenis Perawatan</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama Perawatan</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Durasi</th>
                <th>Biaya</th>
                <th>Persyaratan</th>
                <th>Kontraindikasi</th>
                <th>Dokter</th>
                <th>Jumlah Pasien</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($jenis_perawatan as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->NAMA_PERAWATAN }}</td>
                    <td>{{ $dok->DESKRIPSI }}</td>
                    <td>{{ $dok->KATEGORI }}</td>
                    <td>{{ $dok->DURASI }}</td>
                    <td>{{ $dok->BIAYA }}</td>
                    <td>{{ $dok->PERSYARATAN }}</td>
                    <td>{{ $dok->KONTRAINDIKASI }}</td>
                    <td>{{ $dok->DOKTER }}</td>
                    <td>{{ $dok->JUMLAH_PASIEN }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
