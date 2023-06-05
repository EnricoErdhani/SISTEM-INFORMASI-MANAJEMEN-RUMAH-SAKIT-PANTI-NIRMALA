@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Pegawai</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Pegawai</li>
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
                            <form action="{{ route('pegawai.update', $pegawai->ID_PEGAWAI) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Pengguna</label>
                                        <select class="form-control" name="id_pengguna" id="id_pengguna" required>
                                            @foreach ($pengguna as $k)
                                                <option value="{{ $k->ID_PENGGUNA }}">
                                                    {{ $k->NAMA }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Pegawai</label>
                                        <input type="text" name="nama_pegawai" value="{{ $pegawai->NAMA }}" class="form-control"
                                            id="exampleInputPassword1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat</label>
                                        <input type="text" name="alamat" value="{{ $pegawai->ALAMAT }}" class="form-control" id="exampleInputEmail1"
                                        placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                                        <input type="text" name="jenis_kelamin" value="{{ $pegawai->JENIS_KELAMIN }}" class="form-control"
                                            id="exampleInputEmail1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" value="{{ $pegawai->EMAIL }}" class="form-control" id="exampleInputEmail1"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">No Telp</label>
                                        <input type="text" name="no_telp" value="{{ $pegawai->NOMOR_TELEPON }}" class="form-control" id="exampleInputEmail1"
                                            placeholder="">
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
