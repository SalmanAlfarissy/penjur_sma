<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index(){
        return view('score.index');
    }

    public function getData(){
        $data = Student::with('semester1')->get();
        return $data;
    }

}
