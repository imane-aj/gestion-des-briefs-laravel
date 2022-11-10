<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // use HasFactory;
    protected $fillable = ['name', 'lastName', 'email', 'token', 'promotion_id'];

   public function briefs(){
        return $this->belongsToMany(Brief::class, 'student_briefs');
   }

   public function promotion(){
     return $this->belongsTo(Promotion::class, 'promotion_id');
   }
}
