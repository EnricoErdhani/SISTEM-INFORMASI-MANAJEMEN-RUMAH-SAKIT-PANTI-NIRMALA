@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Tenaga Kesehatan</h1>
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
                            <form action="{{ route('tenaga-kesehatan.store') }}" method="post">
                                @csrf
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
                                        <label for="exampleInputPassword1">Nomor Izin Praktik</label>
                                        <input type="text" name="nomor_izin_praktik" class="form-control"
                                            id="exampleInputPassword1" placeholder="Enter Nomor">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Kadaluarsa Izin Praktik</label>
                                        <input type="date" name="tanggal_kadaluarsa_izin_praktik" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter Tanggal">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jenis Kelamin</label>
                                        <input type="text" name="jenis_kelamin" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter jenis kelamin">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Spesialisasi</label>
                                        <input type="text" name="spesialisasi" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter spesialisasi">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Gaji</label>
                                        <input type="text" name="gaji" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter gaji">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status</label>
                                        <input type="text" name="status" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter status">
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
