<?php

namespace App\Http\Controllers;
use App\Jadwal_Inspeksi;
use App\Hasil_Temuan;
use Illuminate\Http\Request;

class HasilTemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hasiltemuan = Hasil_Temuan::all();
     return view('petugas.hasiltemuan.Data-hasiltemuan',compact('hasiltemuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $jadwal_inspeksi= Jadwal_Inspeksi::all();
     return view('petugas.hasiltemuan.Create-hasiltemuan',compact('jadwal_inspeksi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $hasiltemuan= Hasil_Temuan::create([
            'jadwal_inspeksi_id'=> $request->jadwal,
            'tanggal' => $request->tanggal,
            'konstruksi' => $request->konstruksi,
            'kategori_temuan' => $request->kategori,
            'detail_temuan' => $request->detail,
            'section' => $request->section,
            'alamat_temuan' => $request->alamat,
            'koordinat' => $request->koordinat,
            'potensi_bahaya' => $request->potensi,
            'evidence' => $request->evidence,
        ]);

        if($request->hasFile('evidence')){
            $request->file('evidence')->move('image/',$request->file('evidence')->getClientOriginalName());
            $hasiltemuan->evidence= $request->file('evidence')->getClientOriginalName();
            $hasiltemuan->save();
        }
        return redirect('/petugas/hasiltemuan')->with('toast_success', 'Hasil Temuan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hasil_Temuan  $hasil_Temuan
     * @return \Illuminate\Http\Response
     */
    public function show(Hasil_Temuan $hasil_Temuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hasil_Temuan  $hasil_Temuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal_inspeksi= Jadwal_Inspeksi::all();
        $hasiltemuan= Hasil_Temuan::findorfail($id);
        return view('petugas.hasiltemuan.Edit-hasiltemuan',compact('hasiltemuan','jadwal_inspeksi'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hasil_Temuan  $hasil_Temuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hasiltemuan= Hasil_Temuan::findorfail($id);
        $hasiltemuan->update($request->all());
        return redirect('/petugas/hasiltemuan')->with('toast_success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hasil_Temuan  $hasil_Temuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hasil_Temuan $hasil_Temuan)
    {
        //
    }
}
