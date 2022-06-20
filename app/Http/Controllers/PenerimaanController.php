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
        $penerimaan_all= Penerimaan::where('thn_setor','=',$tahun)
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
        return view('penerimaan',compact('tahun','sum_penerimaan','sum_penerimaan_penagihan','sum_penerimaan_pemeriksaan','penerimaan_all'));
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
        $tahun = $request->tahun;
        $penerimaan_all= Penerimaan::where('thn_setor','=',$tahun)
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
        return view('penerimaan',compact('tahun','sum_penerimaan','sum_penerimaan_penagihan','sum_penerimaan_pemeriksaan','penerimaan_all'));
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rekap()
    {
        $tahun = date('Y');
        $penerimaan_npwp = DB::table('penerimaans')
                        ->leftJoin('mfwps','penerimaans.npwp','=', 'mfwps.npwp')
                        ->select('penerimaans.npwp','mfwps.nama_wp',DB::raw('sum(penerimaans.jumlah) as jumlah'))
                        ->where('penerimaans.thn_setor','=',$tahun)
                        ->groupBy('penerimaans.npwp','mfwps.nama_wp')
                        ->orderBy(DB::raw('sum(penerimaans.jumlah)'),'desc')
                        ->get();
        $penerimaan_skp = Penerimaan::where('thn_setor','=',$tahun)
                        ->select('no_skp',DB::raw('sum(jumlah) as jumlah'))
                        ->groupBy('no_skp')
                        ->orderBy(DB::raw('sum(jumlah)'),'desc')
                        ->get();
        // echo $penerimaan_npwp;
            
        return view('rekappenerimaan', compact('tahun','penerimaan_npwp','penerimaan_skp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rekappenerimaan(Request $request)
    {
        // echo "yuhuu";
        $tahun = $request->tahun;
        $penerimaan_npwp = DB::table('penerimaans')
                        ->leftJoin('mfwps','penerimaans.npwp','=', 'mfwps.npwp')
                        ->select('penerimaans.npwp','mfwps.nama_wp',DB::raw('sum(penerimaans.jumlah) as jumlah'))
                        ->where('penerimaans.thn_setor','=',$tahun)
                        ->groupBy('penerimaans.npwp','mfwps.nama_wp')
                        ->orderBy(DB::raw('sum(penerimaans.jumlah)'),'desc')
                        ->get();
        $penerimaan_skp = Penerimaan::where('thn_setor','=',$tahun)
                        ->select('no_skp',DB::raw('sum(jumlah) as jumlah'))
                        ->groupBy('no_skp')
                        ->orderBy(DB::raw('sum(jumlah)'),'desc')
                        ->get();
        // echo $penerimaan_npwp;
            
        return view('rekappenerimaan', compact('tahun','penerimaan_npwp','penerimaan_skp'));
    }
}
