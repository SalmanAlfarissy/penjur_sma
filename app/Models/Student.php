<?php

namespace App\Models;

use App\Models\Semester1;
use App\Models\Semester2;
use App\Models\Semester3;
use App\Models\Semester4;
use App\Models\Semester5;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $id = 'id';

    protected $guarded = ['id'];

    public function semester1(){
        return $this->belongsTo(Semester1::class, 'id', 'student_id');
    }
    public function semester2(){
        return $this->belongsTo(Semester2::class, 'id', 'student_id');
    }
    public function semester3(){
        return $this->belongsTo(Semester3::class, 'id', 'student_id');
    }
    public function semester4(){
        return $this->belongsTo(Semester4::class, 'id', 'student_id');
    }
    public function semester5(){
        return $this->belongsTo(Semester5::class, 'id', 'student_id');
    }
}
