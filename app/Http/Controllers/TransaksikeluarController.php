<?php

namespace App\Http\Controllers;

use App\Models\Transaksikeluar;
use Illuminate\Http\Request;
use DB;

class TransaksikeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksikeluar = DB::table('t_keluar')->join('m_barang AS A', 'A.kode_barang', 't_keluar.kode_barang')->get();
        return view('transaksikeluar.index', compact('transaksikeluar'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master_barang = DB::table('m_barang')->get();
        return view('transaksikeluar.create', compact('master_barang'));
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
            'kuantitas'=> 'required',
            'tgl_keluar'=> 'required',
        ]);
        $tm = Opname::find($request->kode_barang);

        $result = Transaksimasuk::create([
                'no_bon'=> $request->no_bon,
                'kode_barang'=> $request->kode_barang,
                'harga'=> $request->harga,
                'kuantitas'=> $request->kuantitas,
                'tgl_masuk'=> $request->tgl_masuk,
                'created_by' => '1',
            ]);     
    

        if (Opname::where('kode_barang', $request->kode_barang )->first()) {
            //jika kode barang ada maka update entitas tersebut
            $tm->kode_barang = $request->kode_barang;
            $tm->quantity = $tm->quantity + $request->kuantitas;
            $tm->quantity_opname = $tm->quantity_opname +$request->kuantitas;
            $tm->created_by = '1';
            $tm->updated_at = now();
            $tm->save();            
        } else {
            //jika kode barang ga ada, maka buat entitas baru di transaksi masuk
            $opname = Opname::create([
                'kode_barang'=> $request->kode_barang,
                'quantity'=> $request->kuantitas,
                'quantity_opname'=> $request->kuantitas,
                'created_by' => '1',
            ]);       
            
        }
       
        


        // redirect 
        return redirect()->route('transaksimasuk.index')
                        ->with('success','Data Transaksi Masuk Successfuly inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksikeluar  $transaksikeluar
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksikeluar $transaksikeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksikeluar  $transaksikeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksikeluar $transaksikeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksikeluar  $transaksikeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksikeluar $transaksikeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksikeluar  $transaksikeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksikeluar $transaksikeluar)
    {
        //
    }
}
