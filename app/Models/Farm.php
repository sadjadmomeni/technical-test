<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $with = ['turbines'];

    public function turbines()
    {
        return $this->hasMany(Turbine::class);
    }
}