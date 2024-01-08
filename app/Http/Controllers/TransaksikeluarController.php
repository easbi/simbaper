<?php

namespace App\Http\Controllers;

use App\Models\Transaksikeluar;
use App\Models\Transaksimasuk;
use App\Models\Masterbarang;
use App\Models\Opname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class TransaksikeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksikeluar = DB::table('t_keluar')
                            ->join('m_barang AS A', 'A.kode_barang', 't_keluar.kode_barang')
                            ->join('users AS B', 't_keluar.pemakai', 'B.id')
                            ->select(
                                        't_keluar.*',
                                        'A.kode_sub_kelompok',
                                        'A.nama_barang', 
                                        'A.satuan',
                                        'B.fullname'
                                    )
                            ->get();
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

        $result = Transaksikeluar::create([
                'kode_barang'=> $request->kode_barang,
                'kuantitas'=> $request->kuantitas,
                'tgl_keluar'=> $request->tgl_keluar,
                'pemakai' => Auth::user()->id,
            ]);      
    

        if (Opname::where('kode_barang', $request->kode_barang )->first()) {
            //jika kode barang ada maka update entitas tersebut
            $tm->kode_barang = $request->kode_barang;
            $tm->quantity = $tm->quantity - $request->kuantitas;
            $tm->quantity_opname = $tm->quantity_opname - $request->kuantitas;
            $tm->created_by = Auth::user()->id;
            $tm->updated_at = now();
            $tm->save();            
        } else {
            //jika kode barang ga ada, maka buat entitas baru di transaksi masuk
            $opname = Opname::create([
                'kode_barang'=> $request->kode_barang,
                'quantity'=> $request->kuantitas,
                'quantity_opname'=> $request->kuantitas,
                'created_by' => Auth::user()->id,
            ]);       
            
        }      
        
        // redirect 
        return redirect()->route('transaksikeluar.index')
                        ->with('success','Data Transaksi Keluar Successfuly inserted');
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
    public function edit($kode_barang)
    {
        $master_barang = DB::table('m_barang')->get();
        $stock_barang = DB::table('t_stock')
                            ->join('m_barang as A', 'A.kode_barang', 't_stock.kode_barang')
                            ->select('t_stock.*','A.*')
                            ->where('A.kode_barang', $kode_barang)
                            ->first();
        $kode_barang = $kode_barang;

        // dd($stock_barang->quantity);

        return view('transaksikeluar.edit', compact('master_barang', 'kode_barang', 'stock_barang'));
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
