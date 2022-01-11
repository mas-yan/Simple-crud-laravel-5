@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Mahasiswa</div>

                <div class="panel-body">
                  <form action="{{route('addMhs')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="npm">Npm Mahasiswa</label>
                      <input required type="text" class="form-control" name="npm" id="name" placeholder="Npm Mahasiswa">
                    </div>
                    <div class="form-group">
                      <label for="name">Nama Mahasiswa</label>
                      <input required type="text" class="form-control" name="nama" id="name" placeholder="Nama Mahasiswa">
                    </div>
                    <div class="form-group">
                      <label for="jk">Jenis Kelamin Mahasiswa</label>
                      <select required name="jk" id="jk" class="form-control">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="prodi">Prodi Mahasiswa</label>
                      <select required name="prodi" id="prodi" class="form-control">
                        <option value="">Pilih Prodi</option>
                        @foreach ($prodis as $prodi)
                            <option value="{{$prodi->prodi_id}}">{{$prodi->prodi_nama}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="foto1">Foto 1</label>
                      <input required type="file" name="foto1" id="foto1">
                      <p class="help-block">Foto Mahasiswa 1</p>
                    </div>
                    <div class="form-group">
                      <label for="foto2">Foto 2</label>
                      <input required type="file" name="foto2" id="foto2">
                      <p class="help-block">Foto Mahasiswa 2</p>
                    </div>
                    <button type="submit" class="btn btn-success">Tambah Mahasiswa</button>
                    <a href="/prodi" class="btn-primary btn">Kembali</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
