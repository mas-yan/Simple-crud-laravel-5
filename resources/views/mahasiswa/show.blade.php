@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
          <p>
            <a href="/home" class="btn-primary btn">Kembali</a>
          </p>
            <div class="panel panel-default">
                <div class="panel-heading">Data Mahasiswa : <b>{{$mhs->mhs_nama}}</b></div>
                <div class="panel-body">
                  <table class="table table-striped table-hover table-bordered">
                    <tr>
                      <td style="width: 30%"><b>NPM</b></td>
                      <td>{{$mhs->mhs_npm}}</td>
                    </tr>
                    <tr>
                      <td style="width: 30%"><b>Nama</b></td>
                      <td>{{$mhs->mhs_nama}}</td>
                    </tr>
                    <tr>
                      <td style="width: 30%"><b>Jenis Kelamin</b></td>
                      <td>{{$mhs->mhs_jk}}</td>
                    </tr>
                    <tr>
                      <td style="width: 30%"><b>Prodi</b></td>
                      <td>{{$mhs->prodi_nama}}</td>
                    </tr>
                    <tr>
                      <td style="width: 30%"><b>Foto 1</b></td>
                      <td><img src="{{asset('storage/mahasiswa/' . $mhs->mhs_foto_1)}}" class="img-rounded img-fluid" style="width: 150px; height:150px"></td>
                    </tr>
                    <tr>
                      <td style="width: 30%"><b>Foto 2</b></td>
                      <td><img src="{{asset('storage/mahasiswa/' . $mhs->mhs_foto_2)}}" class="img-rounded img-fluid" style="width: 150px; height:150px"></td>
                    </tr>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
