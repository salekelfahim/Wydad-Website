<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'date',
        'opponent',
        'compitition_id',
        'status',
        'stadium',
    ];

    public function compitition()
    {
        return $this->belongsTo(Compitition::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
