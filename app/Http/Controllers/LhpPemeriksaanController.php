<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DaftarLhp;

class LhpPemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = date("Y");
        $kode_kpp = "056";
        $jumlah_lhp = DaftarLhp::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->count();
        $list_lhp = DB::table('daftar_lhps')
            ->leftJoin('pemeriksas', 'daftar_lhps.np2', '=', 'pemeriksas.np2')
            ->select('daftar_lhps.*', 'pemeriksas.fpp1', 'pemeriksas.fpp2', 'pemeriksas.fpp3', 'pemeriksas.fpp4', 'pemeriksas.pic',
            DB::raw('
            CASE
            WHEN left(daftar_lhps.kode_rik,1) = 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) < 253 THEN 1
                WHEN left(daftar_lhps.kode_rik,1) = 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) > 252 THEN 0.8
                WHEN left(daftar_lhps.kode_rik,1) != 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) < 253 THEN 0.3
                WHEN left(daftar_lhps.kode_rik,1) != 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) > 252 THEN 0.25
            END as konversi
            ')
            )
            ->where('daftar_lhps.up2','=',$kode_kpp)
            ->where('daftar_lhps.th_lhp','=',$tahun)
            ->orderBy('daftar_lhps.lhp','desc')
            ->get();
        // dd($test);
        // $where('up2','=',$kode_kpp) = DaftarLhp::where('up2','=',$kode_kpp)->where('up2','=',$kode_kpp)->orderBy('lhp','desc')->get();
        return view('lhp',compact('list_lhp','jumlah_lhp','tahun'));
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
        $validasi =$request->validate([
            'tahun' => 'required'
        ]);

        $tahun = $request->tahun;
        $kode_kpp = "056";
        $jumlah_lhp = DaftarLhp::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->count();
        $list_lhp = DB::table('daftar_lhps')
            ->leftJoin('pemeriksas', 'daftar_lhps.np2', '=', 'pemeriksas.np2')
            ->select('daftar_lhps.*', 'pemeriksas.fpp1', 'pemeriksas.fpp2', 'pemeriksas.fpp3', 'pemeriksas.fpp4', 'pemeriksas.pic',
            DB::raw('
            CASE
            WHEN left(daftar_lhps.kode_rik,1) = 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) < 253 THEN 1
                WHEN left(daftar_lhps.kode_rik,1) = 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) > 252 THEN 0.8
                WHEN left(daftar_lhps.kode_rik,1) != 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) < 253 THEN 0.3
                WHEN left(daftar_lhps.kode_rik,1) != 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) > 252 THEN 0.25
            END as konversi
            ')
            )
            ->where('daftar_lhps.up2','=',$kode_kpp)
            ->where('daftar_lhps.th_lhp','=',$tahun)
            ->orderBy('daftar_lhps.lhp','desc')
            ->get();
        // dd($test);
        // $where('up2','=',$kode_kpp) = DaftarLhp::where('up2','=',$kode_kpp)->where('up2','=',$kode_kpp)->orderBy('lhp','desc')->get();
        return view('lhp',compact('list_lhp','jumlah_lhp','tahun'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $tahun = $id;
        // $kode_kpp = "056";
        // $jumlah_lhp = DaftarLhp::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->count();
        // $list_lhp = DB::table('daftar_lhps')
        //     ->leftJoin('pemeriksas', 'daftar_lhps.np2', '=', 'pemeriksas.np2')
        //     ->select('daftar_lhps.*', 'pemeriksas.fpp1', 'pemeriksas.fpp2', 'pemeriksas.fpp3', 'pemeriksas.fpp4', 'pemeriksas.pic',
        //     DB::raw('
        //     CASE
        //     WHEN left(daftar_lhps.kode_rik,1) = 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) < 253 THEN 1
        //         WHEN left(daftar_lhps.kode_rik,1) = 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) > 252 THEN 0.8
        //         WHEN left(daftar_lhps.kode_rik,1) != 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) < 253 THEN 0.3
        //         WHEN left(daftar_lhps.kode_rik,1) != 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) > 252 THEN 0.25
        //     END as konversi
        //     ')
        //     )
        //     ->where('daftar_lhps.up2','=',$kode_kpp)
        //     ->where('daftar_lhps.th_lhp','=',$tahun)
        //     ->orderBy('daftar_lhps.lhp','desc')
        //     ->get();
        // // dd($test);
        // // $where('up2','=',$kode_kpp) = DaftarLhp::where('up2','=',$kode_kpp)->where('up2','=',$kode_kpp)->orderBy('lhp','desc')->get();
        // return view('lhp',compact('list_lhp','jumlah_lhp','tahun'));
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
