<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    use HasFactory, SoftDeletes;

    public function tipoArticulos()
    {
        return $this->belongsToMany(TipoArticulo::class);
    }

    protected $primaryKey = 'idarticulo';

    protected $table = 'articulos';
    
    protected $fillable = [
        'nombre',
        'aniocreacion'
    ];
}
