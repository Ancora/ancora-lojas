<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    /* Relacionamentos */
    /* N shops X 1 user */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* 1 shop X N products */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
