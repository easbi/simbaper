<?php

namespace App\Http\Controllers;

use App\Models\Masterbarang;
use Illuminate\Http\Request;
use DB;

class MasterbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = DB::table('m_barang')->get();
        dd($barang);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterbarang.create');
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
            'kode_barang'=> 'required',
            'kode_sub_kelompok'=> 'required',
            'nama_barang'=> 'required',
            'satuan'=> 'required',
        ]);

        $result = Masterbarang::create([
                'kode_barang'=> $request->kode_barang,
                'kode_sub_kelompok'=> $request->kode_sub_kelompok,
                'nama_barang'=> $request->nama_barang,
                'satuan'=> $request->satuan,
                'created_by' => '1',
            ]);
        // redirect 
        return redirect()->route('masterbarang.index')
                        ->with('success','Data Master Barang Successfuly inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masterbarang  $masterbarang
     * @return \Illuminate\Http\Response
     */
    public function show(Masterbarang $masterbarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masterbarang  $masterbarang
     * @return \Illuminate\Http\Response
     */
    public function edit(Masterbarang $masterbarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masterbarang  $masterbarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masterbarang $masterbarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masterbarang  $masterbarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masterbarang $masterbarang)
    {
        //
    }
}
