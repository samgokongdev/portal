<?php

namespace App\Http\Controllers;

use App\Models\Lhp;
use App\Models\Tunggakan;
use App\Models\View_lhp_all;
use App\Models\View_tunggakan_all;
use App\Models\Skp;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kode_kpp = "057";
        $tahun = date("Y");
        $rekap_tunggakan = Tunggakan::where('sp2','!=','')->where('fg_jt','=','OK')->count();
        $belumsppl = Tunggakan::where('sp2','!=','')->where('tgl_sppl','=','0000-00-00')->count();
        $sphpbulanini = Tunggakan::where('sp2','!=','')->whereMonth('max_sphp',date('m'))->whereYear('max_sphp',date('Y'))->count();
        $lhpbulanini = Tunggakan::where('sp2','!=','')->whereMonth('max_lhp',date('m'))->whereYear('max_sphp',date('Y'))->count();
        $np2_belum_sp2 = Tunggakan::where('sp2','=','')->count();
        $pemeriksaan_jt_dekat = Tunggakan::where('sisa_hari','<','15')->where('sp2','!=','')->where('fg_jt','=','OK')->count();
        $lhp = Lhp::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->count();
        $konversi = Lhp::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->sum('konversi');
        $sum_skpkb = Skp::where('tahun_ket','=',$tahun)
                        ->where('jns_skp','!=','SKPLB')
                        ->where('jns_skp','!=','SKPN')
                        ->where('sumber','!=',"LAPPEN")
                        ->sum('jumlah_ket_idr');
        $sum_skplb = Skp::where('tahun_ket','=',$tahun)
                        ->where('jns_skp','=','SKPLB')
                        ->where('sumber','!=',"LAPPEN")
                        ->sum('jumlah_ket_idr');
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
        // echo $rekap_tunggakan;
        return view('home',compact('rekap_tunggakan','np2_belum_sp2','pemeriksaan_jt_dekat','lhpbulanini','sphpbulanini','lhp','konversi','sum_skpkb','sum_skplb','sum_penerimaan_penagihan','sum_penerimaan_pemeriksaan','belumsppl')); 
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
