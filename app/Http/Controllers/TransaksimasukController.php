<?php

namespace App\Http\Controllers;

use App\Models\Transaksimasuk;
use App\Models\Masterbarang;
use App\Models\Opname;
use Illuminate\Http\Request;
use DB;

class TransaksimasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksimasuk = DB::table('t_masuk')->get();
        return view('transaksimasuk.index', compact('transaksimasuk'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $master_barang = DB::table('m_barang')->get();
        return view('transaksimasuk.create', compact('master_barang'));
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
            'no_bon'=> 'required',
            'kode_barang'=> 'required',
            'harga'=> 'required',
            'kuantitas'=> 'required',
            'tgl_masuk'=> 'required',
        ]);
        $tm = Opname::find($request->kode_barang);
        // dd($tm);

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
     * @param  \App\Models\Transaksimasuk  $transaksimasuk
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksimasuk $transaksimasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksimasuk  $transaksimasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksimasuk $transaksimasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksimasuk  $transaksimasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksimasuk $transaksimasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksimasuk  $transaksimasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksimasuk $transaksimasuk)
    {
        //
    }
}