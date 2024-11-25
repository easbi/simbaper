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
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf as PdfWriter;
use Mpdf\Mpdf;

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
        ]);
    }

    public function exportExcel(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        // dd($tahun);
        $data = DB::table('t_keluar')->get();
        $barang = DB::table('m_barang')->get();
        $permintaan = DB::table('t_keluar') ->join('users', 't_keluar.pemakai', '=', 'users.id')
                                            // ->whereYear('tgl_keluar', '=', date($tahun))
                                            // ->whereMonth('tgl_keluar', '=', date($bulan))
                                            ->orderBy('t_keluar.tgl_keluar')
                                            ->selectRaw('t_keluar.pemakai as kode_pemakai,
                                                        users.fullname as nama_pemakai,
                                                        users.nip as nip_pemakai,
                                                        t_keluar.tgl_keluar,
                                                        SUM(t_keluar.kuantitas) as total')
                                            ->groupBy('users.fullname', 't_keluar.pemakai', 't_keluar.tgl_keluar', 'users.nip')
                                            ->get();

        // Add position order
        $permintaan = $permintaan->map(function ($item, $key) {
            $item->row_index = $key + 1;
            return $item;
        });

        $filteredPermintaan = $permintaan->filter(function ($item) use ($tahun, $bulan) {
            $date = Carbon::parse($item->tgl_keluar);
            return $date->year == $tahun && $date->month == $bulan;
        });

        $maxLenght = 15;
        $length = round(count($filteredPermintaan)/$maxLenght);
        // dd($length);
        for($i = 0; $i <= $length; $i++)
        {
            $dummyData = $filteredPermintaan->slice($i*$maxLenght,$maxLenght);
            // Initialize Mpdf
            $combinedPdf = new Mpdf();

            $pdfFiles = [];

            foreach($dummyData as $request){
                $templatePath = public_path('template.xlsx');
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($templatePath);
                $sheet = $spreadsheet->getActiveSheet();

                $dummydate = $tahun . '-' . $bulan+1 . '-1';
                $sheet->setCellValue('C' . 9, $request->nama_pemakai);
                $sheet->setCellValue('F' . 9, "No. ".$request->row_index);
                $sheet->setCellValue('F' . 10, "Dibukukan : ". carbon::parse($dummydate)->startOfMonth()->translatedFormat('j F Y'));
                $sheet->setCellValue('E' . 30, "Padang Panjang, ". carbon::parse($request->tgl_keluar)->translatedFormat('j F Y'));
                $sheet->setCellValue('E' . 35, $request->nama_pemakai);
                $sheet->setCellValue('E' . 36, "NIP. ".$request->nip_pemakai);

                // $details = DB::table('t_keluar')    ->join('m_barang', 't_keluar.kode_barang', '=', 'm_barang.kode_barang')
                //                                     ->whereDate('tgl_keluar', '=', $request->tgl_keluar)
                //                                     ->where('pemakai', '=', $request->kode_pemakai)
                //                                     ->selectRaw('t_keluar.pemakai, t_keluar.tgl_keluar, t_keluar.kuantitas, t_keluar.kode_barang, m_barang.satuan, m_barang.nama_barang')
                //                                     // ->groupBy('t_keluar.kode_barang')
                //                                     ->get();

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

                $pdfWriter = new PdfWriter($spreadsheet);
                $pdfFile = storage_path('app/invoice/' . $tahun . sprintf('%02d', $bulan) . $request->tgl_keluar.'_'.$request->nama_pemakai.'.pdf');
                $pdfWriter->save($pdfFile);
                $pdfFiles[] = $pdfFile;
            }

            foreach ($pdfFiles as $key => $pdfFile) {
                $pagesInFile = $combinedPdf->SetSourceFile($pdfFile);
                for ($i = 1; $i <= $pagesInFile; $i++) {
                    $tplIdx = $combinedPdf->ImportPage($i);
                    $combinedPdf->UseTemplate($tplIdx);
                    if ($i !== $pagesInFile || $key !== array_key_last($pdfFiles)) {
                        $combinedPdf->AddPage();
                    }
                }
            }

            foreach ($pdfFiles as $file) {
                if (file_exists($file)) {
                    unlink($file);
                }
            }

            $combinedPdfFilePath = storage_path('app/invoice/KwitansiPermintaan_' . $tahun . sprintf('%02d', $bulan) .'part'.$i.'.pdf');
            $combinedPdf->Output($combinedPdfFilePath, 'F');

            // return response()->download($combinedPdfFilePath)->deleteFileAfterSend(true);
        }
    }
}


