<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    /** @use HasFactory<\Database\Factories\MajorFactory> */
    use HasFactory;
    public function groups(){
        return $this->hasMany(Group::class);
    }
    public function subjects(){
        return $this->hasMany(Subject::class);
    }
    public function timetables(){
        return $this->hasMany(Timetable::class);
    }

}
