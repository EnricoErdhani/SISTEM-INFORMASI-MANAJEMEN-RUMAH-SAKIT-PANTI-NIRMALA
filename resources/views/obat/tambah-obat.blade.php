@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Obat</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Obat</li>
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
                            <form action="{{ route('obat.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Obat</label>
                                        <input type="text" name="nama_obat" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori</label>
                                        <input type="text" name="kategori" class="form-control" id="exampleInputEmail1"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Bentuk Obat</label>
                                        <input type="text" name="bentuk_obat" class="form-control"
                                            id="exampleInputEmail1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Dosis</label>
                                        <input type="text" name="dosis" class="form-control"
                                            id="exampleInputEmail1" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Cara Pemakaian</label>
                                        <textarea name="cara_pemakaian" id="cara_pemakaian" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Komposisi</label>
                                        <textarea name="komposisi" id="komposisi" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Kadaluarsa</label>
                                        <input type="date" name="tanggal_kadaluarsa" class="form-control" id="exampleInputEmail1"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Harga</label>
                                        <input type="number" name="harga" class="form-control" id="exampleInputEmail1"
                                            placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">JumlahStok</label>
                                        <input type="number" name="jumlah_stok" class="form-control" id="exampleInputEmail1"
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
