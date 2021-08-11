<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal_Inspeksi;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal_Inspeksi::all();
        return view('admin.jadwal.Data-jadwal',compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jadwal.Create-jadwal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   dd($request->all());
    Jadwal_Inspeksi::create([
        'tanggal' => $request->tanggal,
        'penyulang' => $request->penyulang,
        'section' => $request->section,
    ]);

    return redirect('/admin/jadwal')->with('toast_success', 'Jadwal Berhasil Ditambahkan');
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
        $jadwal= Jadwal_Inspeksi::findorfail($id);
        return view('admin.jadwal.Edit-jadwal',compact('jadwal'));
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
        $jadwal= Jadwal_Inspeksi::findorfail($id);
        $jadwal->update($request->all());
        return redirect('/admin/jadwal')->with('toast_success', 'Jadwal Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $jadwal=Jadwal_Inspeksi::findorfail($id);
       $jadwal->delete();
        return back()->with('toast_success', 'Jadwal Berhasil Dihapus');
    }
}
