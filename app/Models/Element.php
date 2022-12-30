<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'factor',
    ];

    /* Relacionamentos */
    /* N elements X N colors */
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}
