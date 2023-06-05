<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Obat</title>
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
        <h5 class="mb-2">Laporan Data Obat</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Bentuk Obat</th>
                <th>Dosis</th>
                <th>Cara Pemakaian</th>
                <th>Komposisi</th>
                <th>Tanggal Kadaluarsa</th>
                <th>Harga</th>
                <th>Jumlah Stok</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($obat as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->NAMA_OBAT }}</td>
                    <td>{{ $dok->KATEGORI }}</td>
                    <td>{{ $dok->DESKRIPSI }}</td>
                    <td>{{ $dok->BENTUK_OBAT }}</td>
                    <td>{{ $dok->DOSIS }}</td>
                    <td>{{ $dok->CARA_PEMAKAIAN }}</td>
                    <td>{{ $dok->KOMPOSISI }}</td>
                    <td>{{ $dok->TANGGAL_KADALUARSA }}</td>
                    <td>{{ $dok->HARGA }}</td>
                    <td>{{ $dok->JUMLAH_STOK }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
