<?php

namespace App\Http\Controllers;

use App\Models\Masterbarang;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MasterbarangController extends Controller
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
        $barang = DB::table('t_stock')
                    ->where('quantity', '>', 0)
                    ->join('m_barang', 'm_barang.kode_barang', 't_stock.kode_barang')
                    ->select(
                        't_stock.*',
                        'm_barang.kode_sub_kelompok',
                        'm_barang.nama_barang', 
                        'm_barang.satuan')
                    ->get();
        // dd($barang);

        $jumlah_barang = DB::table('m_barang')->count();                    
        $jumlah_akun = DB::table('users')->count();
        $jumlah_kelompok = DB::table('m_barang')->distinct('kode_sub_kelompok')->count();
        $jumlah_pakai = DB::table('t_keluar')->count();
        
        // dd($jumlah_kelompok);
        return view('masterbarang.index', compact('barang', 'jumlah_akun', 'jumlah_barang', 'jumlah_kelompok', 'jumlah_pakai'))->with('i', (request()->input('page', 1) - 1) * 5);
        
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
            'featured_image' => 'required|image|max:1024|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('featured_image')) {
             // put image in the public storage
            // $filePath = Storage::disk('public')->put('foto_barang', request()->file('featured_image'));
            $file = $request->file('featured_image');
            $filePath = \Carbon\Carbon::now()->format('Y-m-d H-i').'_'. Auth::user()->nip .'_'. str_replace(' ', '', substr(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME), 0, 25)). '.' .$file->getClientOriginalExtension();
            $file->move('foto_barang', $filePath);
            // $validated['featured_image'] = $filePath;
        }


        $result = Masterbarang::create([
                'kode_barang'=> $request->kode_barang,
                'kode_sub_kelompok'=> $request->kode_sub_kelompok,
                'nama_barang'=> $request->nama_barang,
                'satuan'=> $request->satuan,
                'featured_image' => $filePath,
                'created_by' =>  Auth::user()->id,
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
    public function edit($kode_barang)
    {
        $barang = DB::table('m_barang')->where('kode_barang', $kode_barang)->first();
        // dd($barang);
        return view('masterbarang.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masterbarang  $masterbarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_barang)
    {
        $barang = Masterbarang::find($kode_barang);       

        if ($request->hasFile('featured_image')) {
            // delete image
            // Storage::disk('public')->delete($barang->featured_image);  #hapus nya dipake nanti setelah semua gambar stok ada semua

            // $filePath = Storage::disk('public')->put('images/barang_stock', request()->file('featured_image'), 'public');
            // $validated['featured_image'] = $filePath;
            $file = $request->file('featured_image');
            $filePath = \Carbon\Carbon::now()->format('Y-m-d H-i').'_'. Auth::user()->nip .'_'. str_replace(' ', '', substr(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME), 0, 25)). '.' .$file->getClientOriginalExtension();
            $file->move('foto_barang', $filePath);
            // $validated['featured_image'] = $filePath;
        } 

        if($barang) {
            $barang->kode_barang = $request->kode_barang;
            $barang->kode_sub_kelompok = $request->kode_sub_kelompok;
            $barang->nama_barang = $request->nama_barang;
            $barang->satuan = $request->satuan;
            $barang->created_by = Auth::user()->id;
            $barang->featured_image = $filePath;
            $barang->updated_at = now();
            $barang->save();
        }
        return redirect()->route('masterbarang.index')->with('success', 'The barang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masterbarang  $masterbarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_barang)
    {
        //Hapus Data
        $barang = Masterbarang::find($kode_barang); 
        $barang->delete();

        // setelah berhasil hapus
        return redirect('/masterbarang');
    }
}
