<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'nationality',
        'mission_id',
        'picture',
    ];

    public function mission()
    {
        return $this->belongsTo(Mission::class);
    }
}
