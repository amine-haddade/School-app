<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;
    public function schoolYear(){
        return $this->belongsTo(SchoolYear::class,'year_id','id');
    }
    public function major(){
        return $this->belongsTo(Major::class);
    }
}
