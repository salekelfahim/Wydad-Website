<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'nationality',
        'number',
        'position',
        'picture',
    ];
}
