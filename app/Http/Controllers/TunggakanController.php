<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksa;
use App\Models\Progrespemeriksaan;
use App\Models\Tunggakan;
use App\Models\View_tunggakan_all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TunggakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekap_tunggakan = Tunggakan::where('sp2','!=','')->where('fg_jt','=','OK')->count();
        $np2_belum_sp2 = Tunggakan::where('sp2','=','')->count();
        $list_tunggakan = Tunggakan::where('sp2','!=','')->where('fg_jt','=','OK')->orderBy('sisa_hari','asc')->get();
        $pemeriksaan_jt_dekat = Tunggakan::where('sisa_hari','<','15')->where('sp2','!=','')->where('fg_jt','=','OK')->count();
        $whatsapp = Tunggakan::where('sisa_hari','>','-1')->where('sisa_hari','<','15')->where('sp2','!=','')->where('fg_jt','=','OK')->orderBy('sisa_hari','asc')->get();
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
            // 'fpp4' => 'required',
            // 'pic' => 'required',
        ]);

        $jt = $request->thn_jt.'-'.$request->bln_jt.'-'.$request->tgl_jt;
        $nd = $request->thn_nd.'-'.$request->bln_nd.'-'.$request->tgl_nd;
        $tgl_sp2 = $request->thn_sp2.'-'.$request->bln_sp2.'-'.$request->tgl_sp2;
        
        if(!$request->tgl_sp2p || !$request->bln_sp2p || !$request->thn_sp2p){
            $tgl_sp2p = null;
            $tgl_sp2_konversi = $tgl_sp2;
        } else {
            $tgl_sp2p = $request->thn_sp2p.'-'.$request->bln_sp2p.'-'.$request->tgl_sp2p;
            $tgl_sp2_konversi= $tgl_sp2p;
        }

        $delete_pemeriksa_lama=Pemeriksa::where('np2',$request->np2)->delete();
        echo $jt;
        $simpan_data_pemeriksa = Pemeriksa::create([
            'np2' => $request->np2,
            'sp2p' => $request->sp2p,
            'tgl_sp2' => $tgl_sp2,
            'tgl_sp2p' => $tgl_sp2p,
            'tgl_sp2_konversi' => $tgl_sp2_konversi,
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
            echo "error";
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
        $rekap_tunggakan = Tunggakan::where('sp2','!=','')->where('fg_jt','=','OK')->count();
        $np2_belum_sp2 = Tunggakan::where('sp2','=','')->count();
        $list_tunggakan = Tunggakan::where('sisa_hari','<','15')->where('sp2','!=','')->where('fg_jt','=','OK')->orderBy('sisa_hari','asc')->get();
        $pemeriksaan_jt_dekat = Tunggakan::where('sisa_hari','<','15')->where('sp2','!=','')->where('fg_jt','=','OK')->count();
        $whatsapp = Tunggakan::where('sisa_hari','>','-1')->where('sisa_hari','<','15')->where('sp2','!=','')->where('fg_jt','=','OK')->orderBy('sisa_hari','asc')->get();
        return view('tunggakan', compact('list_tunggakan','rekap_tunggakan','np2_belum_sp2','pemeriksaan_jt_dekat','whatsapp'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function np2belumterbit()
    {
        $rekap_tunggakan = Tunggakan::where('sp2','!=','')->where('fg_jt','=','OK')->count();
        $np2_belum_sp2 = Tunggakan::where('sp2','=','')->count();
        $list_tunggakan = Tunggakan::where('sp2','=','')->orderBy('sisa_hari','asc')->get();
        $pemeriksaan_jt_dekat = Tunggakan::where('sisa_hari','<','15')->where('sp2','!=','')->where('fg_jt','=','OK')->count();
        $whatsapp = Tunggakan::where('sisa_hari','>','-1')->where('sisa_hari','<','15')->where('sp2','!=','')->where('fg_jt','=','OK')->orderBy('sisa_hari','asc')->get();
        return view('tunggakan', compact('list_tunggakan','rekap_tunggakan','np2_belum_sp2','pemeriksaan_jt_dekat','whatsapp'));
    }

    public function rekapTunggakanPerFpp()
    {
        $rekap_per_spv = Tunggakan::where('sp2','!=','')
                                    ->groupBy('spv')
                                    ->select('spv', DB::raw('count(case when sp2 != "" and LEFT(kode_rik,1) = "2" THEN np2 END) as ppn'), DB::raw('count(case when sp2 != "" and LEFT(kode_rik,1) != "2" THEN np2 END) as non_ppn'))
                                    ->orderBy('spv','asc')
                                    ->get();
        $rekap_per_tim = Tunggakan::where('sp2','!=','')
                                    ->groupBy('kt')
                                    ->select('kt', DB::raw('count(case when sp2 != "" and LEFT(kode_rik,1) = "2" THEN np2 END) as ppn'), DB::raw('count(case when sp2 != "" and LEFT(kode_rik,1) != "2" THEN np2 END) as non_ppn'))
                                    ->orderBy('kt','asc')
                                    ->get();

        return view('rekapitulasi', compact('rekap_per_spv','rekap_per_tim'));
        // echo $tes;
    }
}
