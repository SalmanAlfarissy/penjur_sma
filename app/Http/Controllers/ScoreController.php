<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Services\AverageValue;

class ScoreController extends Controller
{
    public function index(){
        return view('score.index');
    }

    public function getData(Request $request){

        if($request->nisn){
            $data = AverageValue::average($request->nisn);
            return $this->result('Get Data Success..',$data,true);
        }

        $data = AverageValue::averageAll();
        return $this->result('Get Data Success..',$data,true);

    }

    public function delete($id){
        $data = Student::with('semester1')->with('semester2')
        ->with('semester3')->with('semester4')->with('semester5')
        ->where('nisn',$id)->first();
        $data->delete();
        return $this->result('Delete Data Success..',$data,true);
    }

}
