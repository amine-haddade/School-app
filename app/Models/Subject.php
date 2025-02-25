<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;
    public function major(){
        return $this->belongsTo(Major::class);
    }
    public function SessionDetails() {
        return $this->hasMany(SessionDetail::class);
    }
}
