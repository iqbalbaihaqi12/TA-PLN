<?php

namespace App\Http\Controllers;

use App\Sosialisasi;
use App\Hasil_Temuan;
use Illuminate\Http\Request;

class SosialisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosialisasi=Sosialisasi::all();
        return view('petugas.sosialisasi.Data-sosialisasi',compact('sosialisasi'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hasiltemuan=Hasil_Temuan::all();
        return view('petugas.sosialisasi.Create-sosialisasi',compact('hasiltemuan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sosialisasi=Sosialisasi::create([
            'tanggal' => $request->tanggal,
            'detail' => $request->detail,
            'evidence' => $request->evidence,
        ]);
        if($request->hasFile('evidence')){
            $request->file('evidence')->move('image/',$request->file('evidence')->getClientOriginalName());
            $sosialisasi->evidence= $request->file('evidence')->getClientOriginalName();
            $sosialisasi->save();
        }
        return redirect('/petugas/sosialisasi')->with('toast_success', 'Sosialisasi Berhasil Ditambahkan');
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Sosialisasi  $sosialisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Sosialisasi $sosialisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sosialisasi  $sosialisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Sosialisasi $sosialisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sosialisasi  $sosialisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sosialisasi $sosialisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sosialisasi  $sosialisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sosialisasi $sosialisasi)
    {
        //
    }
}
