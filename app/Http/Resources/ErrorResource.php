<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResource extends JsonResource
{
    public static function notFound()
    {
        return response()->json(['message' => 'Not Found!'], 404);
    }
}
