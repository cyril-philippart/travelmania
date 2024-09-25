<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trips extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'user_id'
    ];

    public function steps()
    {
        return $this->hasMany(Steps::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
