@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Pemeriksaan Dokter</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="{{ route('pemeriksaan-dokter.update', $pemeriksaan_dokter->ID_PEMERIKSAAN) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Pasien</label>
                                        <select class="form-control" name="id_pasien" id="id_pasien" required>
                                            @foreach ($pasien as $b)
                                                <option value="{{ $b->ID_PASIEN }}">
                                                    {{ $b->NAMA }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Dokter</label>
                                        <select class="form-control" name="id_dokter" id="id_dokter" required>
                                            @foreach ($dokter as $d)
                                                <option value="{{ $d->ID_DOKTER }}">
                                                    {{ $d->NAMA }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tanggal</label>
                                        <input type="date" name="tanggal" value="{{ $pemeriksaan_dokter->TANGGAL }}" class="form-control"
                                            id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Keluhan</label>
                                        <textarea name="keluhan" id="keluhan" class="form-control">{{ $pemeriksaan_dokter->KELUHAN }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Hasil Pemeriksaan</label>
                                        <textarea name="hasil_pemeriksaan" id="hasil_pemeriksaan" class="form-control">{{ $pemeriksaan_dokter->HASIL_PEMERIKSAAN }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Resep Obat</label>
                                        <textarea name="resep_obat" id="resep_obat" class="form-control">{{ $pemeriksaan_dokter->RESEP_OBAT }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Biaya</label>
                                        <input type="number" name="biaya" value="{{ $pemeriksaan_dokter->BIAYA }}" class="form-control"
                                            id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jenis Pemeriksaan</label>
                                        <input type="text" name="jenis_pemeriksaan" value="{{ $pemeriksaan_dokter->JENIS_PEMERIKSAAN }}" class="form-control"
                                            id="exampleInputPassword1">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
