<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;  // Это обязательно для работы фабрики

    protected $fillable = ['title', 'text', 'is_moderated'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
