<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    /* Relacion de 1 a N Categoria tiene muchos Post */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
