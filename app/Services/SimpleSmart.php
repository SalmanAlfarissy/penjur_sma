<?php
namespace App\Services;

use App\Http\Controllers\Controller;

class SimpleSmart extends Controller
{
    static public function smart($nisn){
        //bobot
        $b_mtk = 0.18;
        $b_bing = 0.14;
        $b_bind = 0.14;
        $b_ipa = 0.36;
        $b_ips = 0.18;

        // rata-rata nilai
        $data = AverageValue::average($nisn);
        $r_mtk = $data->r_mtk;
        $r_bing = $data->r_bing;
        $r_bind = $data->r_bind;
        $r_ipa = $data->r_ipa;
        $r_ips = $data->r_ips;

        //nilai utility
        $u_mtk = 100 - $r_mtk;
        $u_bing = 100 - $r_bing;
        $u_bind = 100 - $r_bind;
        $u_ipa = 100 - $r_ipa;
        $u_ips = 100 - $r_ips;

        //result
        $res_mtk = $u_mtk*$b_mtk;
        $res_bing = $u_bing*$b_bing;
        $res_bind = $u_bind*$b_bind;
        $res_ipa = $u_ipa*$b_ipa;
        $res_ips = $u_ips*$b_ips;

        //total value
        $tot_value = $res_mtk + $res_bing + $res_bind +$res_ipa + $res_ips;
        $tot_value = round($tot_value,3);

        $result = [
            'name'=> $data->name,
            'nisn'=> $data->nisn,
            'tot_value'=> $tot_value,
        ];

        return $result;
    }
}
