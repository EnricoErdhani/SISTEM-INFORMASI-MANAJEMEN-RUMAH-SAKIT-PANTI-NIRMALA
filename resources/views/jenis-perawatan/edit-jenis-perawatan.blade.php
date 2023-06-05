@extends('template')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Jenis Perawatan</h1>
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
                            <form action="{{ route('jenis-perawatan.update', $jenis_perawatan->ID_JPERAWATAN) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Perawatan</label>
                                        <input type="text" name="nama_perawatan" class="form-control"
                                            id="exampleInputPassword1" value="{{ $jenis_perawatan->NAMA_PERAWATAN }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control" id="deskripsi">{{ $jenis_perawatan->DESKRIPSI }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kategori</label>
                                        <input type="text" name="kategori" class="form-control"
                                            id="exampleInputPassword1"value="{{ $jenis_perawatan->KATEGORI }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Durasi</label>
                                        <input type="text" name="durasi" class="form-control"
                                            id="exampleInputPassword1"value="{{ $jenis_perawatan->DURASI }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Biaya</label>
                                        <input type="number" name="biaya" class="form-control"
                                            id="exampleInputPassword1"value="{{ $jenis_perawatan->BIAYA }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Persyaratan</label>
                                        <textarea name="persyaratan" id="persyaratan"
                                            class="form-control">{{ $jenis_perawatan->PERSYARATAN }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Kontraindikasi</label>
                                        <textarea name="kontraindikasi" id="kontraindikasi"
                                            class="form-control">{{ $jenis_perawatan->KONTRAINDIKASI }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Dokter</label>
                                        <input type="text" name="dokter" class="form-control"
                                            id="exampleInputPassword1"value="{{ $jenis_perawatan->DOKTER }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Jumlah Pasien</label>
                                        <input type="number" name="jumlah_pasien" class="form-control"
                                            id="exampleInputPassword1"value="{{ $jenis_perawatan->JUMLAH_PASIEN }}">
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
