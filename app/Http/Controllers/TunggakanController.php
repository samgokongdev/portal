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
        $pemeriksaan_jt_dekat = View_tunggakan_all::where('sisa_waktu','<','14')->where('sp2','!=','')->count();
        $whatsapp = View_tunggakan_all::where('sisa_waktu','>','-1')->where('sisa_waktu','<','14')->where('sp2','!=','')->get();
        return view('tunggakan', compact('list_tunggakan','rekap_tunggakan','np2_belum_sp2','pemeriksaan_jt_dekat','whatsapp'));
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
            'nd_penunjukan' => 'required',
            'tgl_nd' => 'required|min:2|max:2',
            'bln_nd' => 'required|min:2|max:2',
            'thn_nd' => 'required|min:4|max:4',
            'fpp1' => 'required',
            'fpp2' => 'required',
            'fpp3' => 'required',
            'fpp4' => 'required',
            'pic' => 'required',
        ]);

        $jt = $request->thn_jt.'-'.$request->bln_jt.'-'.$request->tgl_jt;
        $nd = $request->thn_nd.'-'.$request->bln_nd.'-'.$request->tgl_nd;
        $delete_pemeriksa_lama=Pemeriksa::where('np2',$request->np2)->delete();
        // echo $jt;
        $simpan_data_pemeriksa = Pemeriksa::create([
            'np2' => $request->np2,
            'nd_penunjukan' => $request->nd_penunjukan,
            'tgl_nd_penunjukan' => $nd,
            'fpp1' => $request->fpp1,
            'fpp2' => $request->fpp2,
            'fpp3' => $request->fpp3,
            'fpp4' => $request->fpp4,
            'pic' => $request->pic,
            'jt' => $jt,
            'progress' => $request->progress,
            'nilai_lb' => $request->nilai_lb,
            'omset' => $request->omset,
            'potensi' => $request->potensi,
        ]);


        if(!$simpan_data_pemeriksa){
            return back()->with('inputError','Gagal Update Data, Periksa Kembali Inputan Anda');
        } else {
            return redirect('/tunggakan')->with('success', 'Input/Edit data tunggakan berhasil!!');
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jt()
    {
        $rekap_tunggakan = Tunggakan::where('sp2','!=','')->count('id_pemeriksaan');
        $np2_belum_sp2 = Tunggakan::where('sp2','=','')->count('id_pemeriksaan');
        $list_tunggakan = View_tunggakan_all::where('sp2','!=','')->where('sisa_waktu','<','14')->orderBy('sisa_waktu','asc')->get();
        $pemeriksaan_jt_dekat = View_tunggakan_all::where('sisa_waktu','<','14')->where('sp2','!=','')->count();
        $whatsapp = View_tunggakan_all::where('sisa_waktu','>','-1')->where('sisa_waktu','<','14')->where('sp2','!=','')->get();
        return view('tunggakan', compact('list_tunggakan','rekap_tunggakan','np2_belum_sp2','pemeriksaan_jt_dekat','whatsapp'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function np2belumterbit()
    {
        $rekap_tunggakan = Tunggakan::where('sp2','!=','')->count('id_pemeriksaan');
        $np2_belum_sp2 = Tunggakan::where('sp2','=','')->count('id_pemeriksaan');
        $list_tunggakan = View_tunggakan_all::where('sp2','=','')->orderBy('sisa_waktu','asc')->get();
        $pemeriksaan_jt_dekat = View_tunggakan_all::where('sisa_waktu','<','14')->where('sp2','!=','')->count();
        $whatsapp = View_tunggakan_all::where('sisa_waktu','>','-1')->where('sisa_waktu','<','14')->where('sp2','!=','')->get();
        return view('tunggakan', compact('list_tunggakan','rekap_tunggakan','np2_belum_sp2','pemeriksaan_jt_dekat','whatsapp'));
    }
}
