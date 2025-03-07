<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Importation du modèle User
use App\Models\Assignment; // Importation du modèle Assignment
use App\Models\SessionEvent; // Importation du modèle SessionEvent

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'specialty', 'weekly_hours'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function sessions()
    {
        return $this->hasMany(SessionEvent::class);
    }
}
