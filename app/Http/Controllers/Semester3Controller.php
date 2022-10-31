<?php

namespace App\Http\Controllers;

use App\Models\Semester3;
use Illuminate\Http\Request;

class Semester3Controller extends Controller
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

        $data = new Semester3();
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
            'mtk'=>'required',
            'bing'=>'required',
            'bind'=>'required',
            'ipa'=>'required',
            'ips'=>'required',
        ]);

        $data = Semester3::find($id);
        $data->mtk  = $validate['mtk'];
        $data->bing  = $validate['bing'];
        $data->bind  = $validate['bind'];
        $data->ipa  = $validate['ipa'];
        $data->ips  = $validate['ips'];
        $data->save();

        return $this->result('Update Data Success!!',$data,true);

    }
}
