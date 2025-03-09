<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SessionEvent; 


class Classroom extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'capacity', 'type'];

    // protected  $with=['session_event'];

    public function session_event()
    {
        return $this->hasMany(SessionEvent::class);
    }
}
