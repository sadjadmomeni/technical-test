<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    protected $with = ['componentType', 'latestGrade'];

    public function componentType()
    {
        return $this->belongsTo(ComponentType::class);
    }

    public function latestGrade()
    {
        return $this->hasMany(Grade::class)->latest();
    }
}