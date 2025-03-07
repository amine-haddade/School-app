<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Group; // Importation du modèle Group
use App\Models\Subject; // Importation du modèle Subject

class Field extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
