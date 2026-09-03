<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'last_name',
        'first_name',
        'birthdate'
    ];

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}
