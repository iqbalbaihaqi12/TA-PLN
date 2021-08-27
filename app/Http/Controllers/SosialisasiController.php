<?php

namespace App\Http\Controllers;
use App\Tindak_lanjut;
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
        Tindak_Lanjut::create([
            'status' => 'telah melakukan sosialisasi',
            'keterangan_tindak_lanjut' => $request->keterangan,
            'hasil_temuan_id' => $request->hasil,
            // 'upaya_pencegahan_id'=>$request->upaya,
        ]);

        if($request->hasFile('evidence')){
            $request->file('evidence')->move('image/',$request->file('evidence')->getClientOriginalName());
            $sosialisasi->evidence= $request->file('evidence')->getClientOriginalName();
            $sosialisasi->save();

            $id_sosialisasi=Sosialisasi::all();

            foreach($id_sosialisasi as $id_sosialisasi){
                Tindak_lanjut::where('hasil_temuan_id',$request->hasil)->update([
                    'sosialisasi_id' => $id_sosialisasi->id,

                    ]) ;
            }
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
    public function edit($id)
    {
        $hasiltemuan= Hasil_Temuan::all();
        $sosialisasi= Sosialisasi::findorfail($id);
        return view('petugas.sosialisasi.Edit-sosialisasi',compact('sosialisasi','hasiltemuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sosialisasi  $sosialisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sosialisasi= Sosialisasi::findorfail($id);
        $sosialisasi->update($request->all());
        return redirect('/petugas/sosialisasi')->with('toast_success', 'Data Berhasil Diupdate');
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
