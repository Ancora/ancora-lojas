<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_url',
    ];

    /* Relacionamentos */
    /* N photos X 1 product */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
