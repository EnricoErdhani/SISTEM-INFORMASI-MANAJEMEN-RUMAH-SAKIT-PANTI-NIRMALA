@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Pemeriksaan Dokter</h1>
                    </div><!-- /.col -->

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <a href="{{ route('pemeriksaan-dokter.create') }}">
                    <button class="btn btn-primary">Tambah Data</button>
                </a>
                <a href="{{ url('print-pemeriksaan-dokter') }}" target="_blank">
                    <button class="btn btn-primary">Cetak Data</button>
                </a>
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Pasien</th>
                                    <th>Nama Dokter</th>
                                    <th>Tanggal</th>
                                    <th>Keluhan</th>
                                    <th>Hasil Pemeriksaan</th>
                                    <th>Resep Obat</th>
                                    <th>Biaya</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($pemeriksaan as $dok)
                                    <?php $no++; ?>
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $dok->NAMA_PASIEN }}</td>
                                        <td>{{ $dok->NAMA_DOKTER }}</td>
                                        <td>{{ $dok->TANGGAL }}</td>
                                        <td>{{ $dok->KELUHAN }}</td>
                                        <td>{{ $dok->HASIL_PEMERIKSAAN }}</td>
                                        <td>{{ $dok->RESEP_OBAT }}</td>
                                        <td>{{ $dok->BIAYA }}</td>
                                        <td>
                                            <form action="{{ route('pemeriksaan-dokter.destroy', $dok->ID_PEMERIKSAAN) }}"
                                                method="POST">
                                                <a href="{{ route('pemeriksaan-dokter.edit', $dok->ID_PEMERIKSAAN) }}"
                                                    class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                    data-original-title="Edit user">
                                                    <button class="btn btn-info" type="button">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $pemeriksaan->links('vendor.pagination.bootstrap-4') !!}
                        {{-- <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul> --}}

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
