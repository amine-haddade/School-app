<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use App\Models\Field; // Importation du modèle Field
use App\Models\Assignment; // Importation du modèle Assignment
use App\Models\SessionEvent; // Importation du modèle SessionEvent

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'field_id'];

    protected  $with=['feild','assignment','session_event'];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function assignment()
    {
        return $this->hasMany(Assignment::class);
    }

    public function session_event()
    {
        return $this->hasMany(SessionEvent::class);
    }
}


