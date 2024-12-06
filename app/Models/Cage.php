<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'capacity', 'animals'];

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
    public function getAnimalsCountAttribute()
    {
        return $this->animals()->count();
    }
}

