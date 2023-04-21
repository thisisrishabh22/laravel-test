<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Mood extends Model
{

    protected $fillable = [
        'name',
        'color',
    ];

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    protected static function boot(){
        parent::boot();

        static::saving(function() {
            Cache::forget('moods');
        });
    }
}
