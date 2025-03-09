<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Week; // Importation du modèle Week
use App\Models\Group; // Importation du modèle Group
use App\Models\Trainer; // Importation du modèle Trainer
use App\Models\Subject; // Importation du modèle Subject
use App\Models\Classroom; // Importation du modèle Classroom

class SessionEvent extends Model
{
    use HasFactory;

    protected $table = 'sessions_events'; // Assurez-vous que c'est le bon nom
    protected $primaryKey = 'id'; // Assurez-vous que c'est la bonne clé primaire



    protected $fillable = [
        'session_date', 'week_id', 'group_id', 'trainer_id',
        'subject_id', 'classroom_id', 'day', 'session_number', 'duration'
    ];

    protected  $with=['week','group','trainer','subject','classroom'];

    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
