<?php

namespace App\Http\Controllers;

use App\Models\Mfwp;
use App\Models\View_lhp_all;
use App\Models\View_tunggakan_all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $hasil_cari = Mfwp::where('npwp', 'like', '%' . $request->npwp . '%')->orWhere('nama_wp', 'like', '%' . $request->npwp . '%')->get();
        
        return view('hasilpencarian', compact('hasil_cari'));
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
        $year_now = date('Y');
        $year_1 = date('Y') - 1;
        $year_2 = date('Y') - 2;
        $year_3 = date('Y') - 3;
        $year_4 = date('Y') - 4;
        $year_5 = date('Y') - 5;
        $data = Mfwp::where('npwp','=',$id)->first();
        $lhp = View_lhp_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->orderBy('tahun_pemeriksaan','desc')
                            ->get();
        $lhp2 = View_lhp_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',2)
                            ->orderBy('tahun_pemeriksaan','desc')
                            ->get();
        $tunggakan = View_tunggakan_all::where('npwp','=',$id)
                            ->orderBy('jenis_kode','desc')
                            ->orderBy('tahun_pemeriksaan','desc')
                            ->get();
        $tahun_ini = View_lhp_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->where('tahun_pemeriksaan','=',$year_now)
                            ->count();
        $tahun_1 = View_lhp_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->where('tahun_pemeriksaan','=',$year_1)
                            ->count();
        $tahun_2 = View_lhp_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->where('tahun_pemeriksaan','=',$year_2)
                            ->count();
        $tahun_3 = View_lhp_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->where('tahun_pemeriksaan','=',$year_3)
                            ->count();
        $tahun_4 = View_lhp_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->where('tahun_pemeriksaan','=',$year_4)
                            ->count();
        $tahun_5 = View_lhp_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->where('tahun_pemeriksaan','=',$year_5)
                            ->count();
        $tunggakan_t0 = View_tunggakan_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->where('tahun_pemeriksaan','=',$year_now)
                            ->count();
        $tunggakan_t1 = View_tunggakan_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->where('tahun_pemeriksaan','=',$year_1)
                            ->count();
        $tunggakan_t2 = View_tunggakan_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->where('tahun_pemeriksaan','=',$year_2)
                            ->count();
        $tunggakan_t3 = View_tunggakan_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->where('tahun_pemeriksaan','=',$year_3)
                            ->count();
        $tunggakan_t4 = View_tunggakan_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->where('tahun_pemeriksaan','=',$year_4)
                            ->count();
        $tunggakan_t5 = View_tunggakan_all::where('npwp','=',$id)
                            ->where('jenis_kode','=',1)
                            ->where('tahun_pemeriksaan','=',$year_5)
                            ->count();
        // echo $lhp;
        return view('profiling', compact('data','lhp','lhp2','tunggakan','tahun_ini','tahun_1','tahun_2','tahun_3','tahun_4','tahun_5','tunggakan_t0','tunggakan_t1','tunggakan_t2','tunggakan_t3','tunggakan_t4','tunggakan_t5'));
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
