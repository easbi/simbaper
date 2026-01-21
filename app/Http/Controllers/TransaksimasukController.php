<?php

namespace App\Http\Controllers;

use App\Models\Transaksimasuk;
use App\Models\Masterbarang;
use App\Models\Opname;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class TransaksimasukController extends Controller
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
        $transaksimasuk = DB::table('t_masuk')->join('m_barang AS A', 'A.kode_barang', 't_masuk.kode_barang')->get();
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
            'kode_barang'=> 'required',
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
                'created_by' => Auth::user()->id,
            ]);


        if (Opname::where('kode_barang', $request->kode_barang )->first()) {
            //jika kode barang ada maka update entitas tersebut
            $tm->kode_barang = $request->kode_barang;
            $tm->quantity = $tm->quantity + $request->kuantitas;
            $tm->quantity_opname = $tm->quantity_opname +$request->kuantitas;
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
    public function edit($id)
    {
        $barang = DB::table('t_masuk')->where('t_masuk.id', $id)->join('m_barang AS A', 'A.kode_barang', 't_masuk.kode_barang')->first();
        return view('transaksimasuk.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksimasuk  $transaksimasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksimasuk = Transaksimasuk::find($id);
        $tm = Opname::find($transaksimasuk->kode_barang);

        if ($tm) #update table stock
        {
            $tm->quantity = $tm->quantity - $transaksimasuk->kuantitas + $request->kuantitas;
            $tm->quantity_opname = $tm->quantity_opname - $transaksimasuk->kuantitas + $request->kuantitas;
            $tm->created_by = '1';
            $tm->updated_at = now();
            $tm->save();
        }

        if($transaksimasuk) {
            $transaksimasuk->no_bon = $request->no_bon;
            $transaksimasuk->harga = $request->harga;
            $transaksimasuk->kuantitas = $request->kuantitas;
            $transaksimasuk->tgl_masuk = $request->tgl_masuk;
            $transaksimasuk->created_by = 1;
            $transaksimasuk->updated_at = now()->timestamp;
            $transaksimasuk->save();
        }
        return redirect()->route('transaksimasuk.index')->with('success', 'Transaksimasuk sudah terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksimasuk  $transaksimasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Transaksimasuk::find($id);
        $tm = Opname::find($barang->kode_barang); #update table stock
        $tm->quantity = $tm->quantity - $barang->kuantitas;
        $tm->quantity_opname = $tm->quantity_opname - $barang->kuantitas;
        $tm->created_by = '1';
        $tm->updated_at = now();
        $tm->save();

        $barang->delete();
        return redirect('/transaksimasuk');
    }
}
