<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $with = ['gradeType'];

    public function gradeType()
    {
        return $this->belongsTo(Turbine::class);
    }
}
