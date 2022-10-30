<?php

namespace App\Http\Controllers;

use App\Models\Semester5;
use Illuminate\Http\Request;

class Semester5Controller extends Controller
{
    public function create(Request $request){
        $validate = $request->validate([
            'student_id'=>'',
            'mtk'=>'required',
            'bing'=>'required',
            'bind'=>'required',
            'ipa'=>'required',
            'ips'=>'required',
        ]);

        $data = new Semester5();
        $data->student_id = $validate['student_id'];
        $data->mtk  = $validate['mtk'];
        $data->bing  = $validate['bing'];
        $data->bind  = $validate['bind'];
        $data->ipa  = $validate['ipa'];
        $data->ips  = $validate['ips'];
        $data->save();

        return $this->result('Create Data Success!!',$data,true);
    }

    public function update(Request $request,$id){
        $validate = $request->validate([
            'student_id'=>'',
            'mtk'=>'required',
            'bing'=>'required',
            'bind'=>'required',
            'ipa'=>'required',
            'ips'=>'required',
        ]);

        $data = Semester5::find($id);
        $data->student_id = $validate['student_id'];
        $data->mtk  = $validate['mtk'];
        $data->bing  = $validate['bing'];
        $data->bind  = $validate['bind'];
        $data->ipa  = $validate['ipa'];
        $data->ips  = $validate['ips'];
        $data->save();

        return $this->result('Update Data Success!!',$data,true);

    }
}
