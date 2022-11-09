<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentBrief extends Model
{
    // use HasFactory;
    protected $fillable = ['brief_id', 'student_id'];
}
