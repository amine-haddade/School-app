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


    protected  $with=['group','subject'];

    public function group()
    {
        return $this->hasMany(Group::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}
