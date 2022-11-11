<?php

namespace App\Models;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $guarded = [];

    public function promotions(){
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }

    public function briefs(){
        return $this->belongsToMany(Brief::class, 'student_briefs');
   }

}
