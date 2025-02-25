<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionDetail extends Model
{
    /** @use HasFactory<\Database\Factories\SessionDetailFactory> */
    use HasFactory;
    public function subject(){
        return $this->belongsTo(Subject::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'trainer_id');
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
    public function sessionEvents() {
        return $this->hasMany(SessionEvent::class);
    }
}
