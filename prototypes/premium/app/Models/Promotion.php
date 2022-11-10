<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    // use HasFactory;
    protected $fillable = ['name', 'token'];

    public function students(){
        return $this->hasMany(Student::class);
    }
    public function briefs(){
        return $this->hasMany(Brief::class);
    }
}
