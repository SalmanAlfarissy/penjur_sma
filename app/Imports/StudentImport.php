<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Semester1;
use App\Models\Semester2;
use App\Models\Semester3;
use App\Models\Semester4;
use App\Models\Semester5;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    public function model(array $row)
    {

        // $semester1 = new Semester1();
        // $semester2 = new Semester2();
        // $semester3 = new Semester3();
        // $semester4 = new Semester4();
        // $semester5 = new Semester5();

        $data=[
            'name'=>$row[0],
            'nisn'=>$row[1],
            'jekel'=>$row[2],
        ];

        $student = new Student($data);
        return $student;
    }
}
