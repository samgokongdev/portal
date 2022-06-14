<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
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
        $validatedData =$request->validate([
            'name' => 'required|max:255|min:3',
            'username' => 'required|min:9|max:9|unique:users',
            'password' => 'required|min:8|max:255',
            'seksi' => 'required',
            'roles' => 'required'
        ]);

        $status = '1';
        $simpan = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'seksi' => $request->seksi,
            'roles' => $request->roles,
            'status' => $status,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/register')->with('success', 'Registrasi User Berhasil !! Silahkan Login');


        // $validatedData['password'] = Hash::make($validatedData['password']);

        // User::create($validatedData);

        // return redirect('/login')->with('success', 'Registrasi User Berhasil !! Silahkan Login');
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
