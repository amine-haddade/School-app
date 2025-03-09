<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Week; 

class SchoolYear extends Model
{
    use HasFactory;

    protected $fillable = ['start_year', 'end_year'];



    public function week()
    {
        return $this->hasMany(Week::class);
    }
}
