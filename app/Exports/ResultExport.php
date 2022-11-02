<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ResultExport implements FromView
{
    public function view(): View
    {
        return view('cetak.excel', [
            'data' => Student::join('result','result.student_id','=','student.id')
            ->select('student.name','student.nisn','result.*')->orderBy('result.result','ASC')->get(),
        ]);
    }
}
