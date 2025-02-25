<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    /** @use HasFactory<\Database\Factories\SchoolYearFactory> */
    use HasFactory;
    protected $keyType = 'string';
    public $incrementing = false;
    public function groups()
    {
        return $this->hasMany(Group::class, 'year_id', 'id');
    }
}
