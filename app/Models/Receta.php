<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;
    
    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function megusta(){
        return $this->belongsToMany(User::class,'likes_receta');
    }
}
