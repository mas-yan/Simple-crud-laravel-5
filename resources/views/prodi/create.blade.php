@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Prodi</div>

                <div class="panel-body">
                  <form action="{{route('addProdi')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Nama Prodi</label>
                      <input type="text" class="form-control" name="nama" id="name" placeholder="Nama Prodi">
                    </div>
                    <button type="submit" class="btn btn-success">Tambah Prodi</button>
                    <a href="/prodi" class="btn-primary btn">Kembali</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
