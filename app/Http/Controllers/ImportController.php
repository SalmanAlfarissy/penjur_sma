<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Models\Semester1;
use App\Models\Semester2;
use App\Models\Semester3;
use App\Models\Semester4;
use App\Models\Semester5;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;

class ImportController extends Controller
{
    protected $fileImport = [];

    public function importData(Request $request){
        $request->validate([
            'fileExcel'=>'required|mimes:xlsx,csv,xls',
        ]);

        $data = Excel::toArray(new StudentImport, $request->file('fileExcel'));
        $data = $data[0];
        $file = [];
        for($i=0; $i<count($data)-2; $i++){
            $file['no']=$i+1;
            $no = $i + 1;
            for ($j=0; $j < count($data[$no+1]); $j++) {
                $file['name'] =  $data[$no+1][0];
                $file['nisn'] =  $data[$no+1][1];
                $file['jekel'] =  $data[$no+1][2];
                $file['mtk1'] =  $data[$no+1][3];
                $file['bing1'] =  $data[$no+1][4];
                $file['bind1'] =  $data[$no+1][5];
                $file['ipa1'] =  $data[$no+1][6];
                $file['ips1'] =  $data[$no+1][7];

                $file['mtk2'] =  $data[$no+1][8];
                $file['bing2'] =  $data[$no+1][9];
                $file['bind2'] =  $data[$no+1][10];
                $file['ipa2'] =  $data[$no+1][11];
                $file['ips2'] =  $data[$no+1][12];

                $file['mtk3'] =  $data[$no+1][13];
                $file['bing3'] =  $data[$no+1][14];
                $file['bind3'] =  $data[$no+1][15];
                $file['ipa3'] =  $data[$no+1][16];
                $file['ips3'] =  $data[$no+1][17];

                $file['mtk4'] =  $data[$no+1][18];
                $file['bing4'] =  $data[$no+1][19];
                $file['bind4'] =  $data[$no+1][20];
                $file['ipa4'] =  $data[$no+1][21];
                $file['ips4'] =  $data[$no+1][22];

                $file['mtk5'] =  $data[$no+1][23];
                $file['bing5'] =  $data[$no+1][24];
                $file['bind5'] =  $data[$no+1][25];
                $file['ipa5'] =  $data[$no+1][26];
                $file['ips5'] =  $data[$no+1][27];
            }
            $this->fileImport[$i] = $file;
        }

        $insert = $this->fileImport;

        foreach ($insert as $item) {
            $student = new Student();
            $semester1 = new Semester1();
            $semester2 = new Semester2();
            $semester3 = new Semester3();
            $semester4 = new Semester4();
            $semester5 = new Semester5();

            $student->name = $item['name'];
            $student->nisn = $item['nisn'];
            $student->jekel = $item['jekel'];
            $student->save();

            $semester1->student_id = $student->id;
            $semester1->mtk = $item['mtk1'];
            $semester1->bing = $item['bing1'];
            $semester1->bind = $item['bind1'];
            $semester1->ipa = $item['ipa1'];
            $semester1->ips = $item['ips1'];
            $semester1->save();

            $semester2->student_id = $student->id;
            $semester2->mtk = $item['mtk2'];
            $semester2->bing = $item['bing2'];
            $semester2->bind = $item['bind2'];
            $semester2->ipa = $item['ipa2'];
            $semester2->ips = $item['ips2'];
            $semester2->save();

            $semester3->student_id = $student->id;
            $semester3->mtk = $item['mtk3'];
            $semester3->bing = $item['bing3'];
            $semester3->bind = $item['bind3'];
            $semester3->ipa = $item['ipa3'];
            $semester3->ips = $item['ips3'];
            $semester3->save();

            $semester4->student_id = $student->id;
            $semester4->mtk = $item['mtk4'];
            $semester4->bing = $item['bing4'];
            $semester4->bind = $item['bind4'];
            $semester4->ipa = $item['ipa4'];
            $semester4->ips = $item['ips4'];
            $semester4->save();

            $semester5->student_id = $student->id;
            $semester5->mtk = $item['mtk5'];
            $semester5->bing = $item['bing5'];
            $semester5->bind = $item['bind5'];
            $semester5->ipa = $item['ipa5'];
            $semester5->ips = $item['ips5'];
            $semester5->save();
        }
        return response()->json([
            'message'=>'Data successfully imported!',
        ]);

    }

    public function getDataImport(Request $request){
        $data = Excel::toArray(new StudentImport, $request->file('fileExcel'));
        $data = $data[0];
        $file = [];
        for($i=0; $i<count($data)-2; $i++){
            $file['no']=$i+1;
            $no = $i + 1;
            for ($j=0; $j < count($data[$no+1]); $j++) {
                $file['name'] =  $data[$no+1][0];
                $file['nisn'] =  $data[$no+1][1];
                $file['jekel'] =  $data[$no+1][2];
                $file['mtk1'] =  $data[$no+1][3];
                $file['bing1'] =  $data[$no+1][4];
                $file['bind1'] =  $data[$no+1][5];
                $file['ipa1'] =  $data[$no+1][6];
                $file['ips1'] =  $data[$no+1][7];

                $file['mtk2'] =  $data[$no+1][8];
                $file['bing2'] =  $data[$no+1][9];
                $file['bind2'] =  $data[$no+1][10];
                $file['ipa2'] =  $data[$no+1][11];
                $file['ips2'] =  $data[$no+1][12];

                $file['mtk3'] =  $data[$no+1][13];
                $file['bing3'] =  $data[$no+1][14];
                $file['bind3'] =  $data[$no+1][15];
                $file['ipa3'] =  $data[$no+1][16];
                $file['ips3'] =  $data[$no+1][17];

                $file['mtk4'] =  $data[$no+1][18];
                $file['bing4'] =  $data[$no+1][19];
                $file['bind4'] =  $data[$no+1][20];
                $file['ipa4'] =  $data[$no+1][21];
                $file['ips4'] =  $data[$no+1][22];

                $file['mtk5'] =  $data[$no+1][23];
                $file['bing5'] =  $data[$no+1][24];
                $file['bind5'] =  $data[$no+1][25];
                $file['ipa5'] =  $data[$no+1][26];
                $file['ips5'] =  $data[$no+1][27];
            }
            $this->fileImport[$i] = $file;
        }
        return response()->json(['data'=>$this->fileImport]);
    }
}
