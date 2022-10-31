<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index(){
        return view('score.index');
    }

    public function getData(Request $request){
        if($request->nisn){
            $data = Student::with('semester1')->with('semester2')
            ->with('semester3')->with('semester4')->with('semester5')
            ->where('nisn',$request->nisn)->first();

            return $this->result('Get Data Success..',$data,true);
        }

        $data = Student::with('semester1')->with('semester2')
        ->with('semester3')->with('semester4')->with('semester5')
        ->get();

        // *r_ = rata-rata

        foreach ($data as $index => $item) {
            $result[$index] = [
                'no'=> $index+1,
                'name'=> $item->name,
                'nisn'=> $item->nisn,
                'r_mtk'=> ($item->semester1['mtk']+$item->semester2['mtk']+$item->semester3['mtk']+$item->semester4['mtk']+$item->semester5['mtk'])/5,
                'r_bing'=> ($item->semester1['bing']+$item->semester2['bing']+$item->semester3['bing']+$item->semester4['bing']+$item->semester5['bing'])/5,
                'r_bind'=> ($item->semester1['bind']+$item->semester2['bind']+$item->semester3['bind']+$item->semester4['bind']+$item->semester5['bind'])/5,
                'r_ipa'=> ($item->semester1['ipa']+$item->semester2['ipa']+$item->semester3['ipa']+$item->semester4['ipa']+$item->semester5['ipa'])/5,
                'r_ips'=> ($item->semester1['ips']+$item->semester2['ips']+$item->semester3['ips']+$item->semester4['ips']+$item->semester5['ips'])/5,

            ];

        }
        return $this->result('Get Data Success..',$result,true);

    }

    public function delete($id){
        $data = Student::with('semester1')->with('semester2')
        ->with('semester3')->with('semester4')->with('semester5')
        ->where('nisn',$id)->first();
        $data->delete();
        return $this->result('Delete Data Success..',$data,true);
    }

}
