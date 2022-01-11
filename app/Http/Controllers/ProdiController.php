<?php

namespace App\Http\Controllers;

use App\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodis = Prodi::get();
        return view('prodi.index', compact('prodis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prodi = new Prodi;

        $prodi->prodi_nama = $request->nama;

        $prodi->save();

        if ($prodi) {
            return redirect()->route('prodi')->with('success', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('prodi')->with('error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prodi = Prodi::where('prodi_id', $id)->first();
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prodi = Prodi::where('prodi_id', $id)->update(['prodi_nama' => $request->nama]);
        if ($prodi) {
            return redirect()->route('prodi')->with('success', 'Data Berhasil Diubah');
        } else {
            return redirect()->route('prodi')->with('error', 'Data Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prodi = Prodi::where('prodi_id', $id)->delete();

        if ($prodi) {
            return redirect()->route('prodi')->with('success', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('prodi')->with('error', 'Data Gagal Dihapus');
        }
    }
}
