<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persuratan;

class PersuratanPemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun = date('Y');
        $jenis1 = 'ND';
        $jenis2 = 'S';
        $jenis3 = 'UND';

        $data1_terakhir = Persuratan::where('jenis','=',$jenis1)
                        ->where('tahun','=',$tahun)
                        ->orderBy('id','desc')
                        ->first();
        $data2_terakhir = Persuratan::where('jenis','=',$jenis2)
                        ->where('tahun','=',$tahun)
                        ->orderBy('id','desc')
                        ->first();
        $data3_terakhir = Persuratan::where('jenis','=',$jenis3)
                        ->where('tahun','=',$tahun)
                        ->orderBy('id','desc')
                        ->first();

        $data1 = Persuratan::where('jenis','=',$jenis1)
                        ->where('tahun','=',$tahun)
                        ->orderBy('id','desc')
                        ->get();
        $data2 = Persuratan::where('jenis','=',$jenis2)
                        ->where('tahun','=',$tahun)
                        ->orderBy('id','desc')
                        ->get();
        $data3 = Persuratan::where('jenis','=',$jenis3)
                        ->where('tahun','=',$tahun)
                        ->orderBy('id','desc')
                        ->get();
        // echo "persuratan";
        return view('persuratan',compact('tahun','data1','data2','data3','data1_terakhir','data2_terakhir','data3_terakhir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buatsurat');
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
            'jenis' => 'required',
            'tujuan' => 'required',
            'perihal' => 'required',
            'konseptor' => 'required',
            'kelompok' => 'required'
        ]);

        $last_num = Persuratan::where('jenis','=',$request->jenis)
                            ->where('tahun','=',date('Y'))
                            ->count();
        if($last_num == 0){
            $next_num = 1;
        } else {
            $last_num2 = Persuratan::where('jenis','=',$request->jenis)
                            ->where('tahun','=',date('Y'))
                            ->orderBy('no','desc')
                            ->first();
            $next_num = $last_num2->no + 1;
        }

        $buat =  Persuratan::create([
            'no' => $next_num, 
            'jenis' => $request->jenis,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'sp2' => $request->sp2,
            'sphp' => $request->sphp,
            'konseptor' => $request->konseptor,
            'kelompok' => $request->kelompok
        ]);

        if(!$buat){
            return back()->with('inputError','Pangambilan Nomor Naskah Dinas Gagal, Silahkan Perhatikan inputan anda');
        } else {
            return redirect('/persuratan')->with('success', 'Pengambilan Nomor Naskah Dinas Berhasil');
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
        // echo $id;
        // $data_nadin = Persuratan::where('id','=',$id)->orderBy('id','desc')->first();
        // $data_nadin = Persuratan::find($id);
        // echo $data_nadin;
        // $jenis = $data_nadin->jenis;
        // return view('editsurat', compact('id'));
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
        $validasi =$request->validate([
            'jenis' => 'required',
            'tujuan' => 'required',
            'perihal' => 'required',
            'konseptor' => 'required',
            'kelompok' => 'required'
        ]);

        $cari = Persuratan::findOrFail($id);

        $cari->update([
            'jenis' => $request->jenis,
            'tujuan' => $request->tujuan,
            'perihal' => $request->perihal,
            'sp2' => $request->sp2,
            'sphp' => $request->sphp,
            'konseptor' => $request->konseptor,
            'kelompok' => $request->kelompok
        ]);

        // return back();

        if(!$cari){
            return back()->with('inputError','Update Nomor Naskah Dinas Gagal, Silahkan Perhatikan inputan anda');
        } else {
            return redirect('/persuratan')->with('success', 'Update Nomor Naskah Dinas Berhasil');
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
        $cari = Persuratan::findOrFail($id);

        $cari->delete();

        if(!$cari){
            return back()->with('inputError','Hapus Nomor Naskah Dinas Gagal');
        } else {
            return redirect('/persuratan')->with('success', 'Hapus Nomor Naskah Dinas Berhasil');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buat($id)
    {
        return view('buatsurat',['id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cari(Request $request)
    {   
        $data = Persuratan::findOrFail($request->id);
        $cek = Persuratan::where('jenis','=',$request->jenis)->orderBy('id','desc')->first();

        if($data->id == $cek->id){
            $allow = 1;
        }else{
            $allow = 0;
        }

        // echo $data->jenis;
        return view('editsurat', compact('data','allow'));
    }
}
