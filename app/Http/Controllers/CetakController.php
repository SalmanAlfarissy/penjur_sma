<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Exports\ResultExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;

class CetakController extends Controller
{
    public function cetakExcel(){
        return Excel::download(new ResultExport, 'listJurusan.xlsx');
    }
    public function cetakPdf(){
        $data = Student::join('result','result.student_id','=','student.id')
        ->select('student.name','student.nisn','result.*')->orderBy('result.result','ASC')->get();
        $pdf = App::make('dompdf.wrapper');

        $pdf = Pdf::loadView('cetak.pdf', compact('data'));
        return $pdf->stream();
    }
}
