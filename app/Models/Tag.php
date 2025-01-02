<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;  // Это обязательно для работы фабрики

    protected $fillable = ['hashtag'];

    public function stories()
    {
        return $this->belongsToMany(Story::class);
    }
}
