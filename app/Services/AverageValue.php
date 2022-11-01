<?php
namespace App\Services;

use App\Models\Student;
use App\Http\Controllers\Controller;

class AverageValue extends Controller
{
    static public function average($nisn){

        $data = Student::with('semester1')->with('semester2')
        ->with('semester3')->with('semester4')->with('semester5')
        ->where('nisn',$nisn)->first();

        // *r_ = rata-rata
        $data->r_mtk = ($data->semester1['mtk']+$data->semester2['mtk']+$data->semester3['mtk']+$data->semester4['mtk']+$data->semester5['mtk'])/5;
        $data->r_bing = ($data->semester1['bing']+$data->semester2['bing']+$data->semester3['bing']+$data->semester4['bing']+$data->semester5['bing'])/5;
        $data->r_bind= ($data->semester1['bind']+$data->semester2['bind']+$data->semester3['bind']+$data->semester4['bind']+$data->semester5['bind'])/5;
        $data->r_ipa= ($data->semester1['ipa']+$data->semester2['ipa']+$data->semester3['ipa']+$data->semester4['ipa']+$data->semester5['ipa'])/5;
        $data->r_ips= ($data->semester1['ips']+$data->semester2['ips']+$data->semester3['ips']+$data->semester4['ips']+$data->semester5['ips'])/5;

        return $data;
    }

    static public function averageAll(){

        $data = Student::with('semester1')->with('semester2')
        ->with('semester3')->with('semester4')->with('semester5')
        ->get();

        // return $data;

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
        return $result;
    }
}
