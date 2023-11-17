<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo_tipoArticulo extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'idrelacion';

    protected $table = 'articulo_tipoarticulo';

    protected $fillable = [
        'idarticulo',
        'idtipo'
    ];
}
