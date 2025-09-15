<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksikeluar;
use App\Models\Masterbarang;
use DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;
// use Mpdf\Mpdf;
use ZipArchive;

class KwitansiController extends Controller
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
        return view('kwitansi.index', [
            'bulan' => DB::table('t_keluar')->selectRaw("DATE_FORMAT(tgl_keluar, '%M') as month")
                                            ->distinct()
                                            ->get(),
            'tahun' => DB::table('t_keluar')->selectRaw("DATE_FORMAT(tgl_keluar, '%Y') as year")
                                            ->distinct()
                                            ->get(),
            'kwitansi' => (auth()->user()->id == 1 or auth()->user()->id == 17 or auth()->user()->id == 14)
                ? DB::table('t_keluar')
                    ->join('users', 't_keluar.pemakai', '=', 'users.id')
                    ->join('m_barang', 't_keluar.kode_barang', '=', 'm_barang.kode_barang')
                    // ->whereYear('tgl_keluar', '=', date($tahun))
                    // ->whereMonth('tgl_keluar', '=', date($bulan))
                    ->orderByDesc('t_keluar.tgl_keluar')
                    ->selectRaw('t_keluar.pemakai as kode_pemakai,
                                users.fullname as nama_pemakai,
                                users.nip as nip_pemakai,
                                t_keluar.tgl_keluar,
                                SUM(t_keluar.kuantitas) as total,
                                GROUP_CONCAT(m_barang.nama_barang ORDER BY tgl_keluar SEPARATOR ",") as details,
                                GROUP_CONCAT(kuantitas ORDER BY tgl_keluar SEPARATOR ",") as kuantitas,
                                GROUP_CONCAT(satuan ORDER BY tgl_keluar SEPARATOR ",") as satuan,
                                GROUP_CONCAT(CONCAT(m_barang.nama_barang, " (", kuantitas, " ", satuan,")") ORDER BY tgl_keluar SEPARATOR ", ") as full_details')
                    ->groupBy('users.fullname', 't_keluar.pemakai', 't_keluar.tgl_keluar', 'users.nip')
                    ->get()
                : DB::table('t_keluar')
                    ->join('users', 't_keluar.pemakai', '=', 'users.id')
                    ->join('m_barang', 't_keluar.kode_barang', '=', 'm_barang.kode_barang')
                    ->where('pemakai', '=', auth()->user()->id)
                    // ->whereMonth('tgl_keluar', '=', date($bulan))
                    ->orderByDesc('t_keluar.tgl_keluar')
                    ->selectRaw('t_keluar.pemakai as kode_pemakai,
                                users.fullname as nama_pemakai,
                                users.nip as nip_pemakai,
                                t_keluar.tgl_keluar,
                                SUM(t_keluar.kuantitas) as total,
                                GROUP_CONCAT(m_barang.nama_barang ORDER BY tgl_keluar SEPARATOR ",") as details,
                                GROUP_CONCAT(kuantitas ORDER BY tgl_keluar SEPARATOR ",") as kuantitas,
                                GROUP_CONCAT(satuan ORDER BY tgl_keluar SEPARATOR ",") as satuan,
                                GROUP_CONCAT(CONCAT(m_barang.nama_barang," (", kuantitas, " ", satuan,")") ORDER BY tgl_keluar SEPARATOR ", ") as full_details')
                    ->groupBy('users.fullname', 't_keluar.pemakai', 't_keluar.tgl_keluar', 'users.nip')
                    ->get(),
            'all_permintaan' => DB::table('t_keluar')->get(),
            'i' => 0,

        ]);
    }

    public function generateKwitansi($id, $tgl)
    {
        $iduser = $id;
        $tgl = $tgl;

        $data = DB::table('t_keluar')->get();
        $barang = DB::table('m_barang')->get();

        $permintaan = DB::table('t_keluar') ->join('users', 't_keluar.pemakai', '=', 'users.id')
                                            // ->where('tgl_keluar', '=', $tgl)
                                            // ->where('pemakai', '=', $iduser)
                                            ->orderBy('t_keluar.tgl_keluar')
                                            ->selectRaw('t_keluar.pemakai as kode_pemakai,
                                                        users.fullname as nama_pemakai,
                                                        users.nip as nip_pemakai,
                                                        users.organisasi as organisasi,
                                                        t_keluar.tgl_keluar,
                                                        SUM(t_keluar.kuantitas) as total')
                                            ->groupBy('users.fullname', 't_keluar.pemakai', 't_keluar.tgl_keluar', 'users.nip', 'users.organisasi')
                                            ->get();

        // Add position order
        $permintaan = $permintaan->map(function ($item, $key) {
            $item->row_index = $key + 1;
            return $item;
        });

        $filteredPermintaan = $permintaan->filter(function ($item) use ($iduser, $tgl) {
            $date = $item->tgl_keluar;
            $kode_pemakai = $item->kode_pemakai;
            return $date == $tgl && $kode_pemakai == $iduser;
        });


        // Initialize Mpdf
        // $combinedPdf = new Mpdf();

        $pdfFiles = [];

        $request = $filteredPermintaan->first();

        $templatePath = public_path('template.xlsx');
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($templatePath);
        $sheet = $spreadsheet->getActiveSheet();

        // $dummydate = '2024' . '-' . 'April' . '-1';
        $sheet->setCellValue('C' . 9, $request->organisasi);
        $sheet->setCellValue('F' . 9, "No. ".$request->row_index);
        // $sheet->setCellValue('F' . 10, "Dibukukan : ". carbon::parse($dummydate)->startOfMonth()->translatedFormat('j F Y'));
        $sheet->setCellValue('F' . 10, "Dibukukan : .................. " . \Carbon\Carbon::parse($tgl)->year);
        $sheet->setCellValue('E' . 30, "Padang Panjang, ". carbon::parse($request->tgl_keluar)->translatedFormat('j F Y'));
        $sheet->setCellValue('E' . 35, $request->nama_pemakai);
        $sheet->setCellValue('E' . 36, "NIP. ".$request->nip_pemakai);

        $details = $data -> where('tgl_keluar', $request->tgl_keluar)
                        -> where('pemakai', $request->kode_pemakai);

        // dd($details);

        $row = 14;
        foreach ($details as $detail) {
            $sheet->setCellValue('A' . $row, $row-13);
            $sheet->setCellValue('B' . $row, " ".$barang->where('kode_barang',$detail->kode_barang)->pluck('nama_barang')->first());
            $sheet->setCellValue('D' . $row, $detail->kuantitas);
            $sheet->setCellValue('E' . $row, $detail->kuantitas);
            $sheet->setCellValue('F' . $row, $barang->where('kode_barang',$detail->kode_barang)->pluck('satuan')->first());
            $row++;
        }

        $pdfWriter = new Mpdf($spreadsheet);
        $pdfFile = storage_path('app/invoice/' . $request->tgl_keluar.'_'.$request->nama_pemakai.'.pdf');
        $pdfWriter->save($pdfFile);
        $pdfFiles[] = $pdfFile;

        return response()->download($pdfFile)->deleteFileAfterSend(true);
    }
}


