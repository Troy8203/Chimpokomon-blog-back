<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status'
    ];

    /* Relacion de N a N Post tiene N tags*/
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
