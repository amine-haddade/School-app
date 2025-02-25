<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionEvent extends Model
{
    /** @use HasFactory<\Database\Factories\SessionEventFactory> */
    use HasFactory;
    public function sessionDetail()
    {
        return $this->belongsTo(SessionDetail::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
