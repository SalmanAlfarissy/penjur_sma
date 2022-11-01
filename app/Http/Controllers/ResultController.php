<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Services\SimpleSmart;
use App\Services\AverageValue;

class ResultController extends Controller
{
    public function index(){
        $data = Student::get();
        return view('jurusan.index',compact('data'));
    }

    public function resultValue(Request $request){
        $current = SimpleSmart::smart('999605491321');

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
            if($index < $select){
                $value[$index]['jurusan'] = 'IPA';
            }else {
                $value[$index]['jurusan'] = 'IPS';
            }
        }

        foreach($value as $index=>$item){
            if($current['tot_value'] == $item['tot_value']){
                return $this->result('Get Data Result Success..',$value[$index],true);
                break;
            }
        }


    }

}
