<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    //Relacion uno a muchos con Estados
    public function estados()
    {
        return $this->hasMany(Estado::class);
    }
}
