<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Services\SimpleSmart;
use App\Services\AverageValue;
use PDO;

class ResultController extends Controller
{
    public function index(){
        $data = Student::leftJoin('result','result.student_id','=','student.id')
        ->whereNull('result.result')
        ->select('student.*','result.result')->get();
        return view('jurusan.index',compact('data'));
    }

    public function getData(){
        $data = Student::join('result','result.student_id','=','student.id')
        ->select('student.name','student.nisn','result.*')->orderBy('result.result','ASC')->get();
        foreach ($data as $index => $item) {
            $item->no = $index+1;
        }
        return $this->result('Get Data Success!!',$data,true);
    }

    public function resultValue(Request $request){
        $student = Student::get();
        foreach($student as $index=>$item){
            $value[$index] = SimpleSmart::smart($item->nisn);
        }

        foreach ($value as $index => $item) {
            $sort[$index] = $item['tot_value'];
        }
        array_multisort($sort, SORT_ASC, $value);

        $select =  round(count($value)*(60/100));
        foreach ($value as $index => $item) {
            $value[$index]['no'] = $index+1;
            if($index < $select){
                $value[$index]['jurusan'] = 'IPA';
            }else {
                $value[$index]['jurusan'] = 'IPS';
            }
        }

        if ($request->nisn) {
            $current = SimpleSmart::smart($request->nisn);
            foreach($value as $index=>$item){
                if($current['tot_value'] == $item['tot_value']){
                    return $this->result('Get Data Result Success..',$value[$index],true);
                    break;
                }
            }
        }

        return $this->result('Get Data Result Success..',$value,true);

    }

    public function create(Request $request){
        $nisn = Student::where('nisn',$request->nisn)->first();
        $data = new Result();
        $data->student_id = $nisn->id;
        $data->result = $request->result;
        $data->jurusan = $request->jurusan;
        $data->save();
        return $this->result('Create Data Success!!',$data,true);

    }

    public function update(Request $request,$nisn){
        $nisn = Student::where('nisn',$nisn)->first();
        $data = Result::where('student_id',$nisn->id)->first();
        $data->student_id = $nisn->id;
        $data->result = $request->result;
        $data->jurusan = $request->jurusan;
        $data->save();
        return $this->result('Update Data Success!!',$data,true);

    }

    public function delete($nisn){
        $siswa = Student::where('nisn',$nisn)->first();
        $data = Result::where('student_id',$siswa->id)->first();
        $data->delete();
        return $this->result('Delete Data Success!!',$data,true);

    }

}
