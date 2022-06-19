<?php

namespace App\Http\Controllers;

use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = date('Y');
        $list_penerimaan_npwp = Penerimaan::selectRaw('npwp,nama_wp,sum(jumlah) as jumlah')
                                ->where('thn_setor','=',$tahun)
                                ->groupBy('npwp','nama_wp')
                                ->orderBy(DB::raw('sum(jumlah)'),'desc')
                                ->get();
        $penerimaan_pemeriksaan= Penerimaan::where('thn_setor','=',$tahun)
                                ->where('keterangan','=','Pemeriksaan')
                                ->orWhere('keterangan','=','Pengungkapan')
                                ->get();
        $penerimaan_penagihan= Penerimaan::where('thn_setor','=',$tahun)
                                ->where('keterangan','!=','Pemeriksaan')
                                ->orWhere('keterangan','!=','Pengungkapan')
                                ->get();
        $sum_penerimaan = Penerimaan::select('jumlah')
                                ->where('thn_setor','=',$tahun)
                                ->sum('jumlah');
        $sum_penerimaan_penagihan = Penerimaan::select('jumlah')
                                ->where('thn_setor','=',$tahun)
                                ->where('keterangan','!=','Pemeriksaan')
                                ->where('keterangan','!=','Pengungkapan')
                                ->sum('jumlah');
        $sum_penerimaan_pemeriksaan = Penerimaan::select('jumlah')
                                ->where('thn_setor','=',$tahun)
                                ->where('keterangan','=','Pemeriksaan')
                                ->orWhere('keterangan','=','Pengungkapan')
                                ->sum('jumlah');
        // echo $list_penerimaan_skp;
        return view('penerimaan',compact('tahun','list_penerimaan_npwp','sum_penerimaan','sum_penerimaan_penagihan','sum_penerimaan_pemeriksaan','penerimaan_pemeriksaan','penerimaan_penagihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
