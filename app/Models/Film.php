<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
 protected $fillable = [
        'title',
        'release_year',
        'length',
        'description',
        'rating',
        'language_id',
        'special_features',
        'image'
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    public function critics()
    {
        return $this->hasMany(Critic::class);
    }
}
