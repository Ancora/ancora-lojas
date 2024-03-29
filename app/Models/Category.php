<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'image',
        'description',
        'slug',
    ];

    /* Relacionamentos */
    /* N categories X N products */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
