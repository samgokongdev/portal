<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftarfpp;

class DaftarfppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spv_non_fpp = Daftarfpp::where('posisi','!=','0')->count();
        $jumlah_kelompok = Daftarfpp::distinct()->count('kelompok');
        $fpp = Daftarfpp::all();
        return view('daftarfpp', compact('fpp','jumlah_kelompok','spv_non_fpp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_daftarfpp');
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
            'nip' => 'required|min:18|max:18|unique:daftarfpps',
            'nama_fpp' => 'required',
            'posisi' => 'required',
            'kelompok' => 'required',
            'kode_fpp' => 'required'
        ]);

        $simpan_data_pemeriksa = Daftarfpp::create([
            'nip' => $request->nip,
            'nama_fpp' => $request->nama_fpp,
            'posisi' => $request->posisi,
            'kelompok' => $request->kelompok,
            'kode_fpp' => $request->kode_fpp
        ]);


        if(!$simpan_data_pemeriksa){
            return back()->with('inputError','Gagal Update Data, Periksa Kembali Inputan Anda');
        } else {
            return redirect('/daftarfpp')->with('success', 'Input/Edit data tunggakan berhasil!!');
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
