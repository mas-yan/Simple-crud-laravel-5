<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mhs = DB::table('mahasiswas')
            ->join('prodis', 'mahasiswas.mhs_prodi_id', '=', 'prodis.prodi_id')
            ->select('mahasiswas.*', 'prodis.prodi_nama')
            ->get();

        return view('home', compact('mhs'));
    }

    public function create()
    {
        $prodis = Prodi::get();
        return view('mahasiswa.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $image1 = $request->file('foto1');
        $image2 = $request->file('foto2');

        $image1->storeAs('public/mahasiswa/', $image1->hashName());
        $image2->storeAs('public/mahasiswa/', $image2->hashName());

        $mahasiswa = new Mahasiswa;

        $mahasiswa->mhs_npm = $request->npm;
        $mahasiswa->mhs_nama = $request->nama;
        $mahasiswa->mhs_jk = $request->jk;
        $mahasiswa->mhs_prodi_id = $request->prodi;
        $mahasiswa->mhs_foto_1 = $image1->hashName();
        $mahasiswa->mhs_foto_2 = $image2->hashName();

        $mahasiswa->save();

        if ($mahasiswa) {
            return redirect()->route('home')->with('status', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('home')->with('error', 'Data Gagal Disimpan');
        }
    }

    public function show($id)
    {
        $mhs = DB::table('mahasiswas')
            ->where('mhs_id', $id)
            ->join('prodis', 'mahasiswas.mhs_prodi_id', '=', 'prodis.prodi_id')
            ->select('mahasiswas.*', 'prodis.prodi_nama')
            ->first();
        return view('mahasiswa.show', compact('mhs'));
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::where('mhs_id', $id)->first();
        $prodis = Prodi::get();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodis'));
    }

    public function update(Request $request, $id)
    {

        $foto = Mahasiswa::where('mhs_id', $id)->first();

        Storage::disk('local')->delete('public/mahasiswa/' . basename($foto->mhs_foto_1));
        Storage::disk('local')->delete('public/mahasiswa/' . basename($foto->mhs_foto_2));

        $image1 = $request->file('foto1');
        $image2 = $request->file('foto2');

        $image1->storeAs('public/mahasiswa/', $image1->hashName());
        $image2->storeAs('public/mahasiswa/', $image2->hashName());

        $mahasiswa = Mahasiswa::where('mhs_id', $id)->update([
            'mhs_npm' => $request->npm,
            'mhs_nama' => $request->nama,
            'mhs_jk' => $request->jk,
            'mhs_prodi_id' => $request->prodi,
            'mhs_foto_1' => $image1->hashName(),
            'mhs_foto_2' => $image2->hashName(),
        ]);
        if ($mahasiswa) {
            return redirect()->route('home')->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect()->route('home')->with('error', 'Data Gagal Diubah');
        }
    }

    public function destroy($id)
    {
        $foto = Mahasiswa::where('mhs_id', $id)->first();

        Storage::disk('local')->delete('public/mahasiswa/' . basename($foto->mhs_foto_1));
        Storage::disk('local')->delete('public/mahasiswa/' . basename($foto->mhs_foto_2));

        $mahasiswa = Mahasiswa::where('mhs_id', $id)->delete();

        if ($mahasiswa) {
            return redirect()->route('home')->with('status', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('home')->with('error', 'Data Gagal Dihapus');
        }
    }
}
