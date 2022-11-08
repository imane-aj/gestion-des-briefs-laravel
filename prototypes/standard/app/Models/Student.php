<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // use HasFactory;
    protected $fillable = ['name', 'lastName', 'email', 'token'];

   public function briefs(){
        return $this->belongsToMany(Brief::class, 'brief_token', 'token');
   }
}