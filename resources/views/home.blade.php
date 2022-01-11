@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="panel panel-default">
                <div class="panel-heading">Mahasiswa</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ session('status') }}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error!</strong> {{ session('error') }}.
                        </div>
                    @endif

                    <p>
                        <a href="/addMhs" class="btn-primary btn">Tambah mahasiswa</a>
                    </p>

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                          <tr>
                            <th>NPM Mahasiswa</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jenis Kelamin Mahasiswa</th>
                            <th>Prodi Mahasiswa</th>
                            <th>Foto1 Mahasiswa</th>
                            <th>Foto2 Mahasiswa</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($mhs as $mahasiswa)
                              <tr>
                                <td>{{$mahasiswa->mhs_npm}}</td>
                                <td>{{$mahasiswa->mhs_nama}}</td>
                                <td>{{$mahasiswa->mhs_jk}}</td>
                                <td>{{$mahasiswa->prodi_nama}}</td>
                                <td class="text-center"><img src="{{asset('storage/mahasiswa/' . $mahasiswa->mhs_foto_1)}}" class="img-rounded img-fluid" style="width: 50px; height:50px"></td>
                                <td class="text-center"><img src="{{asset('storage/mahasiswa/' . $mahasiswa->mhs_foto_2)}}" class="img-rounded img-fluid" style="width: 50px; height:50px"></td>
                                <td class="text-center"><a href="{{route('lihatMhs',$mahasiswa->mhs_id)}}" class="btn btn-success">Lihat</a> | <a href="{{route('editMhs',$mahasiswa->mhs_id)}}" class="btn btn-warning">Edit</a> | <a href="{{route('deleteMhs',$mahasiswa->mhs_id)}}" class="btn btn-danger">Delete</a></td>
                              </tr>
                              @empty
                                <tr>
                                    <td colspan="7">
                                    <div class="alert text-center alert-danger">
                                        Belum ada data mahasiswa
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
