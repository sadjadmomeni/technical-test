<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    protected $with = ['componentType'];

    public function componentType()
    {
        return $this->belongsTo(ComponentType::class);
    }
}
