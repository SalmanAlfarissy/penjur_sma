<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester2 extends Model
{
    use HasFactory;
    protected $table = 'semester2';
    protected $id = 'id';
    protected $guarded = ['id'];
}
