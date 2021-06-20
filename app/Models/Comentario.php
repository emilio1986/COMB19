<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = [
        'contenido', 'autor'
    ];

    public function user()
    {

        return $this->belongsTo(User::class,'user_id');
    }
}
