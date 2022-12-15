<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'code',
        'name',
        'description',
        'price',
        'stock',
        'width',
        'height',
        'length',
        'slug',
    ];

    /* Relacionamentos */
    /* N products X N categories */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /* N products X 1 shop */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    /* N products X 1 order */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /* 1 product X N photos */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
