<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Trainer; // Importation du modèle Trainer
use App\Models\Subject; // Importation du modèle Subject
use App\Models\Group; // Importation du modèle Group

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = ['trainer_id', 'subject_id', 'group_id'];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
