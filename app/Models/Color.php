<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'condition',
        'component',
        'maker',
        'image',
    ];

    /* Relacionamentos */
    /* N colors X N products */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /* N colors X N elements */
    public function elements()
    {
        return $this->belongsToMany(Element::class);
    }
}
