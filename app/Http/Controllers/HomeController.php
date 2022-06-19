<?php

namespace App\Http\Controllers;

use App\Models\Tunggakan;
use App\Models\View_lhp_all;
use App\Models\View_tunggakan_all;
use App\Models\Skp;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kode_kpp = "056";
        $tahun = date("Y");
        $rekap_tunggakan = Tunggakan::where('sp2','!=','')->count('id_pemeriksaan');
        $np2_belum_sp2 = Tunggakan::where('sp2','=','')->count('id_pemeriksaan');
        $pemeriksaan_jt_dekat = View_tunggakan_all::where('sisa_waktu','<','14')->where('sp2','!=','')->count();
        $lhp = View_lhp_all::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->count();
        $konversi = View_lhp_all::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->sum('konversi');
        $sum_skpkb = Skp::where('tahun_ket','=',$tahun)
                        ->where('jns_skp','!=','SKPLB')
                        ->where('jns_skp','!=','SKPN')
                        ->where('sumber','!=',"LAPPEN")
                        ->sum('jumlah_ket_idr');
        $sum_skplb = Skp::where('tahun_ket','=',$tahun)
                        ->where('jns_skp','=','SKPLB')
                        ->where('sumber','!=',"LAPPEN")
                        ->sum('jumlah_ket_idr');
        // echo $rekap_tunggakan;
        return view('home',compact('rekap_tunggakan','np2_belum_sp2','pemeriksaan_jt_dekat','lhp','konversi','sum_skpkb','sum_skplb')); 
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
