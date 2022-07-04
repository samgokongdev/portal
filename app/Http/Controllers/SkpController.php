<?php

namespace App\Http\Controllers;

use App\Models\Skp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = date('Y');
        $data_skpkb = Skp::where('tahun_ket','=',$tahun)
                        ->where('jns_skp','!=','SKPLB')
                        ->where('jns_skp','!=','SKPN')
                        ->where('sumber','!=',"LAPPEN")
                        ->orderBy('tgl_produk_hukum','desc')
                        ->get();
        $rekap_skpkb = Skp::selectRaw('pic,kelompok,sum(jumlah_ket_idr)')
                        ->where('jns_skp','!=','SKPLB')
                        ->where('jns_skp','!=','SKPN')
                        ->where('sumber','!=',"LAPPEN")
                        ->where('tahun_ket','=',$tahun)
                        ->orderBy('kelompok','asc')
                        ->groupBy('pic','kelompok')
                        ->get();
        $sum_skpkb = Skp::where('tahun_ket','=',$tahun)
                        ->where('jns_skp','!=','SKPLB')
                        ->where('jns_skp','!=','SKPN')
                        ->where('sumber','!=',"LAPPEN")
                        ->sum('jumlah_ket_idr');
        $data_skplb = Skp::where('tahun_ket','=',$tahun)
                        ->where('jns_skp','=','SKPLB')
                        ->where('sumber','!=',"LAPPEN")
                        ->orderBy('tgl_produk_hukum','desc')
                        ->get();
        $sum_skplb = Skp::where('tahun_ket','=',$tahun)
                        ->where('jns_skp','=','SKPLB')
                        ->where('sumber','!=',"LAPPEN")
                        ->sum('jumlah_ket_idr');
        // echo $data_skplb;
        return view('daftarskp', compact('tahun','data_skpkb','data_skplb','sum_skpkb','sum_skplb','rekap_skpkb'));
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
        $data_skpkb = Skp::where('tahun_ket','=',$tahun)
                        ->where('jns_skp','!=','SKPLB')
                        ->where('jns_skp','!=','SKPN')
                        ->where('sumber','!=',"LAPPEN")
                        ->orderBy('tgl_produk_hukum','desc')
                        ->get();
        
        $sum_skpkb = Skp::where('tahun_ket','=',$tahun)
                        ->where('jns_skp','!=','SKPLB')
                        ->where('jns_skp','!=','SKPN')
                        ->where('sumber','!=',"LAPPEN")
                        ->sum('jumlah_ket_idr');
        $data_skplb = Skp::where('tahun_ket','=',$tahun)
                        ->where('jns_skp','=','SKPLB')
                        ->where('sumber','!=',"LAPPEN")
                        ->orderBy('tgl_produk_hukum','desc')
                        ->get();
        $sum_skplb = Skp::where('tahun_ket','=',$tahun)
                        ->where('jns_skp','=','SKPLB')
                        ->where('sumber','!=',"LAPPEN")
                        ->sum('jumlah_ket_idr');
        // echo $data_skplb;
        return view('daftarskp', compact('tahun','data_skpkb','data_skplb','sum_skpkb','sum_skplb'));
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
        $rekap_skpkb = Skp::selectRaw('pic,kelompok,sum(jumlah_ket_idr) as jumlah_ket_idr')
                        ->where('jns_skp','!=','SKPLB')
                        ->where('jns_skp','!=','SKPN')
                        ->where('sumber','!=',"LAPPEN")
                        ->where('tahun_ket','=',$tahun)
                        ->orderBy('kelompok','asc')
                        ->groupBy('pic','kelompok')
                        ->get();
        // echo $rekap_skpkb;
        return view('rekapskp', compact('tahun','rekap_skpkb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rekap2(Request $request)
    {
        $tahun = $request->tahun;
        $rekap_skpkb = Skp::selectRaw('pic,kelompok,sum(jumlah_ket_idr) as jumlah_ket_idr')
                        ->where('jns_skp','!=','SKPLB')
                        ->where('jns_skp','!=','SKPN')
                        ->where('sumber','!=',"LAPPEN")
                        ->where('tahun_ket','=',$tahun)
                        ->orderBy('kelompok','asc')
                        ->groupBy('pic','kelompok')
                        ->get();
        // echo $data_skplb;
        return view('rekapskp', compact('tahun','rekap_skpkb'));
    }
}
