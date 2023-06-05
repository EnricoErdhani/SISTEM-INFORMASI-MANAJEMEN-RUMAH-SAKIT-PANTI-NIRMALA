@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Pembayaran</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pembayaran</li>
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
                            <form action="{{ route('pembayaran.update', $pembayaran->ID_PEMBAYARAN) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Pasien</label>
                                        <select class="form-control" name="id_pasien" id="id_pasien"
                                            required>
                                            @foreach ($pasien as $pa)
                                                <option value="{{ $pa->ID_PASIEN }}">
                                                    {{ $pa->NAMA }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Kamar</label>
                                        <select class="form-control" name="id_kamar" id="id_kamar"
                                            required>
                                            @foreach ($kamar as $k)
                                                <option value="{{ $k->ID_KAMAR }}">
                                                    {{ $k->NAMA_KAMAR }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Dokter</label>
                                        <select class="form-control" name="id_dokter" id="id_dokter"
                                            required>
                                            @foreach ($dokter as $d)
                                                <option value="{{ $d->ID_DOKTER }}">
                                                    {{ $d->NAMA }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Keluhan</label>
                                        <select class="form-control" name="id_pemeriksaan" id="id_pemeriksaan"
                                            required>
                                            @foreach ($pemeriksaan as $pem)
                                                <option value="{{ $pem->ID_PEMERIKSAAN }}">
                                                    {{ $pem->KELUHAN }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jenis Perawatan</label>
                                        <select class="form-control" name="id_jperawatan" id="id_jperawatan"
                                            required>
                                            @foreach ($jenis as $j)
                                                <option value="{{ $j->ID_JPERAWATAN }}">
                                                    {{ $j->NAMA_PERAWATAN }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Obat</label>
                                        <select class="form-control" name="id_obat" id="id_obat"
                                            required>
                                            @foreach ($obat as $o)
                                                <option value="{{ $o->ID_OBAT }}">
                                                    {{ $o->NAMA_OBAT }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Tenaga Kesehatan</label>
                                        <select class="form-control" name="id_tkesehatan" id="id_tkesehatan"
                                            required>
                                            @foreach ($tenkes as $k)
                                                <option value="{{ $k->ID_TKESEHATAN }}">
                                                    {{ $k->NAMA }}
                                                </option>
                                            @endforeach
                                        </select>
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
