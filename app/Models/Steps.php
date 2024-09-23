<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Steps extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'number',
        'departure',
        'arrival',
        'seat',
        'gate',
        'baggage_drop',
    ];

    public function trips()
    {
        return $this->belongsTo(Trips::class);
    }
}
