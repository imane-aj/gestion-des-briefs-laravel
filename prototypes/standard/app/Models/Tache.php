<?php

namespace App\Models;

use App\Models\Brief;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tache extends Model
{
    // use HasFactory;
    protected $table = 'taches';
    protected $fillable = ['name', 'startDate', 'endDate', 'brief_id'];
    public function brief(){
        return $this->belongsTo(Brief::class);
    }
}
