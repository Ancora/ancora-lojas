<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
    ];

    /* Relacionamentos */
    /* N orders X 1 user */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* 1 order X N products */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
