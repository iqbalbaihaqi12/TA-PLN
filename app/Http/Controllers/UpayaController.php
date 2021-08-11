<?php

namespace App\Http\Controllers;

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
        return view('petugas.upaya.Create-upaya');
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
    if($request->hasFile('evidence')){
        $request->file('evidence')->move('image/',$request->file('evidence')->getClientOriginalName());
        $upaya->evidence= $request->file('evidence')->getClientOriginalName();
        $upaya->save();
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
    public function edit(Upaya $upaya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Upaya  $upaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upaya $upaya)
    {
        //
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
