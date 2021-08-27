<?php

namespace App\Http\Controllers;
use App\Tindak_lanjut;
use App\Upaya;
use Illuminate\Http\Request;

class UpayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upaya=Upaya::all();
        return view('petugas.upaya.Data-upaya',compact('upaya'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tindaklanjut=Tindak_lanjut::all();
        return view('petugas.upaya.Create-upaya',compact('tindaklanjut'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upaya=Upaya::create([
        'tanggal' => $request->tanggal,
        'detail' => $request->detail,
        'evidence' => $request->evidence,
    ]);

    $id_upaya=Upaya::all();

    if($request->hasFile('evidence')){
        $request->file('evidence')->move('image/',$request->file('evidence')->getClientOriginalName());
        $upaya->evidence= $request->file('evidence')->getClientOriginalName();
        $upaya->save();
        foreach($id_upaya as $id_upaya){
            Tindak_lanjut::where('id',$request->hasil)->update([
                'status' => 'telah melakukan upaya',
                'upaya_pencegahan_id' => $id_upaya->id,

                ]) ;
        }

    }


    return redirect('/petugas/upaya')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Upaya  $upaya
     * @return \Illuminate\Http\Response
     */
    public function show(Upaya $upaya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Upaya  $upaya
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tindaklanjut= Tindak_lanjut::all();
        $upaya= Upaya::findorfail($id);
        return view('petugas.upaya.Edit-upaya',compact('upaya','tindaklanjut'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Upaya  $upaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $upaya= Upaya::findorfail($id);
        $upaya->update($request->all());
        return redirect('/petugas/upaya')->with('toast_success', 'Data Berhasil Diupdate');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Upaya  $upaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upaya $upaya)
    {
        //
    }
}
