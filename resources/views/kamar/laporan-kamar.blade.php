<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Kamar</title>
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
        <h5 class="mb-2">Laporan Data Kamar</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama Kamar</th>
                <th>Nama Jenis Kamar</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach ($kamar as $dok)
                <?php $no++; ?>
                <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $dok->NAMA_KAMAR }}</td>
                    <td>{{ $dok->NAMA_JENIS }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
