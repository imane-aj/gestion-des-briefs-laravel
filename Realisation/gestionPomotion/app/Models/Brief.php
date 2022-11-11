<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    // use HasFactory;
    protected $table = 'briefs';
    protected $fillable = ['name', 'livraisonDate', 'recuperationDate', 'token'];

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class, 'student_briefs');
    }
}
