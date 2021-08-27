<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tindak_lanjut;
use App\Hasil_Temuan;
use App\Jadwal_Inspeksi;

class PimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        //menyiapkan data chart
        $kategori=[];
        $jadwalinspeksi=Jadwal_Inspeksi::all()->last()->penyulang;
        $kategori=$jadwalinspeksi;

        $data = [];
        $hasiltemuan=Hasil_Temuan::all()->last()->id;
        // $tindaklanjut=Tindak_lanjut::all()->last()->id;
        // $data = $tindaklanjut;
        $data = $hasiltemuan;
        // dd(json_encode($data));
        return view('pimpinan.index',['data'=>$data,'kategori'=>$kategori]);
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
        //
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
