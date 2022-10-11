<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\DaftarLhp;
use App\Models\Digifile;
use App\Models\Lhp;
use App\Models\Pemeriksa;
use App\Models\Permohonan;
use App\Models\Skp;
use App\Models\View_lhp_all;

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
        $kode_kpp = "057";
        $jumlah_lhp = Lhp::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->count();
        $konversi = Lhp::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->sum('konversi');
        $list_lhp = Lhp::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->orderBy('tgl_lhp','desc')->get();
        return view('lhp',compact('list_lhp','jumlah_lhp','tahun','konversi'));
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
        $kode_kpp = "057";
        $jumlah_lhp = Lhp::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->count();
        $konversi = Lhp::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->sum('konversi');
        $list_lhp = Lhp::where('up2','=',$kode_kpp)->where('th_lhp','=',$tahun)->orderBy('tgl_lhp','desc')->get();
        // $list_lhp = DB::table('daftar_lhps')
        //     ->leftJoin('pemeriksas', 'daftar_lhps.np2', '=', 'pemeriksas.np2')
        //     ->select('daftar_lhps.*', 'pemeriksas.fpp1', 'pemeriksas.fpp2', 'pemeriksas.fpp3', 'pemeriksas.fpp4', 'pemeriksas.pic', 'pemeriksas.nd_ply', 'pemeriksas.tgl_nd_ply',
        //     DB::raw('
        //     CASE
        //         WHEN left(daftar_lhps.kode_rik,1) = 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) < 253 THEN 1
        //         WHEN left(daftar_lhps.kode_rik,1) = 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) > 252 THEN 0.8
        //         WHEN left(daftar_lhps.kode_rik,1) = 5 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) < 253 THEN 1
		//         WHEN left(daftar_lhps.kode_rik,1) = 5 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) > 252 THEN 0.8 
        //         WHEN left(daftar_lhps.kode_rik,1) != 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) < 253 THEN 0.3
        //         WHEN left(daftar_lhps.kode_rik,1) != 1 and TIMESTAMPDIFF(DAY,pemeriksas.tgl_sp2_konversi,daftar_lhps.tgl_lhp) > 252 THEN 0.25
        //     END as konversi
        //     ')
        //     )
        //     ->where('daftar_lhps.up2','=',$kode_kpp)
        //     ->where('daftar_lhps.th_lhp','=',$tahun)
        //     ->orderBy('daftar_lhps.lhp','desc')
        //     ->get();
        // dd($test);
        // $where('up2','=',$kode_kpp) = DaftarLhp::where('up2','=',$kode_kpp)->where('up2','=',$kode_kpp)->orderBy('lhp','desc')->get();
        return view('lhp',compact('list_lhp','jumlah_lhp','tahun','konversi'));
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
        $np2 = $id;
        $data = View_lhp_all::where('np2','=',$np2)->first();

        // $cek1 = Pemeriksa::where('np2','=',$id)->count();
        // $cek2 = Progrespemeriksaan::where('np2','=',$id)->count();
        // if($cek1 == 1 || $cek2 == 1){
        //     echo "";
        // }
        // echo $data;
        return view('detaillhp',compact('data'));
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
        $validasi = $request->validate([
            'nd_ply' => 'required',
            'tgl_nd_ply' => 'required',
        ]);

        $cari = Pemeriksa::where('np2','=',$id)->first();

        $cari->update([
            'nd_ply' => $request->nd_ply,
            'tgl_nd_ply' => $request->tgl_nd_ply,
        ]);

        if(!$cari){
            return back()->with('inputError','Gagal, Silahkan Ulangi');
        } else {
            return back()->with('success', 'Update Nomor Naskah Dinas Berhasil');
        }
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

    public function updatedata(Request $request)
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
            $tgl_sp2_konversi = $tgl_sp2;
            $tgl_sp2p = null;
        }else{
            $tgl_sp2_konversi= $request->thn_sp2p.'-'.$request->bln_sp2p.'-'.$request->tgl_sp2p;
            $tgl_sp2p = $request->thn_sp2p.'-'.$request->bln_sp2p.'-'.$request->tgl_sp2p;
        };

        $delete_pemeriksa_lama=Pemeriksa::where('np2',$request->np2)->delete();
        // echo $request->tgl_sp2;
        $simpan_data_pemeriksa = Pemeriksa::create([
            'np2' => $request->np2,
            'nd_penunjukan' => $request->nd_penunjukan,
            'sp2p' => $request->sp2p,
            'tgl_sp2' => $tgl_sp2,
            'tgl_sp2p' => $tgl_sp2p,
            'tgl_sp2_konversi' => $tgl_sp2_konversi,
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
            return redirect('/lhp')->with('success', 'Input/Edit data tunggakan berhasil!!');
        }


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rekaplhp()
    {
        $tahun = date("Y");
        $kode_kpp = "057";
        $rekap_per_spv = Lhp::selectRaw('spv, sum(konversi) as konversi, count(lhp) as jumlah_lhp')
                                    ->where('up2','=',$kode_kpp)
                                    ->where('th_lhp','=',$tahun)
                                    ->groupBy('spv')
                                    ->orderBy('konversi','desc')
                                    ->get();
        $rekap_per_kt = Lhp::selectRaw('kt, sum(konversi) as konversi, count(lhp) as jumlah_lhp')
                                    ->where('up2','=',$kode_kpp)
                                    ->where('th_lhp','=',$tahun)
                                    ->groupBy('kt')
                                    ->orderBy('konversi','desc')
                                    ->get();
        return view('rekaplhp', compact('tahun','rekap_per_spv','rekap_per_kt'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailperspv($id)
    {
        $tahun = date("Y");
        $keyword = $id;
        $kode_kpp = '057';
        $data_per_pic = Lhp::selectRaw('spv,kt,nama_wp,periode_1,periode_2,lhp,tgl_lhp,kode_rik,konversi')
                                    ->where('up2','=',$kode_kpp)
                                    ->where('th_lhp','=',$tahun)
                                    ->where('spv','=',$keyword)
                                    ->orderBy('tgl_lhp','desc')
                                    ->get();
        // echo $data_per_pic;
        return view('detailrekapspv', compact('tahun','data_per_pic'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detailperpic($id)
    {
        $tahun = date("Y");
        $keyword = $id;
        $kode_kpp = '057';
        $data_per_pic = Lhp::selectRaw('spv,kt,nama_wp,periode_1,periode_2,lhp,tgl_lhp,kode_rik,konversi')
                                    ->where('up2','=',$kode_kpp)
                                    ->where('th_lhp','=',$tahun)
                                    ->where('kt','=',$keyword)
                                    ->orderBy('tgl_lhp','desc')
                                    ->get();
        // echo $data_per_pic;
        return view('detailrekapspv', compact('tahun','data_per_pic'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rekaplhptahun($id)
    {
        $tahun = $id;
        $kode_kpp = "057";
        $rekap_per_spv = View_lhp_all::selectRaw('fpp1,kelompok, sum(konversi) as konversi, count(lhp) as jumlah_lhp')
                                    ->where('up2','=',$kode_kpp)
                                    ->where('th_lhp','=',$tahun)
                                    ->groupBy('fpp1')
                                    ->orderBy('kelompok','asc')
                                    ->get();
        $rekap_per_pic = View_lhp_all::selectRaw('pic,kelompok, sum(konversi) as konversi, count(lhp) as jumlah_lhp')
                                    ->where('up2','=',$kode_kpp)
                                    ->where('th_lhp','=',$tahun)
                                    ->groupBy('pic')
                                    ->orderBy('kelompok','asc')
                                    ->get();
        return view('rekaplhp', compact('tahun','rekap_per_spv','rekap_per_pic'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function arsiplhp($id)
    {
        $roles = Auth::user()->roles;
        $pemohon = Auth::user()->username;
        $cek = Permohonan::where('np2','=',$id)->where('is_approve','=',1)->where('pemohon','=',$pemohon)->count();
        if($roles > 4)
        {
            $data_inti = Lhp::where('np2','=',$id)->first();
            $data_skpkb = Skp::where('np2','=',$id)
            ->where('jns_skp','!=','SKPLB')
            ->where('jns_skp','!=','SKPN')
            ->where('sumber','!=',"LAPPEN")
            ->orderBy('tgl_produk_hukum','desc')
            ->get();
            $data_skplb = Skp::where('np2', '=',$id)
            ->where('jns_skp','=','SKPLB')
            // ->where('jns_skp','!=','SKPN')
            ->where('sumber','!=',"LAPPEN")
            ->orderBy('tgl_produk_hukum','desc')
            ->get();
            $pembayaran = DB::table('penerimaans')
            ->leftJoin('skps','penerimaans.no_skp', '=', 'skps.nomor_ket')
            ->select('skps.jns_skp', 'skps.pasal_skp', 'skps.nomor_ket', 'skps.tgl_produk_hukum', 'skps.jumlah_ket_idr', 'penerimaans.jumlah', 'penerimaans.ntpn', 'penerimaans.tanggal_gabung')
            ->where('skps.np2','=',$id)
            ->get();
            $digifile = Digifile::where('np2','=',$id)->orderBy('id','desc')->get();

        $jumlah_skpkb = Skp::where('np2','=',$id)
        ->where('jns_skp','!=','SKPLB')
                    ->where('jns_skp','!=','SKPN')
                    ->where('sumber','!=',"LAPPEN")
                    ->sum('jumlah_ket_idr');
        $jumlah_skplb = Skp::where('np2','=',$id)
                    ->where('jns_skp','=','SKPLB')
                    ->where('sumber','!=',"LAPPEN")
                    ->sum('jumlah_ket_idr');
        $jumlah_pembayaran = DB::table('penerimaans')
        ->leftJoin('skps','penerimaans.no_skp', '=', 'skps.nomor_ket')
        ->select('skps.jns_skp', 'skps.pasal_skp', 'skps.nomor_ket', 'skps.tgl_produk_hukum', 'skps.jumlah_ket_idr', 'penerimaans.jumlah', 'penerimaans.ntpn', 'penerimaans.tanggal_gabung')
        ->where('skps.np2','=',$id)
        ->sum('penerimaans.jumlah');
        
        // echo $pembayaran;
        return view('arsip', compact('data_inti','data_skpkb','data_skplb','pembayaran','digifile','jumlah_skpkb','jumlah_skplb','jumlah_pembayaran'));
        } 
        else if($roles < 4 && $cek > 0) 
        {
            $data_inti = View_lhp_all::where('np2','=',$id)->first();
            $data_skpkb = Skp::where('np2','=',$id)
            ->where('jns_skp','!=','SKPLB')
            ->where('jns_skp','!=','SKPN')
            ->where('sumber','!=',"LAPPEN")
            ->orderBy('tgl_produk_hukum','desc')
            ->get();
            $data_skplb = Skp::where('np2', '=',$id)
            ->where('jns_skp','=','SKPLB')
            // ->where('jns_skp','!=','SKPN')
            ->where('sumber','!=',"LAPPEN")
            ->orderBy('tgl_produk_hukum','desc')
            ->get();
            $pembayaran = DB::table('penerimaans')
            ->leftJoin('skps','penerimaans.no_skp', '=', 'skps.nomor_ket')
            ->select('skps.jns_skp', 'skps.pasal_skp', 'skps.nomor_ket', 'skps.tgl_produk_hukum', 'skps.jumlah_ket_idr', 'penerimaans.jumlah', 'penerimaans.ntpn', 'penerimaans.tanggal_gabung')
            ->where('skps.np2','=',$id)
            ->get();
            $digifile = Digifile::where('np2','=',$id)->orderBy('id','desc')->get();

        $jumlah_skpkb = Skp::where('np2','=',$id)
        ->where('jns_skp','!=','SKPLB')
                    ->where('jns_skp','!=','SKPN')
                    ->where('sumber','!=',"LAPPEN")
                    ->sum('jumlah_ket_idr');
        $jumlah_skplb = Skp::where('np2','=',$id)
                    ->where('jns_skp','=','SKPLB')
                    ->where('sumber','!=',"LAPPEN")
                    ->sum('jumlah_ket_idr');
        $jumlah_pembayaran = DB::table('penerimaans')
        ->leftJoin('skps','penerimaans.no_skp', '=', 'skps.nomor_ket')
        ->select('skps.jns_skp', 'skps.pasal_skp', 'skps.nomor_ket', 'skps.tgl_produk_hukum', 'skps.jumlah_ket_idr', 'penerimaans.jumlah', 'penerimaans.ntpn', 'penerimaans.tanggal_gabung')
        ->where('skps.np2','=',$id)
        ->sum('penerimaans.jumlah');
        
        // echo $pembayaran;
        return view('arsip', compact('data_inti','data_skpkb','data_skplb','pembayaran','digifile','jumlah_skpkb','jumlah_skplb','jumlah_pembayaran'));
        } else if ($roles < 4 && $cek == 0)
        {
            return view('na',compact('id'));
        } else {
            return view('na',compact('id'));
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permohonan()
    {
        $username = Auth::user()->username;
        $roles = Auth::user()->roles;
        if($roles == 7){
            $data_permohonan = DB::table('permohonans')
            ->leftJoin('View_lhp_alls','permohonans.np2', '=', 'View_lhp_alls.np2')
            ->select('permohonans.id','permohonans.np2', 'View_lhp_alls.npwp', 'View_lhp_alls.nama_wp', 'View_lhp_alls.kode_rik', 'View_lhp_alls.periode_1', 'View_lhp_alls.periode_2', 'View_lhp_alls.lhp', 'View_lhp_alls.tgl_lhp','permohonans.is_approve','permohonans.pemohon')
            ->where('permohonans.is_inactive','=','0')
            ->orderBy('permohonans.id','desc')
            ->get();
        }else{
            $data_permohonan = DB::table('permohonans')
            ->leftJoin('View_lhp_alls','permohonans.np2', '=', 'View_lhp_alls.np2')
            ->select('permohonans.id','permohonans.np2', 'View_lhp_alls.npwp', 'View_lhp_alls.nama_wp', 'View_lhp_alls.kode_rik', 'View_lhp_alls.periode_1', 'View_lhp_alls.periode_2', 'View_lhp_alls.lhp', 'View_lhp_alls.tgl_lhp','permohonans.is_approve','permohonans.pemohon')
            ->where('permohonans.pemohon','=',$username)
            ->where('permohonans.is_inactive','=','0')
            ->orderBy('permohonans.id','desc')
            ->get();
        }
        
        // echo $data_permohonan;
        return view('permohonan',compact('data_permohonan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buatpermohonan($id)
    {
        $np2 = $id;
        $roles = Auth::user()->roles;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajukan(Request $request)
    {
        $username = Auth::user()->username;
        $validasi =$request->validate([
            'np2' => 'required',
            'pemohon' => 'required',
        ]);

        $buat =  Permohonan::create([
            'np2' => $request->np2,
            'pemohon' => $request->pemohon  ,
            'is_approve' => 0,
            'is_inactive' => 0,
        ]);

        if(!$buat){
            return back()->with('inputError','Pangambilan Nomor Naskah Dinas Gagal, Silahkan Perhatikan inputan anda');
        } else {
            return redirect()->route('lhp.permohonan')->with('success', 'Permohonan Diajukan');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request)
    {
        $validasi =$request->validate([
            'id' => 'required',
            'is_approve' => 'required',
        ]);

        $permohonan = Permohonan::findOrFail($request->id);

        $permohonan->update([
            'is_approve' => $request->is_approve
        ]);

        if($permohonan->is_approve == 0){
            return redirect()->route('lhp.permohonan')->with('success', 'Permohonan Dibatalkan/Ditolak');
        } else {
            return redirect()->route('lhp.permohonan')->with('success', 'Permohonan Disetujui');
        }
    }

}
