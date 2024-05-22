<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id',
        'category_id',
        'status',
    ];

    /* Relacion de N a N Post tiene N tags*/
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    /* Relacion de 1 a N Post pertene a una Categoria */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /* Relacion con Usuarios Donde un Post pertenece a un Usuario */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
