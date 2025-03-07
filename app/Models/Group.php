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

    public function field()
    {
        return $this->belongsTo(Field::class);
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


