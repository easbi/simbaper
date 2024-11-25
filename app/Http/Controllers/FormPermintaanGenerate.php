<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use DB;
use App\Models\Transaksikeluar;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf as PdfWriter;
use Mpdf\Mpdf;

class FormPermintaanGenerate extends Controller
{
    public function exportExcel()
    {
        $tahun = 2024;
        $bulan = 06;

        DB::statement(DB::raw('SET @row_number = 0'));

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

        // Add position
        $permintaan = $permintaan->map(function ($item, $key) {
            $item->row_index = $key + 1;
            return $item;
        });

        $filteredPermintaan = $permintaan->filter(function ($item) {
            $date = Carbon::parse($item->tgl_keluar);
            return $date->year == 2024 && $date->month == 6;
        });


        // Initialize Mpdf
        $combinedPdf = new Mpdf();

        $pdfFiles = [];

        foreach($filteredPermintaan as $request){
            $templatePath = public_path('template.xlsx');
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($templatePath);
            $sheet = $spreadsheet->getActiveSheet();

            $dummydate = $tahun . '-' . $bulan . '-1';
            $sheet->setCellValue('C' . 9, $request->nama_pemakai);
            $sheet->setCellValue('F' . 9, "No. ".$request->row_index);
            $sheet->setCellValue('F' . 10, "Dibukukan : ". carbon::parse($dummydate)->startOfMonth()->translatedFormat('j F Y'));
            $sheet->setCellValue('E' . 30, "Padang Panjang, ". carbon::parse($request->tgl_keluar)->translatedFormat('j F Y'));
            $sheet->setCellValue('E' . 35, $request->nama_pemakai);
            $sheet->setCellValue('E' . 36, "NIP. ".$request->nip_pemakai);
            // $sheet->setCellValue('C' . 25, auth()->user()->fullname);
            // $sheet->setCellValue('C' . 26, "NIP. ". auth()->user()->nip);
            // $sheet->setCellValue('B' . 21, "Tanggal : ". Carbon::now()->translatedFormat('j F Y'));

            $details = DB::table('t_keluar')    ->join('m_barang', 't_keluar.kode_barang', '=', 'm_barang.kode_barang')
                                                ->whereDate('tgl_keluar', '=', $request->tgl_keluar)
                                                ->where('pemakai', '=', $request->kode_pemakai)
                                                ->selectRaw('t_keluar.pemakai, t_keluar.tgl_keluar, t_keluar.kuantitas, t_keluar.kode_barang, m_barang.satuan, m_barang.nama_barang')
                                                // ->groupBy('t_keluar.kode_barang')
                                                ->get();

            // dd($request->tgl_keluar);

            $row = 14;
            foreach ($details as $detail) {
                $sheet->setCellValue('A' . $row, $row-13);
                $sheet->setCellValue('B' . $row, " ".$detail->nama_barang);
                $sheet->setCellValue('D' . $row, $detail->kuantitas);
                $sheet->setCellValue('E' . $row, $detail->kuantitas);
                $sheet->setCellValue('F' . $row, $detail->satuan);
                //     $sheet->setCellValue('E' . $row, $activity->kuantitas);
                //     $sheet->setCellValue('F' . $row, $activity->kuantitas);
                //     $sheet->setCellValue('G' . $row, "100");
                //     $sheet->getStyle('G' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                //     $sheet->setCellValue('H' . $row, "100");
                //     $sheet->getStyle('H' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $row++;
                //     $sheet->insertNewRowBefore($row);
                //     $sheet->mergeCells('B' . $row . ':C' . $row);
            }

            // $sheet->removeRow($row);

            // $fileName = $tahun . sprintf('%02d', $bulan) . $request->tgl_keluar.'_'.$request->nama_pemakai.'.xlsx';
            // $writer = new Xlsx($spreadsheet);
            // $excelFilePath = storage_path('app/invoice/' . $fileName);
            // $writer->save($excelFilePath);
            // $excelFiles[] = $excelFilePath;

            // $spreadsheet = IOFactory::load(storage_path('app/invoice/' . $fileName));

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

        // Delete the individual Excel files
        // foreach ($excelFiles as $file) {
        //     if (file_exists($file)) {
        //         unlink($file);
        //     }
        // }

        foreach ($pdfFiles as $file) {
            if (file_exists($file)) {
                unlink($file);
            }
        }

        $combinedPdfFilePath = storage_path('app/invoice/combined_' . $tahun . sprintf('%02d', $bulan) . '.pdf');
        $combinedPdf->Output($combinedPdfFilePath, 'F');

        return response()->download($combinedPdfFilePath)->deleteFileAfterSend(true);
    }
}
