<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compitition extends Model
{
    use HasFactory;

    public function game()
    {
        return $this->HasMany(Game::class);
    }
}
