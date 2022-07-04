<?php

namespace App\Http\Controllers;

use App\Models\Digifile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
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
        $request->validate([
            'file' => 'required|mimes:pdf',
            'np2' => 'required',
            'jenis_file'=> 'required',
        ]);

        $path = $request->file('file')->store('pdf');

        $simpan = Digifile::create([
            'np2' => $request->np2,
            'jenis_file' => $request->jenis_file,
            'keterangan' => $request->keterangan,
            'path' => $path
        ]);

        if(!$simpan){
            return back()->with('inputError','Gagal, Silahkan Ulangi');
        } else {
            return back()->with('success', 'Update Nomor Naskah Dinas Berhasil');
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
        $url = Digifile::where('id','=',$id)->first();
        $path = $url->path;
        return Storage::download($path);
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
        // echo $id;

        $data = Digifile::findOrFail($id);
        // $cek = Persuratan::where('jenis','=',$request->jenis)->orderBy('id','desc')->first();
        $path = $data->path;

        Storage::delete($path);

        $data->delete();

        if(!$data){
            return back()->with('inputError','Gagal, Silahkan Ulangi');
        } else {
            return back()->with('success', 'Hapus Data Berhasil');
        }

        // echo $data->jenis;
        // return view('editsurat', compact('data','allow'));
    }
}
