<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suratmasuk;

class SuratmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratmasuk = Suratmasuk::orderBy('id', 'desc')->get();
        $jumlahsuratmasuk = Suratmasuk::orderBy('id', 'desc')->count();
        return view('suratmasuk', compact('suratmasuk','jumlahsuratmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('inputsuratmasuk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi =$request->validate([
            'nomor' => 'required',
            'asal' => 'required',
            'tanggal' => 'required',
            'perihal' => 'required',
        ]);

        $simpan = Suratmasuk::create([
            'nomor' => $request->nomor,
            'asal' => $request->asal,
            'tanggal' => $request->tanggal,
            'perihal' => $request->perihal
        ]);

        if(!$simpan){
            return back()->with('inputError','Gagal Update Data, Periksa Kembali Inputan Anda');
        } else {
            return redirect('/suratmasuk')->with('success', 'Surat Masuk Berhasil Ditambahkan!!');
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
        $suratmasuk = Suratmasuk::findOrFail($id);
        // $jumlahsuratmasuk = Suratmasuk::orderBy('id', 'desc')->count();
        return view('editsuratmasuk', compact('id','suratmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
