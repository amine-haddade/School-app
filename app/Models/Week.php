<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    protected $fillable = ['week_number', 'school_year_id', 'start_date', 'end_date'];

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }

    public function sessions()
    {
        return $this->hasMany(SessionEvent::class);
    }
}
