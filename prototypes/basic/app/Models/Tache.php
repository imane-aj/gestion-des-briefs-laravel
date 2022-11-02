<?php

namespace App\Models;

use App\Models\Brief;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tache extends Model
{
    // use HasFactory;
    protected $table = 'taches';
    protected $fillable = ['name', 'startDate', 'endDate', 'briefToken'];

    public function brief(){
        $this->belongsTo(Brief::class, 'token');
    }
}
