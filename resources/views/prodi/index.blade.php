@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Succcess!</strong> {{ session('success') }}.
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error!</strong> {{ session('error') }}.
            </div>
          @endif
            <div class="panel panel-default">
                <div class="panel-heading">Prodi</div>

                <div class="panel-body">
                  <p>
                    <a href="/addprodi" class="btn-primary btn">Tambah Prodi</a>
                  </p>
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr>
                          <th>Nama Prodi</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse ($prodis as $prodi)
                            <tr>
                              <td>{{$prodi->prodi_nama}}</td>
                              <td class="text-center"><a href="{{route('editProdi',$prodi->prodi_id)}}" class="btn btn-warning">Edit</a> | <a href="{{route('deleteProdi',$prodi->prodi_id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @empty
                        <tr>
                          <td colspan="2">
                            <div class="alert alert-danger">
                                Belum ada data
                            </div>
                          </td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
