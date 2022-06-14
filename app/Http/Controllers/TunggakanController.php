<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksa;
use App\Models\Progrespemeriksaan;
use App\Models\Tunggakan;
use App\Models\View_tunggakan_all;
use Illuminate\Http\Request;

class TunggakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekap_tunggakan = Tunggakan::where('sp2','!=','')->count('id_pemeriksaan');
        $np2_belum_sp2 = Tunggakan::where('sp2','=','')->count('id_pemeriksaan');
        $list_tunggakan = View_tunggakan_all::where('sp2','!=','')->orderBy('sisa_waktu','asc')->get();
        $pemeriksaan_jt_dekat = View_tunggakan_all::where('sisa_waktu','<','14')->count();
        return view('tunggakan', compact('list_tunggakan','rekap_tunggakan','np2_belum_sp2','pemeriksaan_jt_dekat'));
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
            'np2' => 'required',
            'tgl_jt' => 'required|min:2|max:2',
            'bln_jt' => 'required|min:2|max:2',
            'thn_jt' => 'required|min:4|max:4',
            'fpp1' => 'required',
            'fpp2' => 'required',
            'fpp3' => 'required',
            'fpp4' => 'required',
            'pic' => 'required',
        ]);

        $jt = $request->thn_jt.'-'.$request->bln_jt.'-'.$request->tgl_jt;
        $delete_pemeriksa_lama=Pemeriksa::where('np2',$request->np2)->delete();
        $delete_progress_lama=Progrespemeriksaan::where('np2',$request->np2)->delete();
        // echo $jt;
        $simpan_data_pemeriksa = Pemeriksa::create([
            'np2' => $request->np2,
            'fpp1' => $request->fpp1,
            'fpp2' => $request->fpp2,
            'fpp3' => $request->fpp3,
            'fpp4' => $request->fpp4,
            'pic' => $request->pic,
        ]);

        $simpan_data_progress = Progrespemeriksaan::create([
            'np2' => $request->np2,
            'jt' => $jt,
            'progress' => $request->progress
        ]);

        return redirect('/tunggakan')->with('success', 'Input/Edit data tunggakan berhasil!!');
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
        $data = View_tunggakan_all::where('np2','=',$id)->first();

        // $cek1 = Pemeriksa::where('np2','=',$id)->count();
        // $cek2 = Progrespemeriksaan::where('np2','=',$id)->count();
        // if($cek1 == 1 || $cek2 == 1){
        //     echo "";
        // }
        // echo $data;
        return view('detailpemeriksaan',compact('data'));
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
