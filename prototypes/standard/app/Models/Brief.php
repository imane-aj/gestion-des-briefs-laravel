<?php

namespace App\Models;

use App\Models\Tache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brief extends Model
{
    // use HasFactory;
    protected $table = 'briefs';
    protected $fillable = ['name', 'livraisonDate', 'recuperationDate', 'token'];

    public function taches(){
        return $this->hasMany(Tache::class, 'brief_id');
    }

    public function students(){
        return $this->belongsToMany(Student::class, 'student_briefs');
    }
}

