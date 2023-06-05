@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Jenis Kamar</h1>
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
                            <form action="{{ route('jenis-kamar.update', $jenis_kamar->ID_JKAMAR)  }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Kamar</label>
                                        <input type="text" name="nama_kamar" class="form-control"
                                            id="exampleInputPassword1" value="{{ $jenis_kamar->NAMA_KAMAR }}"
                                            placeholder="Enter Nama Kamar">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Fasilitas</label>
                                        <input type="text" name="fasilitas" class="form-control"
                                            id="exampleInputPassword1" value="{{ $jenis_kamar->FASILITAS }}"
                                            placeholder="Enter Fasilitas">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Harga</label>
                                        <input type="number" name="harga" class="form-control"
                                            id="exampleInputPassword1" value="{{ $jenis_kamar->HARGA }}"
                                            placeholder="Enter Harga">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Ketersediaan</label>
                                        <input type="number" name="ketersediaan" class="form-control"
                                            id="exampleInputPassword1" value="{{ $jenis_kamar->KETERSEDIAN }}"
                                            placeholder="Enter Ketersediaan">
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
