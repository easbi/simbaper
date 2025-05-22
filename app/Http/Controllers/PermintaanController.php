<?php

namespace App\Http\Controllers;

use App\Models\Permintaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PermintaanController extends Controller
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
        $transaksipermintaan = DB::table('t_permintaan')
                                ->join('users AS B', 't_permintaan.created_by', 'B.id')
                                ->select(
                                        't_permintaan.*',
                                        'B.fullname'
                                    )
                                ->orderBy('t_permintaan.id', 'desc')
                                ->get();
        return view('permintaan.index', compact('transaksipermintaan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permintaan.create');
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
            'nama_barang'=> 'required',
            'kuantitas'=> 'required',
            'keterangan'=> 'required',
        ]);

        $tm = Permintaan::find($request->kode_barang);

        $result = Permintaan::create([
                'nama_barang'=> $request->nama_barang,
                'kuantitas'=> $request->kuantitas,
                'keterangan'=> $request->keterangan,
                'created_by' => Auth::user()->id,
            ]); 

        return redirect()->route('permintaan.index')
                        ->with('success','Data usulan anda sudah diusulkan dan akan ditindaklanjuti tim Persediaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function show(Permintaan $permintaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksipermintaan = DB::table('t_permintaan')
                                ->join('users AS B', 't_permintaan.created_by', 'B.id')
                                ->select(
                                        't_permintaan.*',
                                        'B.fullname'
                                    )
                                ->where('t_permintaan.id', $id)
                                ->first();
        // dd($transaksipermintaan);                        
        return view('permintaan.edit', compact('transaksipermintaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaksipermintaan = Permintaan::find($id);
        if($transaksipermintaan) {
            $transaksipermintaan->penyelesaian = 1;                     
            $transaksipermintaan->updated_at = now()->timestamp;
            $transaksipermintaan->save();
        }
        return redirect()->route('permintaan.index')->with('success', 'Data sudah diverifikasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permintaan  $permintaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permintaan $permintaan)
    {
        //
    }
}
