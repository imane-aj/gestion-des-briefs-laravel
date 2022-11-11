<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['name', 'startDate', 'endDate', 'brief_id'];
    
    public function brief(){
        return $this->belongsTo(Brief::class, 'brief_id');
    }
}
