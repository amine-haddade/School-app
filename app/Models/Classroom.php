<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SessionEvent; 


class Classroom extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'capacity', 'type'];

    public function sessions()
    {
        return $this->hasMany(SessionEvent::class);
    }
}
