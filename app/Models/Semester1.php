<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester1 extends Model
{
    use HasFactory;
    protected $table = 'semester1';
    protected $id = 'id';
    protected $guarded = ['id'];
}
