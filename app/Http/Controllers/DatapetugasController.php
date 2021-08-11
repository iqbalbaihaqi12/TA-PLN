<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;



class DatapetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapetugas = User::all();
        return view('admin.datapetugas.Data-petugas',compact('datapetugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.datapetugas.Create-petugas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request->all());
     User::create([
        'name' => $request->name,
        'level' => $request->level,
        'email' => $request->email,
        'username' => $request->username,
        'password' => bcrypt($request->password),
     ]);
     return redirect('admin/datapetugas')->with('toast_success', 'Petugas Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datapetugas= User::findorfail($id);
        return view('admin.datapetugas.Edit-petugas',compact('datapetugas'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datapetugas=User::findorfail($id);
       $datapetugas->delete();
        return back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
