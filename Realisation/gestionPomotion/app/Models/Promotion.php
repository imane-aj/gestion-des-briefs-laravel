<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    // use HasFactory,SoftDeletes;
    protected $table = 'promotions';
    protected $guarded = [];

    public function students(){
        $this->hasMany(Student::class);
    }
}
