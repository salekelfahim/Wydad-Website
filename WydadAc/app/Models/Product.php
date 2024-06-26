<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover',
        'price',
        'description',
        'details',
        'type_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function size()
    {
        return $this->Hasmany(Productssize::class);
    }

    public function panier()
    {
        return $this->Hasmany(Panier::class);
    }
}
