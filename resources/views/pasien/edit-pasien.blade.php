@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Pasien</h1>
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
                            <form action="{{ route('pasien.update', $pasien->ID_PASIEN) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Dokter</label>
                                        <select class="form-control" name="id_dokter" id="id_dokter" required>
                                            @foreach ($dokter as $d)
                                                <option value="{{ $d->ID_DOKTER }}">
                                                    {{ $d->NAMA }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Kamar</label>
                                        <select class="form-control" name="id_kamar" id="id_kamar" required>
                                            @foreach ($kamar as $k)
                                                <option value="{{ $k->ID_KAMAR }}">
                                                    {{ $k->NAMA_KAMAR }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Pasien</label>
                                        <input type="text" name="nama_pasien" value="{{ $pasien->NAMA }}" class="form-control"
                                            id="exampleInputPassword1" placeholder="Enter Nama Pasien">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat</label>
                                        <input type="text" name="alamat" value="{{ $pasien->ALAMAT }}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" value="{{ $pasien->TANGGAL_LAHIR }}" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                                        <input type="text" name="jenis_kelamin" value="{{ $pasien->JENIS_KELAMIN }}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter jenis kelamin">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Umur</label>
                                        <input type="number" name="umur" value="{{ $pasien->UMUR }}" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Umur">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nomor Telepon</label>
                                        <input type="text" name="no_telp" value="{{ $pasien->NOMOR_TELEPON }}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter nomor telepon">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" value="{{ $pasien->EMAIL }}" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Riwayat Penyakit</label>
                                        <textarea name="riwayat_penyakit" id="" class="form-control">{{ $pasien->RIWAYAT_PENYAKIT }}</textarea>
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
